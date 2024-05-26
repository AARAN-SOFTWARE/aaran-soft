<?php

namespace Aaran\Audit\Models;

use Aaran\Audit\Database\Factories\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public static function getName($id)
    {
         $obj = static::find($id);

        return $obj->vname;
    }

    protected static function newFactory(): ClientFactory
    {
        return new ClientFactory();
    }
}
