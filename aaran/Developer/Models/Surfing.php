<?php

namespace Aaran\Developer\Models;

use Aaran\Developer\Database\Factories\SurfingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Surfing extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps=false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): SurfingFactory
    {
        return new SurfingFactory();
    }

    public function hsncode(): BelongsTo
    {
        return $this->belongsTo(SurfingCategory::class);
    }
    public static function surfingCategory($str)
    {
        return SurfingCategory::find($str)->vname;
    }

}
