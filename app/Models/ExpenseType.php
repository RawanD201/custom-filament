<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expense_types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function expense(): BelongsTo
    {
        return $this->belongsTo(Expense::class, 'id', 'expense_type_id');
    }
}
