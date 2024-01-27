<?php

namespace App\Livewire;

use Livewire\Component;

class InvoiceDetails extends Component
{
    public $invoice;

    public function mount($invoice = null)
    {
        $this->invoice = $invoice;
    }

    public function render()
    {
        return view('livewire.invoice-details');
    }
}
