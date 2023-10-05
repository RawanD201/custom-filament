<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'customer',
        'type',
        'phone',
        'address',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function items()
    {
        return $this->belongsToMany(ContractItem::class, 'contract_joint', 'contract_id', 'item_id');
    }
}
