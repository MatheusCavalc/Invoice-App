<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Index extends Component
{
    #[Title('Company Home')]
    public function render()
    {
        return view('livewire.index');
    }
}
