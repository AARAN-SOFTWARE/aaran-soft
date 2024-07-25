<?php

namespace App\Livewire\Sports\Web;

use Aaran\SportsClub\Models\SportContact;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Contact extends Component
{
    use CommonTrait;
    #region[properties]
    public string $vname_2 = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';
    #endregion

    #region[save]
    public function getSave(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $this->validate(['vname' => 'required']);
                SportContact::create([
                    'vname' => Str::ucfirst($this->vname.''.$this->vname_2),
                    'email' => $this->email,
                    'subject' => $this->subject,
                    'message' => $this->message,
                ]);
                $message = "Saved";
                $this->clearFields();
            } else {
                $obj = SportContact::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname).''.$this->vname_2;
                $obj->email = $this->email;
                $obj->subject = $this->subject;
                $obj->message = $this->message;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->vname = '';
        $this->vname_2 = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SportContact::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->email = $obj->email;
            $this->subject = $obj->subject;
            $this->message = $obj->message;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        return SportContact::search($this->searches)
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
        return view('livewire.sports.web.contact')->layout('layouts.web')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
