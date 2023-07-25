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

class DpdMapsTerminal
{
    /**
     * @var DpdMapsTerminalAddress
     */
    private $address;
    /**
     * @var DpdMapsCityCode
     */
    private $cityCode;
    /**
     * @var DpdMapsTerminalCode
     */
    private $code;
    /**
     * @var DpdMapsTerminalDescription
     */
    private $description;
    /**
     * @var DpdMapsHeight
     */
    private $height;
    /**
     * @var DpdMapsTerminalId
     */
    private $id;
    /**
     * @var DpdMapsLatitude
     */
    private $latitude;
    /**
     * @var DpdMapsLength
     */
    private $length;
    /**
     * @var DpdMapsLongitude
     */
    private $longitude;
    /**
     * @var DpdMapsTerminalName
     */
    private $name;
    /**
     * @var DpdMapsParcelShopType
     */
    private $parcelShopType;
    /**
     * @var DpdMapsState
     */
    private $state;
    /**
     * @var DpdMapsWeight
     */
    private $weight;
    /**
     * @var DpdMapsWidth
     */
    private $width;
    /**
     * @var DpdMapsWorkTime
     */
    private $workTime;

    public function __construct(
        DpdMapsTerminalId $id,
        DpdMapsTerminalCode $code,
        DpdMapsTerminalName $name,
        DpdMapsCityCode $cityCode,
        DpdMapsParcelShopType $parcelShopType,
        DpdMapsState $state,
        DpdMapsTerminalAddress $address,
        DpdMapsHeight $height,
        DpdMapsLength $length,
        DpdMapsWeight $weight,
        DpdMapsWidth $width,
        DpdMapsLatitude $latitude,
        DpdMapsLongitude $longitude,
        DpdMapsWorkTime $workTime,
        DpdMapsTerminalDescription $description
    ) {
        $this->id = $id;
        $this->address = $address;
        $this->cityCode = $cityCode;
        $this->code = $code;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->name = $name;
        $this->height = $height;
        $this->length = $length;
        $this->weight = $weight;
        $this->width = $width;
        $this->parcelShopType = $parcelShopType;
        $this->state = $state;
        $this->workTime = $workTime;
        $this->description = $description;
    }

    public function getAddress(): DpdMapsTerminalAddress
    {
        return $this->address;
    }

    public function getCityCode(): DpdMapsCityCode
    {
        return $this->cityCode;
    }

    public function getCode(): DpdMapsTerminalCode
    {
        return $this->code;
    }

    public function getDescription(): DpdMapsTerminalDescription
    {
        return $this->description;
    }

    public function getHeight(): DpdMapsHeight
    {
        return $this->height;
    }

    public function getId(): DpdMapsTerminalId
    {
        return $this->id;
    }

    public function getLatitude(): DpdMapsLatitude
    {
        return $this->latitude;
    }

    public function getLength(): DpdMapsLength
    {
        return $this->length;
    }

    public function getLongitude(): DpdMapsLongitude
    {
        return $this->longitude;
    }

    public function getName(): DpdMapsTerminalName
    {
        return $this->name;
    }

    public function getParcelShopType(): DpdMapsParcelShopType
    {
        return $this->parcelShopType;
    }

    public function getState(): DpdMapsState
    {
        return $this->state;
    }

    public function getWeight(): DpdMapsWeight
    {
        return $this->weight;
    }

    public function getWidth(): DpdMapsWidth
    {
        return $this->width;
    }

    public function getWorkTime(): DpdMapsWorkTime
    {
        return $this->workTime;
    }

    public function isEquals(self $value): bool
    {
        return $this->getId()->getValue() === $value->getId()->getValue();
    }

    public function remove(): void
    {
    }

    public function setAddress(DpdMapsTerminalAddress $address): void
    {
        $this->address = $address;
    }

    public function setCityCode(DpdMapsCityCode $cityCode): void
    {
        $this->cityCode = $cityCode;
    }

    public function setCode(DpdMapsTerminalCode $code): void
    {
        $this->code = $code;
    }

    public function setDescription(DpdMapsTerminalDescription $description): void
    {
        $this->description = $description;
    }

    public function setHeight(DpdMapsHeight $height): void
    {
        $this->height = $height;
    }

    public function setId(DpdMapsTerminalId $id): void
    {
        $this->id = $id;
    }

    public function setLatitude(DpdMapsLatitude $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function setLength(DpdMapsLength $length): void
    {
        $this->length = $length;
    }

    public function setLongitude(DpdMapsLongitude $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function setName(DpdMapsTerminalName $name): void
    {
        $this->name = $name;
    }

    public function setParcelShopType(DpdMapsParcelShopType $parcelShopType): void
    {
        $this->parcelShopType = $parcelShopType;
    }

    public function setState(DpdMapsState $state): void
    {
        $this->state = $state;
    }

    public function setWeight(DpdMapsWeight $weight): void
    {
        $this->weight = $weight;
    }

    public function setWidth(DpdMapsWidth $width): void
    {
        $this->width = $width;
    }

    public function setWorkTime(DpdMapsWorkTime $workTime): void
    {
        $this->workTime = $workTime;
    }
}
