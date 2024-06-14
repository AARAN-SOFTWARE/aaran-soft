<?php

namespace Aaran\Sundar\Models\Credit;

use Illuminate\Database\Eloquent\Model;

class CreditMember extends Model
{

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }
}
