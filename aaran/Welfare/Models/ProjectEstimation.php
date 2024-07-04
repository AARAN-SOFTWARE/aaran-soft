<?php

namespace Aaran\Welfare\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectEstimation extends Model
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

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public static function project_name($str)
    {
        if ($str) {
            return Project::find($str)->vname;
        } else return '';
    }

    public function project_product(): BelongsTo
    {
        return $this->belongsTo(ProjectProduct::class);
    }

    public static function product_name($str)
    {
        if ($str) {
            return ProjectProduct::find($str)->vname;
        } else return '';
    }

    public static function allocated($str)
    {
        if ($str) {
            return User::find($str)->name;
        } else return '';
    }

}
