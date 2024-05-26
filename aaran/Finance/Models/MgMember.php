<?php

namespace Aaran\Finance\Models;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MgMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function mgClub(): BelongsTo
    {
        return $this->belongsTo(MgClub::class);
    }

    public function City(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function pincode(): BelongsTo
    {
        return $this->belongsTo(Pincode::class);
    }
}
