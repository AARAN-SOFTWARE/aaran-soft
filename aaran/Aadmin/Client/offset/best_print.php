<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList(),
//        Customise::attendance()
    ],

    'customise' => [
        SaleEntry::order(),
        SaleEntry::Po_no(),
        SaleEntry::Dc_no(),
        SaleEntry::productDescription(),
    ],

    'menus'=>[
        MainMenu::entries(),
        MainMenu::accounts(),
        MainMenu::master(),
        MainMenu::common(),
        MainMenu::report(),
    ]
];
