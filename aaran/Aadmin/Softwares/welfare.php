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
        DbMigration::developer()
    ],

    'migrations' => [
        DbMigration::core(),
        DbMigration::common(),
        DbMigration::master(),
        DbMigration::welfare(),
//        DbMigration::todoList(),
        DbMigration::developer(),
        DbMigration::developerTesting(),
        DbMigration::blog(),
        DbMigration::webs(),
    ]

];
