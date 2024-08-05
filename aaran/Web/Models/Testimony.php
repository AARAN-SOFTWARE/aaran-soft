<?php

namespace Aaran\Web\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
}
