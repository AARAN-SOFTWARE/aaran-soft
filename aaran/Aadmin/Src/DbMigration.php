<?php

namespace Aaran\Aadmin\Src;

use App\Models\SoftVersion;

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

    #region[Location]
    //city , state , pincode , country
    public static function hasLocation(): bool
    {
        return static::enabled(static::location());
    }

    public static function location(): string
    {
        return 'location';
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


    #region[Current Version]
    public static function hasCurrentVersion(): bool
    {
        $currentVersion = SoftVersion::find(1);

        if (config(['aadmin.db_version'] == $currentVersion->db_version)) {
            return static::enabled(static::currentVersion());
        }
    }

    public static function currentVersion(): string
    {
        return 'currentVersion';
    }

    #endregion

    #region[HsnCode]
    public static function hasHsnCode(): bool
    {
        return static::enabled(static::hsnCode());
    }

    public static function hsnCode(): string
    {
        return 'hsnCode';
    }

    #endregion

    #region[Category]
    public static function hasCategory(): bool
    {
        return static::enabled(static::category());
    }

    public static function category(): string
    {
        return 'category';
    }

    #endregion

    #region[Colour]
    public static function hasColour(): bool
    {
        return static::enabled(static::colour());
    }

    public static function colour(): string
    {
        return 'colour';
    }

    #endregion

    #region[Size]
    public static function hasSize(): bool
    {
        return static::enabled(static::size());
    }

    public static function size(): string
    {
        return 'size';
    }

    #endregion

    #region[Department]
    public static function hasDepartment(): bool
    {
        return static::enabled(static::department());
    }

    public static function department(): string
    {
        return 'department';
    }

    #endregion

    #region[Ledger]
    public static function hasLedger(): bool
    {
        return static::enabled(static::ledger());
    }

    public static function ledger(): string
    {
        return 'ledger';
    }

    #endregion

    #region[Transport]
    public static function hasTransport(): bool
    {
        return static::enabled(static::transport());
    }

    public static function transport(): string
    {
        return 'transport';
    }

    #endregion

    #region[Bank]
    public static function hasBank(): bool
    {
        return static::enabled(static::bank());
    }

    public static function bank(): string
    {
        return 'bank';
    }

    #endregion

    #region[ReceiptType]
    public static function hasReceiptType(): bool
    {
        return static::enabled(static::receiptType());
    }

    public static function receiptType(): string
    {
        return 'receiptType';
    }

    #endregion

    #region[Despatch]
    public static function hasDespatch(): bool
    {
        return static::enabled(static::despatch());
    }

    public static function despatch(): string
    {
        return 'despatch';
    }

    #endregion


    #region[Test]
    //test-files , header , modal , action , test-operation , test-review , test-image , code
    public static function hasTest(): bool
    {
        return static::enabled(static::test());
    }

    public static function test(): string
    {
        return 'test';
    }

    #endregion


}


