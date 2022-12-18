@extends('layouts.app')

@section('content')
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Nuevo Prestamo</a>

    <h2 class="fw-blod text-center py-3">Prestamos</h2>
    <!-- Form -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID Prestamo</th>
                    <th scope="col">ID Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Pagado</th>
                    <th scope="col">Interes</th>
                    <th scope="col">Plazo</th>
                    <th scope="col">Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('prestamos.show', $prestamo->id) }}">{{ $prestamo->id }}</a>
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('clientes.show', $prestamo->id_cliente) }}">{{ $prestamo->id_cliente }}</a>
                        </td>
                        <td class="align-middle">
                            {{ $prestamo->created_at }}
                        </td>
                        <td class="align-middle">
                            {{ $prestamo->monto }}
                        </td>
                        <td class="align-middle">
                            {{ $prestamo->pagado }}
                        </td>
                        <td class="align-middle">
                            {{ $prestamo->interes }} %
                        </td>
                        <td class="align-middle">
                            {{ $prestamo->plazo }} meses
                        </td>
                        <td class="align-middle">
                            {{ $prestamo->estado }}
                        </td>
                        <td class="d-flex align-middle justify-content-center">
                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>

                            <a class="btn btn-primary mx-2" href="{{ route('prestamos.edit', $prestamo->id) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($prestamos->count())
            <div class="d-flex">
                {{ $prestamos->links() }}
            </div>
        @endif
    </div>
@endsection
