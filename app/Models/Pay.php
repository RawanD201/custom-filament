<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pay extends Model
{
    use HasFactory;

    protected $table = 'pays';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'customer_id',
        'amount',
        'comment',
        'date',
        'loan_after_payment',
        'current_loan',
        'next_date'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
