<?php

namespace App\Enums;

enum Subjective :int
{
    case GROUP = 0;
    case PRIVATE = 1;
    case PUBLIC = 2;


    public function getName(): string
    {
        return match ($this) {
            self::PRIVATE => 'Private',
            self::PUBLIC => 'Public',
        };
    }

    public function getStyle(): string
    {
        return match ($this) {
            self::PRIVATE => 'bg-red-500',
            self::PUBLIC => 'bg-blue-500',
        };
    }

}
