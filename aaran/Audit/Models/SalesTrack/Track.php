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
    public $timestamps = false;

    protected static function newFactory(): TrackFactory
    {
        return new TrackFactory();
    }

    public function smonth(): BelongsTo
    {
        return $this->belongsTo(Smonth::class);
    }

    public function salesTrack(): BelongsTo
    {
        return $this->belongsTo(SalesTrack::class);
    }

}
