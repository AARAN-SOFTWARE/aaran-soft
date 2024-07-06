<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\DbMigration;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList(),
//        Customise::attendance()
    ],

    'customise' => [
        SaleEntry::order(),
        SaleEntry::billingAddress(),
        SaleEntry::shippingAddress(),
        SaleEntry::transport(),
        SaleEntry::productDescription(),
        SaleEntry::po_no(),
        SaleEntry::dc_no(),
    ],

    'menus' => [
        MainMenu::entries(),
        MainMenu::common(),
        MainMenu::master(),
        MainMenu::report(),
        MainMenu::webs(),
    ],

    'migrations' => [
        DbMigration::core(),
        DbMigration::common(),
        DbMigration::master(),
        DbMigration::order(),
        DbMigration::style(),
        DbMigration::entry(),
        DbMigration::todoList(),
        DbMigration::blog(),
        DbMigration::demo(),
        DbMigration::webs(),
    ]
];
