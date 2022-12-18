@extends('layouts.app')

@section('content')
    <h2 class="fw-blod text-center py-5">Crear Pago</h2>

    <!-- Form -->
    <div class="row g-5 ">
        <div class="">
            <form class="needs-validation" method="POST" action="{{ route('pagos.store') }}">
                @csrf
                @method('POST')

                <div class="row g-3 pb-5">
                    <div class="col-sm-3">
                        <label for="validationCustom01" class="form-label">ID Prestamo</label>

                        <input type="numeric" name="id_prestamo" placeholder="e.j. 12"
                            value="{{ old('id_prestamo') }}" class="form-control @error('id_prestamo') is-invalid @enderror">
                        @error('id_prestamo')
                            <div class="invalid-feedback">
                                El ID del prestamo es requerido.
                            </div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>

                    </div>

                    <div class="col-sm-3">
                        <label for="apellido" class="form-label">Monto Del Abono</label>
                        <input type="numeric" name="abono" placeholder="e.j. 100" value="{{ old('abono') }}"
                            class="form-control @error('abono') is-invalid @enderror">
                        @error('abono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
