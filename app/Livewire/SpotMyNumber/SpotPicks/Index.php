<?php

namespace App\Livewire\SpotMyNumber\SpotPicks;

use Aaran\SpotMyNumber\Models\SpotPic;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    use CommonTrait;
    #region[properties]
    public $spot_customer_id;
    public $title;
    public $pic_name;
    public $old_pic_name;
    public $desc;
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
                SpotPic::create([
                    'spot_customer_id' => $this->spot_customer_id,
                    'title' => $this->title,
                    'pic_name' => $this->orginalName($this->pic_name),
                    'desc' => $this->desc,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = SpotPic::find($this->vid);
                $obj->spot_customer_id = $this->spot_customer_id;
                $obj->title = $this->title;
                if ($obj->pic_name != $this->old_pic_name) {
                    $obj->pic_name = $this->orginalName($this->pic_name);
                }else{
                    $obj->pic_name = $this->old_pic_name;
                }
                $obj->desc = $this->desc;
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
            $obj = SpotPic::find($id);
            $this->vid = $obj->id;
            $this->spot_customer_id = $obj->spot_customer_id;
            $this->title = $obj->title;
            $this->old_pic_name = $obj->pic_name;
            $this->desc = $obj->desc;
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
        $this->pic_name='';
        $this->desc='';
        $this->old_pic_name='';
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
        return SpotPic::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('spot_customer_id','=',$this->spot_customer_id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.spot-my-number.spot-picks.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
