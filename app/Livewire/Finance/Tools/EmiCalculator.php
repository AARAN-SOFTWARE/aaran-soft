<?php

namespace App\Livewire\Finance\Tools;

use App\Helper\ConvertTo;
use Livewire\Component;

class EmiCalculator extends Component
{
    public $loan_amount;
    public $interest;
    public $period;
    public $balance;
    public $due_amount;

    public $amount;
    public $principal;
    public $rate;
    public $term;

    public mixed $dues;

    public function mount()
    {
        $this->loan_amount = 1;
        $this->interest =1;
        $this->period = 1.3;
        $this->term = 1.3;

        $this->interest = ($this->interest / 100) / $this->period;

        $this->amount = array(
            'summary' => $this->getSummary(),
            'schedule' => $this->getSchedule(),
        );
    }

    public function setRate()
    {
        $this->loan_amount = $this->principal;
        $this->interest = $this->rate;
        $this->period = $this->term;

        $this->interest = ($this->interest / 100) / $this->period;

        $this->amount = array(
            'summary' => $this->getSummary(),
            'schedule' => $this->getSchedule(),
        );
    }


    private function calculate()
    {
        $x = pow(1 + $this->interest, $this->period);
        $y = $this->loan_amount * $x * $this->interest;
        $z = $x - 1;

        if($z != 0) {
            $emi = (100 * ($y / $z)) / 100;
        }
        $this->due_amount = $emi;

        $interest = ConvertTo::decimal2($this->loan_amount * $this->interest);

        $principal = $this->due_amount - $interest;

        $this->balance = $this->loan_amount - $principal;

        return array(
            'payment' => ConvertTo::decimal2($this->due_amount),
            'interest' => ConvertTo::decimal2($interest),
            'principal' => ConvertTo::decimal2($principal),
            'balance' => ConvertTo::decimal2($this->balance)
        );
    }

    public function getSummary()
    {

        $this->calculate();

        $total_pay = $this->due_amount * $this->period;

        $total_interest = $total_pay - $this->loan_amount;

        return array(
            'total_pay' => $total_pay,
            'total_interest' => $total_interest,
        );
    }

    public function getSchedule()
    {
        $schedule = array();

        while ($this->balance >= 0) {

            $schedule[] = $this->calculate();

            $this->loan_amount = $this->balance;

            $this->period--;
        }

        return $schedule;

    }

    public function render()
    {
        return view('livewire.finance.tools.emi-calculator');
    }
}
