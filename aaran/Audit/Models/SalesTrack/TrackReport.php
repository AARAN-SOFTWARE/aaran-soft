<?php

namespace Aaran\Audit\Models\SalesTrack;

use Aaran\Audit\Database\Factories\TrackReportFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackReport extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;


    protected static function newFactory(): TrackReportFactory
    {
        return new TrackReportFactory();
    }
}
