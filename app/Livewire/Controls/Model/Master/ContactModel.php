<?php

namespace App\Livewire\Controls\Model\Master;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\Master\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class ContactModel extends Component
{
    public bool $showModel = false;

    public $vname = "";
    public string $mobile = '';
    public string $whatsapp = '';
    public string $email = '';
    public string $gstin = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public $contact_person;
    public $contact_type;
    public $msme_no;
    public $msme_type;
    public $opening_balance;
    public $effective_from;

    public string $cities;
    public string $states;
    public string $pincode;

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
        $this->cityCollection = $this->city_name ? City::search(trim($this->city_name))->get() : City::all();
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
        $this->stateCollection = $this->state_name ? State::search(trim($this->state_name))
            ->get() : State::all();
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

    public function mount($name): void
    {
        $this->vname = $name;
        $this->effective_from=Carbon::now()->format('Y-m-d');
    }

    public function save(): void
    {
        if ($this->vname != '') {
            $obj = Contact::create([
                'vname' => Str::upper($this->vname),
                'address_1' => $this->address_1,
                'address_2' => $this->address_2,
                'city_id' => $this->city_id?:'1',
                'state_id' => $this->state_id?:'1',
                'pincode_id' => $this->pincode_id?:'1',
                'gstin' => $this->gstin,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'whatsapp' => $this->whatsapp,
                'contact_person' => $this->contact_person,
                'contact_type' => $this->contact_type,
                'msme_no' => $this->msme_no,
                'msme_type' => $this->msme_type,
                'opening_balance' => $this->opening_balance,
                'effective_from' => $this->effective_from,
                'user_id' => Auth::id(),
                'company_id' => session()->get('company_id'),
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-contact', ['name' => $this->vname, 'id' => $obj->id]);
            $this->clearAll();
        }
    }

    public function clearAll(): void
    {
        $this->vname = '';
        $this->mobile = '';
        $this->whatsapp = '';
        $this->email = '';
        $this->gstin = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->city_id = '';
        $this->state_id = '';
        $this->pincode_id = '';
        $this->contact_person = '';
        $this->contact_type = '';
        $this->msme_no = '';
        $this->msme_type = '';
        $this->opening_balance = '';
        $this->effective_from = '';
        $this->showModel = false;
    }

    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        return view('livewire.controls.model.master.contact-model');
    }
}
