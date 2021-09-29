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
        $salesmen = Salesman::query()
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

        $i=0;
        $packages = array();
        foreach ($salesmen as $salesman){
            $package = array();
            $p = 0;
            foreach ($salesman->stores as $store){
                /*
                 * $store->pivot->package_data;
                 * $store->pivot->isStorePay;
                 * $store->pivot->package_id;
                 */
                $package_data = json_decode($store->pivot->package_data);
                if (count($package) > 0) {
                    if (!in_array($package_data->name, $package[$i])) $package[$i][$package_data->name] = [];
                }else {
                    $package[$i][$package_data->name] = [];
                }
//dd($salesman->stores[2]->pivot->isStorePay);
//                if ($store->pivot->isStorePay){
//                    if (  !in_array('paid', $package[$i][$package_data->name]) )
//                        $package[$i][$package_data->name]['paid'] = [];
//                    $n[$p] = $store->pivot->package_id;
//                    array_push($package[$i][$package_data->name]['paid'], $n);
//                }else{
//                    if (  !in_array('not_paid', $package[$i][$package_data->name]) )
//                        $package[$i][$package_data->name]['not_paid'] = [];
//                    $n[$p] = $store->pivot->package_id;
//                    array_push($package[$i][$package_data->name]['not_paid'], $n);
//                }
                $p++;
            }
            $this->salesmen[$i]['id'] = $salesman->id ;
            $this->salesmen[$i]['market_id'] = $salesman->market_id ;
            $this->salesmen[$i]['name'] = $salesman->user->name ;
            $this->salesmen[$i]['code'] = $salesman->code ;
            $this->salesmen[$i]['stores_count'] = $salesman->stores_count ;
            $this->salesmen[$i]['packages'] = $package ;
            $this->salesmen[$i]['isActive'] = $salesman->user->isActive ;
            $i++;
            array_push($packages,$package);
        }
//        $this->salesmen = $packages;

    }

    public function render()
    {
//        dd(Salesman::query()->get('market_id'));
        dd($this->salesmen);
        return view('livewire.company.salesmen-livewire');
    }
}
