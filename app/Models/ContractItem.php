<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractItem extends Model
{
    use HasFactory;

    protected $table = 'contract_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];



    public function contracts()
    {
        return $this->belongsToMany(Contract::class, 'contract_joint', 'contract_id', 'item_id');
    }
}
