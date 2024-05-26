<?php

namespace Aaran\Developer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function reviewfilename(): BelongsTo
    {
        return $this->belongsTo(ReviewFileName::class);
    }


    public function review(): BelongsTo
    {
        return $this->belongsTo(TaskReview::class);
    }

    public static function reviewList($str)
    {
        return ReviewFileName::find($str)->vname;
    }
    public static function reviewTask($str)
    {
        return TaskReview::find($str)->vname;
    }




}
