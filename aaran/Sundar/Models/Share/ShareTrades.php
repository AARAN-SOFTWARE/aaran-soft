<?php

namespace Aaran\Sundar\Models\Share;

use Aaran\Sundar\Database\factories\ShareTradesFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShareTrades extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps = false;

    protected static function newFactory(): ShareTradesFactory
    {
        return new ShareTradesFactory();
    }
    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
