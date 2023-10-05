<?php

namespace App\Models;

use App\Models\Sell;
use App\Models\Recive;
use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SellCustomerLoan extends Model
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

    public function sell()
    {
        return $this->hasMany(Sell::class, 'customer_id', 'id');
    }

    public function recive()
    {
        return $this->hasMany(Recive::class, 'customer_id', 'id');
    }
}
