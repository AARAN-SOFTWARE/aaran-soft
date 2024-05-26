<?php

namespace Aaran\Aadmin\Providers;

use Illuminate\Support\ServiceProvider;

class AadminServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php', 'aadmin');
        $this->mergeConfigFrom(__DIR__ . '/../clients.php', 'clients');

        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/garment_demo.php', 'garment_demo');
        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/offset_demo.php', 'offset_demo');
        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/aaran_erp.php', 'aaran_erp');

        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/neot.php', 'neot');
        $this->mergeConfigFrom(__DIR__ . '/../Client/audit/aaran_associates.php', 'aaran_associates');

        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sk_enterprises.php', 'sk_enterprises');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/aaran_india_fashion.php', 'aaran_india_fashion');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sk_printers.php', 'sk_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sri_ganapathi_printing.php', 'sri_ganapathi_printing');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/aaran_info_tech.php', 'aaran_info_tech');


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

        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/vijayGarments.php', 'vijayGarments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/amal_tex.php', 'amal_tex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/essa_knitting.php', 'essa_knitting');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/essa_knitting_garments.php', 'essa_knitting_garments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/vetrivel_garments.php', 'vetrivel-garments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/ashwin_tex.php', 'ashwin_text');

        $this->mergeConfigFrom(__DIR__ . '/../Client/suresh/neethuIndustries.php', 'neethuIndustries');
        $this->mergeConfigFrom(__DIR__ . '/../Client/suresh/mark_international.php', 'mark_international');
        $this->mergeConfigFrom(__DIR__ . '/../Client/suresh/sri_venkateswara_texmart.php', 'sri_venkateswara_texmart');

        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/a1_impex.php', 'a1_impex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/satyanarayana.php', 'satyanarayana');
        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/fashion_fabrics.php', 'fashion_fabrics');

        $this->mergeConfigFrom(__DIR__ . '/../Client/demo/developer_demo.php', 'developer_demo');
        $this->mergeConfigFrom(__DIR__ . '/../Client/computer/vninfotech.php', 'vninfotech');

        $this->app->register(AadminServiceProvider::class);
    }

}
