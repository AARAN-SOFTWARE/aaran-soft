<?php

namespace Aaran\Taskmanager\Models;

use Aaran\Taskmanager\Database\Factories\TodosFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = true;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public static function nextNo()
    {
        return static::max('slno') + 1;
    }

    protected static function newFactory(): TodosFactory
    {
        return new TodosFactory();
    }
}
