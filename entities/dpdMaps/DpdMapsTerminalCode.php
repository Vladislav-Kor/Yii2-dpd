<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 13:15:34
 *
 * @modify date 2022-08-11 13:15:34
 *
 * @desc [description]
 */
declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsTerminalCode
{
    private $value;

    public function __construct($value = null)
    {
        Assertion::notNull($value);
        Assertion::string($value);
        Assertion::notBlank($value);
        Assertion::maxLength($value, 10);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
