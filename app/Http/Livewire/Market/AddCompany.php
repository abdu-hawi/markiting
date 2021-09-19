<?php

namespace App\Http\Livewire\Market;

//use App\Models\City;
use App\Mail\AddNewCompany;
use App\Models\Company;
//use App\Models\Country;
use App\Models\Geolocation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class AddCompany extends Component{

    public $cities;
    public $geolocations;
    public $packages;
    public $packagesOwed = [];

    public $selectedCity = null;
    public $selectedGeolocation = null;

    public $name;
    public $email;
    public $mobile;
    public $company_code;
    public $expire_date;
    public $amount_type;
    public $amount;
    public $sales_owed;
//    public $our_owed;

//    public function mount(){
//        $this->cities = City::query()->where('locale','ar')->get();
//    }

    protected $rules = [
        'name' => 'required|string|unique:markets,name',
        'email' => 'required|email|unique:markets,email',
        'mobile' => 'required|digits:9|unique:markets,mobile',
        'company_code' => 'required|string|unique:companies,company_code|max:2',
        'expire_date' => 'required',
        'amount_type' => 'required|in:percent,fixed',
        'amount' => 'required|numeric',
        'sales_owed' => 'required|numeric',
        'selectedCity' => 'required|numeric',
        'selectedGeolocation' => 'required|numeric',
    ];

    public function render(){
        $this->packages = Cache::remember('packages',3600*60,function (){
            return DB::table('packages')
                ->join('package_translations', 'package_id','=', 'packages.id')
                ->join('country_packages', 'country_packages.package_id','=', 'packages.id')
                ->where('active', true)
                ->where('locale','ar')
                ->where('package_type','paid')
                ->where('packages.deleted_at',null)
                ->where('country_packages.country_id',1)
                ->select([
                    'packages.id as id',
                    'name',
                    'price'
                ])
                ->get();
        });
        return view('livewire.market.add-company');
    }

    public function updatedSelectedCity($city){
        $this->selectedCity = $city;
        if (!is_null($city)) {
            $this->geolocations = Geolocation::where('city_id', $city)->get();
        }
    }

    public function updatedSalesOwed($percent){
        $this->checkValue();
    }
    public function updatedAmountType($type){
        if (!is_null($this->amount) && !is_null($this->sales_owed))
            $this->checkValue();
    }
    public function updatedAmount($type){
        if (!is_null($this->amount_type) && !is_null($this->sales_owed))
            $this->checkValue();
    }

    private function checkValue(){
        $this->validate([
            'amount_type' => 'required|in:percent,fixed',
            'amount' => 'required|numeric',
            'sales_owed' => 'required|numeric',
        ]);

        foreach ($this->packages as $i => $package){

            $price = $this->packages[$i]['price'];

            $this->packagesOwed[$i]['id'] =  $this->packages[$i]['id'];
            $this->packagesOwed[$i]['name'] =  $this->packages[$i]['name'];
            $this->packagesOwed[$i]['price'] =  $price;

            if ($this->amount_type == 'fixed'){
                $price_after_discount = $price - $this->amount;
                $this->packagesOwed[$i]['price_after_discount'] = $price_after_discount;
                $this->packagesOwed[$i]['sales_price'] = $this->sales_owed;
                $this->packagesOwed[$i]['our_price'] = $price_after_discount - $this->sales_owed;
            }else{
                $price_after_discount = $price - $price * $this->amount / 100;
                $this->packagesOwed[$i]['price_after_discount'] = $price_after_discount;
                $this->packagesOwed[$i]['sales_owed'] = $this->sales_owed;
                $this->packagesOwed[$i]['sales_price'] = $price_after_discount * $this->sales_owed / 100;
                $our_owed = 100 - $this->sales_owed;
                $this->packagesOwed[$i]['our_owed'] = $our_owed;
                $this->packagesOwed[$i]['our_price'] = $price_after_discount * $our_owed / 100;
            }
        }
    }

    public function addCompany(){
        $this->validate();
        $password = Str::random(8);
        $user = User::query()->insertGetId([
            'type'=>'company',
            'name'=>$this->name,
            'password'=> Hash::make($password),
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]);
        Company::query()->create([
            'market_id'=> $user,
            'country_id'=> 1,
            'city_id'=> $this->selectedCity,
            'geolocation_id'=> $this->selectedGeolocation,
            'company_code'=> $this->company_code,
            'expire_date'=> $this->expire_date,
            'amount_type'=> $this->amount_type,
            'amount'=> $this->amount,
            'sales_owed'=> $this->sales_owed,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Mail::to($this->email)->send(New AddNewCompany(['email' => $this->email, 'password' => $password]));
        $this->reset();
        $this->emit("companyAdded");
    }
}
