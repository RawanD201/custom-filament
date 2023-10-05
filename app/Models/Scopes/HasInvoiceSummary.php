<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait HasInvoiceSummary
{
    public function scopeWithInvoiceSummary(Builder $query, int $invoiceId): Builder
    {

        $table = $this->getTable();
        $field = str($table)->before('_')->toString() . '_id';

        return $query
            ->selectRaw('\'99999\' AS id')
            ->selectRaw("'{$invoiceId}' AS `{$field}`")
            ->selectRaw("'summary' AS `name`")
            ->selectRaw('SUM(quantity) AS quantity')
            ->selectRaw('SUM(price) AS price')
            ->selectRaw('\'-\' AS unit')
            ->selectRaw('\'-\' AS note')
            ->selectRaw('SUM(total) AS total')
            ->where($field, $invoiceId)
            ->groupBy($field);
    }
}
