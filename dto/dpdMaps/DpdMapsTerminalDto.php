<?php

declare(strict_types=1);
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 15:47
*/

namespace app\dto\dpdMaps;

class DpdMapsTerminalDto
{
    public $address;
    public $cityCode;
    public $code;
    public $cords;
    public $description;
    public $height;
    public $id;
    public $latitude;
    public $length;
    public $longitude;
    public $name;
    public $parcelShopType;
    public $state;
    public $width;
    public $workTime;

    public function load(?array $data = null): void
    {
        if ($data !== null && \is_array($data)) {
            if (isset($data['address'])) {
                $this->address = trim($data['address']);
            }
            if (isset($data['cityCode'])) {
                $this->cityCode = (int) $data['cityCode'];
            }
            if (isset($data['code'])) {
                $this->code = $data['code'];
            }
            if (isset($data['description'])) {
                $this->description = trim($data['description']);
            }
            if (isset($data['height'])) {
                $this->height = (int) $data['height'];
            }
            if (isset($data['id'])) {
                $this->id = (int) $data['id'];
            }
            if (isset($data['latitude'])) {
                $this->latitude = (float) $data['latitude'];
            }
            if (isset($data['longitude'])) {
                $this->longitude = (float) $data['longitude'];
            }
            if (isset($data['longitude'], $data['latitude'])) {
                $this->cords = [$data['longitude'], $data['longitude']];
            }
            if (isset($data['length'])) {
                $this->length = (int) $data['length'];
            }
            if (isset($data['name'])) {
                $this->name = trim($data['name']);
            }
            if (isset($data['state'])) {
                $this->state = $data['state'];
            }
            if (isset($data['parcelShopType'])) {
                $this->parcelShopType = trim($data['parcelShopType']);
            }
            if (isset($data['width'])) {
                $this->width = (int) $data['width'];
            }
            if (isset($data['workTime'])) {
                $this->workTime = trim($data['workTime']);
            }
        }
    }
}
