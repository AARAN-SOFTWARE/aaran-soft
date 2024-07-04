<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\DbMigration;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList(),
    ],

    'customise' => [

    ],

    'menus' => [
        MainMenu::welfare(),
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
        DbMigration::shareTrades(),
        DbMigration::creditBooks(),
        DbMigration::magalir(),
        DbMigration::mailids(),
        DbMigration::cashBook(),
        DbMigration::audit(),
        DbMigration::developer(),
    ]

];
