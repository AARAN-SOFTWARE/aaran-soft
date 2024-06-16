<?php

namespace Aaran\Sundar\Models;

use Aaran\Sundar\Database\factories\StockTradeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTrade extends Model
{
    use HasFactory;
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
