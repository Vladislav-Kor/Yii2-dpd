<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 15:06:22
 *
 * @modify date 2022-08-11 15:06:22
 *
 * @desc [description]
 */

declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsLatitude
{
    private $value;

    public function __construct($value = null)
    {
        Assertion::notNull($value);
        Assertion::float($value);
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
