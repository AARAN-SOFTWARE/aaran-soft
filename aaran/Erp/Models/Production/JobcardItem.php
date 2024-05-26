<?php

namespace Aaran\Erp\Models\Production;

use Database\Factories\Erp\Production\JobcardItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobcardItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): JobcardItemFactory
    {
        return new JobcardItemFactory();
    }

    public function jobcard(): BelongsTo
    {
        return $this->belongsTo(Jobcard::class);
    }
}
