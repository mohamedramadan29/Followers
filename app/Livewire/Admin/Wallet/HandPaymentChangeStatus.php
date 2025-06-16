<?php

namespace App\Livewire\Admin\Wallet;

use Livewire\Component;

class HandPaymentChangeStatus extends Component
{
    public $handPayment;
    public $active_status;
    public function mount($handPayment)
    {
        $this->handPayment = $handPayment;
        $this->active_status = (bool) $handPayment->status;
    }
    public function updatedActiveStatus($value)
    {
        $this->handPayment->status = $value == true ? 1 : 0;
        $this->handPayment->save();
    }

    public function render()
    {
        return view('admin.wallet.hand-payment-change-status');
    }
}
