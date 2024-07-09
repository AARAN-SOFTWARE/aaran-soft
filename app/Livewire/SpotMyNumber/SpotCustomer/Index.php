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
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
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
        $obj = country::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
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
        $obj = City::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
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
        $obj = Pincode::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
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
        if ($this->vname != "") {
            if ($this->vid == "") {
                $obj = SpotCustomer::create([
                    'vname' => $this->vname,
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
                $message = "Saved";
            } else {
                $obj = SpotCustomer::find($this->vid);
                $obj->vname = $this->vname;
                $obj->contact_person = $this->contact_person;
                $obj->mobile = $this->mobile;
                $obj->whatsapp = $this->whatsapp;
                $obj->email = $this->email;
                $obj->website = $this->website;
                $obj->gstin = $this->gstin;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->landmark = $this->landmark;
                $obj->city_id = $this->city_id ?: 1;
                $obj->state_id = $this->state_id ?: 1;
                $obj->pincode_id = $this->pincode_id ?: 1;
                $obj->country_id = $this->country_id ?: 1;
                $obj->geoLocation = $this->geoLocation;
                $obj->working_days = $this->working_days;
                $obj->business_open_timing = $this->business_open_timing;
                $obj->business_close_timing = $this->business_close_timing;
                $obj->active_id = 1;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        }

    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SpotCustomer::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->contact_person = $obj->contact_person;
            $this->mobile = $obj->mobile;
            $this->whatsapp = $obj->whatsapp;
            $this->email = $obj->email;
            $this->website = $obj->website;
            $this->gstin = $obj->gstin;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->landmark = $obj->landmark;
            $this->city_id = $obj->city_id;
            $this->city_name = $obj->city->vname;
            $this->state_id = $obj->state_id;
            $this->state_name = $obj->state->vname;
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode->vname;
            $this->country_id = $obj->country_id;
            $this->country_name = $obj->country->vname;
            $this->geoLocation = $obj->geoLocation;
            $this->working_days = $obj->working_days;
            $this->business_open_timing = $obj->business_open_timing;
            $this->business_close_timing = $obj->business_close_timing;
            $this->active_id = $obj->active_id;
            return $obj;
        }
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->contact_person = '';
        $this->mobile = '';
        $this->whatsapp = '';
        $this->email = '';
        $this->website = '';
        $this->gstin = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->landmark = '';
        $this->city_id = '';
        $this->city_name='';
        $this->state_id = '';
        $this->state_name = '';
        $this->pincode_id = '';
        $this->pincode_name = '';
        $this->country_id = '';
        $this->country_name='';
        $this->geoLocation='';
        $this->working_days='';
        $this->business_open_timing='';
        $this->business_close_timing='';
        $this->active_id=1;
    }
    #endregion

    #region[getList]
    public function getList()
    {
        return SpotCustomer::search($this->searches)
            ->where('active_id','=',$this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[reRender]
    public function reRender(): void
    {
        $this->render()->render();
    }
    #endregion

    #region[render]
    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        $this->getCountryList();
        return view('livewire.spot-my-number.spot-customer.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
