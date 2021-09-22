<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salesman extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'market_id',
        'company_id',
        'code',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'market_id', 'id');
    }

    public function company():BelongsTo{
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function store(): BelongsToMany
    {
        return $this->belongsToMany(Store::class, 'salesman_store' ,'salesman_id', 'store_id');
    }
}
