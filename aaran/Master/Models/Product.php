<?php

namespace Aaran\Master\Models;

use Aaran\Common\Models\Hsncode;
use Aaran\Master\Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LaravelIdea\Helper\Aaran\Master\Models\_IH_Product_QB;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches): _IH_Product_QB|Product|Builder
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
    public function hsncode(): BelongsTo
    {
        return $this->belongsTo(Hsncode::class);
    }

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

}
