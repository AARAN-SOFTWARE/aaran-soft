<?php

namespace Aaran\SportsClub\Models;

use Illuminate\Database\Eloquent\Model;

class SportHighlight extends Model
{
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
}
