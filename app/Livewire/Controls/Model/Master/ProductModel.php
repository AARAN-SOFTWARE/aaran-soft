<?php

namespace App\Livewire\Controls\Model\Master;

use Aaran\Common\Models\Hsncode;
use Aaran\Master\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductModel extends Component
{
    public bool $showModel = false;

    public $vname = "";
    public string $product_type;
    public string $units;
    public string $gst_percent;

    public function mount($name): void
    {
        $this->vname = $name;
        $this->product_type = 0;
        $this->units = config('aadmin.unitsDefault');
        $this->gst_percent = config('aadmin.gstPercentDefault');
    }

    public function save(): void
    {
        if ($this->vname != '') {
            $obj = Product::create([
                'vname' => Str::ucfirst($this->vname),
                'product_type' => $this->product_type,
                'hsncode_id' => $this->hsncode_id?:1,
                'units' => $this->units,
                'gst_percent' => $this->gst_percent,
                'user_id' => Auth::id(),
                'company_id'=>session()->get('company_id'),
                'active_id' => '1'
            ]);
            $this->dispatch('refresh-product', ['name' => $this->vname, 'id' => $obj->id,'gst_percent'=>$this->gst_percent]);
            $this->clearAll();
        }
    }

    public function clearAll(): void
    {
        $this->showModel = false;
        $this->vname = "";
         $this->product_type='';
         $this->hsncode_id='';
         $this->units='';
         $this->gst_percent='';
    }
    public $hsncode_id = '';
    public $hsncode_no = '';
    public Collection $hsncodeCollection;
    public $highlightHsncode = 0;
    public $hsncodeTyped = false;

    public function decrementHsncode(): void
    {
        if ($this->highlightHsncode === 0) {
            $this->highlightHsncode = count($this->hsncodeCollection) - 1;
            return;
        }
        $this->highlightHsncode--;
    }

    public function incrementHsncode(): void
    {
        if ($this->highlightHsncode === count($this->hsncodeCollection) - 1) {
            $this->highlightHsncode = 0;
            return;
        }
        $this->highlightHsncode++;
    }

    public function setHsncode($name, $id): void
    {
        $this->hsncode_no = $name;
        $this->hsncode_id = $id;
        $this->getHsncodeList();
    }

    public function enterHsncode(): void
    {
        $obj = $this->hsncodeCollection[$this->highlightHsncode] ?? null;

        $this->hsncode_no = '';
        $this->hsncodeCollection = Collection::empty();
        $this->highlightHsncode = 0;

        $this->hsncode_no = $obj['vname'] ?? '';;
        $this->hsncode_id = $obj['id'] ?? '';;
    }

    #[On('refresh-hsncode')]
    public function refreshHsncode($v): void
    {
        $this->hsncode_id = $v['id'];
        $this->hsncode_no = $v['name'];
        $this->hsncodeTyped = false;

    }

    public function hsncodeSave($name)
    {
        $obj= Hsncode::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshHsncode($v);
    }

    public function getHsncodeList(): void
    {
        $this->hsncodeCollection = $this->hsncode_no ? Hsncode::search(trim($this->hsncode_no))->get() : Hsncode::all();
    }

    public function render()
    {
        $this->getHsncodeList();
        return view('livewire.controls.model.master.product-model');
    }
}
