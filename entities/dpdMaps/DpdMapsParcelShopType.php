<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 11:35:16
 *
 * @modify date 2022-08-11 11:35:16
 *
 * @desc [description]
 */

declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsParcelShopType
{
    public const PARCEL_SHOP_TYPE_POSTOMAT = 'П';
    public const PARCEL_SHOP_TYPE_PUNKT = 'ПВП';
    private $value;

    public function __construct($value = null)
    {
        Assertion::notNull($value);
        Assertion::inArray($value, [
            self::PARCEL_SHOP_TYPE_POSTOMAT,
            self::PARCEL_SHOP_TYPE_PUNKT,
        ]);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
