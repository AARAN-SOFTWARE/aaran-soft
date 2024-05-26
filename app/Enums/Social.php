<?php

namespace App\Enums;

enum Social: int
{
    case T1 = 0;
    case T5 = 1;
    case T12 = 2;
    case T18 = 3;
    case T24 = 4;


    public function getName(): string
    {
        return match ($this) {
            self::T1 => 'Email-id',
            self::T5 => 'Facebook-id',
            self::T12 => 'Twitter-id',
            self::T18 => 'Instagram-id',
            self::T24 => 'Github-id',
        };
    }

    public function getTax(): float
    {
        return match ($this) {
            self::T1 => 0,
            self::T5 => 1,
            self::T12 => 2,
            self::T18 => 3,
            self::T24 => 4,
        };
    }

}
