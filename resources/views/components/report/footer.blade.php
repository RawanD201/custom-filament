<footer>

    {{-- <div class="flex rtl:flex-row-reverse justify-start rtl:justify-end gap-2 mt-8">

        <img class="w-32 h-16 object-contain" src="{{ asset('/img/dark-logo.png') }}" alt="logo">

        <div class="flex  items-center gap-4">

            <div class="flex flex-col w-2 h-full" style="width:8px;">
                <div class="w-full h-1/2 !bg-[#AB823A]  !print-color-exact"
                    style="background-color: rgb(171, 130, 58) !important;-webkit-print-color-adjust: exact !important;print-color-adjust: exact !important;">
                </div>
                <div class="w-full h-1/2 !bg-[#757070]  !print-color-exact"
                    style="background-color: rgb(117 112 112) !important;-webkit-print-color-adjust: exact !important;print-color-adjust: exact !important;">
                </div>
            </div>


            <div class="flex flex-col gap-1 text-left rtl:text-right justify-self-center">
                <span class="block">
                    {{ __('labels.report.footer.address') }}
                </span>
                <span class="block">
                    {{ __('labels.report.footer.tel') }}
                </span>
                <span class="block">
                    {{ __('labels.report.footer.email') }}
                </span>
            </div>


        </div>

    </div> --}}

    <div class="pt-3">
        <hr style=" width: 100%; height: 2px; color: #AB823A; background-color: #AB823A;">
    </div>


    <div
        style="display: flex; justify-content: space-between; align-items:center; font-size: 1rem; flex-wrap: wrap; padding-top: 5px; ">
        <span>{{ __('labels.report.invoice.printer_person') . ': ' . auth()->user()->username }}</span>
        <span>{{ __('labels.report.invoice.printer_date') . ': ' . now()->format('d/m/Y') }}</span>
    </div>
</footer>
