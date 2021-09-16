<?php

namespace App\Http\Livewire\Market;

use App\Models\Company;
use App\Models\User;
use Livewire\Component;

class CompanyLivewire extends Component{

    public $companies = [];
    public $editCompaniesIndex = null;
    public $editCompaniesField = null;

    public function mount(){
        $this->companies = Company::query()->latest()
            ->with(['user', 'city'])
            ->get()->toArray();
    }

    public function render(){
        return view('livewire.market.company-livewire', ['companies' => $this->companies]);
    }
}
