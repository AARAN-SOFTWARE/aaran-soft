<?php

namespace App\Livewire\Erp\Production\Ironing;

use Aaran\Erp\Models\Production\Ironing;
use Aaran\Erp\Models\Production\IroningItem;
use Aaran\Erp\Models\Production\Jobcard;
use Aaran\Erp\Models\Production\JobcardItem;
use Aaran\Erp\Models\Production\SectionInwardItem;
use Aaran\Master\Models\Order;
use Aaran\Master\Models\Style;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Upsert extends Component
{

    #region[Ironing Properties]
    public string $vid = '';
    public string $vno = '';
    public string $vdate = '';
    public string $iron_master = '';
    public mixed $total_qty = 0;
    public string $itemIndex = "";
    public $itemList = [];
    public mixed $colour_id;
    public mixed $colour_name;
    public mixed $size_id;
    public mixed $size_name;
    public mixed $qty;
    public  $jobcard_item_id='';
    public  $section_inward_item_id;


    public $order_id = '';
    public $order_no = '';
    public Collection $orderCollection;
    public $highlightOrder = 0;
    public $orderTyped = false;
    public  $receiver_details;

    public $style_id = '';
    public $style_name = '';
    public Collection $styleCollection;
    public $highlightStyle = 0;
    public $styleTyped = false;

    public $jobcard_id = '';
    public $jobcard_no = '';
    public Collection $jobcardCollection;
    public $highlightJobcard = 0;
    public $jobcardTyped = false;

    public  $section_inward_id = '';
    public  $section_inward_no = '';
    public Collection $sectionInwardCollection;
    public int $highlightSectionInward = 0;
    public bool $sectionTyped = false;
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
            ->get() : Order::all()->where('company_id','=',session()->get('company_id'));
    }
    #endregion

    #region[Style]

    public function decrementStyle(): void
    {
        if ($this->highlightStyle === 0) {
            $this->highlightStyle = count($this->styleCollection) - 1;
            return;
        }
        $this->highlightStyle--;
    }

    public function incrementStyle(): void
    {
        if ($this->highlightStyle === count($this->styleCollection) - 1) {
            $this->highlightStyle = 0;
            return;
        }
        $this->highlightStyle++;
    }

    public function enterStyle(): void
    {
        $obj = $this->styleCollection[$this->highlightStyle] ?? null;

        $this->style_name = '';
        $this->styleCollection = Collection::empty();
        $this->highlightStyle = 0;

        $this->style_name = $obj['vname'] ?? '';;
        $this->style_id = $obj['id'] ?? '';;
    }

    public function setStyle($name, $id): void
    {
        $this->style_name = $name;
        $this->style_id = $id;
        $this->getStyleList();
    }

    #[On('refresh-style')]
    public function refreshStyle($v): void
    {
        $this->style_id = $v['id'];
        $this->style_name = $v['name'];
        $this->styleTyped = false;

    }

    public function getStyleList(): void
    {
        $this->styleCollection = $this->style_name ? Style::search(trim($this->style_name))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Style::all()->where('company_id','=',session()->get('company_id'));
    }
    #endregion

    #region[Jobcard]

    public function decrementJobcard(): void
    {
        if ($this->highlightJobcard === 0) {
            $this->highlightJobcard = count($this->jobcardCollection) - 1;
            return;
        }
        $this->highlightJobcard--;
    }

    public function incrementJobcard(): void
    {
        if ($this->highlightJobcard === count($this->jobcardCollection) - 1) {
            $this->highlightJobcard = 0;
            return;
        }
        $this->highlightJobcard++;
    }

    public function enterJobcard(): void
    {
        $obj = $this->jobcardCollection[$this->highlightJobcard] ?? null;

        $this->jobcard_no = '';
        $this->jobcardCollection = Collection::empty();
        $this->highlightJobcard = 0;

        $this->jobcard_no = $obj['vname'] ?? '';;
        $this->jobcard_id = $obj['id'] ?? '';;
    }

    public function setJobcard($name, $id): void
    {
        $this->jobcard_no = $name;
        $this->jobcard_id = $id;
        $this->getJobcardList();
    }

    #[On('refresh-jobcard')]
    public function refreshJobcard($v): void
    {
        $this->jobcard_id = $v['id'];
        $this->jobcard_no = $v['name'];
        $this->jobcardTyped = false;

    }

    public function getJobcardList(): void
    {
        if ($this->order_id) {
            $this->jobcardCollection = $this->jobcard_no ? Jobcard::search(trim($this->jobcard_no))
                ->where('order_id', '=', $this->order_id)
                ->get() : Jobcard::where('order_id', '=', $this->order_id)->get();
        }
    }
    #endregion

    #region[Section Inward]


    public function incrementSectionInward(): void
    {
        if ($this->highlightSectionInward === count($this->sectionInwardCollection) - 1) {
            $this->highlightSectionInward = 0;
            return;
        }
        $this->highlightSectionInward++;
    }

    public function decrementSectionInward(): void
    {
        if ($this->highlightSectionInward === 0) {
            $this->highlightSectionInward = count($this->sectionInwardCollection) - 1;
            return;
        }
        $this->highlightSectionInward--;
    }

    public function setSectionInwardItem($jobcard_item_id, $section_inward_item_id, $section_inward_no, $colour_id, $colour_name, $size_id, $size_name, $qty): void
    {
        $this->jobcard_item_id = $jobcard_item_id;
//        dd($jobcard_item_id,$section_inward_item_id);
        $this->section_inward_item_id = $section_inward_item_id;
        $this->section_inward_no = $section_inward_no;
        $this->colour_id = $colour_id;
        $this->colour_name = $colour_name;
        $this->size_id = $size_id;
        $this->size_name = $size_name;
        $this->qty = $qty;

    }

    public function enterSectionInward(): void
    {
        $obj = $this->sectionInwardCollection[$this->highlightSectionInward] ?? null;

        $this->section_inward_no = '';
        $this->sectionInwardCollection = Collection::empty();
        $this->highlightSectionInward = 0;

        $this->jobcard_item_id = $obj['jobcard_item_id'] ?? '';;
        $this->section_inward_item_id = $obj['section_inward_item_id'] ?? '';;
        $this->section_inward_no = $obj['section_inward_no'] ?? '';;
        $this->colour_id = $obj['colour_id'] ?? '';;
        $this->colour_name = $obj['colour_name'] ?? '';;
        $this->size_id = $obj['size_id'] ?? '';;
        $this->size_name = $obj['size_name'] ?? '';;
        $this->qty = $obj['qty'] ?? '';;
    }

    public function getSectionInwardList(): void
    {

        $data = DB::table('section_inward_items')
            ->select(
                'section_inward_items.*',
                'section_inwards.vno as section_inward_no',
                'colours.vname as colour_name',
                'sizes.vname as size_name',
            )
            ->join('section_inwards', 'section_inwards.id', '=', 'section_inward_items.section_inward_id')
            ->join('jobcard_items', 'jobcard_items.id', '=', 'section_inward_items.jobcard_item_id')
            ->join('colours', 'colours.id', '=', 'section_inward_items.colour_id')
            ->join('sizes', 'sizes.id', '=', 'section_inward_items.size_id')
            ->where('section_inwards.jobcard_id', '=', $this->jobcard_id)
            ->where('section_inwards.company_id', '=', session()->get('company_id'))
            ->get()
            ->transform(function ($data) {
                return [
                    'jobcard_item_id' => $data->jobcard_item_id,
                    'section_inward_item_id' => $data->id,
                    'section_inward_no' => $data->section_inward_no,
                    'colour_id' => $data->colour_id,
                    'colour_name' => $data->colour_name,
                    'size_id' => $data->size_id,
                    'size_name' => $data->size_name,
                    'qty' => $data->pending_qty + 0,
                ];
            });

        $this->sectionInwardCollection = $data;
    }
    #endregion


    #region[Mount]

    public function mount($id)
    {
        $this->vno = Ironing::nextNo();
        $this->vdate = Carbon::parse(Carbon::now())->format('Y-m-d');

        if ($id != 0) {

            $obj = Ironing::find($id);
            $this->vid = $obj->id;
            $this->vno = $obj->vno;
            $this->vdate = $obj->vdate;
            $this->iron_master=$obj->iron_master;
            $this->order_id=$obj->order_id;
            $this->order_no = $obj->order->vname;
            $this->style_id = $obj->style_id;
            $this->style_name = $obj->style->vname;
            $this->jobcard_id = $obj->jobcard_id;
            $this->jobcard_no = $obj->jobcard->vno;
            $this->total_qty = $obj->total_qty;
            $this->receiver_details = $obj->receiver_details;

            $data = DB::table('ironing_items')
                ->select(
                    'ironing_items.*',
                    'ironings.vno as ironings_no',
                    'section_inwards.vno as section_inward_no',
                    'colours.vname as colour_name',
                    'sizes.vname as size_name',
                )
                ->join('Section_inward_items', 'Section_inward_items.id', '=', 'ironing_items.Section_inward_item_id')
                ->join('Section_inwards', 'Section_inwards.id', '=', 'Section_inward_items.Section_inward_id')
                ->join('ironings', 'ironings.id', '=', 'ironing_items.ironing_id')
                ->join('colours', 'colours.id', '=', 'ironing_items.colour_id')
                ->join('sizes', 'sizes.id', '=', 'ironing_items.size_id')
                ->where('ironing_id', '=', $id)
                ->where('ironings.company_id', '=', session()->get('company_id'))
                ->get()
                ->transform(function ($data) {
                    return [
                        'jobcard_item_id' => $data->jobcard_item_id,
                        'ironinsg_no' => $data->ironings_no,
                        'section_inward_item_id' => $data->section_inward_item_id,
                        'section_inward_no' => $data->section_inward_no,
                        'colour_id' => $data->colour_id,
                        'colour_name' => $data->colour_name,
                        'size_id' => $data->size_id,
                        'size_name' => $data->size_name,
                        'qty' => $data->qty,
                    ];
                });

            $this->itemList = $data;
        }
    }
    #endregion

    #region[Add Items]
    public function addItems(): void
    {
        if ($this->itemIndex == "") {
            if (!(empty($this->colour_name)) &&
                !(empty($this->size_name)) &&
                !(empty($this->qty))
            ) {
                $this->itemList[] = [

                    'jobcard_item_id' => $this->jobcard_item_id,
                    'section_inward_item_id' => $this->section_inward_item_id,
                    'section_inward_id' => $this->section_inward_id,
                    'section_inward_no' => $this->section_inward_no,
                    'colour_id' => $this->colour_id,
                    'colour_name' => $this->colour_name,
                    'size_id' => $this->size_id,
                    'size_name' => $this->size_name,
                    'qty' => $this->qty,
                ];
            }
        } else {
            $this->itemList[$this->itemIndex] = [
                'jobcard_item_id' => $this->jobcard_item_id,
                'section_inward_item_id' => $this->section_inward_item_id,
                'section_inward_id' => $this->section_inward_id,
                'section_inward_no' => $this->section_inward_no,
                'colour_id' => $this->colour_id,
                'colour_name' => $this->colour_name,
                'size_id' => $this->size_id,
                'size_name' => $this->size_name,
                'qty' => $this->qty,
            ];
        }
        $this->calculateTotal();
        $this->resetsItems();
        $this->render();
        //$this->emit('getfocus');
    }

    public function resetsItems(): void
    {
        $this->jobcard_item_id = '';
        $this->section_inward_item_id = '';
        $this->section_inward_id = '';
        $this->section_inward_no = '';
        $this->colour_id = '';
        $this->colour_name = '';
        $this->size_id = '';
        $this->size_name = '';
        $this->qty = '';
    }

    public function changeItems($index): void
    {
        $this->itemIndex = $index;
        $items = $this->itemList[$index];
        $this->jobcard_item_id = $items['jobcard_item_id'];
        $this->section_inward_item_id = $items['section_inward_item_id'];
        $this->section_inward_no = $items['section_inward_no'];
        $this->colour_id = $items['colour_id'];
        $this->colour_name = $items['colour_name'];
        $this->size_id = $items['size_id'];
        $this->size_name = $items['size_name'];
        $this->qty = $items['qty'] + 0;
        $this->calculateTotal();
    }

    public function removeItems($index): void
    {
        unset($this->itemList[$index]);
        $this->itemList = collect($this->itemList);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        if ($this->itemList) {
            $this->total_qty = 0;
            foreach ($this->itemList as $row) {
                $this->total_qty += round(floatval($row['qty']), 3);
            }
        }
    }
    #endregion

    #region[Save]

    public function save(): void
    {
        if (session()->has('company_id')) {
                  if ($this->vid == "") {

                    $obj = Ironing::create([
                        'vno' => $this->vno,
                        'vdate' => $this->vdate,
                        'iron_master'=>$this->iron_master,
                        'order_id'=>$this->order_id,
                        'style_id'=>$this->style_id,
                        'jobcard_id' => $this->jobcard_id,
                        'total_qty' => $this->total_qty,
                        'receiver_details' => $this->receiver_details,
                        'active_id' => $this->active_id=1,
                        'company_id' => session()->get('company_id'),
                        'user_id' => \Auth::id(),
                    ]);
                    $this->saveItem($obj->id);

                    $message = "Saved";

                } else {
                    $obj = Ironing::find($this->vid);
                    $obj->vno = $this->vno;
                    $obj->vdate = $this->vdate;
                    $obj->iron_master = $this->iron_master;
                    $obj->order_id = $this->order_id;
                    $obj->style_id = $this->style_id;
                    $obj->jobcard_id = $this->jobcard_id;
                    $obj->total_qty = $this->total_qty;
                    $obj->receiver_details = $this->receiver_details;
                    $obj->active_id = $this->active_id =1;
                    $obj->company_id = session()->get('company_id');
                    $obj->user_id = \Auth::id();
                    $obj->save();

                    DB::table('ironing_items')->where('ironing_id', '=', $obj->id)->delete();
                    $this->saveItem($obj->id);
                    $message = "Updated";
                }
                $this->getRoute();
                $this->vno = '';
                $this->vdate = '';
                $this->jobcard_id = '';
                $this->total_qty = '';
                $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);

        }
    }

    public function saveItem($id): void
    {
        foreach ($this->itemList as $sub) {

            IroningItem::create([
                'ironing_id' => $id,
                'jobcard_item_id' => $sub['jobcard_item_id'],
                'section_inward_item_id' => $sub['section_inward_item_id'],
                'colour_id' => $sub['colour_id'],
                'size_id' => $sub['size_id'],
                'qty' => $sub['qty'],
                'active_id' => '1',
            ]);

            $sum = IroningItem::where('jobcard_item_id', $sub['jobcard_item_id'])->sum('qty');

            $item = JobcardItem::find($sub['jobcard_item_id']);
            $item->se_out_qty = $item->qty - $sum;
            $item->save();


            $sum_1 = IroningItem::where('section_inward_item_id', $sub['section_inward_item_id'])->sum('qty');

            $item_1 = SectionInwardItem::find($sub['section_inward_item_id']);
            $item_1->pending_qty = $item_1->qty - $sum_1;
            $item_1->save();
        }
    }
    #endregion

    #region[Route]
    public function getRoute(): void
    {
        $this->redirect(route('ironings'));
    }

    public function render()
    {
        $this->getOrderList();
        $this->getStyleList();
        $this->getJobcardList();
        $this->getSectionInwardList();
        return view('livewire.erp.production.ironing.upsert');
    }
    #endregion
}
