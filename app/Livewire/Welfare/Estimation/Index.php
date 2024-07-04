<?php

namespace App\Livewire\Welfare\Estimation;

use Aaran\Welfare\Models\Project;
use Aaran\Welfare\Models\ProjectEstimation;
use Aaran\Welfare\Models\ProjectProduct;
use Aaran\Welfare\Models\ProjectSegment;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
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
                ProjectEstimation::create([
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
                $obj = ProjectEstimation::find($this->vid);
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
            $obj = ProjectEstimation::find($id);
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
        return ProjectEstimation::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
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
        return view('livewire.welfare.estimation.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
