<?php

namespace App\Livewire\Sports\Club;

use Aaran\SportsClub\Models\SportClub;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{

    use CommonTrait;

    use WithFileUploads;

    public string $lname;
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
    public string $club_photo;
    public string $old_club_photo;

    public function getSave()
    {
        if ($this->vname != ''){
            if ($this->vid == ""){
                $obj = SportClub :: create([
                    'vname' => $this->vname,
                    'lname' => $this->lname,
                    'master_name' => $this->master_name,
                    'mobile' => $this->mobile,
                    'whatsapp' => $this->whatsapp,
                    'email' => $this->email,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city' => $this->city,
                    'state' => $this->state,
                    'pincode' => $this->pincode,
                    'started_at' => $this->started_at,
                    'club_photo' => $this->saveImage(),
                    'active_id' => $this->active_id ? 1: 0,
                    'user_id' => auth()->id()
                ]);
            } else {
                $obj = SportClub::find($this->vid);
                $obj->vname = $this->vname;
                $obj->lname = $this->lname;
                $obj->master_name = $this->master_name;
                $obj->mobile = $this->mobile;
                $obj->whatsapp = $this->whatsapp;
                $obj->email = $this->email;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->city = $this->city;
                $obj->state = $this->state;
                $obj->pincode = $this->pincode;
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
         $this->lname = $obj->lname;
         $this->master_name = $obj->master_name;
         $this->mobile = $obj->mobile;
         $this->whatsapp = $obj->whatsapp;
         $this->email = $obj->email;
         $this->address_1 = $obj->address_1;
         $this->address_2 = $obj->address_2;
         $this->city = $obj->city;
         $this->state = $obj->state;
         $this->pincode = $obj->pincode;
         $this->started_at = $obj->started_at;
         $this->club_photo = $this->saveImage();
         $this->active_id = $obj->active_id;
     }
    }

    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->lname = '';
        $this->master_name = '';
        $this->mobile = '';
        $this->whatsapp = '';
        $this->email = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->city = '';
        $this->state = '';
        $this->pincode = '';
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


    public function render()
    {
        return view('livewire.sports.club.index')->with([
            'list' => $this->getList()
        ]);
    }
}
