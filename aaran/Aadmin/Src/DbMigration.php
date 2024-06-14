<?php

namespace Aaran\Aadmin\Src;

class DbMigration
{
    public static function enabled(string $feature): bool
    {
        return match (config('aadmin.app_type')) {

            config('software.GARMENT') => in_array($feature, config('garment.migrations', [])),
            config('software.SUNDAR') => in_array($feature, config('sundar.migrations', [])),
        };
    }

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

    #region[Share trades]
    public static function hasShareTrades(): bool
    {
        return static::enabled(static::shareTrades());
    }

    public static function shareTrades(): string
    {
        return 'shareTrades';
    }

    #endregion
}


