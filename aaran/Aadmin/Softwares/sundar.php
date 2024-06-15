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
        MainMenu::accounts(),
        MainMenu::master(),
        MainMenu::common(),
        MainMenu::task(),
        MainMenu::audit(),
        MainMenu::books(),
        MainMenu::developer(),
    ],

    'migrations' => [

        DbMigration::Core(),

        DbMigration::location(),

        DbMigration::creditBooks(),
        DbMigration::shareTrades(),
        DbMigration::developer(),
        DbMigration::magalir(),
        DbMigration::blog(),
        DbMigration::bankBook(),
        DbMigration::cashBook(),
        DbMigration::audit(),
        DbMigration::attendance(),
        DbMigration::mailids(),
    ]

];
