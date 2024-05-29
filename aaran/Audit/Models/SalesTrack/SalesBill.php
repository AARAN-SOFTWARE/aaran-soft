<?php

namespace Aaran\Audit\Models\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Vehicle;
use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Ledger;
use Aaran\Common\Models\Size;
use Aaran\Master\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesBill extends Model
{
    protected $guarded=[];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }



    public static function nextNo($id)
    {
        return  static::where('sales_from', '=',$id)
                ->max('vno') + 1;
    }

    public static function gruopNo($id)
    {
        return  static::where('sales_track_item_id', '=',$id)
                ->max('group') + 1;
    }



    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function colour(): BelongsTo
    {
        return $this->belongsTo(Colour::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function salesTrackItem(): BelongsTo
    {
        return $this->belongsTo(SalesTrackItem::class);
    }

}
