<?php

namespace Aaran\Erp\Models\Production;

use Aaran\Erp\Models\Production\Jobcard;
use Database\Factories\Erp\Production\CuttingItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CuttingItem extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): CuttingItemFactory
    {
        return new CuttingItemFactory();
    }

    public function jobcardItem(): BelongsTo
    {
        return $this->belongsTo(Jobcard::class);
    }
}
