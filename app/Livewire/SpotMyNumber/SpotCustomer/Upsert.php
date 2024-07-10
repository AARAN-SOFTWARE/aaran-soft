<?php

namespace App\Livewire\SpotMyNumber\SpotCustomer;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Country;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\SpotMyNumber\Models\SpotCustomer;
use Aaran\SpotMyNumber\Models\SpotPic;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upsert extends Component
{
    use WithFileUploads;
    use CommonTrait;
    #region[properties]
    public $images;
    public $contact_person;
    public $mobile;
    public $whatsapp;
    public $email;
    public $website;
    public $gstin;
    public $address_1;
    public $address_2;
    public $landmark;
    public $geoLocation;
    public $working_days;
    public $business_open_timing;
    public $business_close_timing;
    #endregion

    #region[Country]

    public $country_id = '';
    public $country_name = '';
    public Collection $countryCollection;
    public $highlightCountry = 0;
    public $countryTyped = false;

    public function decrementCountry(): void
    {
        if ($this->highlightCountry === 0) {
            $this->highlightCountry = count($this->countryCollection) - 1;
            return;
        }
        $this->highlightCountry--;
    }

    public function incrementCountry(): void
    {
        if ($this->highlightCountry === count($this->countryCollection) - 1) {
            $this->highlightCountry = 0;
            return;
        }
        $this->highlightCountry++;
    }

    public function enterCountry(): void
    {
        $obj = $this->countryCollection[$this->highlightCountry] ?? null;

        $this->country_name = '';
        $this->countryCollection = Collection::empty();
        $this->highlightCountry = 0;

        $this->country_name = $obj['vname'] ?? '';;
        $this->country_id = $obj['id'] ?? '';;
    }

    public function setCountry($name, $id): void
    {
        $this->country_name = $name;
        $this->country_id = $id;
        $this->getcountryList();
    }

    #[On('refresh-country')]
    public function refreshCountry($v): void
    {
        $this->country_id = $v['id'];
        $this->country_name = $v['name'];
        $this->countryTyped = false;
    }

    public function countrySave($name)
    {
        $obj= country::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshCountry($v);
    }

    public function getCountryList(): void
    {
        $this->countryCollection = $this->country_name ? country::search(trim($this->country_name))
            ->get() : country::all();
    }

    #endregion

    #region[city]
    public $city_id = '';
    public $city_name = '';
    public Collection $cityCollection;
    public $highlightCity = 0;
    public $cityTyped = false;

    public function decrementCity(): void
    {
        if ($this->highlightCity === 0) {
            $this->highlightCity = count($this->cityCollection) - 1;
            return;
        }
        $this->highlightCity--;
    }

    public function incrementCity(): void
    {
        if ($this->highlightCity === count($this->cityCollection) - 1) {
            $this->highlightCity = 0;
            return;
        }
        $this->highlightCity++;
    }

    public function setCity($name, $id): void
    {
        $this->city_name = $name;
        $this->city_id = $id;
        $this->getCityList();
    }

    public function enterCity(): void
    {
        $obj = $this->cityCollection[$this->highlightCity] ?? null;

        $this->city_name = '';
        $this->cityCollection = Collection::empty();
        $this->highlightCity = 0;

        $this->city_name = $obj['vname'] ?? '';;
        $this->city_id = $obj['id'] ?? '';;
    }

    #[On('refresh-city')]
    public function refreshCity($v): void
    {
        $this->city_id = $v['id'];
        $this->city_name = $v['name'];
        $this->cityTyped = false;

    }
    public function citySave($name)
    {
        $obj= City::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshCity($v);
    }

    public function getCityList(): void
    {
        $this->cityCollection = $this->city_name ? City::search(trim($this->city_name))->get() : City::all();
    }
    #endregion

    #region[state]
    public $state_id = '';
    public $state_name = '';
    public Collection $stateCollection;
    public $highlightState = 0;
    public $stateTyped = false;

    public function decrementState(): void
    {
        if ($this->highlightState === 0) {
            $this->highlightState = count($this->stateCollection) - 1;
            return;
        }
        $this->highlightState--;
    }

    public function incrementState(): void
    {
        if ($this->highlightState === count($this->stateCollection) - 1) {
            $this->highlightState = 0;
            return;
        }
        $this->highlightState++;
    }

    public function setState($name, $id): void
    {
        $this->state_name = $name;
        $this->state_id = $id;
        $this->getStateList();
    }

    public function enterState(): void
    {
        $obj = $this->stateCollection[$this->highlightState] ?? null;

        $this->state_name = '';
        $this->stateCollection = Collection::empty();
        $this->highlightState = 0;

        $this->state_name = $obj['vname'] ?? '';;
        $this->state_id = $obj['id'] ?? '';;
    }

    #[On('refresh-state')]
    public function refreshState($v): void
    {
        $this->state_id = $v['id'];
        $this->state_name = $v['name'];
        $this->stateTyped = false;

    }

    public function getStateList(): void
    {
        $this->stateCollection = $this->state_name ? State::search(trim($this->state_name))
            ->get() : State::all();
    }
    #endregion

    #region[pin-code]
    public $pincode_id = '';
    public $pincode_name = '';
    public Collection $pincodeCollection;
    public $highlightPincode = 0;
    public $pincodeTyped = false;

    public function decrementPincode(): void
    {
        if ($this->highlightPincode === 0) {
            $this->highlightPincode = count($this->pincodeCollection) - 1;
            return;
        }
        $this->highlightPincode--;
    }

    public function incrementPincode(): void
    {
        if ($this->highlightPincode === count($this->pincodeCollection) - 1) {
            $this->highlightPincode = 0;
            return;
        }
        $this->highlightPincode++;
    }

    public function enterPincode(): void
    {
        $obj = $this->pincodeCollection[$this->highlightPincode] ?? null;

        $this->pincode_name = '';
        $this->pincodeCollection = Collection::empty();
        $this->highlightPincode = 0;

        $this->pincode_name = $obj['vname'] ?? '';;
        $this->pincode_id = $obj['id'] ?? '';;
    }

    public function setPincode($name, $id): void
    {
        $this->pincode_name = $name;
        $this->pincode_id = $id;
        $this->getPincodeList();
    }

    #[On('refresh-pincode')]
    public function refreshPincode($v): void
    {
        $this->pincode_id = $v['id'];
        $this->pincode_name = $v['name'];
        $this->pincodeTyped = false;
    }

    public function pincodeSave($name)
    {
        $obj= Pincode::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshPincode($v);
    }

    public function getPincodeList(): void
    {
        $this->pincodeCollection = $this->pincode_name ? Pincode::search(trim($this->pincode_name))
            ->get() : Pincode::all();
    }
    #endregion

    #region[save]
    public function save()
    {
        if ($this->vname!="") {
            if ($this->vid == "") {
                $obj = SpotCustomer::create([
                    'vname' => Str::ucfirst($this->vname),
                    'contact_person' => $this->contact_person,
                    'mobile' => $this->mobile,
                    'whatsapp' => $this->whatsapp,
                    'email' => $this->email,
                    'website' => $this->website,
                    'gstin' => $this->gstin,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'landmark' => $this->landmark,
                    'city_id' => $this->city_id ?: '1',
                    'state_id' => $this->state_id ?: '1',
                    'pincode_id' => $this->pincode_id ?: '1',
                    'country_id' => $this->country_id ?: '1',
                    'geoLocation' => $this->geoLocation,
                    'working_days' => $this->working_days,
                    'business_open_timing' => $this->business_open_timing,
                    'business_close_timing' => $this->business_close_timing,
                    'active_id' => 1,
                ]);
                $this->saveimage($obj->id);
                $message = "Saved";
                $this->getRoute();
            }else{
                $obj=SpotCustomer::find($this->vid);
                $obj->vname=$this->vname;
                $obj->contact_person=$this->contact_person;
                $obj->mobile=$this->mobile;
                $obj->whatsapp=$this->whatsapp;
                $obj->email=$this->email;
                $obj->website=$this->website;
                $obj->gstin=$this->gstin;
                $obj->address_1=$this->address_1;
                $obj->address_2=$this->address_2;
                $obj->landmark=$this->landmark;
                $obj->geoLocation=$this->geoLocation;
                $obj->working_days=$this->working_days;
                $obj->business_open_timing=$this->business_open_timing;
                $obj->business_close_timing=$this->business_close_timing;
                $obj->active_id=1;
                $obj->save();
                $this->saveimage($obj->id);
                $message = "Updated";
            }
            $this->getRoute();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }

    }
    #endregion

    #region[getRoute]
    public function getRoute(): void
    {
        $this->redirect(route('spotCustomer'));
    }
    #endregion

    #region[saveimage]
    public function saveimage($id)
    {
        foreach ($this->images as $image){
            SpotPic::create([
                'spot_customer_id'=>$id,
                'pic_name'=>$this->orginalName($image),
                'active_id'=>1
            ]);
        }
    }
    #endregion

    #region[]
    public function orginalName($image)
    {
        if ($image== '') {
            return $image = 'empty';
        } else {
            if ($image){
                Storage::delete('public/'.$image);
            }
            $logo_name=$image->getClientOriginalName();
            return $image->storeAs('spot_my_number', $logo_name,'public');
        }
    }
    #endregion

    #region[render]
    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        $this->getCountryList();
        return view('livewire.spot-my-number.spot-customer.upsert');
    }
    #endregion
}
