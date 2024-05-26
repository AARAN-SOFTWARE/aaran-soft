<?php

namespace Aaran\Developer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectItem extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(): BelongsTo
    {
        return $this->belongsTo(ProjectTask::class);
    }

}
