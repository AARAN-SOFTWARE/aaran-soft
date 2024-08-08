<?php

namespace Aaran\Aadmin\Src;

class MainMenu
{
    public static function enabled(string $feature): bool
    {
        return match (config('aadmin.app_type')) {

            config('software.GARMENT_1') => in_array($feature, config('garment_1.menus', [])),
            config('software.GARMENT_2') => in_array($feature, config('garment_2.menus', [])),

            config('software.OFFSET') => in_array($feature, config('offset.menus', [])),
            config('software.SUNDAR') => in_array($feature, config('sundar.menus', [])),
            config('software.AUDIT') => in_array($feature, config('audit.menus', [])),
            config('software.DEVELOPER') => in_array($feature, config('developer.menus', [])),
            config('software.WELFARE') => in_array($feature, config('welfare.menus', [])),

            config('software.SPOT_MY_NUMBER') => in_array($feature, config('spotmynumber.menus', [])),
            config('software.SPORTS_CLUB') => in_array($feature, config('sportsclub.menus', [])),

            config('software.SHARES') => in_array($feature, config('shares.menus', [])),
        };
    }

    public static function hasEntries(): bool
    {
        return static::enabled(static::entries());
    }

    public static function entries(): string
    {
        return 'entries';
    }

    /**
     * common
     * @return bool
     */
    public static function hasCommon(): bool
    {
        return static::enabled(static::common());
    }

    public static function common(): string
    {
        return 'common';
    }

    /**
     * master
     * @return bool
     */
    public static function hasMaster(): bool
    {
        return static::enabled(static::master());
    }

    public static function master(): string
    {
        return 'master';
    }

    /**
     * Task
     * @return bool
     */
    public static function hasTask(): bool
    {
        return static::enabled(static::task());
    }

    public static function task(): string
    {
        return 'task';
    }

    /**
     * audit
     * @return bool
     */
    public static function hasAudit(): bool
    {
        return static::enabled(static::audit());
    }

    public static function audit(): string
    {
        return 'audit';
    }


    /**
     * accounts
     * @return bool
     */
    public static function hasAccounts(): bool
    {
        return static::enabled(static::accounts());
    }

    public static function accounts(): string
    {
        return 'accounts';
    }


    /**
     * erp
     * @return bool
     */
    public static function hasErp(): bool
    {
        return static::enabled(static::erp());
    }

    public static function erp(): string
    {
        return 'erp';
    }

    /**
     * report
     * @return bool
     */
    public static function hasReport(): bool
    {
        return static::enabled(static::report());
    }

    public static function report(): string
    {
        return 'report';
    }


    /**
     * Developer
     * @return bool
     */
    public static function hasDeveloper(): bool
    {
        return static::enabled(static::developer());
    }

    public static function developer(): string
    {
        return 'developer';
    }

    /**
     * sundar
     * @return bool
     */
    public static function hasSundar(): bool
    {
        return static::enabled(static::sundar());
    }

    public static function sundar(): string
    {
        return 'sundar';
    }

    /**
     * magalir
     * @return bool
     */
    public static function hasMagalir(): bool
    {
        return static::enabled(static::magalir());
    }

    public static function magalir(): string
    {
        return 'magalir';
    }

    /**
     * Books
     * @return bool
     */
    public static function hasBooks(): bool
    {
        return static::enabled(static::books());
    }

    public static function books(): string
    {
        return 'books';
    }


    /**
     * Welfare
     * @return bool
     */
    public static function hasWelfare(): bool
    {
        return static::enabled(static::welfare());
    }

    public static function welfare(): string
    {
        return 'welfare';
    }


    /**
     * Sundar
     * @return bool
     */
    public static function hasAdmin(): bool
    {
        return static::enabled(static::admin());
    }

    public static function admin(): string
    {
        return 'sundar';
    }

    /**
     * Webs
     * @return bool
     */
    public static function hasWebs(): bool
    {
        return static::enabled(static::webs());
    }

    public static function webs(): string
    {
        return 'webs';
    }
    /**
     * spotMyNumber
     * @return bool
     */
    public static function hasSpotMyNumber(): bool
    {
        return static::enabled(static::spotMyNumber());
    }
    public static function spotMyNumber(): string
    {
        return 'spotMyNumber';
    }


    /**
     * Webs
     * @return bool
     */
    public static function hasSports(): bool
    {
        return static::enabled(static::sports());
    }

    public static function sports(): string
    {
        return 'sports';
    }


    #region[Shares]
    public static function hasSharesMarket(): bool
    {
        return static::enabled(static::sharesMarket());
    }

    public static function sharesMarket(): string
    {
        return 'sharesMarket';
    }
    #endregion

}


