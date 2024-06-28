<?php

namespace App\Enums;

enum Menu: int
{
    case BOOKS = 1;
    case AUDIT = 2;
    case ADMIN = 3;
    case SALES_TRACK = 4;
    case SUNDAR = 5;
    case TASK_MANAGER = 6;
    case ENTRIES = 7;
    case ACCOUNTS = 8;
    case MASTER = 9;
    case COMMON = 10;
    case REPORTS = 11;
    case DEVELOPER = 12;



    public function getName(): string
    {
        return match ($this) {
            self::BOOKS => 'BOOKS',
            self::AUDIT => 'AUDIT',
            self::ADMIN => 'ADMIN',
            self::SALES_TRACK => 'SALES_TRACK',
            self::SUNDAR => 'SUNDAR',
            self::TASK_MANAGER => 'TASK_MANAGER',
            self::ENTRIES => 'ENTRIES',
            self::ACCOUNTS => 'ACCOUNTS',
            self::MASTER => 'MASTER',
            self::COMMON => 'COMMON',
            self::REPORTS => 'REPORTS',
            self::DEVELOPER => 'DEVELOPER',
        };
    }
}
