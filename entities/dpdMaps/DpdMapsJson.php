<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-10-25 17:49:17
 *
 * @modify date 2022-10-25 17:49:17
 *
 * @desc [description]
 */
declare(strict_types=1);

/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-09-19 10:39:20
 *
 * @modify date 2022-09-19 10:39:20
 *
 * @desc [description]
 */

namespace app\entities\dpdMaps;

class DpdMapsJson implements \JsonSerializable
{
    private $address;
    private $id;
    private $latitude;
    private $longitude;
    private $name;
    private $workTime;

    /**
     * Undocumented function.
     */
    public function jsonSerialize(): array
    {
        return [
            'address' => $this->address->getValue(),
            'cords' => [$this->latitude->getValue(), $this->longitude->getValue()],
            'name' => $this->name->getValue(),
            'text' => $this->workTime->getValue(),
            'id' => $this->id->getValue(),
        ];
    }
}
