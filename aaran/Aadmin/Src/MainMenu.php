<?php

namespace Aaran\Aadmin\Src;

class MainMenu
{
    public static function enabled(string $feature): bool
    {
        return match (config('aadmin.app_type')) {
            config('clients.VIJAY_GARMENTS') => in_array($feature, config('vijayGarments.menus', [])),
            config('clients.NEETHU_INDUSTRIES') => in_array($feature, config('neethuIndustries.menus', [])),
            config('clients.SK_PRINTERS') => in_array($feature, config('sk_printers.menus', [])),
            config('clients.AARAN_ASSOCIATES') => in_array($feature, config('aaran_associates.menus', [])),

            config('clients.SARA_SCREENS') => in_array($feature, config('sara_screens.menus', [])),
            config('clients.COLOURS_PRINTING') => in_array($feature, config('colours_printers.menus', [])),
            config('clients.NEW_AMMAN_PRINTERS') => in_array($feature, config('new_amman_printers.menus', [])),
            config('clients.KGS_PRINTERS') => in_array($feature, config('kgs_printers.menus', [])),
            config('clients.THIRUMURUGAN_PRINTERS') => in_array($feature, config('thirumurugan_printing.menus', [])),
            config('clients.BEST_PRINT') => in_array($feature, config('best_print.menus', [])),
            config('clients.SAIRF_SOURCING') => in_array($feature, config('sairfsourcing.menus', [])),

            config('clients.SK_ENTERPRISES') => in_array($feature, config('sk_enterprises.menus', [])),
            config('clients.NEOT') => in_array($feature, config('neot.menus', [])),

            config('clients.AARAN_ERP') => in_array($feature, config('aaran_erp.menus', [])),
            config('clients.OFFSET_DEMO') => in_array($feature, config('offset_demo.menus', [])),
            config('clients.GARMENT_DEMO') => in_array($feature, config('garment_demo.menus', [])),
            config('clients.DEVELOPER_DEMO') => in_array($feature, config('developer_demo.menus', [])),

            config('clients.ESSA_KNITTING') => in_array($feature, config('essa_knitting.menus', [])),
            config('clients.ESSA_KNITTING_GARMENT') => in_array($feature, config('essa_knitting_garments.menus', [])),
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
     * Audit
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


}


