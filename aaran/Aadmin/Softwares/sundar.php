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
//        SaleEntry::order(),
//        SaleEntry::billingAddress(),
//        SaleEntry::shippingAddress(),
//        SaleEntry::style(),
//        SaleEntry::despatch(),
//        SaleEntry::transport(),
//        SaleEntry::destination(),
//        SaleEntry::bundle(),
//
//        SaleEntry::productDescription(),
//        SaleEntry::colour(),
        SaleEntry::size(),
    ],

    'menus' => [
        MainMenu::entries(),
        MainMenu::sundar(),
        MainMenu::accounts(),
        MainMenu::master(),
        MainMenu::common(),
        MainMenu::task(),
        MainMenu::audit(),
        MainMenu::books(),
        MainMenu::developer(),
    ],

    'migrations' => [
        DbMigration::core(),
        DbMigration::common(),
        DbMigration::master(),
        DbMigration::order(),
        DbMigration::style(),
        DbMigration::todoList(),
        DbMigration::blog(),
        DbMigration::demo(),
        DbMigration::shareMarket(),
        DbMigration::creditBooks(),
        DbMigration::magalir(),
        DbMigration::mailids(),
        DbMigration::cashBook(),
        DbMigration::audit(),
        DbMigration::developerTesting(),
    ]

];
