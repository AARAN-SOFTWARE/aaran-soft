<?php

namespace Aaran\Audit\Models\Client\Sub;

use Aaran\Common\Models\Category;
use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Size;
use Aaran\Master\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\Client\Sub\SalesTrackBillItem
 *
 * @property-read Product|null $product
 * @property-read \App\Models\Master\Client\Sub\SalesTrackBill|null $salesTrackBill
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackBillItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackBillItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackBillItem query()
 * @mixin \Eloquent
 */
class SalesTrackBillItem extends Model
{

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function colour(): BelongsTo
    {
        return $this->belongsTo(Colour::class);
    }
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function salesTrackBill(): BelongsTo
    {
        return $this->belongsTo(SalesTrackBill::class);
    }
}
