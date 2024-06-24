<?php

namespace App\Livewire\Sundar\Credit;

use Aaran\Sundar\Models\Credit\CreditBook;
use Aaran\Sundar\Models\Credit\CreditMember;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Cbook extends Component
{
    use CommonTrait;

    public string $closing = '';
    public $credit_member;


    public function mount($id)
    {
        $this->credit_member = CreditMember::find($id);
    }

    #region[Save]
    public function getSave(): string
    {

        if ($this->vname !== '') {
            if ($this->vid == "") {
                CreditBook::create([
                    'credit_member_id' => $this->credit_member->id,
                    'vname' => Str::upper($this->vname),
                    'closing' => $this->closing,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = CreditBook::find($this->vid);
                $obj->credit_member_id = $this->credit_member->id;
                $obj->vname = Str::upper($this->vname);
                $obj->closing = $this->closing;
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->clearFields();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }

    public function clearFields(): void
    {
        $this->vname = '';
        $this->closing = '';
        $this->active_id = true;

    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = CreditBook::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->closing = $obj->closing;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        return CreditBook::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('credit_member_id', '=', $this->credit_member->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]

    public function render()
    {
        return view('livewire.sundar.credit.cbook')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
