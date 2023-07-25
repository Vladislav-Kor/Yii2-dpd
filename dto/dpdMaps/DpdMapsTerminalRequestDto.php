<?php

declare(strict_types=1);
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 15:00
*/

namespace app\dto\dpdMaps;

class DpdMapsTerminalRequestDto
{
    public $address;
    public $cityCode;
    public $code;
    public $description;
    public $latitude;
    public $longitude;
    public $maxHeight;
    public $maxLength;
    public $maxShipmentWeight;
    public $maxWeight;
    public $maxWidth;
    public $name;
    public $parcelShopType;
    public $schedule;
    public $state;

    public function load($terminal = null): void
    {
        if ($terminal instanceof \stdClass) {
            $this->code = $terminal->code;
            $this->cityCode = (int) $terminal->address->cityCode;
            $this->parcelShopType = $terminal->parcelShopType;
            $this->state = $terminal->state;
            $this->name = $terminal->brand;

            // address
            $this->address = $terminal->address->cityName.' ';
            if (isset($terminal->address->streetAbbr)) {
                $this->address .= $terminal->address->streetAbbr.'. ';
            }
            $this->address .= $terminal->address->street;
            if (isset($terminal->address->houseNo)) {
                $this->address .= ' '.$terminal->address->houseNo;
            }
            if (isset($terminal->address->building)) {
                $this->address .= '/'.$terminal->address->building;
            }
            if (isset($terminal->address->descript)) {
                $this->description = $terminal->address->descript;
            } else {
                $this->description = '';
            }

            // coordinates
            $this->latitude = (float) $terminal->geoCoordinates->latitude;
            $this->longitude = (float) $terminal->geoCoordinates->longitude;

            // limits
            if (isset($terminal->limits->maxShipmentWeight)) {
                $this->maxShipmentWeight = (int) $terminal->limits->maxShipmentWeight;
            } else {
                $this->maxShipmentWeight = 0;
            }
            $this->maxWeight = (int) $terminal->limits->maxWeight;
            $this->maxLength = (int) $terminal->limits->maxLength;
            $this->maxWidth = (int) $terminal->limits->maxWidth;
            $this->maxHeight = (int) $terminal->limits->maxHeight;

            // schedule
            $this->schedule = '';
            if (\is_array($terminal->schedule)) {
                foreach ($terminal->schedule as $time) {
                    if ($time->operation === 'SelfDelivery') {
                        if (\is_array($time->timetable)) {
                            foreach ($time->timetable as $item) {
                                $this->schedule .= $item->weekDays.' '.$item->workTime.'<br>';
                            }
                        } else {
                            $this->schedule .= $time->timetable->weekDays.' '.$time->timetable->workTime.'<br>';
                        }
                    }
                }
            } else {
                if ($terminal->schedule->operation === 'SelfDelivery') {
                    if (\is_array($terminal->schedule->timetable)) {
                        foreach ($terminal->schedule->timetable as $item) {
                            $this->schedule .= $item->weekDays.' '.$item->workTime.'<br>';
                        }
                    } else {
                        $this->schedule .= $terminal->schedule->timetable->weekDays.' '.$terminal->schedule->timetable->workTime.'<br>';
                    }
                }
            }
        }
    }
}
