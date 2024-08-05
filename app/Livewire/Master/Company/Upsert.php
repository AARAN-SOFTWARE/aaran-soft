<?php

namespace App\Livewire\Master\Company;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\Master\Models\Company;
use App\Livewire\Forms\CommonForm;
use App\Livewire\Trait\CommonTrait;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use function Livewire\store;

class Upsert extends Component
{
    use CommonTrait;
    use WithFileUploads;

    public CommonForm $cityForm;

    #region[properties]
    public string $mobile = '';
    public string $email = '';
    public string $gstin = '';
    public mixed $msme_no = '';
    public mixed $msme_type = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $display_name = '';
    public string $landline = '';
    public string $website = '';
    public $logo = '';
    public $old_logo = '';
    public string $pan = '';
    public $bank;
    public $acc_no;
    public $ifsc_code;
    public $branch;
    public $isUploaded = false;


    public string $cities;
    public string $states;
    public string $pincode;
    public $tenant_id;
    public Collection $tenants;
    #endregion

    #region[city]
    public function city($name = null, $id = null): void
    {
        if (City::search(trim($name))->get()->isNotEmpty()) {
            $this->cityForm->setCity($name, $id);
        } else {
            $this->cityForm->citySave($name);
        }
        $this->cityForm->getCityList();
    }

    public function decrementCity(): void
    {
        $this->cityForm->decrementCity();
    }

    public function incrementCity(): void
    {
        $this->cityForm->incrementCity();
    }

    public function enterCity(): void
    {
        $this->cityForm->enterCity();
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
    public function save(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Company::create([
                    'vname' => Str::ucfirst($this->vname),
                    'display_name' => $this->display_name,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'mobile' => $this->mobile,
                    'landline' => $this->landline,
                    'gstin' => Str::upper($this->gstin),
                    'msme_no' => $this->msme_no,
                    'msme_type' => $this->msme_type,
                    'pan' => Str::upper($this->pan),
                    'email' => $this->email,
                    'website' => $this->website,
                    'city_id' => $this->city_id ?: '1',
                    'state_id' => $this->state_id ?: '1',
                    'pincode_id' => $this->pincode_id ?: '1',
                    'bank' => $this->bank,
                    'acc_no' => $this->acc_no,
                    'ifsc_code' => $this->ifsc_code,
                    'branch' => $this->branch,
                    'active_id' => $this->active_id ?: '1',
                    'user_id' => Auth::id(),
                    'tenant_id' => $this->tenant_id ?: '1',
                    'logo' => $this->save_logo(),
                ]);
                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Company::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->display_name = $this->display_name;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->mobile = $this->mobile;
                $obj->landline = $this->landline;
                $obj->gstin = $this->gstin;
                $obj->msme_no = $this->msme_no;
                $obj->msme_type = $this->msme_type;
                $obj->pan = $this->pan;
                $obj->email = $this->email;
                $obj->website = $this->website;
                $obj->city_id = $this->city_id;
                $obj->state_id = $this->state_id;
                $obj->pincode_id = $this->pincode_id;
                $obj->bank = $this->bank;
                $obj->acc_no = $this->acc_no;
                $obj->ifsc_code = $this->ifsc_code;
                $obj->branch = $this->branch;
                $obj->active_id = $this->active_id;
                $obj->tenant_id = $this->tenant_id ?: '1';
                $obj->user_id = Auth::id();
                if ($obj->logo != $this->logo) {
                    $obj->logo = $this->save_logo();
                } else {
                    $obj->logo = $this->logo;
                }
                $obj->save();
                $message = "Updated";
            }
            $this->getRoute();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        }
    }
    #endregion

    #region[mount]
    public function mount($id): void
    {
        if ($id != 0) {

            $obj = Company::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->display_name = $obj->display_name;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->mobile = $obj->mobile;
            $this->landline = $obj->landline;
            $this->gstin = $obj->gstin;
            $this->msme_no = $obj->msme_no;
            $this->msme_type = $obj->msme_type;
            $this->pan = $obj->pan;
            $this->email = $obj->email;
            $this->website = $obj->website;
            $this->cityForm->city_id = $obj->city_id;
            $this->cityForm->city_name = $obj->city->vname;
            $this->state_id = $obj->state_id;
            $this->state_name = $obj->state->vname;
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode->vname;
            $this->bank = $obj->bank;
            $this->acc_no = $obj->acc_no;
            $this->ifsc_code = $obj->ifsc_code;
            $this->branch = $obj->branch;
            $this->active_id = $obj->active_id;
            $this->logo = $obj->logo;
            $this->old_logo = $obj->logo;
        } else {
            $this->active_id = true;
        }
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Company::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->display_name = $obj->display_name;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->mobile = $obj->mobile;
            $this->landline = $obj->landline;
            $this->gstin = $obj->gstin;
            $this->msme_no = $obj->msme_no;
            $this->msme_type = $obj->msme_type;
            $this->pan = $obj->pan;
            $this->email = $obj->email;
            $this->website = $obj->website;
            $this->cityForm->city_id = $obj->city_id;
            $this->cityForm->city_name = $obj->city->vname;
            $this->state_id = $obj->state_id;
            $this->state_name = $obj->state->vname;
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode->vname;
            $this->bank = $obj->bank;
            $this->acc_no = $obj->acc_no;
            $this->ifsc_code = $obj->ifsc_code;
            $this->branch = $obj->branch;
            $this->active_id = $obj->active_id;
            $this->logo = $obj->logo;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[logo]
    public function save_logo()
    {
        if ($this->logo == '') {
            return $this->logo = 'empty';
        } else {
            if ($this->old_logo) {
                Storage::delete('public/'.$this->old_logo);
            }
            $logo_name = $this->logo->getClientOriginalName();
            return $this->logo->storeAs('logo', $logo_name, 'public');
        }
    }

    public function updatedlogo()
    {
        $this->validate([
            'logo' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion

    #region[route]
    public function getRoute(): void
    {
        $this->redirect(route('companies'));
    }
    #endregion

    #region[tenants]
    public function getTenants()
    {
        $this->tenants = Tenant::all();

    }
    #endregion

    #region[render]
    public function render()
    {
        $this->cityForm->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        $this->getTenants();
        return view('livewire.master.company.upsert');
    }
    #endregion

}
