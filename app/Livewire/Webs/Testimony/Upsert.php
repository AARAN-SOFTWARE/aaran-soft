<?php

namespace App\Livewire\Webs\Testimony;

use Aaran\Web\Models\Testimony;
use Aaran\Web\Models\TestimonyItem;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
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
    public $image;
    public $description;
    ##endregion

    #region[array]
    public $itemList = [];
    public mixed $itemIndex = '';
    public $secondaryItem = [];
    public $itemIncrement = 0;
    public $old_image;
    #endregion

    #region[Save]
    public function save(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $obj = Testimony::create([
                    'vname' => Str::upper($this->vname),
                    'description' => $this->description,
                    'image' => $this->saveImage(),
                    'active_id' => $this->active_id,
                    'user_id' => Auth::id(),
                ]);
                $this->saveItem($obj->id);

                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Testimony::find($this->vid);
                $obj->vname = Str::upper($this->vname);
                $obj->description = $this->description;
                $obj->image = $this->saveImage();
                $obj->active_id = $this->active_id;
                $obj->user_id = Auth::id();
                $obj->save();

                $this->saveItem($obj->id);

                $message = "Updated";
                $this->getRoute();
            }
            $this->vname = '';
            $this->description = '';
            $this->image = '';
            $this->old_image='';
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        }
    }

    public function saveItem($id): void
    {
        if ($this->itemList != null) {
            foreach ($this->itemList as $sub) {
                if ($sub['testimony_items_id'] === 0 && $sub['title'] != "") {
                    TestimonyItem::create([
                        'testimony_id' => $id,
                        'title' => $sub['title'],
                        'icon' => $sub['icon'],
                        'description' => $sub['description'] ?: 1,
                    ]);
                } elseif ($sub['testimony_items_id'] != 0 && $sub['title'] != "") {
                    $detail = TestimonyItem::find($sub['testimony_items_id']);
                    $detail->title = $sub['title'];
                    $detail->icon = $sub['icon'];
                    $detail->description = $sub['description'];
                    $detail->save();
                }
            }
        } else {
            TestimonyItem::create([
                'testimony_id' => $id,
                'title' => '-',
                'icon' => '-',
                'description' => '-',
            ]);
        }
    }
    #endregion

    #region[Mount]
    public function mount($id): void
    {
        if ($id != 0) {

            $obj = Testimony::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->description = $obj->description;
            $this->old_image= $obj->image;
            $this->active_id = $obj->active_id;


            $data = DB::table('testimony_items')->select('testimony_items.*',)
                ->where('testimony_id', '=', $id)->get()->transform(function ($data) {
                    return [
                        'testimony_items_id' => $data->id,
                        'icon' => $data->icon,
                        'title' => $data->title,
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
                'testimony_items_id' => 0,
                'title' => '-',
                'icon' => '-',
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
        if($items['testimony_items_id']!=0){
            $obj=TestimonyItem::find( $items['testimony_items_id']);
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
            'testimony_items_id' => 0,
            "icon" => "",
            "title" => "",
            "description" => "",
        ];
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->image) {

            $image = $this->image;
            $filename = $this->image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_image))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_image));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_image) {
                return $this->old_image;
            } else {
                return 'no_image';
            }
        }
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
        $this->redirect(route('testimony'));
    }

    public function render()
    {
        return view('livewire.webs.testimony.upsert');
    }
    #endregion
}
