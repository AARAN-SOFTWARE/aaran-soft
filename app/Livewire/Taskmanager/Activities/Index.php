<?php

namespace App\Livewire\Taskmanager\Activities;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Activities;
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
    public mixed $duration = '';
    public mixed $channel = '';
    public string $remarks = '';
    public Collection $clients;
    public Collection $dates;
    public $verified;
    public $verified_on;
    #endregion

    #region[Mount]
    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->dates = DB::table('activities')->select('cdate', 'created_at')->distinct('cdate')
            ->limit(3)->orderBy('created_at', 'desc')->get();
        $this->clients = Client::where('active_id', '=', Active::ACTIVE)->get();
    }
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Activities::create([
                    'user_id' => Auth::id(),
                    'cdate' => $this->cdate,
                    'vname' => $this->vname,
                    'client_id' => $this->client_id,
                    'duration' => $this->duration,
                    'channel' => $this->channel,
                    'verified' => $this->verified ?: '-',
                    'verified_on' => $this->verified_on ?: '-',
                    'remarks' => $this->remarks,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Activities::find($this->vid);
                $obj->user_id = Auth::id();
                $obj->cdate = $this->cdate;
                $obj->vname = $this->vname;
                $obj->client_id = $this->client_id;
                $obj->duration = $this->duration;
                $obj->channel = $this->channel;
                $obj->remarks = $this->remarks;
                $obj->verified = $this->verified ?: '-';
                $obj->verified_on = $this->verified_on ?: '-';
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
           $this->clearFields();
            $this->reRender();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion
    #region[clear field]
    public function clearFields()
    {
        $this->client_id = '';
        $this->vname = '';
        $this->remarks = '';
        $this->duration = '';
        $this->vid='';
        $this->verified = '';
        $this->active_id = '1';
        $this->verified_on = '';
        $this->channel = '';
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Activities::find($id);
            $this->vid = $obj->id;
            $this->cdate = $obj->cdate;
            $this->vname = $obj->vname;
            $this->client_id = $obj->client_id;
            $this->duration = $obj->duration;
            $this->channel = $obj->channel;
            $this->verified = $obj->verified;
            $this->verified_on = $obj->verified_on;
            $this->remarks = $obj->remarks;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'created_at';

        return Activities::search($this->searches)
            ->whereDate('cdate', '=', $this->cdate)
            ->where('user_id', '=', Auth::id())
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.taskmanager.activities.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
