<?php

namespace App\Http\Livewire\Company;

use App\Models\Salesman;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesmenLivewire extends Component
{
    public $salesmen = [];
    public function mount(){
        $salesmen = Salesman::query()
            ->where('company_id', auth()->id())
            ->with(['user','store'])
            ->get();
        foreach ($salesmen as $salesman){
            $this->salesmen['store'] = DB::table('salesman_store')
                ->where('company_id',auth()->id())
//                ->where('salesman_id',$salesman->id)
                ->get();

        }
    }

    public function render()
    {
//        dd(Salesman::query()->get('market_id'));
        dd($this->salesmen);
        return view('livewire.company.salesmen-livewire');
    }
}
