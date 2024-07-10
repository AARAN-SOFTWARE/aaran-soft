<?php

namespace Aaran\SpotMyNumber\Models;

use Aaran\SpotMyNumber\Database\Factories\SpotListingFactory;
use Illuminate\Database\Eloquent\Model;

class SpotListing extends Model
{
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): SpotListingFactory
    {
        return new SpotListingFactory();
    }
}
