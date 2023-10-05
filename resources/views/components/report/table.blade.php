@props([
    'columns' => [],
    'rows' => [],
])


<table>
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th>
                    {{ $column->getLabel() }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($columns as $column)
                    <td>
                        {{ $row[$column->getName()] }}

                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
