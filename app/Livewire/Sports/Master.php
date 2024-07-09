<?php

namespace App\Livewire\Sports;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\SportsClub\Models\SportClub;
use Aaran\SportsClub\Models\SportMaster;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Master extends Component
{

    use CommonTrait;

    use WithFileUploads;

    #region[Properties]
    public string $mobile = '';
    public string $whatsapp = '';
    public string $email = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $sport_club_id = '';
    public string $grade = '';
    public string $experience = '';
    public string $dob = '';
    public string $age = '';
    public string $gender = '';
    public string $aadhaar = '';
    public mixed $master_photo;
    public mixed $old_master_photo = '';

    public $cities;
    public $states;
    public $pincodes;
    public $sportClub;
    public $isUploaded = false;

    #endregion

    #region[Mount]
    public function mount()
    {
        $this->cities = City::all();
        $this->states = State::all();
        $this->pincodes = Pincode::all();
        $this->sportClub = SportClub::all();
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

    #region[sport-club]
    public $sportsClub_id = '';
    public $sportsClub_name = '';
    public Collection $sportsClubCollection;
    public $highlightSportsClub = 0;
    public $sportsClubTyped = false;

    public function decrementSportsClub(): void
    {
        if ($this->highlightSportsClub === 0) {
            $this->highlightSportsClub = count($this->sportsClubCollection) - 1;
            return;
        }
        $this->highlightSportsClub--;
    }

    public function incrementSportsClub(): void
    {
        if ($this->highlightSportsClub === count($this->sportsClubCollection) - 1) {
            $this->highlightSportsClub = 0;
            return;
        }
        $this->highlightSportsClub++;
    }

    public function enterSportsClub(): void
    {
        $obj = $this->sportsClubCollection[$this->highlightSportsClub] ?? null;

        $this->sportsClub_name = '';
        $this->sportsClubCollection = Collection::empty();
        $this->highlightSportsClub = 0;

        $this->sportsClub_name = $obj['vname'] ?? '';;
        $this->sportsClub_id = $obj['id'] ?? '';;
    }

    public function setSportsClub($name, $id): void
    {
        $this->sportsClub_name = $name;
        $this->sportsClub_id = $id;
        $this->getSportsClubList();
    }

    #[On('refresh-pincode')]
    public function refreshSportsClub($v): void
    {
        $this->sportsClub_id = $v['id'];
        $this->sportsClub_name = $v['name'];
        $this->sportsClubTyped = false;
    }

    public function SportsClubSave($name)
    {
        $obj= SportClub::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshSportsClub($v);
    }

    public function getSportsClubList(): void
    {
        $this->sportsClubCollection = $this->sportsClub_name ? SportClub::search(trim($this->sportsClub_name))
            ->get() : SportClub::all();
    }
    #endregion

    #region[save]

    public function getSave(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required|unique:banks,vname']);
                SportMaster::create([
                    'vname' => Str::ucfirst($this->vname),
                    'mobile' => $this->mobile,
                    'whatsapp' => $this->whatsapp,
                    'email' => $this->email,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city_id' => $this->city_id ?:1,
                    'state_id' => $this->state_id ?:1,
                    'pincode_id' => $this->pincode_id ?:1,
                    'sport_club' => $this->sport_club_id ?:1,
                    'grade' => $this->grade,
                    'experience' => $this->experience,
                    'dob' => $this->dob,
                    'age' => $this->age,
                    'gender' => $this->gender,
                    'aadhaar' => $this->aadhaar,
                    'master_photo' => $this->saveImage(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = SportMaster::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->mobile = $this->mobile;
                $obj->whatsapp = $this->whatsapp;
                $obj->email = $this->email;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->city_id = $this->city_id ?:1;
                $obj->state_id = $this->state_id ?:1;
                $obj->pincode_id = $this->pincode_id ?:1;
                $obj->sport_club= $this->sport_club_id ?:1;
                $obj->grade = $this->grade;
                $obj->experience = $this->experience;
                $obj->dob = $this->dob;
                $obj->age = $this->age;
                $obj->gender = $this->gender;
                $obj->aadhaar = $this->aadhaar;
                $obj->master_photo = $this->saveImage();
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[Clear Fields]
    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->mobile = '';
        $this->whatsapp = '';
        $this->email = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->city_id = '';
        $this->state_id = '';
        $this->pincode_id = '';
        $this->sport_club_id = '';
        $this->grade = '';
        $this->experience = '';
        $this->dob = '';
        $this->age = '';
        $this->gender = '';
        $this->aadhaar = '';
        $this->master_photo = '';
        $this->old_master_photo = '';
        $this->active_id = Active::ACTIVE->value;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SportMaster::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
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
            $this->sportsClub_id =$obj->sport_club ;
            $this->sportsClub_name = SportMaster::club($obj->sport_club);
            $this->grade = $obj->grade;
            $this->experience = $obj->experience;
            $this->dob = $obj->dob;
            $this->age = $obj->age;
            $this->gender = $obj->gender;
            $this->aadhaar = $obj->aadhaar;
            $this->old_master_photo = $obj->master_photo;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->master_photo) {

            $image = $this->master_photo;
            $filename = $this->master_photo->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_master_photo))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_master_photo));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_master_photo) {
                return $this->old_master_photo;
            } else {
                return 'no_image';
            }
        }
    }

    public function updatedphoto()
    {
        $this->validate([
            'master_photo' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return SportMaster::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        $this->getSportsClubList();

        return view('livewire.sports.master')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
