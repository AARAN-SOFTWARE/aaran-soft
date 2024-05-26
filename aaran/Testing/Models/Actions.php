<?php

namespace Aaran\Testing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Actions extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('name', 'like', '%' . $searches . '%');
    }

    public function modal(): BelongsTo
    {
        return $this->belongsTo(Modals::class);
    }

    public function testFile(): BelongsTo
    {
        return $this->belongsTo(TestFile::class);
    }

    public function file($str)
    {
        return TestFile::find($str)->vname;
    }
}
