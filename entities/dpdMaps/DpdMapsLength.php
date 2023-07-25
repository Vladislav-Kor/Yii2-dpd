<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 14:14:06
 *
 * @modify date 2022-08-11 14:14:06
 *
 * @desc [description]
 */
declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsLength
{
    private $value;

    public function __construct($value = null)
    {
        Assertion::notNull($value);
        Assertion::integer($value);
        Assertion::greaterOrEqualThan($value, 0);
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
