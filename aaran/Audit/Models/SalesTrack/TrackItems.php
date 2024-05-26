<?php

namespace Aaran\Audit\Models\SalesTrack;

use Aaran\Audit\Database\Factories\TrackItemsFactory;
use Aaran\Audit\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function salesTrack(): BelongsTo
    {
        return $this->belongsTo(SalesTrack::class);
    }

    protected static function newFactory(): TrackItemsFactory
    {
        return new TrackItemsFactory();
    }
}
