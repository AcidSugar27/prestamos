@extends('layouts.app')

@section('content')
    <div class="text-end">
        <img src="img/logo.png" width="48" alt="">
    </div>
    <h2 class="fw-blod text-center py-3">Dashboard</h2>
    <span>
        En la siguiente grafica podemos ver un listado de los clientes con sus respectivas deudas y pagos,
        asi tambien como la cantidad faltante.
    </span>
    <div id="chartDeudas"></div>

@endsection

@push('JS')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            
            var chartOptions = {
                series: [{
                    name: 'Deuda',
                    data: []
                }, {
                    name: 'Pagado',
                    data: []
                }, {
                    name: 'Faltante',
                    data: []
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [],
                },
                yaxis: {
                    title: {
                        text: '$ (thousands)'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "$ " + val + ""
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartDeudas"), chartOptions);

            $.ajax({
                dataType: "json",
                url: `http://127.0.0.1:8000/prestamos-abiertos`,
                success: function(jsonDocument) {
                    if (jsonDocument.length > 0)
                    {
                        for (var i = 0; i < jsonDocument.length; i++)
                        {
                            var jsonObject  = jsonDocument[i];
                            var deuda       = jsonObject['total_a_pagar'];  //monto
                            var pagado      = jsonObject['pagado'];
                            var adeudo      = deuda - pagado;

                            chartOptions.series[0].data.push( deuda );
                            chartOptions.series[1].data.push( pagado );
                            chartOptions.series[2].data.push( deuda - pagado );

                            chartOptions.xaxis.categories.push( `Client ID: ${jsonObject['id_cliente']}` );
                        }
                        chart.render();
                    }
                    else
                    {
                        console.log('faa');
                    }

                },
                error: function(res) {
                    console.log('No se pudo realizar la peticion AJAX');
                }
            });

        });
    </script>
@endpush
