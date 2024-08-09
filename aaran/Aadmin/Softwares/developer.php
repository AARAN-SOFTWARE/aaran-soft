<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\DbMigration;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList(),
        Customise::attendance()
    ],

    'customise' => [
        SaleEntry::order(),
        SaleEntry::billingAddress(),
        SaleEntry::shippingAddress(),
        SaleEntry::style(),
        SaleEntry::despatch(),
        SaleEntry::transport(),
        SaleEntry::destination(),
        SaleEntry::bundle(),

        SaleEntry::productDescription(),
        SaleEntry::colour(),
        SaleEntry::size(),
    ],

    'menus'=>[
        MainMenu::task(),
        MainMenu::developer(),
        MainMenu::entries(),
        MainMenu::audit(),
        MainMenu::books(),
        MainMenu::sundar(),
        MainMenu::accounts(),

        MainMenu::master(),
        MainMenu::common(),
        MainMenu::report(),

        MainMenu::common(),
        MainMenu::master(),
        MainMenu::report(),
        MainMenu::welfare(),
        MainMenu::webs(),
        MainMenu::sports(),
        MainMenu::spotMyNumber(),

    ],

    'migrations'=>[
        DbMigration::Core(),
        DbMigration::todoList(),
        DbMigration::common(),
        DbMigration::master(),
        DbMigration::entry(),
        DbMigration::order(),

        DbMigration::style(),
        DbMigration::developer(),
        DbMigration::taskManager(),
        DbMigration::blog(),
        DbMigration::audit(),
        DbMigration::todoList(),
        DbMigration::magalir(),
        DbMigration::demo(),
        DbMigration::shareMarket(),
        DbMigration::mailids(),
        DbMigration::cashBook(),
        DbMigration::developer(),
//        DbMigration::welfare(),
        DbMigration::developerTesting(),
//        DbMigration::welfare(),
        DbMigration::webs(),
        DbMigration::sports(),
        DbMigration::spotMyNumber(),
    ]


];
