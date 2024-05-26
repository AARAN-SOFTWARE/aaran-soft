<?php

namespace Aaran\Audit\Models\SalesTrack;

use Aaran\Audit\Database\Factories\SmonthFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smonth extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    protected static function newFactory(): SmonthFactory
    {
        return new SmonthFactory();
    }
}
