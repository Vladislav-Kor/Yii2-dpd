<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 11:37:07
 *
 * @modify date 2022-08-11 11:37:07
 *
 * @desc [description]
 */

declare(strict_types=1);

namespace app\entities\dpdMaps;

use Assert\Assertion;

class DpdMapsState
{
    public const MAPS_STATE_FULL = 'Full';
    public const MAPS_STATE_OPEN = 'Open';
    private $value;

    public function __construct($value = null)
    {
        Assertion::notNull($value);
        Assertion::inArray($value, [
            self::MAPS_STATE_OPEN,
            self::MAPS_STATE_FULL,
        ]);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
