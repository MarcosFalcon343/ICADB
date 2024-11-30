@extends('layouts.landing')

@section('title', 'Employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Employees Page</h1>
            <a href="{{ route('register-employee.form') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Add Employee
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
            @foreach ($employees as $employee)
                <tr data-id="{{ $employee->EmpNo }}">
                    <td>{{ $employee->EmpNo}}</td>
                    <td>{{ $employee->EmpName }}</td>
                    <td>{{ $employee->Department }}</td>
                    <td>{{ $employee->Email }}</td>
                    <td>{{ $employee->Phone }}</td>
                    <td>{{ $employee->MgrNo }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-outline-secondary btn-edit"
                            data-id="{{ $employee->EmpNo }}">
                            <i class="bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('employees.delete', $employee) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
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