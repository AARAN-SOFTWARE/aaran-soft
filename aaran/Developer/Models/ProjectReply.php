<?php

namespace Aaran\Developer\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectReply extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
