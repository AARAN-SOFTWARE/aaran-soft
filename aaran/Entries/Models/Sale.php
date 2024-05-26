<?php

namespace Aaran\Entries\Models;

use Aaran\Aadmin\Src\Customise;
use Aaran\Common\Models\Despatch;
use Aaran\Common\Models\Ledger;
use Aaran\Common\Models\Transport;
use Aaran\Entries\Database\Factories\SaleFactory;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use Aaran\Master\Models\Order;
use Aaran\Master\Models\Style;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('invoice_no', 'like', '%' . $searches . '%');
    }

    public static function nextNo()
    {
        return Customise::hasContinueSalesNo() ?
            static::where('company_id', '=', session()->get('company_id'))
                ->max('invoice_no') + 1
            : static::where('company_id', '=', session()->get('company_id'))
                ->where('acyear', '=', session()->get('acyear'))
                ->max('invoice_no') + 1;
    }

    public function despatch(): BelongsTo
    {
        return $this->belongsTo(Despatch::class);
    }

    public function contact_detail(): BelongsTo
    {
        return $this->belongsTo(Contact_detail::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class);
    }

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class);
    }

    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }

    protected static function newFactory(): SaleFactory
    {
        return new SaleFactory();
    }
}
