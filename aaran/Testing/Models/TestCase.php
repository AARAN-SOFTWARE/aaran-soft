<?php

namespace Aaran\Testing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestCase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('action', 'like', '%' . $searches . '%');
    }

    public static function nextNo()
    {
        return static::max('sl_no') + 1;
    }

    public function modals(): BelongsTo
    {
        return $this->belongsTo(Modals::class);
    }

    public static function modal($str)
    {
        return Modals::find($str)->vname;
    }
}
