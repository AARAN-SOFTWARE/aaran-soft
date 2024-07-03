<?php

namespace Aaran\Welfare\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectProduct extends Model
{
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function segment(): BelongsTo
    {
        return $this->belongsTo(ProjectSegment::class);
    }

    public static function projectSegment($str)
    {
        if ($str) {
            return ProjectSegment::find($str)->vname;
        } else return '';
    }

    public static function allocated($str)
    {
        if ($str) {
            return User::find($str)->name;
        } else return '';
    }
}
