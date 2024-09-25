@extends('layouts.landing')

@section('title', 'Customers')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Customers Page {{$saludo}}</h1>
        </div>
    </div>
    @php
    $headers = ['#', 'First Name', 'Last Name', 'Handle'];
    $rows = [
    [1, 'Mark', 'Otto', '@mdo'],
    [2, 'Jacob', 'Thornton', '@fat'],
    [3, 'Larry', 'the Bird', '@twitter'],
    ];
    @endphp

    <x-table :headers="$headers" :rows="$rows" />
</div>
@endsection