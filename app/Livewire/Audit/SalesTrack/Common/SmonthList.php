<?php

namespace App\Livewire\Audit\SalesTrack\Common;

use Aaran\Audit\Models\SalesTrack\Smonth;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class SmonthList extends Component
{
    #region[property]
    use CommonTrait;
    use WithPagination;

    public mixed $month;
    public mixed $year='';
    #endregion

    #region[generate]
    public function generate()
    {

        $months = Smonth::where('year', $this->year?:Carbon::now()->format('Y'))->get();
        if ($months->count() == 0) {
            for ($i = 1; $i <= 12; $i++) {
                Smonth::create([
                    'month' => $i,
                    'year' => $this->year ?: Carbon::now()->format('Y'),
                    'active_id' => '1',
                ]);
            }
            $this->js('window.location.reload()');
        }
    }
    #endregion

    #region[getSave]
    public function getSave(): void
    {
        if ($this->month != '') {
            if ($this->vid == "") {
                Smonth::create([
                    'month' => $this->month,
                    'year' => $this->year,
                ]);
                $message = "Saved";

            } else {
                $obj = Smonth::find($this->vid);
                $obj->month = $this->month;
                $obj->year = $this->year;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }

    #endregion

    #region[]
    public function getObj($id)
    {
        if ($id) {
            $obj = Smonth::find($id);
            $this->vid = $obj->id;
            $this->month = $obj->month;
            $this->year = $obj->year;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[clearFields]
    public function clearFields()
    {
        $this->year=Carbon::now()->format('Y');
        $this->month='';
        $this->active_id=true;
    }
    #endregion

    #region[]
    public function getList()
    {
        $this->sortField = 'year';
        return Smonth::where('active_id','=',$this->activeRecord)
            ->where('year', $this->year?:Carbon::now()->format('Y'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.audit.sales-track.smonth-list')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
