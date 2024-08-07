<?php

namespace Aaran\Aadmin\Src;

class Customise
{
    public static function enabled(string $feature): bool
    {

        return match (config('aadmin.app_code')) {

            config('software.SPOT_MY_NUMBER') => in_array($feature, config('spotmynumber.features', [])),
            config('software.SPORTS_CLUB') => in_array($feature, config('sportsclub.features', [])),

            config('clients.VIJAY_GARMENTS') => in_array($feature, config('vijayGarments.features', [])),
            config('clients.AMAL_TEX') => in_array($feature, config('amal_tex.features', [])),
            config('clients.KATHIR_PRINTERS') => in_array($feature, config('kathir_printers.features', [])),
            config('clients.AJ_PRINTING') => in_array($feature, config('aj_printers.features', [])),
            config('clients.VETRIVEL_GARMENTS') => in_array($feature, config('vetrivel_garments.features', [])),
            config('clients.ASHWIN_TEX') => in_array($feature, config('ashwin_tex.features', [])),
            config('clients.MARK_INTERNATIONAL') => in_array($feature, config('mark_international.features', [])),
            config('clients.NEETHU_INDUSTRIES') => in_array($feature, config('neethuIndustries.features', [])),
            config('clients.SRI_VENKATESWARA_TEXMART') => in_array($feature, config('sri_venkateswara_texmart.features', [])),
            config('clients.A1_IMPEX') => in_array($feature, config('a1_impex.features', [])),
            config('clients.SATHYANARAYANA_GARMENTS') => in_array($feature, config('satyanarayana.features', [])),
            config('clients.FASHION_FABRICS') => in_array($feature, config('fashion_fabrics.features', [])),
            config('clients.SK_PRINTERS') => in_array($feature, config('sk_printers.features', [])),
            config('clients.AARAN_ASSOCIATES') => in_array($feature, config('aaran_associates.features', [])),
            config('clients.VNINFOTECH') => in_array($feature, config('vninfotech.features', [])),

            config('clients.SARA_SCREENS') => in_array($feature, config('sara_screens.features', [])),
            config('clients.COLOURS_PRINTING') => in_array($feature, config('colours_printers.features', [])),
            config('clients.NEW_AMMAN_PRINTERS') => in_array($feature, config('new_amman_printers.features', [])),
            config('clients.KGS_PRINTERS') => in_array($feature, config('kgs_printers.features', [])),
            config('clients.THIRUMURUGAN_PRINTERS') => in_array($feature, config('thirumurugan_printing.features', [])),
            config('clients.SAIRF_SOURCING') => in_array($feature, config('sairfsourcing.features', [])),
            config('clients.BEST_PRINT') => in_array($feature, config('best_print.features', [])),
            config('clients.VIP_GRAPHIICS') => in_array($feature, config('vip_graphiics.features', [])),

            config('clients.SK_ENTERPRISES') => in_array($feature, config('sk_enterprises.features', [])),
            config('clients.NEOT') => in_array($feature, config('neot.features', [])),


            config('clients.AARAN_ERP') => in_array($feature, config('aaran_erp.features', [])),
            config('clients.OFFSET_DEMO') => in_array($feature, config('offset_demo.features', [])),
            config('clients.GARMENT_DEMO') => in_array($feature, config('garment_demo.features', [])),
            config('clients.DEVELOPER_DEMO') => in_array($feature, config('developer_demo.features', [])),

            config('clients.ESSA_KNITTING') => in_array($feature, config('essa_knitting.features', [])),
            config('clients.ESSA_KNITTING_GARMENT') => in_array($feature, config('essa_knitting_garments.features', [])),

            config('clients.SUKRAA_GARMENTS') => in_array($feature, config('sukraa_garments.features', [])),
            config('clients.UGAN_APPARELS') => in_array($feature, config('ugan_apparels.features', [])),
            config('clients.SEYON_FASHION') => in_array($feature, config('seyon_fashion.features', [])),
            config('clients.SRI_SENTHUR_TEX') => in_array($feature, config('sri_senthur_tex.features', [])),
            config('clients.SK_INTERNATIONAL') => in_array($feature, config('sk_international.features', [])),
            config('clients.SHONA_EXPORTS') => in_array($feature, config('shona_exports.features', [])),
            config('clients.MODE_CREATIONS') => in_array($feature, config('mode_creations.features', [])),
            config('clients.KARUNAAMBIKAA_EXPORT') => in_array($feature, config('karunaambikaa_export.features', [])),
            config('clients.BOYANCE_INDIA') => in_array($feature, config('boyance_india.features', [])),
            config('clients.ASWATH_APPARELS') => in_array($feature, config('aswath_apparels.features', [])),
            config('clients.ATO_TEXTILES') => in_array($feature, config('ato_textiles.features', [])),

            config('software.GARMENT_1') => in_array($feature, config('garment_1.features', [])),
            config('software.GARMENT_2') => in_array($feature, config('garment_2.features', [])),
            config('software.WELFARE') => in_array($feature, config('welfare.features', [])),

            config('software.SHARES') => in_array($feature, config('shares.features', [])),

        };
    }

    /**
     * has todos
     * @return bool
     */
    public static function hasTodoList(): bool
    {
        return static::enabled(static::todoList());
    }

    public static function todoList(): string
    {
        return 'todos';
    }

    /**
     * has attendance
     * @return bool
     */
    public static function hasAttendance(): bool
    {
        return static::enabled(static::attendance());
    }

    public static function attendance(): string
    {
        return 'attendance';
    }

    /**
     * has continueSalesNo
     * @return bool
     */
    public static function hasContinueSalesNo(): bool
    {
        return static::enabled(static::continueSalesNo());
    }

    public static function continueSalesNo(): string
    {
        return 'continueSalesNo';
    }

}
