<?php

namespace App\Enums;

enum DbMigration: int
{
    case ATTENDANCE = 1;
    case AUDIT = 2;
    case BLOG = 3;
    case COMMON = 4;
    case CORE = 5;
    case DEMO = 6;
    case DEVEL0PER = 7;
    case ENTRY = 8;
    case CREDIT_NOTE = 9;
    case DEBIT_NOTE = 10;
    case ERP = 11;
    case MASTER = 12;
    case MAGALIR = 13;
    case ORDER = 14;
    case STYLE = 15;
    case MAIL_IDS = 16;
    case SHARE_TRADES = 17;
    case TASK_MANAGER = 18;
    case TODO_LIST = 19;


    public function getName(): string
    {
        return match ($this) {
            self::ATTENDANCE => 'hasAttendance',
            self::AUDIT => 'hasAudit',
            self::BLOG => 'hasBlog',
            self::COMMON => 'hasCommon',
            self::CORE => 'hasCore',
            self::DEMO => 'hasDemo',
            self::DEVEL0PER => 'hasDeveloper',
            self::ENTRY => 'hasEntry',
            self::CREDIT_NOTE => 'hasCreditNote',
            self::DEBIT_NOTE => 'hasDebitNote',
            self::ERP => 'hasErp',
            self::MASTER => 'hasMaster',
            self::MAGALIR => 'hasMagalir',
            self::ORDER => 'hasOrder',
            self::STYLE => 'hasStyle',
            self::MAIL_IDS => 'hasMailIds',
            self::SHARE_TRADES => 'hasShareTrades',
            self::TASK_MANAGER => 'hasTastManager',
            self::TODO_LIST => 'hasTodoList',
        };
    }
}
