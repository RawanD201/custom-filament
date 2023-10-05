<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractJoint extends Model
{
    use HasFactory;
    protected $table = 'contract_joint';

    protected $primaryKey = 'id';

    protected $fillable = [
        'item_id',
        'contract_id',
    ];
}
