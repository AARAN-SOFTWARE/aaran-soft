<?php

namespace Aaran\Erp\Models\Production;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IroningItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }
    public function ironing(): BelongsTo
    {
        return $this->belongsTo(Ironing::class);
    }

}
