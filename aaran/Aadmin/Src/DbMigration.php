<?php

namespace Aaran\Aadmin\Src;

use App\Models\SoftVersion;

class DbMigration
{
    public static function enabled(string $feature): bool
    {
        return match (config('aadmin.app_type')) {

            config('software.GARMENT_1') => in_array($feature, config('garment_1.migrations', [])),
            config('software.GARMENT_2') => in_array($feature, config('garment_2.migrations', [])),

            config('software.AUDIT') => in_array($feature, config('audit.migrations', [])),

            config('software.OFFSET') => in_array($feature, config('offset.migrations', [])),
            config('software.SUNDAR') => in_array($feature, config('sundar.migrations', [])),
            config('software.DEVELOPER') => in_array($feature, config('developer.migrations', [])),
            config('software.WELFARE') => in_array($feature, config('welfare.migrations', [])),

            config('software.SPOT_MY_NUMBER') => in_array($feature, config('spotmynumber.migrations', [])),
            config('software.SPORTS_CLUB') => in_array($feature, config('sportsclub.migrations', [])),

            config('software.SHARES') => in_array($feature, config('shares.migrations', [])),
        };
    }

    #region[Demo]
    public static function hasDemo(): bool
    {
        return static::enabled(static::demo());
    }

    public static function demo(): string
    {
        return 'demo';
    }

    #endregion

    #region[Core]
    public static function hasCore(): bool
    {
        return static::enabled(static::core());
    }

    public static function core(): string
    {
        return 'core';
    }
    #endregion

    #region[Common]
    public static function hasCommon(): bool
    {
        return static::enabled(static::common());
    }

    public static function common(): string
    {
        return 'common';
    }
    #endregion

    #region[Master]
    public static function hasMaster(): bool
    {
        return static::enabled(static::master());
    }

    public static function master(): string
    {
        return 'master';
    }
    #endregion

    #region[Orders]
    public static function hasOrder(): bool
    {
        return static::enabled(static::order());
    }

    public static function order(): string
    {
        return 'order';
    }
    #endregion

    #region[Styles]
    public static function hasStyle(): bool
    {
        return static::enabled(static::style());
    }

    public static function style(): string
    {
        return 'style';
    }
    #endregion

    #region[Entry]
    public static function hasEntry(): bool
    {
        return static::enabled(static::entry());
    }

    public static function entry(): string
    {
        return 'entry';
    }
    #endregion

    #region[CreditNote]
    public static function hasCreditNote(): bool
    {
        return static::enabled(static::creditnote());
    }

    public static function creditnote(): string
    {
        return 'creditnote';
    }

    #endregion

    #region[DebitNote]
    public static function hasDebitNote(): bool
    {
        return static::enabled(static::debitnote());
    }

    public static function debitnote(): string
    {
        return 'debitnote';
    }

    #endregion

    #region[Erp]
    public static function hasErp(): bool
    {
        return static::enabled(static::erp());
    }

    public static function erp(): string
    {
        return 'erp';
    }

    #endregion

    #region[Attendance]
    public static function hasAttendance(): bool
    {
        return static::enabled(static::attendance());
    }

    public static function attendance(): string
    {
        return 'attendance';
    }

    #endregion

    #region[audit]
    public static function hasAudit(): bool
    {
        return static::enabled(static::audit());
    }

    public static function audit(): string
    {
        return 'audit';
    }

    #endregion

    #region[Blog]
    public static function hasBlog(): bool
    {
        return static::enabled(static::blog());
    }

    public static function blog(): string
    {
        return 'blog';
    }

    #endregion

    #region[Developer]
    public static function hasDeveloper(): bool
    {
        return static::enabled(static::developer());
    }

    public static function developer(): string
    {
        return 'developer';
    }

    #endregion

    #region[Developer Testing]
    public static function hasDeveloperTesting(): bool
    {
        return static::enabled(static::developerTesting());
    }

    public static function developerTesting(): string
    {
        return 'developerTesting';
    }

    #endregion

    #region[Magalir]
    public static function hasMagalir(): bool
    {
        return static::enabled(static::magalir());
    }

    public static function magalir(): string
    {
        return 'magalir';
    }

    #endregion

    #region[CashBook]
    public static function hasCashBook(): bool
    {
        return static::enabled(static::cashBook());
    }

    public static function cashBook(): string
    {
        return 'cashBook';
    }

    #endregion

    #region[BankBook]
    public static function hasBankBook(): bool
    {
        return static::enabled(static::bankBook());
    }

    public static function bankBook(): string
    {
        return 'bankBook';
    }

    #endregion

    #region[Credit Books]
    public static function hasCreditBooks(): bool
    {
        return static::enabled(static::creditBooks());
    }

    public static function creditBooks(): string
    {
        return 'creditBooks';
    }

    #endregion

    #region[Mail ids]
    public static function hasMailids(): bool
    {
        return static::enabled(static::mailids());
    }

    public static function mailids(): string
    {
        return 'mailids';
    }

    #endregion

    #region[Shares trades]
    public static function hasShareMarket(): bool
    {
        return static::enabled(static::shareMarket());
    }

    public static function shareMarket(): string
    {
        return 'shareMarket';
    }

    #endregion

    #region[TaskManger]
    public static function hasTaskManager(): bool
    {
        return static::enabled(static::taskManager());
    }

    public static function taskManager(): string
    {
        return 'taskManager';
    }

    #endregion

    #region[TodoList]
    public static function hasTodoList(): bool
    {
        return static::enabled(static::todoList());
    }

    public static function todoList(): string
    {
        return 'todoList';
    }

    #endregion

    #region[No Of Roll]
    public static function hasNoOfRoll(): bool
    {
        return static::enabled(static::noOfRoll());
    }

    public static function noOfRoll(): string
    {
        return 'noOfRoll';
    }
    #endregion

    #region[Current Version]
    public static function hasCurrentVersion(): bool
    {
        $currentVersion = SoftVersion::find(1);

        if ($currentVersion != null) {
            if (config(['aadmin.db_version'] == $currentVersion->db_version)) {
                return static::enabled(static::currentVersion());
            }
        }
        return false;
    }

    public static function currentVersion(): string
    {
        return 'currentVersion';
    }

    #endregion

    #region[Welfare]
    public static function hasWelfare(): bool
    {
        return static::enabled(static::welfare());
    }

    public static function welfare(): string
    {
        return 'welfare';
    }

    #endregion

    #region[Welfare]
    public static function hasWebs(): bool
    {
        return static::enabled(static::webs());
    }

    public static function webs(): string
    {
        return 'webs';
    }

    #endregion

    #region[SpotMyNumber]
    public static function hasSpotMyNumber(): bool
    {
        return static::enabled(static::spotMyNumber());
    }

    public static function spotMyNumber(): string
    {
        return 'spotMyNumber';
    }

    #endregion

    #region[Sports Club]
    public static function hasSports(): bool
    {
        return static::enabled(static::sports());
    }

    public static function sports(): string
    {
        return 'sports';
    }

    #endregion

}
