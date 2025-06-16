@extends('layouts.app')
@section('title', 'App')
@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">Selamat datang</h1>
        <p class="lead">Di halaman admin aplikasi {{ config('app.name', 'SmartChoice') }}!</p>
    </div>
@endsection