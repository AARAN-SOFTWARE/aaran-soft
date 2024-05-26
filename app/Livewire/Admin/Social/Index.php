<?php

namespace App\Livewire\Admin\Social;

use Aaran\Sundar\Models\Mailid;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[Cashbook properties]
    public $category;
    public $email_id;
    public $password;
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->category != '') {
            if ($this->vid == "") {
                Mailid::create([
                    'category' => $this->category,
                    'email_id' => $this->email_id?:'-',
                    'vname' => $this->vname?:'-',
                    'password' => $this->password,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Mailid::find($this->vid);
                $obj->category = $this->category;
                $obj->email_id =$this->email_id;
                $obj->vname =$this->vname;
                $obj->password =$this->password;
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[Clear]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->vname = '';
        $this->category = '';
        $this->searches = '';
        $this->email_id='';
        $this->password='';
        $this->active_id = '1';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Mailid::find($id);
            $this->vid = $obj->id;
            $this->category = $obj->category;
            $this->email_id = $obj->email_id;
            $this->vname = $obj->vname;
            $this->password = $obj->password;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        return Mailid::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.admin.social.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
