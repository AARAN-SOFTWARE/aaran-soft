<?php

namespace App\Enums;

enum GST :int
{
    case CGST = 0;
    case IGST = 1;
//    case SGST = 2;

    public function getName(): string
    {
        return match ($this) {
            self::CGST => 'CGST + SGST',
            self::IGST => 'IGST',
//            self::SGST => 'SGST',
        };
    }
}
