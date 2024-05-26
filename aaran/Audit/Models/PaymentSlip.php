<?php

namespace Aaran\Audit\Models;

use Aaran\Aadmin\Src\Customise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PaymentSlip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function nextNo()
    {
        return static::max('slip_no') + 1;
    }

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('sender', 'like', '%' . $searches . '%');
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
