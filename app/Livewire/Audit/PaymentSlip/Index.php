<?php

namespace App\Livewire\Audit\PaymentSlip;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\PaymentSlip;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    use CommonTrait;

    public mixed $slip_no = 0;

    #[Url(history: true)]
    public mixed $group = '';
    public mixed $groupFilter = '';
    public mixed $allgroup = '';
    public mixed $sender_id = '';
    public mixed $receiver_id = '';
    public mixed $due = '';
    public mixed $amount = '';
    public mixed $paid = '';
    public mixed $status = '1';
    public mixed $paidOn = '';

    public Collection $clients;
    public Collection $groups;
    public Collection $allGroups;
    public $cdate;

    public function mount()
    {

        $this->clients = Client::all();
        $this->groups = DB::table('payment_slips')->select('group')->distinct('group')
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy('group')->get();

        $this->allGroups = DB::table('payment_slips')->select('group')->distinct('group')
            ->orderBy('group')->get();
    }

    public function getSave(): string
    {
        if ($this->sender_id != '') {
            if ($this->vid == "") {
                PaymentSlip::create([
                    'slip_no' => $this->slip_no,
                    'group' => $this->group,
                    'sender_id' => $this->sender_id,
                    'receiver_id' => $this->receiver_id,
                    'due' => $this->due ?: 0,
                    'amount' => $this->amount ?: 0,
                    'paid' => $this->paid ?: 0,
                    'paidOn' => $this->paidOn ?: (Carbon::parse(Carbon::now())->format('Y-m-d')),
                    'active_id' => $this->active_id ?: '0',
                    'status' => $this->status ?: '0',
                    'user_id' => Auth::id(),
                ]);
                $message = "Saved";

            } else {
                $obj = PaymentSlip::find($this->vid);
                $obj->slip_no = $this->slip_no;
                $obj->group = $this->group;
                $obj->sender_id = $this->sender_id;
                $obj->receiver_id = $this->receiver_id;
                $obj->due = $this->due;
                $obj->amount = $this->amount;
                $obj->paid = $this->paid;
                $obj->paidOn = $this->paidOn;
                $obj->active_id = $this->active_id ?: '0';
                $obj->status = $this->status ?: '0';
                $obj->user_id = Auth::id();
                $obj->save();
                $message = "Updated";
            }
            $this->clearFields();
//            $this->js('window.location.reload()');
            return $message;
        }
        return '';
    }

    public function clearFields()
    {
        $this->group = Carbon::now()->format('Y-m-d');
        $this->slip_no = $this->serial();
        $this->sender_id = '';
        $this->receiver_id = '';
        $this->due = '';
        $this->amount = '';
        $this->paid = '';
        $this->paidOn = '';
        $this->active_id = true;
        $this->status = '';
    }

    public function serial()
    {
        $this->slip_no=PaymentSlip::where('group',$this->group)->max('slip_no') + 1;
        return $this->slip_no;
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = PaymentSlip::find($id);
            $this->vid = $obj->id;
            $this->slip_no = $obj->slip_no;
            $this->group = $obj->group;
            $this->sender_id = $obj->sender_id;
            $this->receiver_id = $obj->receiver_id;
            $this->due = $obj->due;
            $this->amount = $obj->amount;
            $this->paid = $obj->paid;
            $this->paidOn = $obj->paidOn;
            $this->active_id = $obj->active_id;
            $this->status = $obj->status;
            return $obj;
        }
        return null;
    }

    public $client_id;
    public $receive_id;
    public $activeX = '1';

    public function getList()
    {
        $this->sortField = 'slip_no';

        return PaymentSlip::search($this->searches)
//            ->where('active_id', '=', $this->activeRecord)
            ->when($this->groupFilter, function ($query, $groupFilter) {
                return $query->where('group', '=', $groupFilter);
            })
            ->when($this->client_id, function ($query, $client_id) {
                return $query->where('sender_id', '=', $client_id);
            })
            ->when($this->receive_id, function ($query, $receiver_id) {
                return $query->where('receiver_id', '=', $receiver_id);
            })
            ->when($this->cdate, function ($query, $cdate) {
                return $query->where('paidOn', '=', $cdate);
            })
            ->when($this->activeX, function ($query, $activeX) {

                if ($activeX == '1') {
                    return $query->where('active_id', '=', Active::ACTIVE);
                } else {
                    return $query->where('active_id', '=', Active::NOTACTIVE);
                }


            })
            ->when($this->allgroup, function ($query, $allgroup) {
                return $query->whereIn('group', $allgroup);
            })
            ->orderBy('group')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function makeInActive($id)
    {
        if ($id) {
            $obj = PaymentSlip::find($id);
            $obj->active_id = !$obj->active_id;
            $obj->save();
            $this->clearFields();
            $this->reRender();
        }
    }

    public function reRender(): void
    {
        $this->render();
    }

    public function reLoad()
    {
        $this->groupFilter = '';
        $this->allgroup = '';
        $this->cdate = '';
        $this->client_id = '';
        $this->receive_id = '';
        $this->activeX = '';
    }

    public function render()
    {
        return view('livewire.audit.payment-slip.index')->with([
            'list' => $this->getList()
        ]);
    }
}
