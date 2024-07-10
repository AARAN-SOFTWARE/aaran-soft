<?php

namespace App\Livewire\SpotMyNumber\SpotBios;

use Aaran\SpotMyNumber\Models\SpotBio;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    use CommonTrait;
    #region[properties]
    public $spot_customer_id;
    public $title;
    public $slogan;
    public $pic;
    public $old_pic;
    public $body_1;
    public $body_2;
    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->spot_customer_id = $id;
    }
    #endregion

    #region[save]
    public function getSave(): void
    {


        if ($this->spot_customer_id != '') {
            if ($this->vid == "") {
                SpotBio::create([
                    'spot_customer_id' => $this->spot_customer_id,
                    'title' => Str::ucfirst($this->title),
                    'slogan'=>$this->slogan,
                    'body_1'=>$this->body_1,
                    'body_2'=>$this->body_2,
                    'pic' => $this->orginalName($this->pic),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = SpotBio::find($this->vid);
                $obj->spot_customer_id = $this->spot_customer_id;
                $obj->title = $this->title;
                $obj->slogan = $this->slogan;
                $obj->body_1 = $this->body_1;
                $obj->body_2 = $this->body_2;
                if ($obj->pic != $this->old_pic) {
                    $obj->pic = $this->orginalName($this->pic);
                }else{
                    $obj->pic = $this->old_pic;
                }
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SpotBio::find($id);
            $this->vid = $obj->id;
            $this->spot_customer_id = $obj->spot_customer_id;
            $this->title = $obj->title;
            $this->slogan = $obj->slogan;
            $this->body_1 = $obj->body_1;
            $this->body_2 = $obj->body_2;
            $this->old_pic = $obj->pic;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vid='';
        $this->title='';
        $this->slogan='';
        $this->body_1='';
        $this->body_2='';
        $this->pic='';
        $this->old_pic='';
        $this->active_id=1;
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

    #region[list]
    public function getList()
    {
        $this->sortField='title';
        return SpotBio::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('spot_customer_id','=',$this->spot_customer_id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]

    public function render()
    {
        return view('livewire.spot-my-number.spot-bios.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
