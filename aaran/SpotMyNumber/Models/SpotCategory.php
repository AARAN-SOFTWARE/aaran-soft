<?php

namespace Aaran\SpotMyNumber\Models;

use Illuminate\Database\Eloquent\Model;

class SpotCategory extends Model
{
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('spot_customer_id', 'like', '%' . $searches . '%');
    }

    public static function spotList($id)
    {
        return SpotListing::find($id)->vname;
    }
}
