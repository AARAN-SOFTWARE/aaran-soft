<?php

namespace App\Livewire\Magalir\MgMember;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\Finance\Models\MgClub;
use Aaran\Finance\Models\MgMember;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public string $mg_club_id = '';
    public string $photo = '';
    public string $father = '';
    public string $mother = '';
    public string $dob = '';
    public string $aadhaar = '';
    public string $pan = '';
    public string $mobile = '';
    public string $mobile_2 = '';
    public string $email = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public $image;
    public $old_image;
    public string $nominee = '';
    public string $n_mobile = '';
    public string $n_aadhaar = '';

    public mixed $clubs;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id) {
            $this->mg_club_id = $id;
        }

        $this->dob = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->clubs = MgClub::where('active_id', '1')->get();
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        $this->dob = (Carbon::parse(Carbon::now())->format('Y-m-d'));

        if ($this->vname != '') {
            if ($this->vid == "") {

                MgMember::create([
                    'mg_club_id' => $this->mg_club_id,
                    'vname' => Str::upper($this->vname),
                    'father' => Str::ucfirst($this->father),
                    'mother' => Str::ucfirst($this->mother),
                    'dob' => $this->dob,
                    'aadhaar' => $this->aadhaar,
                    'pan' => $this->pan,
                    'mobile' => $this->mobile,
                    'mobile_2' => $this->mobile_2,
                    'email' => $this->email,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city_id' => $this->city_id ?: '1',
                    'state_id' => $this->state_id ?: '1',
                    'pincode_id' => $this->pincode_id ?: '1',
                    'nominee' => $this->nominee,
                    'n_mobile' => $this->n_mobile,
                    'n_aadhaar' => $this->n_aadhaar,
                    'active_id' => $this->active_id,
                    'photo' => $this->saveImage(),
                    'user_id' => Auth::id(),
                ]);

                $message = "Saved";

            } else {
                $obj = MgMember::find($this->vid);
                $obj->mg_club_id = $this->mg_club_id;
                $obj->vname = Str::upper($this->vname);
                $obj->father = Str::ucfirst($this->father);
                $obj->mother = Str::ucfirst($this->mother);
                $obj->dob = $this->dob;
                $obj->aadhaar = $this->aadhaar;
                $obj->pan = $this->pan;
                $obj->mobile = $this->mobile;
                $obj->mobile_2 = $this->mobile_2;
                $obj->email = $this->email;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->city_id = $this->city_id ?: '1';
                $obj->state_id = $this->state_id ?: '1';
                $obj->pincode_id = $this->pincode_id ?: '1';
                $obj->nominee = $this->nominee;
                $obj->n_mobile = $this->n_mobile;
                $obj->n_aadhaar = $this->n_aadhaar;
                $obj->active_id = $this->active_id ?: '0';
                $obj->photo = $this->saveImage();
                $obj->user_id = Auth::id();
                $obj->save();
                $message = "Updated";
            }

            redirect()->to(route('mgClubs.members', $this->mg_club_id));
            $this->clearFields();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[Clear]
    public function clearFields(): void
    {
        $this->mg_club_id = '';
        $this->vname = '';
        $this->father = '';
        $this->mother = '';
        $this->dob = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->aadhaar = '';
        $this->pan = '';
        $this->mobile = '';
        $this->mobile_2 = '';
        $this->email = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->city_id = '';
        $this->state_id = '';
        $this->pincode_id = '';
        $this->city_name = '';
        $this->state_name = '';
        $this->pincode_name = '';
        $this->nominee = '';
        $this->n_mobile = '';
        $this->n_aadhaar = '';
        $this->active_id = '1';
        $this->searches = '';
        $this->image = '';
        $this->old_image = '';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = MgMember::find($id);
            $this->vid = $obj->id;
            $this->mg_club_id = $obj->mg_club_id;
            $this->vname = $obj->vname;
            $this->father = $obj->father;
            $this->mother = $obj->mother;
            $this->dob = $obj->dob;
            $this->aadhaar = $obj->aadhaar;
            $this->pan = $obj->pan;
            $this->mobile = $obj->mobile;
            $this->mobile_2 = $obj->mobile_2;
            $this->email = $obj->email;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->city_id = $obj->city_id;
            $this->city_name = $obj->city->vname;
            $this->state_id = $obj->state_id;
            $this->state_name = $obj->state->vname;
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode->vname;
            $this->nominee = $obj->nominee;
            $this->n_mobile = $obj->n_mobile;
            $this->n_aadhaar = $obj->n_aadhaar;
            $this->active_id = $obj->active_id;
            $this->old_image = $obj->photo;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return MgMember::search($this->searches)
            ->where('mg_club_id', '=', $this->mg_club_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion


    #region[image]

    public function saveImage()
    {
        if ($this->image) {

            $photo = $this->image;
            $filename = $this->image->getClientOriginalName();

//            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_image))) {
//                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_image));
//            }
            if ($this->old_image){
                Storage::delete('public/images/'.$this->old_image);
            }

            $photo->storeAs('images', $filename,'public');

            return $filename;

        } else {
            if ($this->old_image) {
                return $this->old_image;
            } else {
                return 'no image';
            }
        }
    }

#region[List]

    #region[City]
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

    #region[State]
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

    #region[Pincode]

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

    #region[Render]
    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        return view('livewire.magalir.mg-member.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
