<?php

namespace App\Livewire\Audit\Client;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\ClientDetail;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;

    #region[Show properties]
    public Client $client;

    public string $mobile = '';
    public string $whatsapp = '';
    public string $email = '';
    public string $gstin = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $city = '';
    public string $state = '';
    public string $pincode = '';
    public string $gst_user = '';
    public string $gst_pass = '';
    public string $einvoice_user = '';
    public string $einvoice_pass = '';
    public string $eway_user = '';
    public string $eway_pass = '';
    public string $einvoice_api = '';
    public string $einvoice_api_pass = '';
    public string $eway_api = '';
    public string $eway_api_pass = '';
    public string $acc_email = '';
    public string $acc_email_pass = '';

    public $client_id = '';
    public bool $showModal;
    public $modalName;

    public bool $billPlanModal;
    public $clients;

    public string $companyx;
    public string $modex;

    public $turnover;
    public $billing;
    #endregion

    #region[Mount]
    public function mount($id)
    {

        $this->clients = Client::where('active_id','=', Active::ACTIVE)->get();

        if ($id) {
            $this->client_id = $id;

        }
    }
    #endregion

    #region[Client]
    public function getClient(): void
    {
        $this->client = Client::find($this->client_id);
    }

    public function getClientDetails(): void
    {
        if ($this->client_id) {
            $obj = ClientDetail::where('client_id', '=', $this->client_id)->firstOrFail();
            $this->vid = $obj->id;
            $this->client_id = $obj->client_id;
            $this->vname = $obj->vname;
            $this->mobile = $obj->mobile;
            $this->whatsapp = $obj->whatsapp;
            $this->email = $obj->email;
            $this->gstin = $obj->gstin;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->city = $obj->city;
            $this->state = $obj->state;
            $this->pincode = $obj->pincode;
            $this->gst_user = $obj->gst_user;
            $this->gst_pass = $obj->gst_pass;
            $this->einvoice_user = $obj->einvoice_user;
            $this->einvoice_pass = $obj->einvoice_pass;
            $this->eway_user = $obj->eway_user;
            $this->eway_pass = $obj->eway_pass;
            $this->einvoice_api = $obj->einvoice_api;
            $this->einvoice_api_pass = $obj->einvoice_api_pass;
            $this->eway_api = $obj->eway_api;
            $this->eway_api_pass = $obj->eway_api_pass;
            $this->acc_email = $obj->acc_email;
            $this->acc_email_pass = $obj->acc_email_pass;
        }
    }
    #endregion

    #region[Show Detail]
    public function showDetailModal($v): void
    {
        $this->showModal = true;

        switch ($v) {
            case 'contactDetails':
                $this->modalName = 'contactDetails';
                break;
            case 'address':
                $this->modalName = 'address';
                break;
            case 'gstPass':
                $this->modalName = 'gstPass';
                break;
            case 'einvoice':
                $this->modalName = 'einvoice';
                break;
            case 'eway':
                $this->modalName = 'eway';
                break;
            case 'einvoiceApi':
                $this->modalName = 'einvoiceApi';
                break;
            case 'ewayApi':
                $this->modalName = 'ewayApi';
                break;
            case 'accEmail':
                $this->modalName = 'accEmail';
                break;
        }
    }
    #endregion

    #region[Update Details]
    public function upsertDetails(): void
    {
        if ($this->vid) {
            $this->updateClientDetails();
        }
        $this->showModal = false;
    }

    public function updateClientDetails(): void
    {
        $obj = ClientDetail::find($this->vid);
        $obj->vname = $this->vname;
        $obj->mobile = $this->mobile;
        $obj->whatsapp = $this->whatsapp;
        $obj->email = $this->email;
        $obj->gstin = $this->gstin;
        $obj->address_1 = $this->address_1;
        $obj->address_2 = $this->address_2;
        $obj->city = $this->city;
        $obj->state = $this->state;
        $obj->pincode = $this->pincode;
        $obj->gst_user = $this->gst_user;
        $obj->gst_pass = $this->gst_pass;
        $obj->einvoice_user = $this->einvoice_user;
        $obj->einvoice_pass = $this->einvoice_pass;
        $obj->eway_user = $this->eway_user;
        $obj->eway_pass = $this->eway_pass;
        $obj->einvoice_api = $this->einvoice_api;
        $obj->einvoice_api_pass = $this->einvoice_api_pass;
        $obj->eway_api = $this->eway_api;
        $obj->eway_api_pass = $this->eway_api_pass;
        $obj->acc_email = $this->acc_email;
        $obj->acc_email_pass = $this->acc_email_pass;
        $obj->save();
    }
    #endregion

    #region[BillPlan]
    public function showBillPlan(): void
    {
        $this->billPlanModal = true;
    }

    public function redirectTo(): void
    {
        redirect()->to(route('clients'));
    }
    #endregion

    #region[Render]
    public function reRender(): void
    {
        $this->render();
        $this->dispatch('refresh-turnover', id: $this->client_id);
    }

    public function render()
    {
        $this->getClient();
        $this->getClientDetails();

        return view('livewire.audit.client.show');
    }
    #endregion
}
