<?php

namespace Aaran\Erp\Models\Production;

use Aaran\Master\Models\Contact;
use Database\Factories\Erp\Production\PeOutwardFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeOutward extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vno', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): PeOutwardFactory
    {
        return new PeOutwardFactory();
    }

    public static function nextNo()
    {
        return static::where('company_id','=',session()->get('company_id'))->max('vno') + 1;
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function jobcard(): BelongsTo
    {
        return $this->belongsTo(Jobcard::class);
    }
}
