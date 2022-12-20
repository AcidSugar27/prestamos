@extends('layouts.app')

@section('content')
    <h2 class="fw-blod text-center py-5">Crear Pago</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <div class="row g-5 ">
        <div class="">
            <form class="needs-validation" method="POST" action="{{ route('pagos.store') }}">
                @csrf
                @method('POST')

                <div class="row g-3 pb-5">

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

                    <div class="col-sm-6">
                        <label for="plazo" class="form-label">
                            Prestamo del Cliente
                        </label>

                        <select class="form-select" name="id_prestamo" id="input-prestamo">
                            <option selected>Selecciona el prestamo correspondiente</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="apellido" class="form-label">Pagar Mensualidad</label>
                        <input type="numeric" name="abono" id="abono" value=""
                            class="form-control @error('abono') is-invalid @enderror">
                        <div class="invalid-feedback">
                            Error: @error('abono') {{ $message }} @enderror
                        </div>
                        <div class="valid-feedback">
                            Correcto!
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
        document.addEventListener("DOMContentLoaded", function(event) {
            $("#cedula").change(function(){
                var sCedula = this.value;
                if( esCedulaValida(sCedula) === true )
                {
                    $(this).addClass('is-valid');
                    
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

                                $.ajax({
                                    dataType: "json",
                                    url: `http://127.0.0.1:8000/prestamo-del-cliente`,
                                    data: { "cedula": sCedula },
                                    success: function(jsonDocument){
                                        for (var i = 0; i < jsonDocument.length; i++){
                                            var jsonObject = jsonDocument[i];
                                            var texto = `Prestamo de ${jsonObject['monto']} a ${jsonObject['plazo']} meses`;
                                            
                                            $('#input-prestamo').append($('<option>', {
                                                value: jsonObject['id'],
                                                text: `${texto}`
                                            }));
                                        }

                                        $('#input-prestamo').change( function(){
                                            var id = $(this).val();
                                            $.ajax({
                                                dataType: "json",
                                                url: `http://127.0.0.1:8000/api/prestamo`,
                                                data: { "id":  `${id}` },
                                                success: function(jsonObject){
                                                    var pago_mensualidad = jsonObject['total_a_pagar'] / jsonObject['plazo'];
                                                    $('#abono').val(`${pago_mensualidad}`);
                                                } 
                                            });
                                        });
                                    } 
                                });
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

                    $(this).removeClass('is-invalid');


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
        });
    </script>
@endpush