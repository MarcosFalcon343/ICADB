@extends('layouts.landing')

@section('title', 'Facilities')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Facilities Page</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#facilityModalCreate">
                <i class="bi bi-plus-circle"></i> Add Facility
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
            @foreach ($facilities as $facility)
                <tr data-id="{{ $facility->FacNo }}">
                    <td>{{ $facility->FacNo}}</td>
                    <td>{{ $facility->FacName }}</td>
                    <td class="d-flex justify-content-evenly    ">
                        <button type="button" class="btn btn-outline-secondary btn-edit" data-bs-toggle="modal"
                            data-bs-target="#facilityModalEdit" data-facilityno="{{ $facility->FacNo }}"
                            onclick="{{$facilityGlobal = $facility}}">
                            <i class="bi-pencil-fill"></i>
                        </button>
                        <form action="{{route('facilities.delete', $facility)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta Facility?');">
                                <i class="bi-trash3-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Create Facility -->
    <div class="modal fade" id="facilityModalCreate" tabindex="-1" aria-labelledby="facilityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="facilityModalLabel">Create Facility</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('facilities.store') }}">
                        @csrf
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
                            <label for="FacNo">Facility No *</label>
                            <input type="text" class="form-control" id="FacNo" name="FacNo" maxlength="8" required>
                        </div>
                        <div class="form-group">
                            <label for="FacName">Facility Name *</label>
                            <input type="text" class="form-control" id="FacName" name="FacName" maxlength="50" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Create Facility</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Facility -->
    <div class="modal fade" id="facilityModalEdit" tabindex="-1" aria-labelledby="facilityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="facilityModalLabel">Update Facility</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('facilities.update') }}">
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
                            <label for="FacNo">Facility No *</label>
                            <input type="text" class="form-control" id="FacNo" name="FacNo" maxlength="8"
                                value="{{$facilityGlobal->FacNo}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FacName">Facility Name *</label>
                            <input type="text" class="form-control" id="FacName" name="FacName" maxlength="50"
                                value="{{$facilityGlobal->FacName}}" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update Facility</button>
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