<?php

namespace App\Http\Livewire\Company;

use App\Models\Salesman;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesmenLivewire extends Component
{
    public $salesmen = [];
    public $packages = [];
    public function mount(){
        $this->salesmen = Salesman::query()
            ->where('company_id', auth()->id())
            ->with(['user','stores'])
            ->withCount('stores')
            ->get();
        /*
         [ "A" => [
                not paid => 3,
                paid => 2,
                ]
         */


    }

    public function render()
    {
//        dd(Salesman::query()->get('market_id'));
//        dd($this->salesmen);
        return view('livewire.company.salesmen-livewire');
    }
}
