<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 14:31
*/
declare(strict_types=1);

namespace app\entities\dpdMaps;

class DpdMapsCityBase
{
    /**
     * @var DpdMapsCityCode
     */
    protected $cityCode;
    /**
     * @var DpdMapsCityName
     */
    protected $cityName;
    /**
     * @var DpdMapsRegionName
     */
    protected $regionName;

    public function getCityCode(): DpdMapsCityCode
    {
        return $this->cityCode;
    }

    public function getCityName(): DpdMapsCityName
    {
        return $this->cityName;
    }

    public function getRegionName(): DpdMapsRegionName
    {
        return $this->regionName;
    }
}
