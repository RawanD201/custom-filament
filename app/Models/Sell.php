<?php

namespace App\Models;

use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sell extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sells';

    protected $primaryKey = 'id';

    protected $fillable = [
        'customer_id',
        'item_id',
        'type',
        'date',
        'comment',
        'total',
        'discount',
        'after_discount',
        'upfront_payment',
        'loan_after_payment',
        'total_old_loan',
        'total_loan',
        'daily_dollar',
        'dollar_to_dinar',

    ];

    protected $casts = [
        'type' => PaymentType::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(SellItem::class, 'sell_id', 'id');
    }
}
