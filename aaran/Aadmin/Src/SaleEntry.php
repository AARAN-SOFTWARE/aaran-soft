<?php

namespace Aaran\Aadmin\Src;

class SaleEntry
{
    public static function enabled(string $feature): bool
    {
        return match (config('aadmin.app_type')) {
            config('clients.VIJAY_GARMENTS') => in_array($feature, config('vijayGarments.customise', [])),
            config('clients.AMAL_TEX') => in_array($feature, config('amal_tex.customise', [])),
            config('clients.KATHIR_PRINTERS') => in_array($feature, config('kathir_printers.customise', [])),
            config('clients.AJ_PRINTING') => in_array($feature, config('aj_printers.customise', [])),
            config('clients.VETRIVEL_GARMENTS') => in_array($feature, config('vetrivel_garments.customise', [])),
            config('clients.ASHWIN_TEX') => in_array($feature, config('ashwin_tex.customise', [])),
            config('clients.MARK_INTERNATIONAL') => in_array($feature, config('mark_international.customise', [])),
            config('clients.NEETHU_INDUSTRIES') => in_array($feature, config('neethuIndustries.customise', [])),
            config('clients.SRI_VENKATESWARA_TEXMART') => in_array($feature, config('sri_venkateswara_texmart.customise', [])),
            config('clients.A1_IMPEX') => in_array($feature, config('a1_impex.customise', [])),
            config('clients.SATHYANARAYANA_GARMENTS') => in_array($feature, config('satyanarayana.customise', [])),
            config('clients.FASHION_FABRICS') => in_array($feature, config('fashion_fabrics.customise', [])),
            config('clients.SK_PRINTERS') => in_array($feature, config('sk_printers.customise', [])),
            config('clients.AARAN_ASSOCIATES') => in_array($feature, config('aaran_associates.customise', [])),
            config('clients.VNINFOTECH') => in_array($feature, config('vninfotech.customise', [])),

            config('clients.SARA_SCREENS') => in_array($feature, config('sara_screens.customise', [])),
            config('clients.COLOURS_PRINTING') => in_array($feature, config('colours_printers.customise', [])),
            config('clients.NEW_AMMAN_PRINTERS') => in_array($feature, config('new_amman_printers.customise', [])),
            config('clients.KGS_PRINTERS') => in_array($feature, config('kgs_printers.customise', [])),
            config('clients.THIRUMURUGAN_PRINTERS') => in_array($feature, config('thirumurugan_printing.customise', [])),
            config('clients.BEST_PRINT') => in_array($feature, config('best_print.customise', [])),
            config('clients.VIP_GRAPHIICS') => in_array($feature, config('vip_graphiics.customise', [])),
            config('clients.SAIRF_SOURCING') => in_array($feature, config('sairfsourcing.customise', [])),

            config('clients.SK_ENTERPRISES') => in_array($feature, config('sk_enterprises.customise', [])),
            config('clients.NEOT') => in_array($feature, config('neot.customise', [])),

            config('clients.AARAN_ERP') => in_array($feature, config('aaran_erp.customise', [])),
            config('clients.OFFSET_DEMO') => in_array($feature, config('offset_demo.customise', [])),
            config('clients.GARMENT_DEMO') => in_array($feature, config('garment_demo.customise', [])),
            config('clients.DEVELOPER_DEMO') => in_array($feature, config('developer_demo.customise', [])),

            config('clients.ESSA_KNITTING') => in_array($feature, config('essa_knitting.customise', [])),
            config('clients.ESSA_KNITTING_GARMENT') => in_array($feature, config('essa_knitting_garments.customise', [])),

            config('clients.SUKRAA_GARMENTS') => in_array($feature, config('sukraa_garments.customise', [])),
            config('clients.UGAN_APPARELS') => in_array($feature, config('ugan_apparels.customise', [])),
            config('clients.SEYON_FASHION') => in_array($feature, config('seyon_fashion.customise', [])),
            config('clients.SRI_SENTHUR_TEX') => in_array($feature, config('sri_senthur_tex.customise', [])),
            config('clients.SK_INTERNATIONAL') => in_array($feature, config('sk_international.customise', [])),
            config('clients.SHONA_EXPORTS') => in_array($feature, config('shona_exports.customise', [])),
            config('clients.MODE_CREATIONS') => in_array($feature, config('mode_creations.customise', [])),
            config('clients.KARUNAAMBIKAA_EXPORT') => in_array($feature, config('karunaambikaa_export.customise', [])),
            config('clients.BOYANCE_INDIA') => in_array($feature, config('boyance_india.customise', [])),
            config('clients.ASWATH_APPARELS') => in_array($feature, config('aswath_apparels.customise', [])),
            config('clients.ATO_TEXTILES') => in_array($feature, config('ato_textiles.customise', [])),
        };
    }

    public static function hasOrder(): bool
    {
        return static::enabled(static::order());
    }

    public static function order(): string
    {
        return 'order';
    }

    /**
     * billingAddress
     * @return bool
     */
    public static function hasBillingAddress(): bool
    {
        return static::enabled(static::billingAddress());
    }

    public static function billingAddress(): string
    {
        return 'billingAddress';
    }

    /**
     * deliveryAddress
     * @return bool
     */
    public static function hasShippingAddress(): bool
    {
        return static::enabled(static::shippingAddress());
    }

    public static function shippingAddress(): string
    {
        return 'shippingAddress';
    }

    /**
     * Style
     * @return bool
     */
    public static function hasStyle(): bool
    {
        return static::enabled(static::style());
    }

    public static function style(): string
    {
        return 'style';
    }

    /**
     * jon_no
     * @return bool
     */
    public static function hasJob_no(): bool
    {
        return static::enabled(static::job_no());
    }

    public static function job_no(): string
    {
        return 'job_no';
    }

    /**
     * despatch
     * @return bool
     */
    public static function hasDespatch(): bool
    {
        return static::enabled(static::despatch());
    }

    public static function despatch(): string
    {
        return 'despatch';
    }


    /**
     * colour
     * @return bool
     */
    public static function hasColour(): bool
    {
        return static::enabled(static::colour());
    }

    public static function colour(): string
    {
        return 'colour';
    }


    /**
     * size
     * @return bool
     */
    public static function hasSize(): bool
    {
        return static::enabled(static::size());
    }

    public static function size(): string
    {
        return 'size';
    }

    /**
     * Description
     * @return bool
     */
    public static function hasProductDescription(): bool
    {
        return static::enabled(static::productDescription());
    }

    public static function productDescription(): string
    {
        return 'productDescription';
    }

    /**
     * Transport
     * @return bool
     */
    public static function hasTransport(): bool
    {
        return static::enabled(static::transport());
    }

    public static function transport(): string
    {
        return 'transport';
    }

    /**
     * Destination
     * @return bool
     */
    public static function hasDestination(): bool
    {
        return static::enabled(static::destination());
    }

    public static function destination(): string
    {
        return 'destination';
    }

    /**
     * Bundle
     * @return bool
     */
    public static function hasBundle(): bool
    {
        return static::enabled(static::bundle());
    }

    public static function bundle(): string
    {
        return 'bundle';
    }

    /**
     * Po
     * @return bool
     */
    public static function hasPo_no(): bool
    {
        return static::enabled(static::po_no());
    }

    public static function po_no(): string
    {
        return 'po_no';
    }

    /**
     * Dc
     * @return bool
     */
    public static function hasDc_no(): bool
    {
        return static::enabled(static::dc_no());
    }

    public static function dc_no(): string
    {
        return 'dc_no';
    }


    public static function hasNo_of_roll(): bool
    {
        return static::enabled(static::no_of_roll());
    }

    public static function no_of_roll(): string
    {
        return 'no_of_roll';
    }

}


