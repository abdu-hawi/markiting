<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model{

    protected $table = 'city_translations';
    protected $hidden = [
        'id',
        'city_id',
        'slug',
        'locale',
    ];

    public function companies():HasMany{
        return $this->hasMany(Company::class);
    }

//    public function user():BelongsTo{
//        return $this->belongsTo(User::class, 'market_id', 'id');
//    }
//
//    public function geoloaction():BelongsTo{
//        return $this->belongsTo(Geolocation::class, 'geolocation_id', 'id');
//    }
//
//    public function country(){
//        return $this->joiningTable('country_translations', 'companies.country_id');
//    }
}
