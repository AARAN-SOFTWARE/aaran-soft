<?php

namespace App\Livewire\Accounts\Cashbook;

use Aaran\Accounts\Models\Cashbook;
use Aaran\Master\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #region[Cashbook properties]
    public $id;
    public $perPage = 50;
    public $sortField = 'id';
    public $sortAsc = true;
    public $searches = '';

    public $vdate = '';
    public $vid = '';
    public $showDeleteModal = false;
    public $vmode = '';
    public string $remarks = '';
    public $cashbill_id = null;
    public string $paidby = '';
    public float $receipt = 0;
    public float $payment = 0;
    public float $balance = 0;

    public Collection $orders;
    public $showEditModal = false;
    public $showEditModal_1 = false;
    public $openingBalance = 0;
    public $approved;
    public $status_id;
    public $user_id;
    public $active_id;
    public $acyear;

    public $order_id = '';
    public $order_no = '';
    public Collection $orderCollection;
    public $highlightOrder = 0;
    public $orderTyped = false;

    #endregion

    #region[Create]
    public function create(): void
    {
        $this->showEditModal = !$this->showEditModal;
        $this->mount();
        $this->vmode = "Payment";

    }

    public function create_receipt(): void
    {
        $this->showEditModal = !$this->showEditModal;
        $this->mount();
        $this->vmode = "Receipt";

    }
    #endregion

    #region[Edit]
    public function edit($id)
    {
        $obj = Cashbook::find($id);
        if ($obj->vmode == 'Receipt') {
            $this->getobj($id);
            $this->create_receipt();
        } else {
            $this->getobj($id);
            $this->create();
        }
    }
    #endregion

    #region[Mount]
    public function mount()
    {
        $this->vdate = Carbon::parse(Carbon::now())->format('Y-m-d');

    }
    #endregion

    #region[Update]
    private function update()
    {
        $obj = Cashbook::find($this->vid);
        if ($obj->order_id != 0) {

            $obj->order_id = $this->order_id;
        }
        $obj->vdate = $this->vdate;
        $obj->acyear = $this->acyear;
        $obj->vmode = $this->vmode;
        $obj->cashbill_id = $this->cashbill_id;
        $obj->paidby = $this->paidby;
        $obj->receipt = $this->receipt;
        $obj->payment = $this->payment;
        $obj->balance = ($this->openingBalance + $this->receipt) - $this->payment;
        $obj->approved = $this->approved;
        $obj->remarks = $this->remarks;
        $obj->company_id = session()->get('company_id');
        $obj->status_id = $this->status_id;
        $obj->user_id = Auth::id();
        $obj->active_id = $this->active_id;
        $obj->save();
        $this->reTotal();
        session()->flash('success', '"'.$this->vmode.'"  has been updated.');
    }
    #endregion

    #region[get Obj]
    public  function getObj($id)
    {
        if ($id) {
            $obj = Cashbook::find($id);
            $this->vid = $obj->id;
            $this->vmode = $obj->vmode;
            if ($obj->order_id != 0) {
                $this->order_id = $obj->order_id;
                $this->order_no = $obj->order->vname;
            }
            $this->vdate = $obj->vdate;
            $this->acyear = $obj->acyear;
            $this->cashbill_id = $obj->cashbill_id;
            $this->paidby = $obj->paidby;
            $this->receipt = $obj->receipt;
            $this->payment = $obj->payment;
            $this->balance = $obj->balance;
            $this->approved = $obj->approved;
            $this->remarks = $obj->remarks;
            $this->status_id = $obj->status_id;
        }
    }
    #endregion

    #region[Sort]
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
    #endregion

    #region[Re total]
    public function reTotal()
    {
        $count = Cashbook::count();

        $receipt = 0;
        $payment = 0;

        for ($i = 1; $i < $count + 1; $i++) {

            $cashbook = Cashbook::find($i);

            if ($cashbook) {

                if ($cashbook->receipt != null) {
                    $receipt += $cashbook->receipt;
                } else {
                    $receipt += 0;
                }

                if ($cashbook->payment != null) {
                    $payment += $cashbook->payment;
                } else {
                    $payment += 0;
                }

                $balance = $receipt - $payment;

                $cashbook->balance = $balance;
                $cashbook->save();
            }
        }

        return redirect()->to(route('cashbooks'));

    }
    #endregion

    #region[Order]
    public function decrementOrder(): void
    {
        if ($this->highlightOrder === 0) {
            $this->highlightOrder = count($this->orderCollection) - 1;
            return;
        }
        $this->highlightOrder--;
    }

    public function incrementOrder(): void
    {
        if ($this->highlightOrder === count($this->orderCollection) - 1) {
            $this->highlightOrder = 0;
            return;
        }
        $this->highlightOrder++;
    }

    public function enterOrder(): void
    {
        $obj = $this->orderCollection[$this->highlightOrder] ?? null;

        $this->order_no = '';
        $this->orderCollection = Collection::empty();
        $this->highlightOrder = 0;

        $this->order_no = $obj['vname'] ?? '';;
        $this->order_id = $obj['id'] ?? '';;
    }

    public function setOrder($name, $id): void
    {
        $this->order_no = $name;
        $this->order_id = $id;
        $this->getOrderList();
    }

    #[On('refresh-order')]
    public function refreshOrder($v): void
    {
        $this->order_id = $v['id'];
        $this->order_no = $v['name'];
        $this->orderTyped = false;

    }

    public function getOrderList(): void
    {
        $this->orderCollection = $this->order_no ? Order::search(trim($this->order_no))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Order::where('company_id', '=', session()->get('company_id'))->get();
    }
    #endregion

    #region[Delete]

    public function getDelete($id)
    {
        if ($id) {
            $this->getObj($id);
            $this->showDeleteModal = true;
        }
    }

    public function delete($id)
    {
        $obj = Cashbook::find($id);
        $obj->delete();
        $this->showDeleteModal = false;
        return redirect()->to(route('cashbooks'));
    }
    #endregion

    #region[Back]
    public function goBack()
    {
        $this->clearFields();
        return redirect()->to(route('cashbooks'));
    }
    #endregion

    #region[Submit]
    public function goSubmit()
    {

        if ($this->vid) {
            $this->update();
        } else {
            $this->save();
        }
        $this->clearFields();
        return redirect()->to(route('cashbooks'));
    }
    #endregion

    #region[Clear Fields]
    public function clearFields()
    {
        $this->vmode = '';
        $this->order_id = '';
        $this->vdate = '';
        $this->cashbill_id = '';
        $this->paidby = '';
        $this->receipt = 0;
        $this->payment = 0;
    }
    #endregion

    #region[Save]
    private function save()
    {
        $this->findBalance();

        if ($this->vdate == null) {
            $this->vdate = Carbon::now();
        }

        if ($this->payment == null) {
            $this->payment = 0;
        }

        if ($this->receipt == null) {
            $this->receipt = 0;
        }

        if ($this->order_id == null) {
            $this->order_id = null;
        }

        if ($this->cashbill_id == null) {
            $this->cashbill_id = null;
        }

        Cashbook::create([
            'acyear' => session()->get('acyear'),
            'company_id' => session()->get('company_id'),
            'vmode' => $this->vmode,
            'order_id' => $this->order_id,
            'vdate' => $this->vdate,
            'cashbill_id' => $this->cashbill_id,
            'paidby' => $this->paidby,
            'receipt' => $this->receipt,
            'payment' => $this->payment,
            'balance' => ($this->balance + $this->receipt) - $this->payment,
            'approved' => "0",
            'remarks' => $this->remarks,
            'status_id' => '1',
            'user_id' => Auth::id(),
            'active_id' => '1',
        ]);

        if ($this->cashbill_id) {
            $this->setStatus();
        }

        session()->flash('success', '"'.$this->vmode.'"  has been Saved.');
    }
    #endregion

    #region[Find]
    private function findBalance()
    {
        $receipt = Cashbook::sum('receipt');
        $payment = Cashbook::sum('payment');

        $this->balance = $receipt - $payment;

    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getOrderList();

        return view('livewire.accounts.cashbook.index', [
            'list' => Cashbook::search($this->searches)
                ->where('company_id', '=', session()->get('company_id'))
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
    #endregion
}
