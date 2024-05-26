<?php

namespace App\Livewire\Audit\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use Aaran\Audit\Models\SalesTrack\SalesBill;
use Aaran\Audit\Models\SalesTrack\Track;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesBillList extends Component
{
    #region[property]
    use CommonTrait;
    public mixed $track_item_id;
    public $track_id;
    public $tracks;
    public $status;
    #endregion

    #region[create]
    public function create(): void
    {
        $this->redirect(route('salesTrack.billItems', ['id'=>'0','salesTrackIitem_id'=>$this->track_item_id,'track_id'=>$this->track_id,]));
    }
    #endregion

    #region[mount]
    public function mount($salesTrackIitem_id,$track_id)
    {
        $this->track_item_id = $salesTrackIitem_id;
        $this->track_id = $track_id;
        $this->tracks=Track::find($track_id);
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
        $this->sortField = 'vdate';

        return SalesBill::search($this->searches)
            ->where('track_item_id', '=', $this->track_item_id)
            ->where('track_id','=', $this->track_id)
            ->when($this->status,function ($query,$status){
                return $query->where('status', '=', $status);
            })
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
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
        return view('livewire.audit.sales-track.sales-bill-list')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
