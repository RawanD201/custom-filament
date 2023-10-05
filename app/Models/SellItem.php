<?php

namespace App\Models;

use App\Models\Scopes\HasInvoiceSummary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellItem extends Model
{
    use HasFactory;
    use HasInvoiceSummary;

    protected $table = 'sell_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'sell_id',
        'price',
        'note',
        'unit',
        'quantity',
        'total',
    ];
}
