<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Geolocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'country_id',
        'city_id',
    ];



    protected $hidden = [
//        'id',
        'created_at',
        'updated_at',
    ];

    public function companies():HasMany{
        return $this->hasMany(Company::class, 'geolocation_id', 'id');
    }

    public function city(): BelongsTo{
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }
    public function country(): BelongsTo{
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }
}
