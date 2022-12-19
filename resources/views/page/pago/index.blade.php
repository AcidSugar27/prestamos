@extends('layouts.app')

@section('content')
    <a href="{{ route('pagos.create') }}" class="btn btn-primary">Nuevo Pago</a>

    <h2 class="fw-blod text-center py-3">Pagos</h2>
    <!-- Form -->
    <div class="table-responsive" id="tablaPagos">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID Pago</th>
                    <th scope="col">ID Prestamo</th>
                    <th scope="col">Monto Pagado</th>
                    <th scope="col">Fecha De Abono</th>
                    <th><button class="btn btn-primary" onclick="imprimir('tablaPagos')">Imprimir</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td class="align-middle">
                            {{ $pago->id }}
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('prestamos.show', $pago->id_prestamo) }}">{{ $pago->id_prestamo }}</a>
                        </td>
                        <td class="align-middle">
                            {{ $pago->abono }}
                        </td>
                        <td class="align-middle">
                            {{ $pago->created_at }}
                        </td>
                        <td class="d-flex align-middle justify-content-center">
                            <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>

                            {{-- <a class="btn btn-primary mx-2" href="{{ route('pagos.edit', $pago->id) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($pagos->count())
            <div class="d-flex">
                {{ $pagos->links() }}
            </div>
        @endif
    </div>
@endsection
