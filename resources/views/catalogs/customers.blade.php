@extends('layouts.landing')

@section('title', 'Customers')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Customers Page</h1>
            <a href="{{ route('register-customer.form') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Add Customer
            </a>
        </div>
    </div>
    <hr class="divide-gray-300">
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
            @foreach ($customers as $customer)
                <tr data-id="{{ $customer->CustNo }}">
                    <td>{{ $customer->CustNo }}</td>
                    <td>{{ $customer->CustName }}</td>
                    <td>{{ $customer->Address }}</td>
                    <td>{{ $customer->Internal }}</td>
                    <td>{{ $customer->Contact }}</td>
                    <td>{{ $customer->Phone }}</td>
                    <td>{{ $customer->City }}</td>
                    <td>{{ $customer->State }}</td>
                    <td>{{ $customer->ZipCode }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-outline-secondary btn-edit"
                            data-id="{{ $customer->CustNo }}">
                            <i class="bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('customers.delete', $customer) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                                <i class="bi-trash3-fill"></i>
                            </button>
                        </form>
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
</div>
@endsection