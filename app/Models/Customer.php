<?php

namespace App\Models;

use App\Models\Buy;
use App\Models\Pay;
use App\Models\Sell;
use App\Models\Recive;
use App\Models\Contract;
use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fullname',
        'type',
        'phone',
        'address',
        'installments'
    ];

    protected $casts = [
        'type' => CustomerType::class,
    ];


    public function contract()
    {
        return $this->hasMany(Contract::class, 'customer_id', 'id');
    }


    public function pay()
    {
        return $this->hasMany(Pay::class, 'customer_id', 'id');
    }


    public function recive()
    {
        return $this->hasMany(Recive::class, 'customer_id', 'id');
    }


    public function buy()
    {
        return $this->hasMany(Buy::class, 'customer_id', 'id');
    }


    public function sell()
    {
        return $this->hasMany(Sell::class, 'customer_id', 'id');
    }
}
