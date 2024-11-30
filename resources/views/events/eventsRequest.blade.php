@extends('layouts.landing')

@section('title', 'Events')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Events Page</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#locationModalCreate">
                <i class="bi bi-plus-circle"></i> Add Event
            </button>
        </div>
    </div>
    <hr class="divide-gray-300">
    <h1 class="mb-4">Lista de Solicitudes de Eventos</h1>
    <div class="row">
        @foreach ($eventsRequest as $eventRequest)
            <div class="col-md-6">
                <x-event-card :eventRequest="$eventRequest" />
            </div>
        @endforeach

    </div>
</div>
@endsection