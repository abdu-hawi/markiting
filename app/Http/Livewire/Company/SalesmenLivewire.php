<?php

namespace App\Http\Livewire\Company;

use App\Models\Salesman;
use Livewire\Component;

class SalesmenLivewire extends Component
{
    public $salesmen;
    public function mount(){
        $this->salesmen = Salesman::query()
            ->where('company_id', auth()->id())
            ->with('user')
            ->latest()->get();
    }

    public function render()
    {
        return view('livewire.company.salesmen-livewire');
    }
}
