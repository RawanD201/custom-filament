<header class="flex flex-col gap-2 mb-4">
    <div class="flex w-full h-2">
        <div class="w-1/2 h-full !bg-[#1B97D5] !print-color-exact"
            style="background-color: rgb(27, 151, 213) !important;-webkit-print-color-adjust: exact !important;print-color-adjust: exact !important; border-bottom: 16px solid rgb(27, 151, 213);">
        </div>
        <div class="w-1/2 h-full !bg-[#757070] !print-color-exact"
            style="background-color: rgb(117 112 112) !important;-webkit-print-color-adjust: exact !important;print-color-adjust: exact !important; border-bottom: 16px solid rgb(117 112 112);">
        </div>
    </div>

    <div class="flex items-center gap-4 container-content justify-between flex-row-reverse">

        <img class="w-40 h-32 object-contain" src="{{ asset('/img/logo-light.png') }}" alt="logo">

        <div class="flex flex-col gap-1 content justify-self-center rtl:text-right">
            <span class="mt-4 text-2xl font-semibold uppercase">
                {{ __('labels.report.header.heading') }}
            </span>
            <span class="block text-justify font-semibold uppercase" style=" width: 374px !important;">
                {{ __('labels.report.header.subheading') }}
            </span>
            <span class="text-justify font-semibold uppercase">
                {{ __('labels.report.footer.address') }}
            </span>
            <span class="text-justify font-semibold uppercase">
                {{ __('labels.report.footer.tel') }}
            </span>
        </div>
    </div>
</header>
