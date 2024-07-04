<?php

namespace App\Livewire\Welfare\Final;

use Aaran\Welfare\Models\Project;
use Aaran\Welfare\Models\ProjectFinal;
use Aaran\Welfare\Models\ProjectProduct;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    #region[property]
    use CommonTrait;
    public $project_product;
    public $project_product_id;
    public $projects_id;
    public $projects;

    public $qty=0;
    public $rate=0;
    public $amount=0;
    public $byProject;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->project_product=ProjectProduct::all();
        $this->projects=Project::all();
    }
    #endregion

    #region[save]
    public function getSave(): string
    {
        if ($this->projects_id != '') {
            if ($this->vid == "") {
                ProjectFinal::create([
                    'projects_id'=>$this->projects_id,
                    'project_product_id'=>$this->project_product_id,
                    'qty'=>$this->qty,
                    'rate'=>$this->rate,
                    'amount'=>$this->amount,
                    'entry_id'=>auth()->id(),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = ProjectFinal::find($this->vid);
                $obj->projects_id=$this->projects_id;
                $obj->project_product_id = $this->project_product_id;
                $obj->qty = $this->qty;
                $obj->rate = $this->rate;
                $obj->amount = $this->amount;
                $obj->entry_id = auth()->id();
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion


    #region[clearFields]
    public function clearFields()
    {
        $this->vid='';
        $this->projects_id='';
        $this->project_product_id='';
        $this->qty=0;
        $this->rate=0;
        $this->amount=0;
        $this->active_id = 1;
    }
    public function calculate():void
    {
        $this->amount=$this->qty*$this->rate;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ProjectFinal::find($id);
            $this->vid = $obj->id;
            $this->projects_id = $obj->projects_id;
            $this->project_product_id = $obj->project_product_id;
            $this->qty = $obj->qty;
            $this->rate = $obj->rate;
            $this->amount = $obj->amount;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]

    public function getList()
    {
        $this->sortField='id';
        return ProjectFinal::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->byProject,function ($query,$byProject){
                return $query->where('projects_id','=',$byProject);
            })
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
        return view('livewire.welfare.final.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
