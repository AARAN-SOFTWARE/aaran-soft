<?php

namespace Aaran\Taskmanager\Models;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Database\Factories\TaskFactory;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

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

    public static function allocate($str)
    {
        return User::find($str)->name;
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function reply() :HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function image() :HasMany
    {
        return $this->hasMany(Image::class);
    }

    protected static function newFactory(): TaskFactory
    {
        return new TaskFactory();
    }
}
