<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 13:16:46
 *
 * @modify date 2022-08-11 13:16:46
 *
 * @desc [description]
 */

declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsTerminalId
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

    public function isEquals(self $value): bool
    {
        return $this->getValue() === $value->getValue();
    }
}
