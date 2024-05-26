<?php

namespace Aaran\Accounts\Models;

use Aaran\Common\Models\Ledger;
use Aaran\Master\Models\Order;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cashbook extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public static function search(string $searches): Builder
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

//    public function cashbill(): BelongsTo
//    {
//        return $this->belongsTo(Cashbill::class);
//    }
}
