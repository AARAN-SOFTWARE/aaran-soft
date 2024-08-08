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
        MainMenu::accounts(),
        MainMenu::admin(),
        MainMenu::audit(),
        MainMenu::books(),
        MainMenu::common(),
        MainMenu::developer(),
        MainMenu::entries(),
        MainMenu::erp(),
        MainMenu::magalir(),
        MainMenu::master(),
        MainMenu::report(),
        MainMenu::sundar(),
        MainMenu::task(),
    ],


];
