<?php

namespace Aaran\Aadmin\Src;

class DbMigration
{
    public static function enabled(string $feature): bool
    {
        return match (config('aadmin.app_type')) {

            config('software.GARMENT') => in_array($feature, config('garment.migrations', [])),
            config('software.OFFSET') => in_array($feature, config('offset.migrations', [])),
            config('software.SUNDAR') => in_array($feature, config('sundar.migrations', [])),
            config('software.DEVELOPER') => in_array($feature, config('developer.migrations', [])),
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

    #region[Attendance]
    public static function hasAttendance(): bool
    {
        return static::enabled(static::demo());
    }

    public static function attendance(): string
    {
        return 'attendance';
    }

    #endregion

    #region[Audit]
    public static function hasAudit(): bool
    {
        return static::enabled(static::audit());
    }

    public static function audit(): string
    {
        return 'audit';
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

    #region[Common]

    #region[City]
    public static function hasCity(): bool
    {
        return static::enabled(static::city());
    }

    public static function city(): string
    {
        return 'city';
    }

    #endregion

    #region[State]
    public static function hasState(): bool
    {
        return static::enabled(static::state());
    }

    public static function state(): string
    {
        return 'state';
    }

    #endregion

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

}


