<?php

namespace App\Livewire\Entries\Sales;

use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Order;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[sale properties]
    public $byOrder;
    public Collection $contacts;
    public Collection $orders;
    public $sortField_1='invoice_no';
    #endregion

    #region[create]
    public function create(): void
    {
        $this->redirect(route('sales.upsert', ['0']));
    }
    #endregion

    #region[list]
    public function getList()
    {
        return Sale::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->start_date,function ($query,$start_date){
                return $query->whereDate('invoice_date','>=',$start_date);
            })
            ->when($this->end_date,function ($query,$end_date){
                return $query->whereDate('invoice_date','<=',$end_date);
            })
            ->when($this->filter,function ($query,$filter){
                return $query->where('contact_id',$filter);
            })
            ->where('company_id', '=',  session()->get('company_id'))
            ->where('acyear', '=',  session()->get('acyear'))
            ->orderBy($this->sortField_1, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[sort]
    public function sortBy($field): void
    {
        if ($this->sortField_1=== $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    #endregion

    #region[delete]
    public function delete(): void
    {
        $obj=$this->getObj($this->vid);
        DB::table('saleitems')->where('sale_id', '=', $this->vid)->delete();
        $obj->delete();
        $this->showDeleteModal = false;
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Sale::find($id);
            $this->vid = $obj->id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[print]
    public function print($id)
    {

        $this->redirect(route('sales.print', [Sale::find($id)]));
    }
    #endregion

    #region[contact]
    public function getContact()
    {
        $this->contacts=Contact::where('company_id','=',session()->get('company_id'))->get();

    }
    #endregion

#region[render]
    public function render()
    {
        $this->getContact();
        return view('livewire.entries.sales.index')
            ->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
