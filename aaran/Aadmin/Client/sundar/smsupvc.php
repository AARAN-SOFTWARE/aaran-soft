<?php

use Aaran\Aadmin\Src\Customise;
use Aaran\Aadmin\Src\MainMenu;
use Aaran\Aadmin\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList()
    ],

    'customise' => [
        SaleEntry::order(),

        SaleEntry::shippingAddress(),

    ],

    'menus'=>[
        MainMenu::entries(),
        MainMenu::accounts(),
        MainMenu::master(),
        MainMenu::common(),
        MainMenu::report(),
    ]
];
