<?php

namespace App\Livewire\Audit\PaymentSlip;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\PaymentSlip;
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
            $this->js('window.location.reload()');
            return $message;
        }
        return '';
    }

    public function clearFields()
    {
        $this->slip_no = 0;
            $this->group = '';
        $this->sender_id = '';
        $this->receiver_id = '';
        $this->due = '';
        $this->amount = '';
        $this->paid = '';
        $this->paidOn = '';
        $this->active_id = true;
        $this->status = '';
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
    public $activeX = '';

    public function getList()
    {
        $this->sortField = 'slip_no';

        if ($this->cdate) {
            return PaymentSlip::search($this->searches)
                ->whereDate('paidOn', '=', $this->cdate)
                ->where('active_id', '=', $this->activeRecord)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        } elseif ($this->group) {
            return PaymentSlip::search($this->searches)
                ->where('group', '=', $this->group)
                ->where('active_id', '=', $this->activeRecord)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        } elseif ($this->allgroup) {
            return PaymentSlip::search($this->searches)
                ->where('group', '=', $this->allgroup)
                ->orderBy('group')
                ->orderBy('slip_no')
                ->paginate($this->perPage);
        } elseif ($this->client_id) {

            if ($this->receive_id) {
                return PaymentSlip::search($this->searches)
                    ->where('sender_id', '=', $this->client_id)
                    ->where('active_id', '=', $this->activeRecord)
                    ->where('receiver_id', '=', $this->receive_id)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
            } else {
                return PaymentSlip::search($this->searches)
                    ->where('sender_id', '=', $this->client_id)
                    ->where('active_id', '=', $this->activeRecord)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
            }

        } elseif ($this->activeX == '0') {
            return PaymentSlip::search($this->searches)
                ->where('active_id', '=', $this->activeX)
                ->orderBy('group')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        }
        return PaymentSlip::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender(): void
    {
        $this->render();
    }

    public function reLoad()
    {
        $this->group = '';
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
