<?php

namespace App\Models;

use App\Models\Scopes\HasInvoiceSummary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyItem extends Model
{
    use HasFactory;
    use HasInvoiceSummary;

    protected $table = 'buy_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'buy_id',
        'price',
        'note',
        'unit',
        'quantity',
        'total',
    ];
}
