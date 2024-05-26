<?php

namespace App\Livewire\Audit\SalesTrack\Report;

use Aaran\Audit\Models\SalesTrack\SalesBill;
use Aaran\Audit\Models\SalesTrack\SalesBillItem;
use Aaran\Audit\Models\SalesTrack\SalesTrack;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use Aaran\Audit\Models\SalesTrack\Track;
use Aaran\Audit\Models\SalesTrack\TrackReport;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class SalesBillReport extends Component

{
    #region[property]
    use CommonTrait;

    public $tracks;
    public $salesTracks;
    public $track_id;
    public $salesTrack_id;
    public $trackItem_id;
    public $trackItems = [];
    public $salesBillitem;
    public $checked;
    public $sales_bill_id;
    public $trackReport;
    #endregion

    #region[mount]
    public function mount()
    {
        $this->salesTracks = SalesTrack::all();
    }
    #endregion

    #region[track Item]
    public function track_item()
    {
        $this->trackItems = SalesTrackItem::where('sales_track_id', '=', $this->salesTrack_id)
            ->get();
    }
    #endregion

    #region[track Item]
    public function track()
    {
        $this->tracks = Track::where('sales_track_id', '=', $this->salesTrack_id)
            ->get();
    }
    #endregion

    #region[getChecked]
    public function getChecked($id)
    {
        $this->sales_bill_id=$id;
        $obj=SalesBill::find($id);
        if($this->sales_bill_id){
            TrackReport::create([
                'track_id'=>$this->track_id,
                'sales_bill_id' => $this->sales_bill_id,
                'client_id'=>$obj->sales_from,
                'vno'=>$obj->vno,
                'checked' => '1',
            ]);
        }
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField='vno';
        $this->track_item();
        $this->track();

        $this->trackReport=TrackReport::where('track_id', '=', $this->track_id)->get();

        $salesBill = SalesBillItem::
        join('sales_bills', 'sales_bills.id', '=', 'sales_bill_items.sales_bill_id')
            ->join('sales-track', 'sales-track.id', '=', 'sales_bills.track_id')
            ->join('track_items', 'track_items.id', '=', 'sales_bills.track_item_id')
            ->join('products', 'products.id', '=', 'sales_bill_items.product_id')
            ->join('hsncodes', 'hsncodes.id', '=', 'products.hsncode_id')
                ->where('sales_bills.track_id', '=', $this->track_id)
            ->when($this->trackItem_id,function ($query,$trackItem_id){
                return $query->where('sales_bills.track_item_id', '=', $trackItem_id);
            })

            ->when($this->start_date,function ($query,$start_date){
                return $query->whereDate('sales_bills.vdate','>=',$start_date);
            })
            ->when($this->end_date,function ($query,$end_date){
                return $query->whereDate('sales_bills.vdate','<=',$end_date);
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->where('sales_bills.active_id', '=', $this->activeRecord)
            ->get();
        $this->salesBillitem = $salesBill;


        return $salesBill
        ->unique('vno');
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.audit.sales-track.sales-bill-report')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
