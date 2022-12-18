@extends('layouts.app')

@section('content')
    <h2 class="fw-blod text-center py-5">Editar Prestamo</h2>

    <!-- Form -->
    <div class="row g-5 ">
        <div class="">
            <form class="needs-validation" method="POST" action="{{ route('prestamos.update', $prestamo->id) }}">
                @csrf
                @method('PUT')

                <div class="row g-3 pb-5">
                    <div class="col-sm-3">
                        <label for="validationCustom01" class="form-label">Cedula Del Cliente</label>

                        <input type="text" name="cedula" id="validationCustom01" placeholder="Cedula"
                            value="{{ $cliente->cedula }}" disabled
                            class="form-control @error('cedula') is-invalid @enderror">
                        @error('cedula')
                            <div class="invalid-feedback">
                                La Cedula es requerido.
                            </div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>

                    </div>

                    <div class="col-sm-3">
                        <label for="apellido" class="form-label">Monto</label>
                        <input  type="numeric" name="monto" placeholder="1000"
                                value="@isset($prestamo->monto) {{ $prestamo->monto }} @else {{ old('monto') }} @endisset"
                                class="form-control @error('monto') is-invalid @enderror">
                        @error('monto')
                            <div class="invalid-feedback">
                                El monto es requerido
                            </div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-3">
                        <label for="cedula" class="form-label">Porcentaje de Intereses</label>
                        <div class="input-group has-validation">
                            <input type="numeric" name="interes" placeholder="10"
                                value="@isset($prestamo->interes) {{ $prestamo->interes }} @else {{ old('interes') }} @endisset"
                                class="form-control @error('interes') is-invalid @enderror">
                            @error('interes')
                                <div class="invalid-feedback">
                                    el interes es requerida
                                </div>
                            @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <label for="telefono" class="form-label">Plazo Del Prestamo</label>
                        <div class="input-group has-validation">
                            <input  type="numeric" name="plazo" placeholder="24"
                                    value="@isset($prestamo->plazo) {{ $prestamo->plazo }} @else {{ old('plazo') }} @endisset"
                                    class="form-control @error('plazo') is-invalid @enderror">
                            @error('plazo')
                                <div class="invalid-feedback">
                                    El plazo es requerido
                                </div>
                            @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="submit">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
