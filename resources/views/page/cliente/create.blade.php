@extends('layouts.app')

@section('content')
    <h2 class="fw-blod text-center py-5">Registro de Clientes</h2>

    <!-- Form -->
    <div class="row g-5 ">
        <div class="">
            <form class="needs-validation" method="POST" action="{{ route('clientes.store') }}">
                @csrf
                @method('POST')
                <div class="row g-3 pb-5">
                    <div class="col-sm-6">
                        <label for="validationCustom01" class="form-label">Nombre</label>
                        <input  type="text" name="nombre" id="validationCustom01" placeholder="Nombre"
                                value="@isset($cliente->nombre) {{ $cliente->nombre }} @else {{ old('nombre') }} @endisset"
                                class="form-control @error('nombre') is-invalid @enderror">
                        @error('nombre')
                            <div class="invalid-feedback">
                                Nombre es requerido.
                            </div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input  type="text" name="apellido" id="apellido" placeholder="Apellido"
                                value="@isset($cliente->apellido) {{ $cliente->apellido }} @else {{ old('apellido') }} @endisset"
                                class="form-control @error('apellido') is-invalid @enderror">
                        @error('apellido')
                            <div class="invalid-feedback">
                                Apellido es requerido
                            </div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="cedula" class="form-label">Cedula</label>
                        <div class="input-group has-validation">
                            <input  type="text" name="cedula" id="cedula" placeholder="Cedula"
                                    value="@isset($cliente->cedula) {{ $cliente->cedula }} @else {{ old('cedula') }} @endisset"
                                    class="form-control @error('cedula') is-invalid @enderror">
                            @error('cedula')
                                <div class="invalid-feedback">
                                    Cedula es requerida
                                </div>
                            @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="telefono" class="form-label">Telefono</label>
                        <div class="input-group has-validation">
                            <input  type="text" name="telefono" id="telefono" placeholder="Telefono"
                                    value="@isset($cliente->telefono) {{ $cliente->telefono }} @else {{ old('telefono') }} @endisset"
                                    class="form-control @error('telefono') is-invalid @enderror">
                            @error('telefono')
                                <div class="invalid-feedback">
                                    Telefono es requerido
                                </div>
                            @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input  type="email" name="email" id="email" placeholder="you@example.com"
                                value="@isset($cliente->email) {{ $cliente->email }} @else {{ old('email') }} @endisset"
                                class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">
                                Por favor introduce un email valido.
                            </div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input  type="text" name="direccion" id="direccion" placeholder="1234 Main St"
                                value="@isset($cliente->direccion) {{ $cliente->direccion }} @else {{ old('direccion') }} @endisset"
                                class="form-control @error('direccion') is-invalid @enderror">
                        @error('direccion')
                            <div class="invalid-feedback">
                                Por favor introduce una direccion.
                            </div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="estadoCivil" class="form-label">Estado civil</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado_civil" value="Soltero" id="estado_civil1">
                            <label class="form-check-label" for="estado_civil1">
                                Soltero
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado_civil" value="Casado" id="estado_civil2">
                            <label class="form-check-label" for="estado_civil2">
                                Casado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado_civil" value="Union Libre" id="estado_civil2">
                            <label class="form-check-label" for="estado_civil2">
                                Union libre
                            </label>
                        </div>
                        <div class="invalid-feedback">
                            Por favor introduce un estado civil.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
