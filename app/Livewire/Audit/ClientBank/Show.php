<?php

namespace App\Livewire\Audit\ClientBank;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\ClientBank;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;

    #region[Bank-details properties]
    public ClientBank $bank;
    public mixed $client_id;
    public Collection $banks;
    #endregion

    #region[Client Bank]
    public function getClientBank(): void
    {
        $this->banks = ClientBank::all();
    }

    public function switch(): void
    {
        if ($this->client_id) {
            $this->bank = ClientBank::find($this->client_id);
        }
    }
    #endregion

    #region[Mount]
    public function mount($id): void
    {
        if ($id) {
            $this->bank = ClientBank::find($id);
        }
    }
    #endregion

    #region[Render]
    public function render()
    {
        $this->getClientBank();
        return view('livewire.audit.client-bank.show');
    }
    #endregion
}
