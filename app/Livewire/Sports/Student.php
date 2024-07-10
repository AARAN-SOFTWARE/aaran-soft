<?php

namespace App\Livewire\Sports;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\SportsClub\Models\SportClub;
use Aaran\SportsClub\Models\SportMaster;
use Aaran\SportsClub\Models\SportStudent;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Student extends Component
{
    use CommonTrait;

    use WithFileUploads;

    #region[Properties]
    public string $mobile = '';
    public string $whatsapp = '';
    public string $email = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $aadhaar = '';
    public string $father_name = '';
    public string $mother_name = '';
    public string $dob = '';
    public string $age = '';
    public string $gender = '';
    public string $institution = '';
    public string $standard = '';
    public string $experience = '';
    public $student_photo = "";
    public string $old_student_photo = '';

    public bool $isUploaded = false;

    public SportMaster $sportMaster;

    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id) {
            $this->sportMaster = SportMaster::find($id);
        }
    }
    #endregion

    #region[getSave]
    public function getSave()
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $obj = SportStudent:: create([
                    'vname' => $this->vname,
                    'mobile' => $this->mobile,
                    'whatsapp' => $this->whatsapp,
                    'email' => $this->email,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city_id' => $this->city_id ?: 1,
                    'state_id' => $this->state_id ?: 1,
                    'pincode_id' => $this->pincode_id ?: 1,
                    'aadhaar' => $this->aadhaar,
                    'father_name' => $this->father_name,
                    'mother_name' => $this->mother_name,
                    'dob' => $this->dob,
                    'age' => $this->age,
                    'gender' => $this->gender,
                    'institution' => $this->institution,
                    'standard' => $this->standard,
                    'sport_master_id' => $this->sportMaster->id,
                    'experience' => $this->experience,
                    'student_photo' => $this->saveImage(),
                    'active_id' => $this->active_id ? 1 : 0,
                ]);
            } else {
                $obj = SportStudent::find($this->vid);
                $obj->vname = $this->vname;
                $obj->mobile = $this->mobile;
                $obj->whatsapp = $this->whatsapp;
                $obj->email = $this->email;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->city_id = $this->city_id ?: 1;
                $obj->state_id = $this->state_id ?: 1;
                $obj->pincode_id = $this->pincode_id ?: 1;
                $obj->aadhaar = $this->aadhaar;
                $obj->father_name = $this->father_name;
                $obj->mother_name = $this->mother_name;
                $obj->dob = $this->dob;
                $obj->age = $this->age;
                $obj->gender = $this->gender;
                $obj->institution = $this->institution;
                $obj->standard = $this->standard;
                $obj->sport_master_id = $this->sportMaster->id;
                $obj->experience = $this->experience;
                $obj->student_photo = $this->saveImage();
                $obj->active_id = $this->active_id;

                $obj->save();
            }
            $this->clearFields();
        }
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SportStudent::find($id);
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
            $this->aadhaar = $obj->aadhaar;
            $this->father_name = $obj->father_name;
            $this->mother_name = $obj->mother_name;
            $this->dob = $obj->dob;
            $this->age = $obj->age;
            $this->gender = $obj->gender;
            $this->institution = $obj->institution;
//            $this->sportsMaster_id = $obj->sport_master_id;
//            $this->sportsMaster_name = SportStudent::master($obj->sport_master_id);
            $this->standard = $obj->standard;
            $this->experience = $obj->experience;
            $this->old_student_photo = $obj->student_photo;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }

    #endregion

    #region[clear Fields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vname = '';
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
        $this->aadhaar = '';
        $this->father_name = '';
        $this->mother_name = '';
        $this->dob = '';
        $this->age = '';
        $this->gender = '';
        $this->institution = '';
        $this->standard = '';
//        $this->sportsMaster_id = '';
//        $this->sportsMaster_name = '';
        $this->experience = '';
        $this->student_photo = '';
        $this->old_student_photo = '';
        $this->active_id = Active::ACTIVE->value;
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->student_photo) {

            $image = $this->student_photo;
            $filename = $this->student_photo->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_student_photo))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_student_photo));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_student_photo) {
                return $this->old_student_photo;
            } else {
                return 'no_image';
            }
        }
    }

    public function updatedphoto()
    {
        $this->validate([
            'student_photo' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
    }
    #endregion

    #region[list]
    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $this->sortField = 'id';

        return SportStudent::search($this->searches)
            ->where('sport_master_id', '=', $this->sportMaster->id)
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

//    #region[SportsMaster]
//    public $sportsMaster_id = '';
//    public $sportsMaster_name = '';
//    public Collection $sportsMasterCollection;
//    public $highlightSportsMaster = 0;
//    public $sportsMasterTyped = false;
//
//    public function decrementSportsMaster(): void
//    {
//        if ($this->highlightSportsMaster === 0) {
//            $this->highlightSportsMaster = count($this->sportsMasterCollection) - 1;
//            return;
//        }
//        $this->highlightSportsMaster--;
//    }
//
//    public function incrementSportsMaster(): void
//    {
//        if ($this->highlightSportsMaster === count($this->sportsMasterCollection) - 1) {
//            $this->highlightSportsMaster = 0;
//            return;
//        }
//        $this->highlightSportsMaster++;
//    }
//
//    public function setSportsMaster($name, $id): void
//    {
//        $this->sportsMaster_name = $name;
//        $this->sportsMaster_id = $id;
//        $this->getSportsMasterList();
//    }
//
//    public function enterSportsMaster(): void
//    {
//        $obj = $this->sportsMasterCollection[$this->highlightSportsMaster] ?? null;
//
//        $this->sportsMaster_name = '';
//        $this->sportsMasterCollection = Collection::empty();
//        $this->highlightSportsMaster = 0;
//
//        $this->sportsMaster_name = $obj['vname'] ?? '';;
//        $this->sportsMaster_id = $obj['id'] ?? '';;
//    }
//
//    #[On('refresh-sportsMaster')]
//    public function refreshSportsMaster($v): void
//    {
//        $this->sportsMaster_id = $v['id'];
//        $this->sportsMaster_name = $v['name'];
//        $this->sportsMasterTyped = false;
//
//    }
//
//    public function sportsMasterSave($name)
//    {
//        $obj = SportMaster::create([
//            'vname' => $name,
//            'active_id' => '1'
//        ]);
//        $v = ['name' => $name, 'id' => $obj->id];
//        $this->refreshCity($v);
//    }
//
//    public function getSportsMasterList(): void
//    {
//        $this->sportsMasterCollection = $this->sportsMaster_name ? SportMaster::search(trim($this->sportsMaster_name))->get() : SportMaster::all();
//    }
//    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();

        return view('livewire.sports.student')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
