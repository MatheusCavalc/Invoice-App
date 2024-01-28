<?php

namespace App\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceDetails extends Component
{
    public $invoice;

    public function mount($invoice = null)
    {
        $this->invoice = $invoice;
    }

    public function download()
    {
        $data = $this->invoice;

        $pdf = Pdf::loadView('pdf', ['data' => $data]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $this->invoice->number . '.pdf');

        //return $pdf->download($this->invoice->number . '.pdf');
    }

    public function render()
    {
        return view('livewire.invoice-details');
    }
}
