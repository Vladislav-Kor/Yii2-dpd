<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 14:12
*/
declare(strict_types=1);

namespace app\dto\dpdMaps;

class DpdMapsCityDto
{
    public $cityCode;
    public $cityName;
    public $latitude;
    public $longitude;
    public $regionName;

    public function load(?array $data = null): void
    {
        if ($data !== null && \is_array($data)) {
            if (isset($data['cityCode'])) {
                $this->cityCode = (int) $data['cityCode'];
            }
            if (isset($data['cityName'])) {
                $this->cityName = trim($data['cityName']);
            }
            if (isset($data['latitude'])) {
                $this->latitude = (float) $data['latitude'];
            }
            if (isset($data['longitude'])) {
                $this->longitude = (float) $data['longitude'];
            }
            if (isset($data['regionName'])) {
                $this->regionName = trim($data['regionName']);
            }
        }
    }
}
