<?php

namespace Aaran\Sundar\Models\Share;

use Aaran\Sundar\Database\factories\StockTradeFactory;
use Illuminate\Database\Eloquent\Model;

class TradeCommission extends Model
{

    protected $guarded=[];

    protected static function newFactory(): StockTradeFactory
    {
        return new StockTradeFactory();
    }
    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
}
