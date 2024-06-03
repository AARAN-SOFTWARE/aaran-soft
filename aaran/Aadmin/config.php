<?php

return [

    'soft_version' => '1.0.0',

    'db_version' => '1.0.0',

    'git_version' => '#370',

    'current_acyear'=> \App\Enums\AcYear::AY_2024_25,

    'app_type' => env('APP_TYPE', '1'),

    'gstPercentDefault' => env('GST_PERCENT', '5'),

    'unitsDefault' => env('UNITS', '2'),
];
