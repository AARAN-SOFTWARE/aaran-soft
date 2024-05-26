<?php

namespace App\Livewire\Master\Company;

use Aaran\Master\Models\Company;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[create]
    public function create():void
    {
        $this->redirect(route("companies.upsert", ['0']));
    }
    #endregion

    #region[list]
    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $this->sortField = 'id';

        return Company::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('tenant_id', '=', session()->get('tenant_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[delete]
    public function set_delete($id): void
    {
        $obj=Company::find($id);
        $obj->delete();
    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.master.company.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
