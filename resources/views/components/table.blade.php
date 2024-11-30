<table id="table" class="table table-hover table-bordered table-responsive">
    <thead class="thead-dark">
        <tr>
            @foreach ($headers as $header)
                <th scope="col">{{ $header }}</th>
            @endforeach
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
                <td>
                    <a href="#" class="btn btn-outline-secondary btn-edit"><i class="bi-pencil-fill"></i></a>
                    <a href="#" class="btn btn-danger btn-delete"><i class="bi-trash3-fill"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>


@php
    $rows = $customers->map(function ($customer) {
        return [
            $customer->CustNo,
            $customer->CustName,
            $customer->Address,
            $customer->Internal,
            $customer->Contact,
            $customer->Phone,
            $customer->City,
            $customer->State,
            $customer->ZipCode
        ];
    });
@endphp

<x-table :headers="$headers" :rows="$rows" />