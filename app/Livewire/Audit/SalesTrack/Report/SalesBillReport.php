<?php

namespace App\Livewire\Audit\SalesTrack\Report;

use Aaran\Audit\Models\SalesTrack\Rootline;
use Aaran\Audit\Models\SalesTrack\RootlineItems;
use Aaran\Audit\Models\SalesTrack\SalesBill;
use Aaran\Audit\Models\SalesTrack\SalesBillItem;
use Aaran\Audit\Models\SalesTrack\SalesTrack;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use Aaran\Audit\Models\SalesTrack\TrackReport;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class SalesBillReport extends Component

{
    #region[property]
    use CommonTrait;

    public $rootLine_id;
    public $rootLines;

    public $salesTracks;
    public $salesTrack_id;
    public $salesTrackItems;
    public $salesTrackItem_id;

    public $group;
    public $salesBillitem;
    public $checked;
    public $sales_bill_id;
    public $trackReport;
    #endregion

    #region[mount]
    public function mount(): void
    {
        $this->rootLines = Rootline::all();
    }
    #endregion

    #region[salesTrack]
    public function salesTrack(): void
    {
        $this->salesTracks = SalesTrack::where('rootline_id', '=', $this->rootLine_id)
            ->get();
    }
    #endregion

    #region[salesTrackItem]
    public function salesTrackItem()
    {
        $this->salesTrackItems = SalesTrackItem::where('sales_track_id', '=', $this->salesTrack_id)->get();
    }
    #endregion


    #region[getChecked]
    public function getChecked($id)
    {
        $obj = SalesBill::find($id);
        if ($id) {
            TrackReport::create([
                'sales_bill_id' => $id,
                'unique_no' => $obj->unique_no,
                'user_id' => auth()->id(),
                'checked' => '1',
            ]);
        }
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField = 'vno';
        $this->salesTrack();
        $this->salesTrackItem();

        $this->trackReport = TrackReport::all();

        $salesBill = SalesBillItem::join('sales_bills', 'sales_bills.id', '=', 'sales_bill_items.sales_track_bill_id')

//            ->join('sales_track_items', 'sales_track_items.id', '=', 'sales_bills.sales_track_item_id')
//
//            ->join('sales_tracks', 'sales_tracks.id', '=', 'sales_track_items.sales_track_id')

            ->join('products', 'products.id', '=', 'sales_bill_items.product_id')
            ->join('hsncodes', 'hsncodes.id', '=', 'products.hsncode_id')
            ->where('sales_bills.rootline_id', '=', $this->rootLine_id)

            ->when($this->group, function ($query, $group) {
                return $query->where('sales_bills.group', '=', $group);
            })

            ->when($this->salesTrackItem_id, function ($query, $salesTrackItem_id) {
                return $query->where('sales_bills.sales_track_item_id', '=', $salesTrackItem_id);
            })
            ->when($this->start_date, function ($query, $start_date) {
                return $query->whereDate('sales_bills.vdate', '>=', $start_date);
            })
            ->when($this->end_date, function ($query, $end_date) {
                return $query->whereDate('sales_bills.vdate', '<=', $end_date);
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->where('sales_bills.active_id', '=', $this->activeRecord)
            ->get();
        $this->salesBillitem = $salesBill;


        return $salesBill
            ->unique('unique_no');
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.audit.sales-track.report.sales-bill-report')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
