@extends('layouts.app')

@section('content')
    <h2 class="fw-blod text-center py-3">Detalles del Prestamo</h2>
    
    <span class="fs-3">ID Prestamo: {{ $prestamo->id }}</span>
    <br>
    <span class="fs-3 text-capitalize">Cliente:
        <a href="{{ route('clientes.show', $cliente->id) }}">
            {{ $cliente->nombre }} {{ $cliente->apellido }}
        </a>
    </span>
    <br>
    <span class="fs-3">Monto Prestado: {{ $prestamo->monto }}</span>
    <br>
    <span class="fs-3">Cantidad a Pagar con Intereses:
        {{ $prestamo->monto + ($prestamo->monto / 100) * $prestamo->interes }}.00</span>
    <br>
    <span class="fs-3">Cantidad Pagada: {{ $prestamo->pagado }}</span>
    <br>
    <span class="fs-3">Plazo Del Pago: {{ $prestamo->plazo }}</span>
    <br>
    <span class="fs-3">Interes: {{ $prestamo->interes }}%</span>
    <br>
    <span class="fs-3">Fecha De Liberacion: {{ $prestamo->created_at }}</span>
@endsection
