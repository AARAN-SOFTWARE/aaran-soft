<?php

namespace Aaran\Audit\Models\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Hsncode;
use Aaran\Common\Models\Size;
use Aaran\Master\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesBillItem extends Model
{
    protected $guarded=[];
    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function hsncode(): BelongsTo
    {
        return $this->belongsTo(Hsncode::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
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
        return $this->belongsTo(SalesBill::class);
    }

}
