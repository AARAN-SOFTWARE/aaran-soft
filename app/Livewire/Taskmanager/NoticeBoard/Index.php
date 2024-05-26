<?php

namespace App\Livewire\Taskmanager\NoticeBoard;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\NoticeBoard;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[properties]
    public mixed $cdate = '';
    public mixed $client_id = '';
    public string $remarks = '';
    public string $priority = '';
    public Collection $dates;
    public Collection $clients;
    public $verified;
    public $verified_on;
    #endregion

    #region[Mount]
    public function mount()
    {
        $this->dates = DB::table('notice_boards')->select('cdate','created_at')
            ->distinct('cdate')->limit(3)->orderBy('created_at', 'desc')->get();
        $this->clients = Client::where('active_id','=', Active::ACTIVE)->get();
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                NoticeBoard::create([
                    'cdate' => $this->cdate ?: (Carbon::parse(Carbon::now())->format('Y-m-d')),
                    'client_id' => $this->client_id,
                    'vname' => $this->vname,
                    'remarks' => $this->remarks,
                    'verified' => $this->verified,
                    'verified_on' => $this->verified_on,
                    'active_id' => $this->active_id ?: '0',
                    'user_id' => Auth::id(),
                    'priority' => $this->priority
                ]);
                $message = "Saved";

            } else {
                $obj = NoticeBoard::find($this->vid);
                $obj->cdate = $this->cdate ?: (Carbon::parse(Carbon::now())->format('Y-m-d'));
                $obj->client_id = $this->client_id;
                $obj->vname = $this->vname;
                $obj->remarks = $this->remarks;
                $obj->verified = $this->verified;
                $obj->verified_on = $this->verified_on;
                $obj->active_id = $this->active_id ?: '0';
                $obj->user_id = Auth::id();
                $obj->priority = $this->priority;
                $obj->save();
                $message = "Updated";
            }
            $this->clearFields();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion
    #region[clear field]
    public function clearFields()
    {
        $this->cdate = '';
        $this->client_id = '';
        $this->vname = '';
        $this->verified = '';
        $this->vid='';
        $this->active_id = '1';
        $this->verified_on = '';
        $this->remarks = '';
        $this->priority = '';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = NoticeBoard::find($id);
            $this->vid = $obj->id;
            $this->cdate = $obj->cdate;
            $this->client_id = $obj->client_id;
            $this->vname = $obj->vname;
            $this->remarks = $obj->remarks;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            $this->active_id = $obj->active_id;
            $this->priority = $obj->priority;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'priority';

        if ($this->cdate) {
            return NoticeBoard::search($this->searches)
                ->whereDate('cdate', '=', $this->cdate)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        } else {
            return NoticeBoard::search($this->searches)
                ->where('active_id', '=', $this->activeRecord)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        }
    }
    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.taskmanager.notice-board.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
