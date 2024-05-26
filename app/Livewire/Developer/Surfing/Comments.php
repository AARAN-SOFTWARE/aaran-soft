<?php

namespace App\Livewire\Developer\Surfing;

use Aaran\Developer\Models\surfing;
use Aaran\Developer\Models\SurfingReply;
use App\Enums\Active;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{

    use CommonTrait;

    #region[properties]
    public $webpage;
    public $surfing_category_id;
    public $surfing_category_name;
    public $surfing_id;
    public $title;
    public $replies;
    public $reply;
    public $verified;
    public $verified_on;
    #endregion
    #region[save]

    #region[Mount]
    public function mount($id): void
    {
        $this->getData($id);

        $this->replies = SurfingReply::where('surfing_id', $id)->get();
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->reply) {
            if ($this->surfing_id) {
                if ($this->vid == "") {

                    SurfingReply::create([
                        'surfing_id' => $this->surfing_id,
                        'vname' => $this->reply,
                        'verified' => $this->verified,
                        'verified_on' => $this->verified_on,
                        'user_id' => Auth::user()->id,
                    ]);
                }else{
                    $obj = SurfingReply::find($this->vid);
                    $obj->surfing_id = $this->surfing_id;
                    $obj->vname = $this->reply;
                    $obj->verified = $this->verified;
                    $obj->verified_on = $this->verified_on;
                    $obj->user_id = Auth::user()->id;
                    $obj->save();
                }
                $this->clearFields();

            }
        }
        redirect()->to(route('surfing.comments', [$this->surfing_id]));

        return '';
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->reply = '';
        $this->verified_on = '';
        $this->verified = '';
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SurfingReply::find($id);
            $this->vid = $obj->id;
            $this->reply = $obj->vname;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[get Obj]
    public function getData($id)
    {
        if ($id) {

            $obj = surfing::find($id);
            $this->surfing_id = $obj->id;
            $this->title = $obj->vname;
            $this->webpage = $obj->webpage;
            $this->surfing_category_id = $obj->surfing_category_id;
            $this->surfing_category_name=$obj->surfingCategory($obj->surfing_category_id);
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[Render]
    public function getRoute(): void
    {
        $this->redirect(route('surfing'));
    }

    public function render()
    {
        return view('livewire.developer.surfing.comments');
    }
    #endregion
}
