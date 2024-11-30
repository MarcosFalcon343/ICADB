@extends('layouts.landing')

@section('title', 'Locations')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Locations Page</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#locationModalCreate">
                <i class="bi bi-plus-circle"></i> Add Location
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
            @foreach ($locations as $location)
                <tr data-id="{{ $location->LocNo }}">
                    <td>{{ $location->LocNo}}</td>
                    <td>{{ $location->FacNo}}</td>
                    <td>{{ $location->LocName }}</td>
                    <td class="d-flex justify-content-evenly    ">
                        <button type="button" class="btn btn-outline-secondary btn-edit" data-bs-toggle="modal"
                            data-bs-target="#locationModalEdit" data-locationno="{{ $location->LocNo }}"
                            onclick="{{$locationGlobal = $location}}">
                            <i class="bi-pencil-fill"></i>
                        </button>
                        <form action="{{route('locations.delete', $location)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta Location?');">
                                <i class="bi-trash3-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal Create Location -->
    <div class="modal fade" id="locationModalCreate" tabindex="-1" aria-labelledby="locationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="facilityModalLabel">Create Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('locations.store') }}">
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
                            <label for="LocNo">Facility No *</label>
                            <select name="FacNo" id="FacNo" class="form-control">
                                @foreach ($facilities as $facility)
                                    <option value="{{ $facility->FacNo }}">{{ $facility->FacNo}} - {{$facility->FacName}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="LocNo">Location No *</label>
                            <input type="text" class="form-control" id="LocNo" name="LocNo" maxlength="8" required>
                        </div>
                        <div class="form-group">
                            <label for="LocName">Location Name *</label>
                            <input type="text" class="form-control" id="LocName" name="LocName" maxlength="50" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Create Location</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Location -->
    <div class="modal fade" id="locationModalEdit" tabindex="-1" aria-labelledby="locationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="facilityModalLabel">Update Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('locations.update') }}">
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
                            <select name="FacNo" id="FacNo" class="form-control">
                                @foreach ($facilities as $facility)
                                    <option value="{{ $facility->FacNo }}" {{ $locationGlobal->FacNo == $facility->FacNo ? 'selected' : '' }}>
                                        {{ $facility->FacNo }} - {{ $facility->FacName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="LocNo">Location No *</label>
                            <input type="text" class="form-control" id="LocNo" name="LocNo" maxlength="8"
                                value="{{ $locationGlobal->LocNo }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="LocName">Location Name *</label>
                            <input type="text" class="form-control" id="LocName" name="LocName" maxlength="50"
                                value="{{ $locationGlobal->LocName }}" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update Location</button>
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