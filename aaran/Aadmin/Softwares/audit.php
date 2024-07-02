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
    ],

    'menus' => [
        MainMenu::books(),
        MainMenu::audit(),
        MainMenu::task(),
        MainMenu::accounts(),
        MainMenu::entries(),
        MainMenu::master(),
        MainMenu::common(),
    ],

    'migrations' => [
        DbMigration::core(),
        DbMigration::common(),
        DbMigration::master(),
        DbMigration::order(),
        DbMigration::style(),
        DbMigration::entry(),
        DbMigration::creditnote(),
        DbMigration::debitnote(),
        DbMigration::erp(),
        DbMigration::attendance(),
        DbMigration::todoList(),
        DbMigration::blog(),
        DbMigration::mailids(),
        DbMigration::cashBook(),
        DbMigration::bankBook(),
        DbMigration::taskManager(),
        DbMigration::audit(),
    ]

];
