<?php

namespace App\Livewire\Audit\SalesTrack\Bills;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\SalesBill;
use Aaran\Audit\Models\SalesTrack\SalesBillItem;
use Aaran\Audit\Models\Vehicle;
use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Ledger;
use Aaran\Common\Models\Size;
use Aaran\Entries\Models\Sale;
use Aaran\Entries\Models\Saleitem;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact_detail;
use Aaran\Master\Models\Product;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Aaran\Master\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Upsert extends Component
{
    #region[property]
    use CommonTrait;

    public mixed $serial = '';
    public mixed $sales_from = '';
    public mixed $sales_track_bill_id;
    public mixed $qty = '';
    public mixed $price;
    public mixed $description = '';
    public $status;
    public mixed $showEditModal_1 = false;
    public mixed $products;
    public $category_id = '';
    public mixed $sales_track_item_id = '';
    public mixed $vno = '';
    public mixed $vdate = '';
    public mixed $client_id = '';
    public mixed $additional = '';
    public mixed $vehicle = '';
    public mixed $itemList = [];
    public mixed $itemIndex = '';
    public string $bundle = '';
    public mixed $total_qty = 0;
    public mixed $total_taxable = '';
    public string $ledger;
    public string $total_gst = '';
    public mixed $round_off = '';
    public mixed $grand_total = '';
    public mixed $gst_percent = '';
    public mixed $grandtotalBeforeRound;
    public mixed $rout;
    public mixed $rootline_id = '';
    public $unique_no;
    public $group;
    #endregion


    #region[mount]
    public function mount($id)
    {
        if ($id != 0) {
            $data = SalesBill::find($id);
            $this->vid = $data->id;
            $this->sales_track_bill_id = $data->id;
            $this->rootline_id = $data->rootline_id;
            $this->sales_track_item_id = $data->sales_track_item_id;
            $this->unique_no = $data->unique_no;
            $this->group = $data->group;
            $this->vdate = $data->vdate;
            $this->vno = $data->vno;
            $this->sales_from = $data->sales_from;
            $this->client_id = $data->client_id;
            $this->total_taxable = $data->taxable;
            $this->total_qty = $data->total_qty;
            $this->total_gst = $data->gst;
            $this->round_off = $data->round_off;
            $this->grand_total = $data->grand_total;
            $this->bundle = $data->bundle;
            $this->vehicle_id = $data->vehicle_id;
            $this->vehicle_name = $data->vehicle->vname;
            $this->ledger_id = $data->ledger_id;
            $this->ledger_name = $data->ledger->vname;
            $this->additional = $data->additional;
            $this->status = $data->status;
            $this->active_id = $data->active_id;
            $this->serial = $data->serial;

            $item = DB::table('sales_bill_items')->select('sales_bill_items.*',
                'products.vname as product_name',
                'products.gst_percent as gst_percent',
                'colours.vname as colour_name',
                'sizes.vname as size_name',
            )->join('products', 'products.id', '=', 'sales_bill_items.product_id')
                ->join('colours', 'colours.id', '=', 'sales_bill_items.colour_id')
                ->join('sizes', 'sizes.id', '=', 'sales_bill_items.size_id')
                ->where('sales_track_bill_id', '=',
                    $id)->get()->transform(function ($item) {
                    return [
                        'product_name' => $item->product_name,
                        'product_id' => $item->product_id,
                        'description' => $item->description,
                        'colour_name' => $item->colour_name,
                        'colour_id' => $item->colour_id,
                        'size_name' => $item->size_name,
                        'size_id' => $item->size_id,
                        'qty' => $item->qty,
                        'price' => $item->price,
                        'gst_percent' => $item->gst_percent,
                        'taxable' => $item->qty * $item->price,
                        'gst_amount' => ($item->qty * $item->price) * ($item->gst_percent) / 100,
                        'subtotal' => $item->qty * $item->price + (($item->qty * $item->price) * $item->gst_percent / 100),
                    ];
                });
            $this->itemList = $item;
        }

        $this->calculateTotal();
    }

    #endregion

    #region[save]
    public function save(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                $obj = SalesBill::create([
                    'serial' => $this->serial ?: 0,
                    'rootline_id' => $this->rootline_id,
                    'sales_track_item_id' => $this->sales_track_item_id,
                    'unique_no' => $this->sales_from.'~'.$this->vno,
                    'group' => $this->group,
                    'vno' => $this->vno ?: 0,
                    'vdate' => $this->vdate,
                    'sales_from' => $this->sales_from,
                    'client_id' => $this->client_id,
                    'taxable' => $this->total_taxable,
                    'total_qty' => $this->total_qty,
                    'gst' => $this->total_gst,
                    'ledger_id' => $this->ledger_id ?: 1,
                    'bundle' => $this->bundle,
                    'additional' => $this->additional,
                    'round_off' => $this->round_off,
                    'grand_total' => $this->grand_total,
                    'vehicle_id' => $this->vehicle_id ?: '1',
                    'status' => '1',
                    'active_id' => $this->active_id ?: '0',
                    'user_id' => auth()->id(),
                ]);
                $this->saveItem($obj->id);
                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = SalesBill::find($this->vid);
                $obj->serial = $this->serial;
                $obj->rootline_id = $this->rootline_id;
                $obj->sales_track_item_id = $this->sales_track_item_id;
                $obj->unique_no = $this->unique_no;;
                $obj->group = $this->group;;
                $obj->vdate = $this->vdate;
                $obj->sales_from = $this->sales_from;
                $obj->client_id = $this->client_id;
                $obj->taxable = $this->total_taxable;
                $obj->total_qty = $this->total_qty;
                $obj->gst = $this->total_gst;
                $obj->bundle = $this->bundle;
                $obj->ledger_id = $this->ledger_id;
                $obj->additional = $this->additional;
                $obj->round_off = $this->round_off;
                $obj->grand_total = $this->grand_total;
                $obj->vehicle_id = $this->vehicle_id ?: '';
                $obj->active_id = $this->active_id;
                $obj->user_id = auth()->id();
                $obj->save();
                DB::table('sales_bill_items')->where('sales_track_bill_id', '=', $obj->id)->delete();
                $this->saveItem($obj->id);
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
            $this->getRoute();
        }

    }
    #endregion

    #region[saveItem]
    public function saveItem($id): void
    {
        foreach ($this->itemList as $sub) {
            SalesBillItem::create([
                'sales_track_bill_id' => $id,
                'category_id' => $this->category_id ?: 1,
                'product_id' => $sub['product_id'],
                'description' => $sub['description'],
                'colour_id' => $sub['colour_id'] ?: '1',
                'size_id' => $sub['size_id'] ?: '1',
                'qty' => $sub['qty'],
                'price' => $sub['price'],
                'active_id' => '1',
                'user_id' => auth()->id(),


            ]);
        }
    }
    #endregion

    #region[addItem]
    public function addItems(): void
    {
        if ($this->itemIndex == "") {
            if (!(empty($this->product_name)) &&
                !(empty($this->price)) &&
                !(empty($this->qty))
            ) {
                $this->itemList[] = [
                    'category_id' => $this->category_id ?: 1,
                    'product_id' => $this->product_id ?: 1,
                    'description' => $this->description,
                    'colour_id' => $this->colour_id ?: 1,
                    'size_id' => $this->size_id ?: 1,
                    'product_name' => $this->product_name,
                    'colour_name' => $this->colour_name,
                    'size_name' => $this->size_name,
                    'qty' => $this->qty,
                    'price' => $this->price,
                    'active_id' => '1',
                    'gst_percent' => $this->gst_percent1,
                    'taxable' => $this->qty * $this->price,
                    'gst_amount' => ($this->qty * $this->price) * $this->gst_percent1 / 100,
                    'subtotal' => $this->qty * $this->price + (($this->qty * $this->price) * $this->gst_percent1 / 100),
                ];
            }
        } else {
            $this->itemList[$this->itemIndex] = [
                'category_id' => $this->category_id ?: 1,
                'product_id' => $this->product_id ?: 1,
                'description' => $this->description,
                'colour_id' => $this->colour_id ?: 1,
                'size_id' => $this->size_id ?: 1,
                'product_name' => $this->product_name,
                'colour_name' => $this->colour_name,
                'size_name' => $this->size_name,
                'qty' => $this->qty,
                'price' => $this->price,
                'active_id' => '1',
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

    #region[resetItem]
    public function resetsItems(): void
    {
        $this->product_id = '';
        $this->description = '';
        $this->colour_id = '';
        $this->size_id = '';
        $this->qty = '';
        $this->price = '';
        $this->product_name = '';
        $this->colour_name = '';
        $this->size_name = '';
        $this->active_id = '1';
        $this->gst_percent = '';
        $this->calculateTotal();
    }
    #endregion

    #region[change item]
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

    #region[remove item]
    public function removeItems($index): void
    {
        unset($this->itemList[$index]);
        $this->itemList = collect($this->itemList);
        $this->calculateTotal();
    }
    #endregion


    #region[mark as entered]
    public function markAsEntered()
    {
        $this->salesEntry();
        $bill = SalesBillItem::search($this->searches)
            ->where('sales_track_bill_id', '=', $this->sales_track_bill_id)->get();

        foreach ($bill as $row) {
            $obj = SalesBillItem::find($row->id);
            $obj->active_id = Active::NOTACTIVE;
            $obj->save();
        }

        $obj = SalesBill::find($this->sales_track_bill_id);
        $obj->active_id = Active::NOTACTIVE;
        $obj->save();

        $this->redirect(route('salesTracks.Bills', [$this->sales_track_item_id]));

    }
    #endregion
    #region[sales Entry]
    public $company_id;
    public $contact_id;
    public $order_id;
    public mixed $billing_id = '';
    public mixed $shipping_id = '';
    public mixed $job_no = '';
    public string $sales_type = '';
    public string $destination = '';    
    public string $style_id = '';
    public string $despatch_id = '';
    public string $transport_id = '';
    public string $uniqueno = '';
    public $po_no;
    public $dc_no;
    public $no_of_roll;

    public function salesEntry()
    {
        $this->company_id = Company::where('vname', '=', Client::getName($this->sales_from))->first()->id;
        $this->contact_id = Contact::where('vname', '=', Client::getName($this->client_id))->first()->id;
        $this->uniqueno = "{$this->contact_id}~{$this->vno}~{$this->vdate}";
        if ($this->uniqueno != '') {
            $obj = Sale::create([
                'uniqueno' => $this->company_id.'~'.session()->get('acyear').'~'.$this->vno,
                'acyear' => session()->get('acyear'),
                'company_id' => $this->company_id,
                'contact_id' => $this->contact_id,
                'invoice_no' => $this->vno,
                'invoice_date' => $this->vdate,
                'order_id' => $this->order_id ?: 1,
                'billing_id' => $this->billing_id ?: Contact_detail::getId($this->contact_id),
                'shipping_id' => $this->shipping_id ?: Contact_detail::getId($this->contact_id),
                'style_id' => $this->style_id ?: 1,
                'despatch_id' => $this->despatch_id ?: 1,
                'job_no' => $this->job_no,
                'sales_type' => $this->sales_type,
                'transport_id' => $this->transport_id ?: 1,
                'destination' => $this->destination,
                'bundle' => $this->bundle,
                'total_qty' => $this->total_qty,
                'total_taxable' => $this->total_taxable,
                'total_gst' => $this->total_gst,
                'ledger_id' => $this->ledger_id ?: 1,
                'additional' => $this->additional,
                'round_off' => $this->round_off,
                'grand_total' => $this->grand_total,
                'active_id' => $this->active_id,
            ]);
            $this->saveSalesItem($obj->id);
            $message = "Saved";
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        }
    }

    public function saveSalesItem($id): void
    {
        foreach ($this->itemList as $sub) {
            Saleitem::create([
                'sale_id' => $id,
                'po_no' => $this->po_no,
                'dc_no' => $this->dc_no,
                'no_of_roll' => $this->no_of_roll,
                'product_id' => $sub['product_id'],
                'colour_id' => $sub['colour_id'] ?: '1',
                'size_id' => $sub['size_id'] ?: '1',
                'qty' => $sub['qty'],
                'price' => $sub['price'],
                'gst_percent' => $sub['gst_percent'],
                'description' => $sub['description'],
            ]);
        }
    }
    #endregion

    #region[re-render]
    public function reRender()
    {
        $this->render();
    }
    #endregion


    #region[Calculate total]

    public function calculateTotal(): void
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

    #region[Product]

    public $product_id = '';
    public $product_name = '';
    public mixed $gst_percent1 = '';
    public Collection $productCollection;
    public $highlightProduct = 0;
    public $productTyped = false;

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
        $this->gst_percent1 = $v['gst_percent'];
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

    public $colour_id = '';
    public $colour_name = '';
    public Collection $colourCollection;
    public $highlightColour = 0;
    public $colourTyped = false;

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
        $obj = Colour::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshColour($v);
    }

    public function getColourList(): void
    {
        $this->colourCollection = $this->colour_name ? Colour::search(trim($this->colour_name))
            ->get() : Colour::all();
    }

    #endregion

    #region[size]

    public $size_id = '';
    public $size_name = '';
    public Collection $sizeCollection;
    public $highlightSize = 0;
    public $sizeTyped = false;

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
        $obj = Size::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshSize($v);
    }

    public function getSizeList(): void
    {
        $this->sizeCollection = $this->size_name ? Size::search(trim($this->size_name))
            ->get() : Size::all();
    }

    #endregion

    #region[Ledger]

    public $ledger_id = '';
    public $ledger_name = '';
    public Collection $ledgerCollection;
    public $highlightLedger = 0;
    public $ledgerTyped = false;

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

    #region[Vehicle]

    public $vehicle_id = '';
    public $vehicle_name = '';
    public Collection $vehicleCollection;
    public $highlightVehicle = 0;
    public $vehicleTyped = false;

    public function decrementVehicle(): void
    {
        if ($this->highlightVehicle === 0) {
            $this->highlightVehicle = count($this->vehicleCollection) - 1;
            return;
        }
        $this->highlightVehicle--;
    }

    public function incrementVehicle(): void
    {
        if ($this->highlightVehicle === count($this->vehicleCollection) - 1) {
            $this->highlightVehicle = 0;
            return;
        }
        $this->highlightVehicle++;
    }

    public function setVehicle($name, $id): void
    {
        $this->vehicle_name = $name;
        $this->vehicle_id = $id;
        $this->getVehicleList();
    }

    public function enterVehicle(): void
    {
        $obj = $this->vehicleCollection[$this->highlightVehicle] ?? null;

        $this->vehicle_name = '';
        $this->vehicleCollection = Collection::empty();
        $this->highlightVehicle = 0;

        $this->vehicle_name = $obj['vname'] ?? '';
        $this->vehicle_id = $obj['id'] ?? '';
    }

    #[On('refresh-vehicle')]
    public function refreshVehicle($v): void
    {
        $this->vehicle_id = $v['id'];
        $this->vehicle_name = $v['name'];
        $this->vehicleTyped = false;

    }

    public function vehicleSave($name)
    {
        $obj = Vehicle::create([
            'client_id' => $this->sales_from,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshVehicle($v);
    }

    public function getVehicleList(): void
    {
        $this->vehicleCollection = $this->vehicle_name ? Vehicle::search(trim($this->vehicle_name))
            ->get() : Vehicle::where('client_id', '=', $this->sales_from)->get();
    }

    #endregion

    #region[render]
    public function render()
    {

        $this->getColourList();
        $this->getLedgerList();
        $this->getProductList();
        $this->getVehicleList();
        $this->getSizeList();
        return view('livewire.audit.sales-track.bills.upsert');
    }

    public function getRoute(): void
    {
        $this->redirect(route('salesTracks.Bills', [$this->sales_track_item_id]));
    }
    #endregion
}
