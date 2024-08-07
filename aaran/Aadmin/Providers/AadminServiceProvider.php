<?php

namespace Aaran\Aadmin\Providers;

use Illuminate\Support\ServiceProvider;

class AadminServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php', 'aadmin');
        $this->mergeConfigFrom(__DIR__ . '/../software.php', 'software');
        $this->mergeConfigFrom(__DIR__ . '/../clients.php', 'clients');


        $this->mergeConfigFrom(__DIR__ . '/../Softwares/sundar.php', 'sundar');
        $this->mergeConfigFrom(__DIR__ . '/../Softwares/developer.php', 'developer');

        $this->mergeConfigFrom(__DIR__ . '/../Softwares/offset.php', 'offset');
        $this->mergeConfigFrom(__DIR__ . '/../Softwares/audit.php', 'audit');

        $this->mergeConfigFrom(__DIR__ . '/../Softwares/garments/garment_1.php', 'garment_1');
        $this->mergeConfigFrom(__DIR__ . '/../Softwares/garments/garment_2.php', 'garment_2');

        $this->mergeConfigFrom(__DIR__ . '/../Softwares/welfare.php', 'welfare');

        $this->mergeConfigFrom(__DIR__ . '/../Softwares/spotmynumber.php', 'spotmynumber');
        $this->mergeConfigFrom(__DIR__ . '/../Softwares/sportsclub.php', 'sportsclub');

        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/developer_demo.php', 'developer_demo');
        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/garment_demo.php', 'garment_demo');
        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/offset_demo.php', 'offset_demo');
        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/aaran_erp.php', 'aaran_erp');


        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sk_enterprises.php', 'sk_enterprises');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/aaran_india_fashion.php', 'aaran_india_fashion');
        $this->mergeConfigFrom(__DIR__ . '/../Client/audit/aaran_associates.php', 'aaran_associates');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sk_printers.php', 'sk_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sri_ganapathi_printing.php', 'sri_ganapathi_printing');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/aaran_info_tech.php', 'aaran_info_tech');

        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/neot.php', 'neot');
        $this->mergeConfigFrom(__DIR__ . '/../Client/finance/bmvikaas.php', 'bmvikaas');
        $this->mergeConfigFrom(__DIR__ . '/../Client/finance/aaran_capitals.php', 'aaran_capitals');

        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/prapthi_impex.php', 'prapthi_impex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/smsupvc.php', 'smsupvc');


        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/sara_screens.php', 'sara_screens');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/colours_printers.php', 'colours_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/new_amman_printers.php', 'new_amman_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/kgs_printers.php', 'kgs_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/thirumurugan_printing.php', 'thirumurugan_printing');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/kathir_printers.php', 'kathir_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/aj_printers.php', 'aj_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/sairfsourcing.php', 'sairfsourcing');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/best_print.php', 'best_print');
        $this->mergeConfigFrom(__DIR__ . '/../Client/offset/vip_graphiics.php', 'vip_graphiics');

        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/vijayGarments.php', 'vijayGarments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/amal_tex.php', 'amal_tex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/essa_knitting.php', 'essa_knitting');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/essa_knitting_garments.php', 'essa_knitting_garments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/vetrivel_garments.php', 'vetrivel_garments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/ashwin_tex.php', 'ashwin_text');

        $this->mergeConfigFrom(__DIR__ . '/../Client/suresh/mark_international.php', 'mark_international');
        $this->mergeConfigFrom(__DIR__ . '/../Client/suresh/neethuIndustries.php', 'neethuIndustries');
        $this->mergeConfigFrom(__DIR__ . '/../Client/suresh/sri_venkateswara_texmart.php', 'sri_venkateswara_texmart');

        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/a1_impex.php', 'a1_impex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/satyanarayana.php', 'satyanarayana');
        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/fashion_fabrics.php', 'fashion_fabrics');

        $this->mergeConfigFrom(__DIR__ . '/../Client/computer/vninfotech.php', 'vninfotech');

        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/sukraa_garments.php', 'sukraa_garments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/ugan_apparels.php', 'ugan_apparels');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/seyon_fashion.php', 'seyon_fashion');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/sri_senthur_tex.php', 'sri_senthur_tex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/sk_international.php', 'sk_international');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/shona_exports.php', 'shona_exports');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/mode_creations.php', 'mode_creations');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/karunaambikaa_export.php', 'karunaambikaa_export');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/boyance_india.php', 'boyance_india');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/aswath_apparels.php', 'aswath_apparels');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/ato_textiles.php', 'ato_textiles');

        $this->mergeConfigFrom(__DIR__ . '/../Softwares/shares.php', 'shares');

        $this->app->register(AadminServiceProvider::class);
    }

}
