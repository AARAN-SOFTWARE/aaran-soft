<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList()
    ],

    'customise' => [
        SaleEntry::size(),
    ],

    'menus'=>[
        MainMenu::sundar(),
        MainMenu::accounts(),
        MainMenu::master(),
        MainMenu::common(),
        MainMenu::magalir(),
        MainMenu::task(),
    ]
];
