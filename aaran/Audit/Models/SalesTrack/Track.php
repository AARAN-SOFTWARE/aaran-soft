<?php

namespace Aaran\Audit\Models\SalesTrack;

use Aaran\Audit\Database\Factories\TrackFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Track extends Model
{
    use HasFactory;

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

    protected static function newFactory(): TrackFactory
    {
        return new TrackFactory();
    }

}
