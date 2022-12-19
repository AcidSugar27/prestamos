@extends('layouts.app')

@section('content')
    <h2 class="fw-blod text-center py-3">Detalles del Cliente</h2>

    <span class="fs-3">Nombre Completo: {{ $cliente->nombre }} {{ $cliente->apellido}}</span>
    <br>
    <span class="fs-3">Cedula: {{ $cliente->cedula }}</span>
    <br>
    <span class="fs-3">Telefono: {{ $cliente->telefono}}</span>
    <br>
    <span class="fs-3">Email: {{ $cliente->email}}</span>
    <br>
    <span class="fs-3">Direccion: {{ $cliente->direccion}}</span>
    <br>
    <span class="fs-3">Estado Civil: {{ $cliente->estado_civil}}</span>
@endsection