<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\DbMigration;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
//        Customise::todoList(),
    ],

    'customise' => [

    ],

    'menus' => [
        DbMigration::sportsClub(),
        DbMigration::webs(),
    ],

    'migrations' => [
        DbMigration::core(),
        DbMigration::common(),
        DbMigration::master(),
        DbMigration::sportsClub(),
        DbMigration::webs(),
    ]

];
