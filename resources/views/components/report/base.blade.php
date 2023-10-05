@props([
    'header' => null,
    'title' => null,
    'pageHeader' => null,
    'invoiceDetails' => null,
    'summary' => null,
    'pays' => null,
    'recives' => null,
    'buyLoans' => null,
    'sellLoans' => null,
    'expenses' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('filament::layout.direction') ?? 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('css/print.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>

    {{ $header }}
</head>

<body>
    <x-report.header />

    <div class="my-4 text-2xl">
        {{ $pageHeader }}
    </div>


    @if ($contracts)
        <div style="display: flex; justify-content: space-between; align-items:center; font-size: 1.1rem;">

            <span>{{ __('labels.report.contract.owner') }}</span>

            <div>
                <span>{{ __('labels.report.contract.owner') . ': ' . $contracts['id'] }}</span>
            </div>
    @endif



    @if ($invoiceDetails)
        <div style="display: flex; justify-content: space-between; align-items:center; font-size: 1.1rem;">

            <div style="display: flex; flex-direction: column !important;  gap: 3px;">
                <span>{{ __('labels.report.invoice.invoice_id') . ': ' . $invoiceDetails['id'] }}</span>
                <span>{{ __('labels.report.invoice.type') . ': ' . App\Enums\PaymentType::translate($invoiceDetails['type']->value) }}</span>
            </div>


            <div style="display: flex; flex-direction: column !important;  gap: 3px;">
                <span>{{ __('labels.report.invoice.customer') . ': ' . $invoiceDetails['customer_id'] }}</span>
                <span>{{ __('labels.report.invoice.date') . ': ' . $invoiceDetails['created_at'] }}</span>
            </div>

        </div>
    @endif

    @if (!$contracts)
        {{ $slot }}
    @endif



    @if ($invoiceDetails)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">


        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">


            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px; ">{{ $invoiceDetails['discount'] . '   ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.after_discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ $invoiceDetails['after_discount'] . '   ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.upfront_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ $invoiceDetails['upfront_payment'] . '  ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.loan_after_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ $invoiceDetails['loan_after_payment'] . ' ' . '$' }}</span>
                </div>
            </div>


            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.total_old_loan') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ $invoiceDetails['total_old_loan'] ??= 0 . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.total_loan') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ $invoiceDetails['total_loan'] . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.daily_dollar') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ $invoiceDetails['daily_dollar'] . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.dollar_to_dinar') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ $invoiceDetails['dollar_to_dinar'] . ' ' . 'IQD' }}</span>
                </div>
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
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($summary['total']) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($summary['discount']) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.after_discount') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($summary['after_discount']) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.upfront_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($summary['upfront_payment']) . ' ' . '$' }}</span>
                </div>
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.loan_after_payment') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($summary['loan_after_payment']) . ' ' . '$' }}</span>
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
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($pays['pays']) . ' ' . '$' }}</span>
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
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($expenses['expenses']) . ' ' . '$' }}</span>
                </div>

            </div>
        </div>
    @endif

    @if ($recives)
        <hr style=" width: 100%; height: 2px; color: #1B97D5; background-color: #1B97D5;">

        <div style="display: flex; align-items:center; justify-content: space-between; gap:2px; width: 100%;">

            <div style="display: flex; flex-direction: column; width: 50%; gap: 2px;">
                <div>
                    <span
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.recives') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($recives['recives']) . ' ' . '$' }}</span>
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
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($buyLoans['buyLoans']) . ' ' . '$' }}</span>
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
                        style="background:#757070; padding: 0px 10px; color: white;">{{ __('labels.report.invoice.sellLoans') . ': ' }}</span>
                    <span
                        style="font-weight: 800; padding: 0px 10px;">{{ number_format($sellLoans['sellLoans']) . ' ' . '$' }}</span>
                </div>

            </div>
        </div>
    @endif



    <x-report.footer />

</body>

</html>
