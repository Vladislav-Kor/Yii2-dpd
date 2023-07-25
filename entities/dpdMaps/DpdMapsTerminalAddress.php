<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 13:12:03
 *
 * @modify date 2022-08-11 13:12:03
 *
 * @desc [description]
 */

declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsTerminalAddress
{
    private $value;

    public function __construct($value = null)
    {
        Assertion::notNull($value);
        Assertion::string($value);
        Assertion::notBlank($value);
        Assertion::maxLength($value, 150);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
