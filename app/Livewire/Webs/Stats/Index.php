<?php

namespace App\Livewire\Webs\Stats;

use Aaran\Web\Models\Stats;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    #region[create]
    public function create(): void
    {
        $this->redirect(route('stats.upsert', ['0']));
    }
    #endregion

    #region[list]
    public function getList()
    {
        return Stats::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Stats::find($id);
            $this->vid = $obj->id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[delete]
    public function delete(): void
    {
        $obj=$this->getObj($this->vid);
        DB::table('stats_items')->where('stats_id', '=', $this->vid)->delete();
        $obj->delete();
        $this->showDeleteModal = false;
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.webs.stats.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
