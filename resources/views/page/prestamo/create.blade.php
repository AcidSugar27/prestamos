@extends('layouts.app')

@section('content')
    <h2 class="fw-blod text-center py-5">Crear Prestamo</h2>

    <!-- Form -->
    <div class="row g-5 ">
        <div class="">
            <form class="needs-validation" method="POST" action="{{ route('prestamos.store') }}">
                @csrf
                @method('POST')

                <div class="row g-3 pb-5 col-12">
                    <div class="col-3 mb-5">
                        <label for="validationCustom01" class="form-label">Cedula Del Cliente</label>
                        
                        <input type="number" name="cedula" id="cedula" placeholder="Cedula"
                            value="{{ old('cedula') }}"
                            class="form-control @error('cedula') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Formato Invalido: @error('cedula') {{ $message }} @enderror
                        </div>
                        <div class="valid-feedback">
                            Formato Valido
                        </div>
                    </div>
                    <div class="col-9">
                        <label for="" class="form-label">Nombre Del Cliente</label>
                        <input type="text" class="form-control" disabled id="input-NombreDelCliente">
                        <div class="invalid-feedback">
                            No se encuentra el cliente en el Sistema
                        </div>
                        <div class="valid-feedback">
                            Cliente Encontrado
                        </div>
                    </div>
                    <div class="row col-12">
                        <div class="col-sm-3">
                            <label for="apellido" class="form-label">Monto</label>
                            <input type="number" id="monto" name="monto" placeholder="1000"
                                value="{{ old('monto') }}" step="1" min="1"
                                class="form-control @error('monto') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Campo Invalido: @error('monto') {{ $message }} @enderror
                            </div>
                            <div class="valid-feedback">
                                Formato Valido
                            </div>
                        </div>
    
                        <div class="col-3">
                            <label for="cedula" class="form-label">
                                Porcentaje de Intereses
                            </label>
                            
                            <div class="input-group has-validation">
                                <input type="number" name="interes" placeholder="10"
                                    value="{{ old('interes') }}"
                                    class="form-control @error('interes') is-invalid @enderror" required>
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
                            <label for="plazo" class="form-label">
                                Plazo Del Prestamo
                            </label>
    
                            <select class="form-select" name="plazo">
                                <option selected>Selecciona un plazo</option>
                                <option value="12">12 meses</option>
                                <option value="18">18 meses</option>
                                <option value="24">24 meses</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('JS')
    <script>
        // CUANDO EL DOM HAYA CARGADO
        document.addEventListener("DOMContentLoaded", function(event) {
            
            // VALIDAMOS EL INPUT CEDULA CUANDO SE DISPARA EL EVENTO ONCHANGE
            $("#cedula").change(function(){
                var sCedula = this.value;
                if( esCedulaValida(sCedula) === true )
                {
                    $("#cedula").addClass('is-valid');
                    
                    $.ajax({
                        dataType: "json",
                        url: `http://127.0.0.1:8000/client`,
                        data: { "cedula": sCedula },
                        success: function(res)
                        {
                            if(res.length > 0)
                            {
                                $('#input-NombreDelCliente').addClass('is-valid');
                                $('#input-NombreDelCliente').removeClass('is-invalid');
                                $('#input-NombreDelCliente').val(res[0].nombre + ' ' + res[0].apellido);
                            }
                            else
                            {
                                $('#input-NombreDelCliente').addClass('is-invalid');
                                $('#input-NombreDelCliente').removeClass('is-valid');
                                $('#input-NombreDelCliente').val("");
                            }

                        },
                        error: function(res)
                        {
                            console.log('No se pudo realizar la peticion AJAX');
                        }
                    });

                    $("#cedula").removeClass('is-invalid');
                }
                else
                {
                    $("#cedula").addClass('is-invalid');
                    $("#cedula").removeClass('is-valid');

                    $('#input-NombreDelCliente').addClass('is-invalid');
                    $('#input-NombreDelCliente').removeClass('is-valid');
                    $('#input-NombreDelCliente').val("");
                }
            });

            // VALIDAMOS EL INPUT
            $('#monto').change( function(){
                
                if( isNaN($('#monto').val())  )
                {
                    $('#monto').addClass('is-invalid');
                    $('#monto').removeClass('is-valid');
                }
                else
                {
                    $('#monto').addClass('is-valid');
                    $('#monto').removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush