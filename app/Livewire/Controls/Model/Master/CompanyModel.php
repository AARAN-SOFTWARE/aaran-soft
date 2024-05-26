<?php

namespace App\Livewire\Controls\Model\Master;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\Master\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyModel extends Component
{
    public bool $showModel = false;

    public $vname ='';
    public string $mobile = '';
    public string $email = '';
    public string $gstin = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $display_name='';
    public string $landline='';
    public string $website='';
    public  $logo='';
    public string $pan='';

    public string $cities;
    public string $states;
    public string $pincode;

    public function mount($name): void
    {
        $this->vname = $name;
    }

    public function save(): void
    {
        if ($this->vname != '') {
            $obj = Company::create([
                'vname' => Str::upper($this->vname),
                'display_name'=>$this->display_name,
                'address_1' => $this->address_1,
                'address_2' => $this->address_2,
                'mobile' => $this->mobile,
                'landline' => $this->landline,
                'gstin' =>Str::upper($this->gstin),
                'pan' => $this->pan,
                'email' => $this->email,
                'website' => $this->website,
                'city_id' => $this->city_id,
                'state_id' => $this->state_id,
                'pincode_id' => $this->pincode_id,
                'active_id' => $this->active_id=1,
                'user_id' => Auth::id(),
            ]);
            $this->dispatch('refresh-company', ['name' => $this->vname, 'id' => $obj->id]);
            $this->clearAll();
        }
    }
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

    public function getCityList(): void
    {
        $this->cityCollection = $this->city_name ? City::search(trim($this->city_name ))->get():City::all();
    }

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
        $this->stateCollection = $this->state_name ? State::search(trim($this->state_name ))
            ->get():State::all();
    }



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
    public function getPincodeList(): void
    {
        $this->pincodeCollection = $this->pincode_name ? Pincode::search(trim($this->pincode_name))
            ->get() : Pincode::all();
    }

    public function clearAll(): void
    {
        $this->showModel = false;
        $this->vname = '';
        $this->address_1='';
        $this->address_2='';
        $this->mobile='';
        $this->landline='';
        $this->gstin='';
        $this->pan='';
        $this->email='';
        $this->website='';
        $this->city_id='';
        $this->state_id='';
        $this->pincode_id='';

    }
    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        return view('livewire.controls.model.master.company-model');
    }
}
