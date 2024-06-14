<?php

namespace Aaran\Sundar\Models\Credit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditBook extends Model
{
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }
}
