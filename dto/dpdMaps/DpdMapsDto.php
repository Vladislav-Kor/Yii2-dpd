<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 27.07.2022
 * Time: 18:15
*/
declare(strict_types=1);

namespace app\dto\dpdMaps;

class DpdMapsDto
{
    public $abbreviation;
    public $cityCode;
    public $cityId;
    public $cityName;
    public $countryCode;
    public $countryName;
    public $indexMax;
    public $indexMin;
    public $regionCode;
    public $regionName;

    public function load(?array $data = null): void
    {
        if ($data !== null && \is_array($data)) {
            if (isset($data['cityId'])) {
                $this->cityId = (int) $data['cityId'];
            }
            if (isset($data['countryCode'])) {
                $this->countryCode = $data['countryCode'];
            }
            if (isset($data['countryName'])) {
                $this->countryName = $data['countryName'];
            }
            if (isset($data['regionCode'])) {
                $this->regionCode = (int) $data['regionCode'];
            }
            if (isset($data['regionName'])) {
                $this->regionName = $data['regionName'];
            }
            if (isset($data['cityCode'])) {
                $this->cityCode = (int) $data['cityCode'];
            }
            if (isset($data['cityName'])) {
                $this->cityName = $data['cityName'];
            }
            if (isset($data['abbreviation'])) {
                $this->abbreviation = $data['abbreviation'];
            }
            if (isset($data['indexMin'])) {
                $this->indexMin = $data['indexMin'];
            }
            if (isset($data['indexMax'])) {
                $this->indexMax = $data['indexMax'];
            }
        }
    }
}
