<?php

namespace App\Livewire\Entries\Purchase;

use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Ledger;
use Aaran\Common\Models\Size;
use Aaran\Common\Models\Transport;
use Aaran\Entries\Models\Purchase;
use Aaran\Entries\Models\Purchaseitem;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Order;
use Aaran\Master\Models\Product;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Upsert extends Component
{
    use CommonTrait;

    #region[Properties]
    public string $uniqueno = '';
    public string $acyear = '';
    public string $purchase_no = '';
    public string $purchase_date = '';
    public string $entry_no = '';
    public string $sales_type = '';
    public string $bundle = '';
    public mixed $total_qty = 0;
    public mixed $total_taxable = '';
    public string $total_gst = '';
    public mixed $additional = '';
    public mixed $round_off = '';
    public mixed $grand_total = '';
    public mixed $qty = '';
    public mixed $description = '';
    public mixed $price = '';
    public string $gst_percent = '';

    public string $itemIndex = "";
    public $itemList = [];

    public string $company;
    public string $contact;
    public string $order;
    public string $transport;
    public string $ledger;
    public string $sale;
    public string $product;
    public string $colour;
    public string $size;

    #[Rule('required')]
    public $contact_id = '';
    public $contact_name = '';
    public Collection $contactCollection;
    public $highlightContact = 0;
    public $contactTyped = false;
    public $grandtotalBeforeRound;

    #[Rule('required')]
    public $order_id = '';
    public $order_name = '';
    public Collection $orderCollection;
    public $highlightOrder = 0;
    public $orderTyped = false;

    #[Rule('required')]
    public $transport_id = '';
    public $transport_name = '';
    public Collection $transportCollection;
    public $highlightTransport = 0;
    public $transportTyped = false;

    #[Rule('required')]
    public $ledger_id = '';
    public $ledger_name = '';
    public Collection $ledgerCollection;
    public $highlightLedger = 0;
    public $ledgerTyped = false;

    public $product_id = '';
    public $product_name = '';
    public int $gst_percent1;
    public Collection $productCollection;
    public $highlightProduct = 0;
    public $productTyped = false;

    public $colour_id = '';
    public $colour_name = '';
    public Collection $colourCollection;
    public $highlightColour = 0;
    public $colourTyped = false;

    public $size_id = '';
    public $size_name = '';
    public Collection $sizeCollection;
    public $highlightSize = 0;
    public $sizeTyped = false;
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

    public function getContactList(): void
    {
        $this->contactCollection = $this->contact_name ? Contact::search(trim($this->contact_name))
            ->where('company_id', '=', session()->get('company_id'))->get()
            : Contact::all()->where('company_id', '=', session()->get('company_id'));

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

    public function setOrder($name, $id): void
    {
        $this->order_name = $name;
        $this->order_id = $id;
        $this->getOrderList();
    }

    public function enterOrder(): void
    {
        $obj = $this->orderCollection[$this->highlightOrder] ?? null;

        $this->order_name = '';
        $this->orderCollection = Collection::empty();
        $this->highlightOrder = 0;

        $this->order_name = $obj['vname'] ?? '';
        $this->order_id = $obj['id'] ?? '';
    }

    #[On('refresh-order')]
    public function refreshOrder($v): void
    {
        $this->order_id = $v['id'];
        $this->order_name = $v['name'];
        $this->orderTyped = false;

    }

    public function getOrderList(): void
    {
        $this->orderCollection = $this->order_name ? Order::search(trim($this->order_name))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Order::all()->where('company_id', '=', session()->get('company_id'));
    }
    #endregion

    #region[Transport]
   public function decrementTransport(): void
    {
        if ($this->highlightTransport === 0) {
            $this->highlightTransport = count($this->transportCollection) - 1;
            return;
        }
        $this->highlightTransport--;
    }

    public function incrementTransport(): void
    {
        if ($this->highlightTransport === count($this->transportCollection) - 1) {
            $this->highlightTransport = 0;
            return;
        }
        $this->highlightTransport++;
    }

    public function setTransport($name, $id): void
    {
        $this->transport_name = $name;
        $this->transport_id = $id;
        $this->getTransportList();
    }

    public function enterTransport(): void
    {
        $obj = $this->transportCollection[$this->highlightTransport] ?? null;

        $this->transport_name = '';
        $this->transportCollection = Collection::empty();
        $this->highlightTransport = 0;

        $this->transport_name = $obj['vname'] ?? '';
        $this->transport_id = $obj['id'] ?? '';
    }

    #[On('refresh-transport')]
    public function refreshTransport($v): void
    {
        $this->transport_id = $v['id'];
        $this->transport_name = $v['name'];
        $this->transportTyped = false;

    }

    public function getTransportList(): void
    {
        $this->transportCollection = $this->transport_name ? Transport::search(trim($this->transport_name))
            ->get() : Transport::all();
    }
    #endregion

    #region[Ledger]
    public function decrementLedger(): void
    {
        if ($this->highlightLedger === 0) {
            $this->highlightLedger = count($this->ledgerCollection) - 1;
            return;
        }
        $this->highlightLedger--;
    }

    public function incrementLedger(): void
    {
        if ($this->highlightLedger === count($this->ledgerCollection) - 1) {
            $this->highlightLedger = 0;
            return;
        }
        $this->highlightLedger++;
    }

    public function setLedger($name, $id): void
    {
        $this->ledger_name = $name;
        $this->ledger_id = $id;
        $this->getLedgerList();
    }

    public function enterLedger(): void
    {
        $obj = $this->ledgerCollection[$this->highlightLedger] ?? null;

        $this->ledger_name = '';
        $this->ledgerCollection = Collection::empty();
        $this->highlightLedger = 0;

        $this->ledger_name = $obj['vname'] ?? '';
        $this->ledger_id = $obj['id'] ?? '';
    }

    #[On('refresh-ledger')]
    public function refreshLedger($v): void
    {
        $this->ledger_id = $v['id'];
        $this->ledger_name = $v['name'];
        $this->ledgerTyped = false;

    }

    public function getLedgerList(): void
    {
        $this->ledgerCollection = $this->ledger_name ? Ledger::search(trim($this->ledger_name))
            ->get() : Ledger::all();
    }
    #endregion

    #region[Product]
    public function decrementProduct(): void
    {
        if ($this->highlightProduct === 0) {
            $this->highlightProduct = count($this->productCollection) - 1;
            return;
        }
        $this->highlightProduct--;
    }

    public function incrementProduct(): void
    {
        if ($this->highlightProduct === count($this->productCollection) - 1) {
            $this->highlightProduct = 0;
            return;
        }
        $this->highlightProduct++;
    }

    public function setProduct($name, $id, $percent): void
    {
        $this->product_name = $name;
        $this->product_id = $id;
        $this->gst_percent1 = $percent;
        $this->getProductList();
    }

    public function enterProduct(): void
    {
        $obj = $this->productCollection[$this->highlightProduct] ?? null;
        $this->product_name = '';
        $this->productCollection = Collection::empty();
        $this->highlightProduct = 0;

        $this->product_name = $obj['vname'] ?? '';
        $this->product_id = $obj['id'] ?? '';
        $this->gst_percent1 = $obj['gst_percent'] ?? '';
    }

    #[On('refresh-product')]
    public function refreshProduct($v): void
    {
        $this->product_id = $v['id'];
        $this->product_name = $v['name'];
        $this->productTyped = false;

    }

    public function getProductList(): void
    {
        $this->productCollection = $this->product_name ? Product::search(trim($this->product_name))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Product::all()->where('company_id', '=', session()->get('company_id'));
    }
    #endregion

    #region[Colour]
    public function decrementColour(): void
    {
        if ($this->highlightColour === 0) {
            $this->highlightColour = count($this->colourCollection) - 1;
            return;
        }
        $this->highlightColour--;
    }

    public function incrementColour(): void
    {
        if ($this->highlightColour === count($this->colourCollection) - 1) {
            $this->highlightColour = 0;
            return;
        }
        $this->highlightColour++;
    }

    public function enterColour(): void
    {
        $obj = $this->colourCollection[$this->highlightColour] ?? null;

        $this->colour_name = '';
        $this->colourCollection = Collection::empty();
        $this->highlightColour = 0;

        $this->colour_name = $obj['vname'] ?? '';
        $this->colour_id = $obj['id'] ?? '';
    }

    public function setColour($name, $id): void
    {
        $this->colour_name = $name;
        $this->colour_id = $id;
        $this->getColourList();
    }

    #[On('refresh-colour')]
    public function refreshColour($v): void
    {
        $this->colour_id = $v['id'];
        $this->colour_name = $v['name'];
        $this->colourTyped = false;
    }

    public function colourSave($name)
    {
        $obj= Colour::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshColour($v);
    }

    public function getColourList(): void
    {
        $this->colourCollection = $this->colour_name ? Colour::search(trim($this->colour_name))
            ->get() : Colour::all();
    }
    #endregion

    #region[Size]
    public function decrementSize(): void
    {
        if ($this->highlightSize === 0) {
            $this->highlightSize = count($this->sizeCollection) - 1;
            return;
        }
        $this->highlightSize--;
    }

    public function incrementSize(): void
    {
        if ($this->highlightSize === count($this->sizeCollection) - 1) {
            $this->highlightSize = 0;
            return;
        }
        $this->highlightSize++;
    }

    public function setSize($name, $id): void
    {
        $this->size_name = $name;
        $this->size_id = $id;
        $this->getSizeList();
    }

    public function enterSize(): void
    {
        $obj = $this->sizeCollection[$this->highlightSize] ?? null;

        $this->size_name = '';
        $this->sizeCollection = Collection::empty();
        $this->highlightSize = 0;

        $this->size_name = $obj['vname'] ?? '';
        $this->size_id = $obj['id'] ?? '';
    }

    #[On('refresh-size')]
    public function refreshSize($v): void
    {
        $this->size_id = $v['id'];
        $this->size_name = $v['name'];
        $this->sizeTyped = false;

    }

    public function sizeSave($name)
    {
        $obj= Size::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshSize($v);
    }

    public function getSizeList(): void
    {
        $this->sizeCollection = $this->size_name ? Size::search(trim($this->size_name))
            ->get() : Size::all();
    }
    #endregion

    #region[Save]
    public function save(): void
    {
        if ($this->uniqueno != '') {
            if ($this->vid == "") {
                $this->validate(['purchase_no' => 'required|unique:purchases,purchase_no']);
                $obj = Purchase::create([
                    'uniqueno' => session()->get('company_id') . '~'. session()->get('acyear'). '~' . $this->purchase_no,
                   'acyear' => session()->get('acyear'),
                    'company_id' => session()->get('company_id'),
                    'contact_id' => $this->contact_id,
                    'purchase_no' => $this->purchase_no,
                    'purchase_date' => $this->purchase_date,
                    'Entry_no' => $this->entry_no,
                    'order_id' => $this->order_id ?: '1',
                    'sales_type' => $this->sales_type,
                    'transport_id' => $this->transport_id ?: '1',
                    'bundle' => $this->bundle,
                    'total_qty' => $this->total_qty,
                    'total_taxable' => $this->total_taxable,
                    'total_gst' => $this->total_gst,
                    'ledger_id' => $this->ledger_id ?: '1',
                    'additional' => $this->additional,
                    'round_off' => $this->round_off,
                    'grand_total' => $this->grand_total,
                    'active_id' => $this->active_id,
                ]);
                $this->saveItem($obj->id);
                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Purchase::find($this->vid);
                $obj->uniqueno = session()->get('company_id') . '~'. session()->get('acyear'). '~' .$this->purchase_no;
                $obj->acyear = session()->get('acyear');
                $obj->company_id = session()->get('company_id');
                $obj->contact_id = $this->contact_id;
                $obj->purchase_no = $this->purchase_no;
                $obj->purchase_date = $this->purchase_date;
                $obj->Entry_no = $this->entry_no;
                $obj->order_id = $this->order_id ?: '1';
                $obj->sales_type = $this->sales_type;
                $obj->transport_id = $this->transport_id ?: '1';
                $obj->bundle = $this->bundle;
                $obj->total_qty = $this->total_qty;
                $obj->total_taxable = $this->total_taxable;
                $obj->total_gst = $this->total_gst;
                $obj->ledger_id = $this->ledger_id ?: '1';
                $obj->additional = $this->additional;
                $obj->round_off = $this->round_off;
                $obj->grand_total = $this->grand_total;
                $obj->active_id = $this->active_id;
                $obj->save();
                DB::table('purchaseitems')->where('purchase_id', '=', $obj->id)->delete();
                $this->saveItem($obj->id);
                $message = "Updated";
            }
            $this->getRoute();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[Save Items]
    public function saveItem($id): void
    {
        foreach ($this->itemList as $sub) {
            Purchaseitem::create([
                'purchase_id' => $id,
                'product_id' => $sub['product_id'],
                'description' => $sub['description'],
                'colour_id' => $sub['colour_id'] ?: '1',
                'size_id' => $sub['size_id'] ?: '1',
                'qty' => $sub['qty'],
                'price' => $sub['price'],
                'gst_percent' => $sub['gst_percent'],
            ]);
        }
    }
    #endregion

    #region[Mount]
    public function mount($id): void
    {
        $this->entry_no = Purchase::nextNo();
        if ($id != 0) {
            $obj = Purchase::find($id);
            $this->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->purchase_no = $obj->purchase_no;
            $this->purchase_date = $obj->purchase_date;
            $this->entry_no = $obj->Entry_no;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport->vname;
            $this->bundle = $obj->bundle;
            $this->total_qty = $obj->total_qty;
            $this->total_taxable = $obj->total_taxable;
            $this->total_gst = $obj->total_gst;
            $this->ledger_id = $obj->ledger_id;
            $this->ledger_name = $obj->ledger->vname;
            $this->additional = $obj->additional;
            $this->round_off = $obj->round_off;
            $this->grand_total = $obj->grand_total;
            $this->active_id = $obj->active_id;
            $data = DB::table('purchaseitems')->select('purchaseitems.*',
                'products.vname as product_name',
                'colours.vname as colour_name',
                'sizes.vname as size_name',)->join('products', 'products.id', '=', 'purchaseitems.product_id')
                ->join('colours', 'colours.id', '=', 'purchaseitems.colour_id')
                ->join('sizes', 'sizes.id', '=', 'purchaseitems.size_id')->where('purchase_id', '=', $id)->get()->transform(function ($data) {
                    return [
                        'purchase_id' => $data->id,
                        'product_name' => $data->product_name,
                        'description' => $data->description,
                        'product_id' => $data->product_id,
                        'colour_name' => $data->colour_name,
                        'colour_id' => $data->colour_id,
                        'size_name' => $data->size_name,
                        'size_id' => $data->size_id,
                        'qty' => $data->qty,
                        'price' => $data->price,
                        'gst_percent' => $data->gst_percent,
                        'taxable' => $data->qty * $data->price,
                        'gst_amount' => ($data->qty * $data->price) * ($data->gst_percent) / 100,
                        'subtotal' => $data->qty * $data->price + (($data->qty * $data->price) * $data->gst_percent / 100),
                    ];
                });
            $this->itemList = $data;
        } else {
            $this->uniqueno = session()->get('company_id') . '~' . $this->purchase_no . '~' . $this->purchase_date;
            $this->active_id = true;
            $this->sales_type = 0;
            $this->gst_percent = 18;
            $this->additional = 0;
            $this->grand_total = 0;
            $this->total_taxable = 0;
            $this->round_off = 0;
            $this->total_gst = 0;
            $this->purchase_date = Carbon::now()->format('Y-m-d');
        }
    }
    #endregion

    #region[Add Items]
    public function addItems(): void
    {
        if ($this->itemIndex == "") {
            if (!(empty($this->product_name)) &&
                !(empty($this->price)) &&
                !(empty($this->qty))
            ) {
                $this->itemList[] = [
                    'product_name' => $this->product_name,
                    'product_id' => $this->product_id,
                    'description' => $this->description,
                    'colour_id' => $this->colour_id,
                    'colour_name' => $this->colour_name,
                    'size_id' => $this->size_id,
                    'size_name' => $this->size_name,
                    'qty' => $this->qty,
                    'price' => $this->price,
                    'gst_percent' => $this->gst_percent1,
                    'taxable' => $this->qty * $this->price,
                    'gst_amount' => ($this->qty * $this->price) * $this->gst_percent1 / 100,
                    'subtotal' => $this->qty * $this->price + (($this->qty * $this->price) * $this->gst_percent1 / 100),
                ];
            }
        } else {
            $this->itemList[$this->itemIndex] = [
                'product_name' => $this->product_name,
                'product_id' => $this->product_id,
                'description' => $this->description,
                'colour_id' => $this->colour_id,
                'colour_name' => $this->colour_name,
                'size_id' => $this->size_id,
                'size_name' => $this->size_name,
                'qty' => $this->qty,
                'price' => $this->price,
                'gst_percent' => $this->gst_percent1,
                'taxable' => $this->qty * $this->price,
                'gst_amount' => ($this->qty * $this->price) * $this->gst_percent1 / 100,
                'subtotal' => $this->qty * $this->price + (($this->qty * $this->price) * $this->gst_percent1 / 100),
            ];

        }
        $this->calculateTotal();
        $this->resetsItems();
        $this->render();
    }
    #endregion

    #region[Reset Items]
    public function resetsItems(): void
    {
        $this->itemIndex = '';
        $this->product_name = '';
        $this->description = '';
        $this->product_id = '';
        $this->colour_name = '';
        $this->colour_id = '';
        $this->size_name = '';
        $this->size_id = '';
        $this->qty = '';
        $this->price = '';
        $this->gst_percent = '';
        $this->calculateTotal();
    }
    #endregion

    #region[Change items]
    public function changeItems($index): void
    {
        $this->itemIndex = $index;

        $items = $this->itemList[$index];
        $this->product_name = $items['product_name'];
        $this->product_id = $items['product_id'];
        $this->description = $items['description'];
        $this->colour_name = $items['colour_name'];
        $this->colour_id = $items['colour_id'];
        $this->size_name = $items['size_name'];
        $this->size_id = $items['size_id'];
        $this->qty = $items['qty'] + 0;
        $this->price = $items['price'] + 0;
        $this->gst_percent1 = $items['gst_percent'];
        $this->calculateTotal();
    }
    #endregion

    #region[Route]
    public function getRoute(): void
    {
        $this->redirect(route('purchases'));
    }
    #endregion

    #region[Remove Items]
    public function removeItems($index): void
    {
        unset($this->itemList[$index]);
        $this->itemList = collect($this->itemList);
        $this->calculateTotal();
    }
    #endregion

    #region[Total]
    public function calculateTotal()
    {
        if ($this->itemList) {

            $this->total_qty = 0;
            $this->total_taxable = 0;
            $this->total_gst = 0;
            $this->grandtotalBeforeRound = 0;

            foreach ($this->itemList as $row) {
                $this->total_qty += round(floatval($row['qty']), 3);
                $this->total_taxable += round(floatval($row['taxable']), 2);
                $this->total_gst += round(floatval($row['gst_amount']), 2);
                $this->grandtotalBeforeRound += round(floatval($row['subtotal']), 2);
            }
            $this->grand_total = round($this->grandtotalBeforeRound);
            $this->round_off = $this->grandtotalBeforeRound - $this->grand_total;

            if ($this->grandtotalBeforeRound > $this->grand_total) {
                $this->round_off = round($this->round_off, 2) * -1;
            }

            $this->qty = round(floatval($this->qty), 3);
            $this->total_taxable = round(floatval($this->total_taxable), 2);
            $this->total_gst = round(floatval($this->total_gst), 2);
            $this->round_off = round(floatval($this->round_off), 2);
            $this->grand_total = round((floatval($this->grand_total)) + (floatval($this->additional)), 2);
        }
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Purchase::find($id);
            $this->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->purchase_no = $obj->purchase_no;
            $this->purchase_date = $obj->purchase_date;
            $this->entry_no = $obj->Entry_no;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport->vname;
            $this->bundle = $obj->bundle;
            $this->total_qty = $obj->total_qty;
            $this->total_taxable = $obj->total_taxable;
            $this->total_gst = $obj->total_gst;
            $this->ledger_id = $obj->ledger_id;
            $this->ledger_name = $obj->ledger->vname;
            $this->additional = $obj->additional;
            $this->round_off = $obj->round_off;
            $this->grand_total = $obj->grand_total;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }
    #endregion

    #region[Print]
    public function print(): void
    {
        $this->redirect(route('purchases.print', [$this->vid]));
    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getContactList();
        $this->getOrderList();
        $this->getTransportList();
        $this->getLedgerList();
        $this->getColourList();
        $this->getProductList();
        $this->getSizeList();
        return view('livewire.entries.purchase.upsert');
    }
    #endregion
}
