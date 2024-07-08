<?php

namespace App\Livewire\Sports\Club;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\SportsClub\Models\SportClub;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{

    use CommonTrait;

    use WithFileUploads;

    public string $master_name;
    public string $mobile;
    public string $whatsapp;
    public string $email;
    public string $address_1;
    public string $address_2;
    public $city;
    public $state;
    public $pincode;
    public $users;
    public string $started_at;
    public  $club_photo="";
    public string $old_club_photo;
    public $isUploaded = false;

    public function getSave()
    {
        if ($this->vname != ''){
            if ($this->vid == ""){
                $obj = SportClub :: create([
                    'vname' => $this->vname,
                    'master_name' => $this->master_name,
                    'mobile' => $this->mobile,
                    'whatsapp' => $this->whatsapp,
                    'email' => $this->email,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city_id' => $this->city_id,
                    'state_id' => $this->state_id,
                    'pincode_id' => $this->pincode_id,
                    'started_at' => $this->started_at,
                    'club_photo' => $this->saveImage(),
                    'active_id' => $this->active_id ? 1: 0,
                    'user_id' => auth()->id()
                ]);
            } else {
                $obj = SportClub::find($this->vid);
                $obj->vname = $this->vname;
                $obj->master_name = $this->master_name;
                $obj->mobile = $this->mobile;
                $obj->whatsapp = $this->whatsapp;
                $obj->email = $this->email;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->city_id = $this->city_id;
                $obj->state_id= $this->state_id;
                $obj->pincode_id = $this->pincode_id;
                $obj->started_at = $this->started_at;
                $obj->club_photo = $this->saveImage();
                $obj->active_id = $this->active_id;

                $obj->save();
            }
            $this->clearFields();
        }
    }

    public function getObj($id)
    {
     if($id){
         $obj  = SportClub::find($id);
         $this->vid = $obj->id;
         $this->vname = $obj->vname;
         $this->master_name = $obj->master_name;
         $this->mobile = $obj->mobile;
         $this->whatsapp = $obj->whatsapp;
         $this->email = $obj->email;
         $this->address_1 = $obj->address_1;
         $this->address_2 = $obj->address_2;
         $this->city_id = $obj->city_id;
         $this->city_name = $obj->city->vname;
         $this->state_id = $obj->state_id;
         $this->state_name = $obj->state->vname;
         $this->pincode_id = $obj->pincode_id;
         $this->pincode_name = $obj->pincode->vname;
         $this->started_at = $obj->started_at;
         $this->old_club_photo = $obj->club_photo;
         $this->active_id = $obj->active_id;

         return $obj;
     }

    }

    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->master_name = '';
        $this->mobile = '';
        $this->whatsapp = '';
        $this->email = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->city_id = '';
        $this->city_name = '';
        $this->state_id = '';
        $this->state_name = '';
        $this->pincode_id = '';
        $this->pincode_name = '';
        $this->started_at = '';
        $this->old_club_photo = '';
        $this->active_id = '';
    }

    #region[Image]
    public function saveImage()
    {
        if ($this->club_photo) {

            $image = $this->club_photo;
            $filename = $this->club_photo->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_club_photo))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_club_photo));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_club_photo) {
                return $this->old_club_photo;
            } else {
                return 'no image';
            }
        }
    }

    public function updatedphoto()
    {
        $this->validate([
            'club_photo'=>'image|max:1024',
        ]);
        $this->isUploaded=true;
    }
    #endregion

    #region[list]
    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $this->sortField = 'id';

        return SportClub::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
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

    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();

        return view('livewire.sports.club.index')->with([
            'list' => $this->getList()
        ]);
    }
}
