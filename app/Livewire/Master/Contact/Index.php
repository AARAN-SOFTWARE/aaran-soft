<?php

namespace App\Livewire\Master\Contact;


use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    public $contactType='';

    #region[create]
    public function create():void
    {
        $this->redirect(route("contacts.upsert", ['0']));
    }
    #endregion

    #region[list]
    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Contact::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->contactType,function ($query,$contactType){
                return $query->where('contact_type','=', round($contactType));
            })
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[delete]
    public function delete(): void
    {
        $obj= $this->getObj($this->vid);
        DB::table('contact_details')->where('contact_id', '=', $this->vid)->delete();
        $obj->delete();
        $this->showDeleteModal = false;
    }
    #endregion
    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Contact::find($id);
            $this->vid = $obj->id;
            return $obj;
        }
        return null;
    }

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.master.contact.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
