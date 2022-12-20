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
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}"
                            class="form-control @error('nombre') is-invalid @enderror">
                        <div class="invalid-feedback">
                            Campo Invalido @error('nombre') {{ $message }} @enderror
                        </div>
                        <div class="valid-feedback">
                            Correcto !
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="{{ old('apellido') }}"
                            class="form-control @error('apellido') is-invalid @enderror">
                        <div class="invalid-feedback">
                            Campo Invalido @error('apellido') {{ $message }} @enderror
                        </div>
                        <div class="valid-feedback">
                            Correcto !
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="cedula" class="form-label">Cedula</label>
                        <div class="input-group has-validation">
                            <input type="number" name="cedula" id="cedula" placeholder="Cedula"
                                value="{{ old('cedula') }}"
                                class="form-control @error('cedula') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Formato Invalido @error('cedula') {{ $message }} @enderror
                            </div>
                            <div class="valid-feedback">
                                Correcto !
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="telefono" class="form-label">Telefono</label>
                        <div class="input-group has-validation">
                            <input type="tel" name="telefono" id="telefono" placeholder="Telefono"
                                value="{{ old('telefono') }}" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                class="form-control @error('telefono') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Formato Invalido @error('telefono') {{ $message }} @enderror
                            </div>
                            <div class="valid-feedback">
                                Correcto !
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="you@example.com"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                        <div class="invalid-feedback">
                            Formato Invalido @error('email') {{ $message }} @enderror
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" name="direccion" id="direccion" placeholder="1234 Main St"
                            value="{{ old('direccion') }}"
                            class="form-control @error('direccion') is-invalid @enderror">
                        <div class="invalid-feedback">
                            Formato Invalido @error('direccion') {{ $message }} @enderror
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="estadoCivil" class="form-label">Estado civil</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado_civil" value="Soltero"
                                id="estado_civil1">
                            <label class="form-check-label" for="estado_civil1">
                                Soltero
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado_civil" value="Casado"
                                id="estado_civil2">
                            <label class="form-check-label" for="estado_civil2">
                                Casado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado_civil" value="Union Libre"
                                id="estado_civil2">
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

@push('JS')
    <script>
        // CUANDO EL DOCUMENTO HAYA CARGADO
        document.addEventListener("DOMContentLoaded", function(event) {
            // VALIDAMOS EL INPUT NOMBRE
            $('#nombre').change( function(){
                if( esAlfabetica( $(this).val() ) ){
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }
                else
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            });

            $('#apellido').change( function(){
                if( esAlfabetica( $(this).val() ) ){
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }
                else
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            });

            // VALIDAMOS EL INPUT CEDULA CADA VEZ QUE SE DISPARA EL EVENTO ON CHANGE
            $("#cedula").change(function(){

                if( esCedulaValida(this.value) === true )
                {
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }
                else
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            });

            // VALIDAMOS EL INPUT TELEFONO CADA VEZ QUE SE DISPARA EL EVENTO ON CHANGE
            $("#telefono").change(function(){
   
                if( esTelefonoValido(this.value) === true )
                {
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }
                else
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            });
        });
    </script>
@endpush
