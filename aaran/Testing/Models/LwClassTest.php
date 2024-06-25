<?php

namespace Aaran\Testing\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LwClassTest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): LwClassTest
    {
        return new LwClassTest();
    }

    public function sw(): BelongsTo
    {
        return $this->belongsTo(SwTest::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(TestModule::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
