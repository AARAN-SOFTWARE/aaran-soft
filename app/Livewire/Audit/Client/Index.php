<?php

namespace App\Livewire\Audit\Client;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\ClientDetail;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[properties]
    public string $group = '';
    public string $payable = '';
    public $sortField_1 = 'vname';
    #endregion

    #region[Save]
    public function getSave(): string
    {
        if ($this->vname != '' or $this->group != '') {

            if ($this->vid == "") {
                $client = Client::create([
                    'vname' => Str::upper($this->vname),
                    'group' => Str::ucfirst($this->group),
                    'payable' => $this->payable,
                    'active_id' => $this->active_id,
                    'user_id' => Auth::id(),
                ]);

                $this->createClientDetails($client->id);
                $this->payable = '';

                $message = "Saved";

            } else {
                $obj = Client::find($this->vid);
                $obj->vname = Str::upper($this->vname);
                $obj->group = Str::ucfirst($this->group);
                $obj->payable = $this->payable;
                $obj->active_id = $this->active_id ?: '0';
                $obj->user_id = Auth::id();
                $obj->save();
                $message = "Updated";
            }
            $this->clearFields();
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion
    #region[clear field]
    public function clearFields()
    {
        $this->vname = '';
        $this->vid = '';
        $this->active_id = '1';
        $this->group = '';
        $this->payable = '';
    }
    #endregion

    #region[Create Client Details]
    public function createClientDetails($id): void
    {
        ClientDetail::create([
            'client_id' => $id,
            'vname' => 'to be fill all field',
            'mobile' => '',
            'whatsapp' => '',
            'email' => '',
            'gstin' => '',
            'address_1' => '',
            'address_2' => '',
            'city' => '',
            'state' => '',
            'pincode' => '',
            'gst_user' => '',
            'gst_pass' => '',
            'einvoice_user' => '',
            'einvoice_pass' => '',
            'eway_user' => '',
            'eway_pass' => '',
            'einvoice_api' => '',
            'einvoice_api_pass' => '',
            'eway_api' => '',
            'eway_api_pass' => '',
            'acc_email' => '',
            'acc_email_pass' => '',
        ]);
    }
    #endregion

    #region[get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Client::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->group = $obj->group;
            $this->payable = $obj->payable;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[sort]
    public function sortBy($field): void
    {
        if ($this->sortField_1 === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    #endregion

    #region[List]
    public function getList()
    {
        $this->sortField = 'id';

        $this->perPage = '100';

        return Client::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[Render]
    public function reRender()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.audit.client.index')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
