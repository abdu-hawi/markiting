<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    public function salesman(): BelongsToMany{
        return $this->belongsToMany(Salesman::class, 'salesman_store' , 'store_id','salesman_id')
            ->withPivot(['package_id','isStorePay','package_data']);
    }
}
