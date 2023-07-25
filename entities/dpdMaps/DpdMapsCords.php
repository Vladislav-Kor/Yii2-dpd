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

namespace app\entities\dpdMaps;

class DpdMapsCords
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
        DpdMapsLatitude $latitude,
        DpdMapsLongitude $longitude
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude(): DpdMapsLatitude
    {
        return $this->latitude;
    }

    public function getLongitude(): DpdMapsLongitude
    {
        return $this->longitude;
    }

    public function setLatitude(DpdMapsLatitude $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function setLongitude(DpdMapsLongitude $longitude): void
    {
        $this->longitude = $longitude;
    }
}
