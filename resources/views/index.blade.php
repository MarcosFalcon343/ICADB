@extends('layouts.landing')

@section('title', 'Home')

@section('content')
@php
    use App\Models\Customer;
@endphp
<div class="container">
    <h1>Home page</h1>

    <h2>Welcome back</h2>
</div>
@endsection