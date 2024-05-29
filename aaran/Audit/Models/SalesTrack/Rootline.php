<?php

namespace Aaran\Audit\Models\SalesTrack;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rootline extends Model
{

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function smonth(): BelongsTo
    {
        return $this->belongsTo(Smonth::class);
    }

}
