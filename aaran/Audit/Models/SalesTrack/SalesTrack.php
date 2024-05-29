<?php

namespace Aaran\Audit\Models\SalesTrack;

use Aaran\Audit\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesTrack extends Model
{
    protected $guarded=[];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function rootline():BelongsTo
    {
        return $this->belongsTo(Rootline::class);
    }
}
