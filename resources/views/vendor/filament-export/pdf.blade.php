<x-report.base :title="$fileName" :pageHeader="$getPageHeader()">

    <x-slot name='header'>
        <style type="text/css" media="all">
            table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                border-radius: 10px 10px 10px 10px;
            }

            table td,
            th {
                border-color: #ededed;
                border-style: solid;
                border-width: 1px;
                font-size: 14px;
                overflow: hidden;
                padding: 10px 5px;
                word-break: normal;
            }

            table th {
                font-weight: normal;
            }
        </style>
    </x-slot>

    <x-report.table :columns="$columns" :rows="$rows" />

</x-report.base>
