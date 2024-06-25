<?php

namespace Aaran\Testing\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwTest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): SwTest
    {
        return new SwTest();
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(AdminTest::class);
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
