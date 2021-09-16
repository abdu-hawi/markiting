<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model{

    protected $table = 'country_translations';
    protected $hidden = [
        'id',
//        'country_id',
        'slug',
        'locale',
        'currency',
        'country_translationscol',
        'currency_code',
        'country_label',
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
