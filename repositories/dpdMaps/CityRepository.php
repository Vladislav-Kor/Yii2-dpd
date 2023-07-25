<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 14:02
*/
declare(strict_types=1);

namespace app\repositories\dpdMaps;

use app\dto\dpdMaps\DpdMapsCityDto;
use app\entities\dpdMaps\DpdMapsCity;
use app\entities\dpdMaps\DpdMapsCityCode;
use app\entities\dpdMaps\DpdMapsCityName;
use app\entities\dpdMaps\DpdMapsLatitude;
use app\entities\dpdMaps\DpdMapsLongitude;
use app\entities\dpdMaps\DpdMapsRegionName;
use app\repositories\Hydrator;
use app\repositories\NotFoundException;

class CityRepository
{
    /**
     * @var Hydrator
     */
    private $hydrator;

    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }
    public function getCityById(DpdMapsCityCode $code): DpdMapsCity
    {
        $result = \Yii::$app->db->createCommand('SELECT * FROM `dpd_maps_city` WHERE `cityCode`=:code')
            ->bindValue(':code', $code->getValue())
            ->queryOne();

        if (!$result) {
            throw new NotFoundException('Нет такого города');
        }

        $dto = new DpdMapsCityDto();
        $dto->load($result);

        return $this->hydrator->hydrate(DpdMapsCity::class, [
            'cityCode' => new DpdMapsCityCode($dto->cityCode),
            'cityName' => new DpdMapsCityName($dto->cityName),
            'latitude' => new DpdMapsLatitude($dto->latitude),
            'longitude' => new DpdMapsLongitude($dto->longitude),
            'regionName' => new DpdMapsRegionName($dto->regionName),
        ]);
    }
}
