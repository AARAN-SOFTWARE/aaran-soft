<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList(),
        Customise::attendance()
    ],

    'customise' => [
        SaleEntry::size(),
    ],

    'menus'=>[
        MainMenu::magalir(),
        MainMenu::master(),
        MainMenu::common(),
    ]
];
