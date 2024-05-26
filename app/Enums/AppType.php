<?php

namespace App\Enums;

enum AppType: int
{
    case DEVELOPER = 0;
    case GARMENTS = 1;
    case OFFSET = 2;
    case UPVC = 3;
    case AUDIT = 4;
    case BLOG = 5;


    public function getName(): string
    {
        return match ($this) {
            self::DEVELOPER => 'Developer',
            self::GARMENTS => '1',
            self::OFFSET => 'Offset',
            self::UPVC => 'Upvc',
            self::AUDIT => 'Audit',
            self::BLOG => 'Blog',
        };
    }
}
