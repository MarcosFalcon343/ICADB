@extends('layouts.landing')

@section('title', 'Resources Tbl')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Resource Tbls Page</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ResourceModalCreate">
                <i class="bi bi-plus-circle"></i> Add Resource Tbl
            </button>
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
            @foreach ($resources as $resource)
                <tr data-id="{{ $resource->ResNo }}">
                    <td>{{ $resource->ResNo}}</td>
                    <td>{{ $resource->ResName}}</td>
                    <td>{{ $resource->Rate }}</td>
                    <td class="d-flex justify-content-evenly    ">
                        <button type="button" class="btn btn-outline-secondary btn-edit" data-bs-toggle="modal"
                            data-bs-target="#ResourceModalEdit" data-locationno="{{ $resource->LocNo }}"
                            onclick="{{$resourceGlobal = $resource}}">
                            <i class="bi-pencil-fill"></i>
                        </button>
                        <form action="{{route('resources.delete', $resource)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta resource?');">
                                <i class="bi-trash3-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal Create Location -->
    <div class="modal fade" id="ResourceModalCreate" tabindex="-1" aria-labelledby="ResourceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ResourceModalLabel">Create Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('resources.store') }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="ResNo">Resource No *</label>
                            <input type="text" class="form-control" id="ResNo" name="ResNo" maxlength="8" required>
                        </div>
                        <div class="form-group">
                            <label for="ResName">Resource Name *</label>
                            <input tSype="text" class="form-control" id="ResName" name="ResName" maxlength="50"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="Rate">Rate *</label>
                            <input type="text" class="form-control" id="Rate" name="Rate" maxlength="50" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Create resource</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Resource -->
    <div class="modal fade" id="ResourceModalEdit" tabindex="-1" aria-labelledby="ResourceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ResourceModalLabel">Edit Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('resources.update') }}">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="ResNo">Resource No *</label>
                            <input type="text" class="form-control" id="ResNo" name="ResNo" maxlength="8"
                                value="{{ $resourceGlobal->ResNo}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="ResName">Resource Name *</label>
                            <input type="text" class="form-control" id="ResName" name="ResName" maxlength="50"
                                value="{{ $resourceGlobal->ResName}}" required>
                        </div>
                        <div class="form-group">
                            <label for="Rate">Rate *</label>
                            <input type="text" class="form-control" id="Rate" name="Rate" maxlength="50"
                                value="{{ $resourceGlobal->Rate}}" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update Resource</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
</div>
@endsection