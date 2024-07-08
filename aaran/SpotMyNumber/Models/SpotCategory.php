<?php

namespace Aaran\SpotMyNumber\Models;

use Illuminate\Database\Eloquent\Model;

class SpotCategory extends Model
{
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
}
