<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Recive extends Model
{
    use HasFactory;

    protected $table = 'recives';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'customer_id',
        'amount',
        'comment',
        'date',
        'loan_after_payment',
        'current_loan',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
