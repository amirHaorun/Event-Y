@extends('admin.admin-dashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">

                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total Shipments</h5>
                            <h2 class="card-title">ADMIN CHART</h2>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1" width="400" height="90"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    var ctx = document.getElementById('chartBig1');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['SUCCESSFUL PURCHASES', 'ABANDONED CART', 'EVENTS'],
            datasets: [{
                label: 'DATA',
                data: [{{$purchases->count()}}, {{$cart}},{{$events_count}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


</script>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header ">

                        <div class="row">
                            <div class="col-sm-12 ">

                                <h2 class="card-title">Total Purchases</h2>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center">
                                    {{$purchases

                                        ->sum('value')}} $
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header ">

                        <div class="row">
                            <div class="col-sm-12 ">

                                <h2 class="card-title"><a href="/admin/orders">Total orders</a></h2>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center">
                                    <i class=" tim-icons icon-cart"></i>
                                    {{$purchases
                                        ->count()}}
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



</div>
@endsection
