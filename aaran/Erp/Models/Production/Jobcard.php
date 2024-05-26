<?php

namespace Aaran\Erp\Models\Production;

use Aaran\Master\Models\Order;
use Aaran\Master\Models\Style;
use App\Models\User;
use Database\Factories\Erp\Production\JobcardFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jobcard extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vno', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): JobcardFactory
    {
        return new JobcardFactory();
    }

    public static function nextNo()
    {
        return static::where('company_id','=',session()->get('company_id'))->max('vno') + 1;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
