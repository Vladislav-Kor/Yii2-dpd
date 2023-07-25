<?php

declare(strict_types=1);

namespace app\models;

use PriceRepository;
use app\repositories\Hydrator;
use app\services\dpdMaps\PriceService;
use app\dto\dpdMaps\DpdMapsTerminalDto;
use app\services\dpdMaps\dpdMapsService;
use app\repositories\dpdMaps\CityRepository;
use app\services\dpdMaps\dpdTerminalService;
use app\repositories\dpdMaps\TerminalRepository;
use app\repositories\dpdMaps\DpdMapsCityRepository;
use app\repositories\dpdMaps\DpdMapsTerminalRepository;

class DPD
{
    public function getPrice($id): DeliverySum
    {
        // прописываем доступ к сервисам цены терминала и города 
        $price_service = new PriceService(new PriceRepository(new Hydrator()));
        $terminal_service = new dpdTerminalService(
            new TerminalRepository(new Hydrator()),
            new DpdMapsTerminalRepository(new Hydrator())
        );
        $city_service =new dpdMapsService(
            new CityRepository(new Hydrator()),
            new DpdMapsCityRepository(new Hydrator())
        ); 

        // прописываем филтр входных парамтров
        $dto = new DpdMapsTerminalDto(); 
            $dto->load([
                'id' => $id,
            ]);

        $weight = 0;
        // находим терминал получателя 
        $dpd_terminal = $terminal_service->getTerminalById($dto->id);
        // получаем город и базы данных 
        $city = $city_service->getCityByCode($dpd_terminal->getCityCode());
        // полдучаем актуальный код города
        $code = $city_service->findCity($city->getCityName()->getValue());
        // получаем цену доставки 
        $dpd = $price_service->getPrice(
            $code[0]['id'],
            $weight
        );
        return $dpd;
    }
}