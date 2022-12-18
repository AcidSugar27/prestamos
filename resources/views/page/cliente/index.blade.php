@extends('layouts.app')

@section('content')
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>

    <h2 class="fw-blod text-center py-3">Clientes</h2>
    <!-- Form -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('clientes.show', $cliente->id) }}">{{ $cliente->id }}</a>
                        </td>
                        <td class="align-middle">
                            {{ $cliente->nombre }}
                        </td>
                        <td class="align-middle">
                            {{ $cliente->apellido }}
                        </td>
                        <td class="align-middle">
                            {{ $cliente->cedula }}
                        </td>
                        <td class="align-middle">
                            {{ $cliente->telefono }}
                        </td>
                        <td class="align-middle">
                            {{ $cliente->email }}
                        </td>
                        <td class="d-flex align-middle justify-content-center">
                            <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>

                            <a class="btn btn-primary mx-2" href="{{ route('clientes.edit', $cliente->id) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ( $clientes->count() )
            <div class="d-flex">
                {{ $clientes->links() }}
            </div>
        @endif
    </div>
@endsection
