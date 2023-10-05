<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyExchange extends Model
{
    use HasFactory;

    protected $table = 'exchanges';

    protected $primaryKey = 'id';

    protected $fillable = [
        'amount',
    ];
}
