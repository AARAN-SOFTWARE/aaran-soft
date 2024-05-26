<?php

namespace Aaran\Master\Models;

use Aaran\Master\Database\Factories\ContactFactory;
use App\Models\User;
use Aaran\Common\Models\{City, Pincode, State};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use LaravelIdea\Helper\Aaran\Master\Models\_IH_Contact_QB;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches): Builder|_IH_Contact_QB|Contact
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function pincode(): BelongsTo
    {
        return $this->belongsTo(Pincode::class);
    }

    public function contact_details():HasMany
    {
        return $this->hasMany(Contact_detail::class);
    }

     protected static function newFactory(): ContactFactory
    {
        return new ContactFactory();
    }

}
