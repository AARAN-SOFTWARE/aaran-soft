<?php

namespace App\Livewire\Audit\SalesTrack\Bills;

use Aaran\Audit\Models\SalesTrack\SalesBill;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[property]

    public mixed $salesTrackIitem;
    public $track_id;
    public $vdate;
    public $tracks;
    public $status;

    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->salesTrackIitem = SalesTrackItem::find($id);
        $this->vdate = $this->salesTrackIitem->vdate;
//        $this->track_item_id = $salesTrackIitem_id;
//        $this->track_id = $track_id;
//        $this->sales-track=Track::find($track_id);
    }
    #endregion


    #region[create]
    public function create(): void
    {
        $this->redirect(route('salesTracks.billItems', ['id'=>'0']));
    }
    #endregion

    #region[get obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = SalesBill::find($id);
            $this->vid = $obj->id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[delete]
    public function delete()
    {
        if ($this->vid) {
            $obj = $this->getObj($this->vid);
            DB::table('sales_bill_items')->where('sales_bill_id', '=', $this->vid)->delete();
            $obj->delete();
            $this->showDeleteModal = false;
            $this->clearFields();
        }
    }
    #endregion

    #region[get list]
    public function getList()
    {
        return SalesBill::search($this->searches)
            ->where('sales_track_item_id', '=', $this->salesTrackIitem->id)
            ->orderBy('vdate', $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[render]
    public function reRender()
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.audit.sales-track.bills.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
