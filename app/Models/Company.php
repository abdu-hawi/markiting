<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'market_id',
        'country_id',
        'city_id',
        'geolocation_id',
        'company_code',
        'expire_date',
        'amount_type',
        'amount',
        'sales_owed',
        'isActive',
    ];

    protected $hidden = [
        'id',
        'market_id',
        'country_id',
        'city_id',
        'geolocation_id',
        'created_at',
        'deleted_at',
        'updated_at',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'market_id', 'id');
    }

    public function geoloaction():BelongsTo{
        return $this->belongsTo(Geolocation::class, 'geolocation_id', 'id');
    }

    public function city():BelongsTo{
        return $this->belongsTo(City::class, 'city_id', 'city_id')->where('locale','ar');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'country_id')->where('locale','ar');
    }
}
