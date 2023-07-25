<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 10:50:59
 *
 * @modify date 2022-08-11 10:50:59
 *
 * @desc [description]
 */
declare(strict_types=1);

use app\entities\dpdMaps\DpdMapsCityCode;

class PriceRepository
{
/**
     * getPrice.
     *
     * @throws \SoapFault
     * @throws \DomainException
     */
    public function getPrice(DpdMapsCityCode $cityId, int $clientNumber, string $clientKey, ProductWeightBox $weight): DeliverySum
    {
        $arRequest = [];
        $param = [];

        // Регистрируем аккаунт dpd для api
        $client = new \SoapClient(\Yii::$app->params['dpd_server'].'calculator2?wsdl');
        $param['auth'] = [  // передаются параметры номер и ключ от аккаунта dpd
            'clientNumber' => $clientNumber,
            'clientKey' => $clientKey,
        ];
        // id города можно узнать в app\repositories\dpdMaps\DpdMapsCityRepository функция findCity по его имяни
        $param['pickup'] = [
            'cityId' => 49270397,   // откуда Ростов-на-Дону
        ];
        $param['delivery'] = [
            'cityId' => $cityId->getValue(),    // id города отправления
        ];

        // что делать с терминалом
        $param['selfPickup'] = true; // Доставка ОТ терминала
        $param['selfDelivery'] = true; // Доставка ДО терминала
        $param['weight'] = $weight->getValue();
        $arRequest['request'] = $param; // помещаем наш масив авторизации в масив запроса request.
        $ret = $client->getServiceCost2($arRequest); // обращаемся к функции getServiceCost2  и получаем список городов.

        return new DeliverySum($ret->return->cost);
    }
}