<?php

namespace Aaran\Developer\Models;

use Aaran\Developer\Database\Factories\SurfingReplyFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurfingReply extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps=false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): SurfingReplyFactory
    {
        return new SurfingReplyFactory();
    }

    public function hsncode(): BelongsTo
    {
        return $this->belongsTo(SurfingCategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public static function surfingCategory($str)
    {
        return SurfingCategory::find($str)->vname;
    }
}
