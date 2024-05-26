<?php

namespace Aaran\Developer\Models;

use Aaran\Developer\Database\Factories\SurfingCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurfingCategory extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps=false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): SurfingCategoryFactory
    {
        return new SurfingCategoryFactory();
    }
}
