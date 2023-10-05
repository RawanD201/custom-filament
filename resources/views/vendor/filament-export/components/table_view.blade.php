<input id="{{ $getStatePath() }}" type="hidden" {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}">

<x-filament::modal id="preview-modal" width="7xl" display-classes="block" x-init="$wire.on('open-preview-modal-{{ $getUniqueActionId() }}', function() {
    triggerInputEvent('{{ $getStatePath() }}', '{{ $shouldRefresh() ? 'refresh' : '' }}');
    isOpen = true;
});
$wire.on('close-preview-modal-{{ $getUniqueActionId() }}', () => { isOpen = false; });" :heading="$getPreviewModalHeading()">
    <div class="space-y-4 preview-table-wrapper">


        <x-report.header />

        <hr style=" width: 100%; height: 7px; color: #1B97D5; background-color: #1B97D5;">

        @php
            $isInvoice = method_exists($this, 'getInvoiceDetails');
            $summary = method_exists($this, 'getSummary');
            $pays = method_exists($this, 'getPays');
            $buyLoans = method_exists($this, 'getBuyLoans');
            $sellLoans = method_exists($this, 'getSellLoans');
            $contracts = method_exists($this, 'getContractDetails');
            $expenses = method_exists($this, 'getExpenses');
        @endphp

        <div class="my-8 text-2xl font-nrt">
            @if (!$contracts)
                {{ $this->getTitle() }}
            @endif
            @if ($contracts)
                <div class="flex items-center justify-between">
                    {{ $this->getTitle() }}
                    <div>
                        <span>{{ now()->format('d/m/Y') }}</span>
                    </div>
            @endif
        </div>

    </div>



    @if ($contracts)
        <div>
            {{-- <div>
                    <span>{{ __('labels.report.contract.owner') }}</span>
                </div> --}}

            <div class="flex justify-around items-center">
                <div>
                    <span>{{ __('labels.report.contract.other_side') . $this->record?->customer }}</span>
                </div>
                <div>
                    <span>{{ __('labels.report.contract.location') . $this->record?->address }}</span>
                </div>
                <div>
                    <span>{{ __('labels.report.contract.phone') . $this->record?->phone }}</span>
                </div>
            </div>

            <div>
                <span class="text-xl">{{ __('labels.report.contract.contract_title') }}</span>
            </div>

            <table class="my-8 preview-table" x-init="$wire.on('print-table-{{ $getUniqueActionId() }}', function() {
                triggerInputEvent('{{ $getStatePath() }}', 'print-{{ $getUniqueActionId() }}')
            })">
                @foreach ($getRows() as $row)
                    <tr>
                        @foreach ($getAllColumns() as $column)
                            <td @class(['text-center'])>
                                {{ $row[$column->getName()] }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>


        </div>
    @endif


    @if ($isInvoice)
        <div style="display: flex; justify-content: space-between; align-items:center; font-size: 1.1rem;">

            <div style="display: flex; flex-direction: column !important;  gap: 3px;">
                <span>{{ __('labels.report.invoice.invoice_id') . ': ' . $this->record->id }}</span>
                <span>{{ __('labels.report.invoice.type') . ': ' . App\Enums\PaymentType::translate($this->record?->type->value) }}</span>
            </div>


            <div style="display: flex; flex-direction: column !important;  gap: 3px;">
                <span>{{ __('labels.report.invoice.customer') . ': ' . $this->record?->customer?->fullname }}</span>
                <span>{{ __('labels.report.invoice.date') . ': ' . $this->record->created_at }}</span>
            </div>

        </div>
    @endif


    @if (!$contracts)

        <table class="my-8 preview-table" x-init="$wire.on('print-table-{{ $getUniqueActionId() }}', function() {
            triggerInputEvent('{{ $getStatePath() }}', 'print-{{ $getUniqueActionId() }}')
        })">
            <tr class="text-center bg-[#1B97D5] ">
                @foreach ($getAllColumns() as $column)
                    <th class="!font-bold text-center text-white">
                        {{ $column->getLabel() }}
                    </th>
                @endforeach
            </tr>
            @foreach ($getRows() as $row)
                <tr>
                    @foreach ($getAllColumns() as $column)
                        <td @class(['text-center'])>
                            {{ $row[$column->getName()] }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>

    @endif




    @if ($isInvoice)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">

        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">


            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px; ">{{ number_format($this->record->discount) . '   ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.after_discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->record->after_discount) . '   ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.upfront_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->record->upfront_payment) . '  ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.loan_after_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->record->loan_after_payment) . ' ' . '$' }}</span>
                </div>
            </div>


            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.total_old_loan') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->record->total_old_loan) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.total_loan') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->record->total_loan) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.daily_dollar') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->record->daily_dollar) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.dollar_to_dinar') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->record->dollar_to_dinar) . ' ' . 'IQD' }}</span>
                </div>
            </div>
        </div>
    @endif


    @if ($summary)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">

        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">

            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.total') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->total) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->discount) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.after_discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->after_discount) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.upfront_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->upfront_payment) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.loan_after_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->loan_after_payment) . ' ' . '$' }}</span>
                </div>
            </div>
        </div>
    @endif



    @if ($pays)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">

        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">

            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.pays') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->pays) . ' ' . '$' }}</span>
                </div>
            </div>
        </div>
    @endif


    @if ($expenses)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">

        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">

            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.expenses') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->expenses) . ' ' . '$' }}</span>
                </div>
            </div>
        </div>
    @endif



    @if ($buyLoans)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">

        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">

            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.buyLoans') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->buyLoans) . ' ' . '$' }}</span>
                </div>
            </div>
        </div>
    @endif



    @if ($sellLoans)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">

        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">

            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.sellLoan') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($this->sellLoan) . ' ' . '$' }}</span>
                </div>
            </div>
        </div>
    @endif


    <x-report.footer />

    <div>
        <x-tables::pagination :paginator="$getRows()" :records-per-page-select-options="$this->getTable()->getRecordsPerPageSelectOptions()" />
    </div>
    </div>
    <x-slot name="footer">
        @foreach ($getFooterActions() as $action)
            {{ $action }}
        @endforeach
    </x-slot>
    @php
        $data = $this->mountedTableBulkAction ? $this->mountedTableBulkActionData : $this->mountedTableActionData;
    @endphp
    @if (is_array($data) && array_key_exists('table_view', $data) && $data['table_view'] == 'print-' . $getUniqueActionId())
        <script>
            printHTML(`{!! $this->printHTML !!}`, '{{ $getStatePath() }}', '{{ $getUniqueActionId() }}');
        </script>
    @endif
    @if ($shouldRefresh())
        <script>
            window.Livewire.emit("close-preview-modal-{{ $getUniqueActionId() }}");

            triggerInputEvent('{{ $getStatePath() }}', 'refresh');

            window.Livewire.emit("open-preview-modal-{{ $getUniqueActionId() }}");
        </script>
    @endif
</x-filament::modal>
