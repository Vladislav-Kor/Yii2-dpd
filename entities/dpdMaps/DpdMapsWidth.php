<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 14:42:41
 *
 * @modify date 2022-08-11 14:42:41
 *
 * @desc [description]
 */
declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsWidth
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
