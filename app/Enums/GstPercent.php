<?php

namespace App\Enums;

enum GstPercent: int
{
    case T1 = 0;
    case T5 = 5;
    case T12 = 12;
    case T18 = 18;
    case T24 = 24;


    public function getName(): string
    {
        return match ($this) {
            self::T1 => '0 %',
            self::T5 => '5 %',
            self::T12 => '12 %',
            self::T18 => '18 %',
            self::T24 => '24 %',
        };
    }

    public function getTax(): float
    {
        return match ($this) {
            self::T1 => 0,
            self::T5 => 5,
            self::T12 => 12,
            self::T18 => 18,
            self::T24 => 24,
        };
    }

}
