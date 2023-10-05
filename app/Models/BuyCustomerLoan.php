<?php

namespace App\Models;

use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BuyCustomerLoan extends Model
{
    use HasFactory;


    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fullname',
        'type',
        'phone',
        'address',
    ];

    protected $casts = [
        'type' => CustomerType::class,
    ];

    public function buy()
    {
        return $this->hasMany(Buy::class, 'customer_id', 'id');
    }

    public function pay()
    {
        return $this->hasMany(Pay::class, 'customer_id', 'id');
    }
}
