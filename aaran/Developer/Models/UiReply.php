<?php

namespace Aaran\Developer\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UiReply extends Model
{
    use HasFactory;

     protected $guarded = [];

    public function ui_task(): BelongsTo
    {
        return $this->belongsTo(UiTask::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function allocated($str)
    {
        return User::find($str)->name;
    }

}
