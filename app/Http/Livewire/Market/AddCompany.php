<?php

namespace App\Http\Livewire\Market;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Geolocation;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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
    public $our_owed;

    public function mount(){
        $this->cities = City::query()->where('locale','ar')->get();
    }

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

//    public function updated($field){
//        $market = ['name','email'];
//        $this->validate([
//            $field => 'string|unique:markets,'.$field
//        ]);
//    }


    public function updatedSelectedCity($city){
        $this->selectedCity = $city;
        if (!is_null($city)) {
            $this->geolocations = Geolocation::where('city_id', $city)->get();
        }
    }
    public function updatedSalesOwed($percent){
        $this->validate([
            'amount_type' => 'required|in:percent,fixed',
            'amount' => 'required|numeric',
            'sales_owed' => 'required|numeric',
        ]);
        $this->our_owed = (100 - $percent). " %" ;

//        $this->packagesOwed = $this->packages;
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

//                $priceSales = $price - $this->sales_owed;
//                $priceOur = $price - $priceSales;
//                $this->packagesOwed[$i]['amount'] = $this->amount;
//                $this->packagesOwed[$i]['amount_type'] = $this->amount_type;
//                $this->packagesOwed[$i]['sales_owed'] = $price - $this->sales_owed;
//                $this->packagesOwed[$i]['priceSales'] = $priceSales;
//                $this->packagesOwed[$i]['priceOur'] = $priceOur;

//                $this->packagesOwed[$i]['price_sales'] = $this->sales_owed;
            }
        }

//        public $amount_type;
//        public $amount;
//        public $sales_owed;
//        public $our_owed;
    }

    public function addCompany(){
        $user = User::query()->insertGetId($this->validate()+['type'=>'company']);
        dd($user);
        Company::query()->create($this->validate()+['market_id'=> $user->id]);
//        $this->name = "";
//        $this->emit("qualificationAdded");
    }
}
