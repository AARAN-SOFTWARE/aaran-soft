<?php

namespace App\Livewire\Dashboard\welfare;

use Aaran\Aadmin\Src\DbMigration;
use Aaran\Entries\Models\Payment;
use Aaran\Entries\Models\Purchase;
use Aaran\Entries\Models\Receipt;
use Aaran\Entries\Models\Sale;
use Aaran\Welfare\Models\ProjectShare;
use App\Helper\ConvertTo;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class  ProjectSnippet extends Component
{
    use CommonTrait;

    #region[list]
    public function getList()
    {
        return ProjectShare::select(
            'project_shares.*',
            'projects.vname as project_name',
            'projects.description as project_description',
            'project_segments.vname as project_segment_name',
        )
            ->join('projects', 'projects.id', '=', 'project_shares.project_id')
            ->join('project_segments', 'project_segments.id', '=', 'projects.project_segment_id')
            ->where('projects.active_id', '=', $this->activeRecord)
            ->get();
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.dashboard.welfare.project-snippet')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
