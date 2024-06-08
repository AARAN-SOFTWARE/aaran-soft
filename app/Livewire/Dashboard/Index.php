<?php

namespace App\Livewire\Dashboard;

use App\Helper\Core;
use App\Helper\Slogan;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{

    public Collection $transaction;

    public function mount()
    {
        $this->transaction = Collection::make([
            'total_sales' => 2000,
            'month_sales' => 300,
            'total_purchase' => 400,
            'month_purchase' => 500,
            'total_receivable' => 200,
            'month_receivable' => 600,
            'total_payable' => 300,
            'month_payable' => 360,
        ]);
    }


    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
