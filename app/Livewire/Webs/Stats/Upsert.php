<?php

namespace App\Livewire\Webs\Stats;

use Aaran\Web\Models\Stats;
use Aaran\Web\Models\StatsItem;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upsert extends Component
{
    use CommonTrait;
    use WithFileUploads;

    #region[properties]
    public $description;
    ##endregion

    #region[array]
    public $itemList = [];
    public mixed $itemIndex = '';
    public $secondaryItem = [];
    public $itemIncrement = 0;
    #endregion

    #region[Save]
    public function save(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $obj = Stats::create([
                    'vname' => Str::upper($this->vname),
                    'description' => $this->description,
                    'active_id' => $this->active_id,
                    'user_id' => Auth::id(),
                ]);
                $this->saveItem($obj->id);

                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Stats::find($this->vid);
                $obj->vname = Str::upper($this->vname);
                $obj->description = $this->description;
                $obj->active_id = $this->active_id;
                $obj->user_id = Auth::id();
                $obj->save();

                $this->saveItem($obj->id);

                $message = "Updated";
                $this->getRoute();
            }
            $this->vname = '';
            $this->description = '';
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        }
    }

    public function saveItem($id): void
    {
        if ($this->itemList != null) {
            foreach ($this->itemList as $sub) {
                if ($sub['stats_items_id'] === 0 && $sub['count'] != "") {
                    StatsItem::create([
                        'stats_id' => $id,
                        'count' => $sub['count'],
                        'heading' => $sub['heading'],
                        'description' => $sub['description'] ?: 1,
                    ]);
                } elseif ($sub['stats_items_id'] != 0 && $sub['count'] != "") {
                    $detail = StatsItem::find($sub['stats_items_id']);
                    $detail->count = $sub['count'];
                    $detail->heading = $sub['heading'];
                    $detail->description = $sub['description'];
                    $detail->save();
                }
            }
        } else {
            StatsItem::create([
                'stats_id' => $id,
                'count' => '-',
                'heading' => '-',
                'description' => '-',
            ]);
        }
    }
    #endregion

    #region[Mount]
    public function mount($id): void
    {
        if ($id != 0) {

            $obj = Stats::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->active_id = $obj->active_id;


            $data = DB::table('stats_items')->select('stats_items.*',)
                ->where('stats_id', '=', $id)->get()->transform(function ($data) {
                    return [
                        'stats_items_id' => $data->id,
                        'heading' => $data->heading,
                        'count' => $data->count,
                        'description' => $data->description,
                    ];
                });
            $this->itemList = $data->toArray();
            for ($j = 0; $j < $data->skip(1)->count(); $j++) {
                $this->secondaryItem[] = $j + 1;
            }
        } else {
            $this->active_id = true;
            $this->itemList[0] = [
                'stats_items_id' => 0,
                'count' => '-',
                'heading' => '-',
                'description' => '-',
            ];
        }
    }
    #endregion

    #region[removeItems]
    public function removeItems($index): void
    {
        $items = $this->itemList[$index];
        unset($this->itemList[$index]);
        if($items['stats_items_id']!=0){
            $obj=StatsItem::find( $items['stats_items_id']);
            $obj->delete();
        }
    }
    #endregion

    #region[addItem]
    public function addItem($id):void
    {
        $this->itemIncrement=$id+1;
        if (!in_array($this->itemIncrement,$this->secondaryItem,true)) {
            $this->secondaryItem[] = $this->itemIncrement;
        }elseif(!in_array(($this->itemIncrement+1),$this->secondaryItem,true)){
            $this->secondaryItem[] = $this->itemIncrement+1;
        }

        $this->itemList[] = [
            'stats_items_id' => 0,
            "heading" => "",
            "count" => "",
            "description" => "",
        ];
    }
    #endregion



    #region[deleteItem]
    public function deleteItem($id,$value):void
    {
        $this->itemIncrement=$value-1;
        unset($this->secondaryItem[$id]);
        $this->removeItems($value);
    }
    #endregion

    #region[render]
    public function getRoute(): void
    {
        $this->redirect(route('stats'));
    }
    public function render()
    {
        return view('livewire.webs.stats.upsert');
    }
    #endregion
}
