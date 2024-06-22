<?php

namespace Aaran\Master\Models;

use Aaran\Master\Database\Factories\ContactDetailFactory;
use Aaran\Common\Models\{City, Pincode, State};
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Contact_detail extends Model
{
    use HasFactory;

    protected $guarded = [];
    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('address_1', 'like', '%' . $searches . '%');
    }

    public static function printDetails($ids): Collection
    {
        $obj = self::find($ids);

        return collect([
            'address_1' => $obj->address_1 ,
            'address_2' => $obj->address_2,
            'address_3' => $obj->city->vname . ' - ' . $obj->pincode->vname . '.  ' . $obj->state->vname . ' - ' . $obj->state->state_code,
            'gstcell' =>  'GSTin : '.$obj->gstin,
            'gstContact' =>  $obj->gstin,
            'email'=>$obj->email,
        ]);
    }

    public static function getId(mixed $contact_id)
    {
        $obj = self::where('contact_id','=', $contact_id)->firstOrFail();;
        return $obj->id;
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
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

    protected static function newFactory():ContactDetailFactory
    {
        return new ContactDetailFactory();
    }

}
