<?php

return [

    'soft_version' => '1.0.2',

    'db_version' => '1.0.2',

    'git_version' => '#539',

    'current_acyear' => \App\Enums\AcYear::AY_2024_25,

    'app_type' => env('APP_TYPE', '1'),

    'app_code' => env('APP_CODE', '1'),

    'gstPercentDefault' => env('GST_PERCENT', '5'),

    'unitsDefault' => env('UNITS', '2'),

    'brand' => env('BRAND', 'AARAN'),

    'main_menu' => [
        ['menu' => 'Home', 'link' => 'home'],
        ['menu' => 'Gallery', 'link' => 'gallery'],
        ['menu' => 'News', 'link' => 'news'],
        ['menu' => 'Blog', 'link' => 'feed'],
        ['menu' => 'About', 'link' => 'sportAbout'],
        ['menu' => 'Contact', 'link' => 'sportContact'],
    ]
];
