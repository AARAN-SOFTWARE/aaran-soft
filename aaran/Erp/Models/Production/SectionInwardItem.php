<?php

namespace Aaran\Erp\Models\Production;

use Database\Factories\Erp\Production\SectionInwardItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionInwardItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): SectionInwardItemFactory
    {
        return new SectionInwardItemFactory();
    }
}
