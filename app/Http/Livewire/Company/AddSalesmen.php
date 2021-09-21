<?php

namespace App\Http\Livewire\Company;

use App\Mail\AddNewCompany;
use App\Models\Company;
use App\Models\salesman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class AddSalesmen extends Component
{

    public $name;
    public $email;
    public $company_code;
    public $code;
    public $full_code;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:markets,email',
        'full_code' => 'required|string|unique:salesmen,code|max:6',
    ];

    public function render()
    {
        $this->company_code = (Company::query()->where('market_id',auth()->id())->first())->company_code;
        return view('livewire.company.add-salesmen');
    }

    public function updatedCode($code){
        $this->full_code = $this->company_code.$code;
        $this->validate([
            'full_code' => 'required|string|unique:salesmen,code|max:6',
        ],[
            'full_code.unique' => "This code is with other salesman"
        ]);
    }

    public function addSalesman(){
        $this->validate();
        $password = Str::random(8);
        $user = User::query()->insertGetId([
            'type'=>'sales',
            'name'=>$this->name,
            'password'=> Hash::make($password),
            'email'=>$this->email,
            'mobile'=> 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        salesman::query()->create([
            'market_id'=> $user,
            'company_id'=> auth()->id(),
            'code'=> $this->full_code,
        ]);
        Mail::to($this->email)->send(New AddNewCompany(['email' => $this->email, 'password' => $password]));
        $this->reset();
    }
}
