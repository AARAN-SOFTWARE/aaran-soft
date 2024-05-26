<?php

namespace Aaran\Entries\Models;

use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Size;
use Aaran\Entries\Database\Factories\SaleitemFactory;
use Aaran\Master\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saleitem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
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

    protected static function newFactory(): SaleitemFactory
    {
        return new SaleitemFactory();
    }
}
