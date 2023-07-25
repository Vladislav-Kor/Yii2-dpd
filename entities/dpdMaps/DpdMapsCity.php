<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 10:14:38
 *
 * @modify date 2022-08-11 10:14:38
 *
 * @desc [description]
 */

declare(strict_types=1);

namespace app\entities\dpdMaps;

class DpdMapsCity extends DpdMapsCityBase
{
    /**
     * @var DpdMapsLatitude
     */
    private $latitude;
    /**
     * @var DpdMapsLongitude
     */
    private $longitude;

    public function __construct(
        DpdMapsCityCode $cityCode,
        DpdMapsCityName $cityName,
        DpdMapsRegionName $regionName,
        DpdMapsLatitude $latitude,
        DpdMapsLongitude $longitude
    ) {
        $this->cityCode = $cityCode;
        $this->cityName = $cityName;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->regionName = $regionName;
    }

    public function getCityName(): DpdMapsCityName
    {
        return $this->cityName;
    }

    public function getLatitude(): DpdMapsLatitude
    {
        return $this->latitude;
    }

    public function getLongitude(): DpdMapsLongitude
    {
        return $this->longitude;
    }

    public function getRegionName(): DpdMapsRegionName
    {
        return $this->regionName;
    }

    public function remove(): void
    {
    }

    public function setCityCode(DpdMapsCityCode $cityCode): void
    {
        $this->cityCode = $cityCode;
    }

    public function setCityName(DpdMapsCityName $cityName): void
    {
        $this->cityName = $cityName;
    }

    public function setLatitude(DpdMapsLatitude $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function setLongitude(DpdMapsLongitude $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function setRegionName(DpdMapsRegionName $regionName): void
    {
        $this->regionName = $regionName;
    }
}
