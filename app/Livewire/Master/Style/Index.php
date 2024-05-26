<?php

namespace App\Livewire\Master\Style;

use Aaran\Master\Models\Style;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public string $desc = '';

    #region[save]
    public function getSave(): string
    {
            if ($this->vname != '') {

                if ($this->vid == "") {
                    Style::create([
                        'vname' => Str::upper($this->vname),
                        'desc' => Str::ucfirst($this->desc),
                        'company_id' => session()->get('company_id'),
                        'active_id' => $this->active_id,
                    ]);
                    $message = "Saved";

                } else {
                    $obj = Style::find($this->vid);
                    $obj->vname = Str::upper($this->vname);
                    $obj->desc = Str::ucfirst($this->desc);
                    $obj->company_id = session()->get('company_id');
                    $obj->active_id = $this->active_id ?: '0';
                    $obj->save();
                    $message = "Updated";
                }
                $this->desc = '';
                $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
            }
        return '';
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Style::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->desc = $obj->desc;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField = 'id';

        return Style::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.master.style.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
