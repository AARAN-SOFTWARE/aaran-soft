<?php

namespace App\Livewire\Entries\Payment;

use Aaran\Common\Models\Bank;
use Aaran\Common\Models\Receipttype;
use Aaran\Entries\Models\Payment;
use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Upsert extends Component
{
    use CommonTrait;

    #region[Properties]
    public $contact_id = '';
    public $contact_name = '';
    public Collection $contactCollection;
    public $highlightContact = 0;
    public $contactTyped = false;

    public $receipttype_id = '';
    public $receipttype_name = '';
    public Collection $receipttypeCollection;
    public $highlightReceipttype = 0;
    public $receipttypeTyped = false;

    public $bank_id = '';
    public $bank_name = '';
    public Collection $bankCollection;
    public $highlightBank = 0;
    public $bankTyped = false;

    public string $company;
    public string $contact;
    public string $bank;
    public string $receipttype;
    public string $acyear = '';
    public string $vid = '';
    public string $vdate = '';
    public string $chq_no = '';
    public string $payment_amount = '';
    public string $chq_date = '';
    public $list = [];
    public string $receipt_id = "";
    public string $againstby = "";

    public string $vno = "";
    public string $vamount = "";
    public string $ramount = "";
    public string $total_vamount = "";
    public string $total_ramount = "";
    #endregion

    #region[Contact]
    public function decrementContact(): void
    {
        if ($this->highlightContact === 0) {
            $this->highlightContact = count($this->contactCollection) - 1;
            return;
        }
        $this->highlightContact--;
    }

    public function incrementContact(): void
    {
        if ($this->highlightContact === count($this->contactCollection) - 1) {
            $this->highlightContact = 0;
            return;
        }
        $this->highlightContact++;
    }

    public function setContact($name, $id): void
    {
        $this->contact_name = $name;
        $this->contact_id = $id;
        $this->getContactList();
    }

    public function enterContact(): void
    {
        $obj = $this->contactCollection[$this->highlightContact] ?? null;

        $this->contact_name = '';
        $this->contactCollection = Collection::empty();
        $this->highlightContact = 0;

        $this->contact_name = $obj['vname'] ?? '';
        $this->contact_id = $obj['id'] ?? '';
    }

    #[On('refresh-contact')]
    public function refreshContact($v): void
    {
        $this->contact_id = $v['id'];
        $this->contact_name = $v['name'];
        $this->contactTyped = false;

    }
    #endregion

    #region[List]
    public function getContactList(): void
    {
        $this->contactCollection = $this->contact_name ? Contact::search(trim($this->contact_name))->where('company_id', '=',
            session()->get('company_id'))->get() : Contact::all()->where('company_id','=',session()->get('company_id'));
    }
    #endregion

    #region[Receipt]
    public function decrementReceipttype(): void
    {
        if ($this->highlightReceipttype === 0) {
            $this->highlightReceipttype = count($this->receipttypeCollection) - 1;
            return;
        }
        $this->highlightReceipttype--;
    }

    public function incrementReceipttype(): void
    {
        if ($this->highlightReceipttype === count($this->receipttypeCollection) - 1) {
            $this->highlightReceipttype = 0;
            return;
        }
        $this->highlightReceipttype++;
    }

    public function setReceipttype($name, $id): void
    {
        $this->receipttype_name = $name;
        $this->receipttype_id = $id;
        $this->getReceipttypeList();
    }

    public function enterReceipttype(): void
    {
        $obj = $this->receipttypeCollection[$this->highlightReceipttype] ?? null;

        $this->receipttype_name = '';
        $this->receipttypeCollection = Collection::empty();
        $this->highlightReceipttype = 0;

        $this->receipttype_name = $obj['vname'] ?? '';
        $this->receipttype_id = $obj['id'] ?? '';
    }

    #[On('refresh-receipttype')]
    public function refreshReceipttype($v): void
    {
        $this->receipttype_id = $v['id'];
        $this->receipttype_name = $v['name'];
        $this->receipttypeTyped = false;

    }

    public function getReceipttypeList(): void
    {
        $this->receipttypeCollection = $this->receipttype_name ? Receipttype::search(trim($this->receipttype_name))
            ->get() : Receipttype::all();
    }
    #endregion

    #region[Bank]
    public function decrementBank(): void
    {
        if ($this->highlightBank === 0) {
            $this->highlightBank = count($this->bankCollection) - 1;
            return;
        }
        $this->highlightBank--;
    }

    public function incrementBank(): void
    {
        if ($this->highlightBank === count($this->bankCollection) - 1) {
            $this->highlightBank = 0;
            return;
        }
        $this->highlightBank++;
    }

    public function setBank($name, $id): void
    {
        $this->bank_name = $name;
        $this->bank_id = $id;
        $this->getBankList();
    }

    public function enterBank(): void
    {
        $obj = $this->bankCollection[$this->highlightBank] ?? null;

        $this->bank_name = '';
        $this->bankCollection = Collection::empty();
        $this->highlightBank = 0;

        $this->bank_name = $obj['vname'] ?? '';
        $this->bank_id = $obj['id'] ?? '';
    }

    #[On('refresh-bank')]
    public function refreshBank($v): void
    {
        $this->bank_id = $v['id'];
        $this->bank_name = $v['name'];
        $this->bankTyped = false;
    }

    public function getBankList(): void
    {
        $this->bankCollection = $this->bank_name ? Bank::search(trim($this->bank_name))
            ->get() : Bank::all();
    }
    #endregion

    #region[Mount]
    public function mount($id)
    {
        $this->vdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        if ($id!= 0) {
            $obj = Payment::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->receipttype_id = $obj->receipttype_id;
            $this->receipttype_name = $obj->receipttype->vname;
            $this->chq_no = $obj->chq_no;
            $this->chq_date = $obj->chq_date;
            $this->bank_id = $obj->bank_id;
            $this->bank_name= $obj->bank->vname;
            $this->payment_amount = $obj->payment_amount;
            $this->active_id=$obj->active_id;

//                $data = DB::table('receiptitems')->where('receipt_id', '=', $obj->id)
//                    ->get()
//                    ->transform(function ($data) {
//                        return [
//                            'receipt_id' => $data->receipt_id,
//                            'againstby' => $data->againstby,
//                            'vno' => $data->vno,
//                            'vamount' => $data->vamount,
//                            'ramount' => $data->ramount,
//                        ];
//                    });

//                $this->itemList = $data;
//
//                $this->calculateTotal();

        }else{
            $this->active_id=true;
        }
    }
    #endregion

    #region[Save]
    public function save(): void
    {
        if ($this->vid == "") {
            $obj = Payment::create([
                'company_id' => session()->get('company_id'),
               'acyear' => session()->get('acyear'),
                'vdate' => $this->vdate,
                'contact_id' => $this->contact_id,
                'receipttype_id' => $this->receipttype_id,
                'chq_no' => $this->chq_no?:'-',
                'chq_date' => $this->chq_date,
                'bank_id' => $this->bank_id?:'1',
                'payment_amount' => $this->payment_amount,
                'active_id' => $this->active_id,

            ]);
//            $this->saveItem($obj->id);
            $message = "Saved";

        } else {
            $obj = Payment::find($this->vid);
            $obj->company_id = session()->get('company_id');
            $obj->acyear = session()->get('acyear');
            $obj->vdate = $this->vdate;
            $obj->contact_id = $this->contact_id;
            $obj->receipttype_id = $this->receipttype_id;
            $obj->chq_no = $this->chq_no;
            $obj->chq_date = $this->chq_date;
            $obj->bank_id = $this->bank_id;
            $obj->payment_amount = $this->payment_amount;
            $obj->active_id = $this->active_id;
            $obj->save();
            DB::table('receiptitems')->where('receipt_id', '=', $obj->id)->delete();
            $message = "Updated";
        }
        $this->getRoute();
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }
    #endregion

    #region[Route]
    public function getRoute(): void
    {
        $this->redirect(route('payments'));
    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getContactList();
        $this->getReceipttypeList();
        $this->getBankList();
        return view('livewire.entries.payment.upsert');
    }
    #endregion
}
