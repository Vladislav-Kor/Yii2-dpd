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

namespace app\repositories\dpdMaps;

use app\dto\dpdMaps\DpdMapsTerminalRequestDto;
use app\entities\dpdMaps\DpdMapsCityCode;
use app\entities\dpdMaps\DpdMapsHeight;
use app\entities\dpdMaps\DpdMapsLatitude;
use app\entities\dpdMaps\DpdMapsLength;
use app\entities\dpdMaps\DpdMapsLongitude;
use app\entities\dpdMaps\DpdMapsParcelShopType;
use app\entities\dpdMaps\DpdMapsState;
use app\entities\dpdMaps\DpdMapsTerminal;
use app\entities\dpdMaps\DpdMapsTerminalAddress;
use app\entities\dpdMaps\DpdMapsTerminalCode;
use app\entities\dpdMaps\DpdMapsTerminalDescription;
use app\entities\dpdMaps\DpdMapsTerminalName;
use app\entities\dpdMaps\DpdMapsWeight;
use app\entities\dpdMaps\DpdMapsWidth;
use app\entities\dpdMaps\DpdMapsWorkTime;
use app\repositories\Hydrator;

class DpdMapsTerminalRepository
{
    /**
     * @var Hydrator
     */
    private $hydrator;

    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * getTerminals.
     *
     * @throws \ReflectionException
     * @throws \SoapFault
     *
     * @return array<DpdMapsTerminal>
     */
    public function getTerminals(): array
    {
        $arRequest = [];
        $city = [];

        $client = new \SoapClient(\Yii::$app->params['dpd_server'].'geography2?wsdl');
        $city['auth'] = [
            'clientNumber' => \Yii::$app->params['dpd_login'],
            'clientKey' => \Yii::$app->params['dpd_key'],
        ];

        $arRequest['request'] = $city;
        $ret = $client->getParcelShops($arRequest);
        $res = [];
        foreach ($ret->return->parcelShop as $item) {
            $dto = new DpdMapsTerminalRequestDto();
            $dto->load($item);

            $res[] = $this->hydrator->hydrate(DpdMapsTerminal::class, [
                'address' => new DpdMapsTerminalAddress($dto->address),
                'cityCode' => new DpdMapsCityCode($dto->cityCode),
                'code' => new DpdMapsTerminalCode($dto->code),
                'description' => new DpdMapsTerminalDescription($dto->description),
                'height' => new DpdMapsHeight($dto->maxHeight),
                'latitude' => new DpdMapsLatitude($dto->latitude),
                'length' => new DpdMapsLength($dto->maxLength),
                'longitude' => new DpdMapsLongitude($dto->longitude),
                'name' => new DpdMapsTerminalName($dto->name),
                'parcelShopType' => new DpdMapsParcelShopType($dto->parcelShopType),
                'state' => new DpdMapsState($dto->state),
                'width' => new DpdMapsWidth($dto->maxWidth),
                'weight' => new DpdMapsWeight($dto->maxWeight),
                'workTime' => new DpdMapsWorkTime($dto->schedule),
            ]);
        }

        return $res;
    }
}
