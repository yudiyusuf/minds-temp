@extends('layouts.master')
@section('title') @lang('translation.Dashboards') @endsection
@section('css')

<link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">

@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Welcome ! @endslot
@endcomponent

<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Sales</span>
                        <h4 class="mb-3">
                            <span>{{ number_format($data['total_nett'],0,',','.') }}</span>
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">{{$data['percentage_change']}}%</span>
                            <span class="ms-1 text-muted font-size-13">{{ number_format($data['total_nett_bulanlalu'],0,',','.') }}</span>
                        </div>
                    </div>

                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Retur</span>
                        <h4 class="mb-3">
                            <span>{{ number_format($data['total_nett_retur'],0,',','.') }}</span>
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-danger text-danger">{{$data['percentage_change_retur']}}%</span>
                            <span class="ms-1 text-muted font-size-13">{{ number_format($data['total_nett_retur_bulanlalu'],0,',','.') }}</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Qty</span>
                        <h4 class="mb-3">
                            <span>{{$data['totalqty']}}</span>
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">{{$data['percentage_change_qty']}}%</span>
                            <span class="ms-1 text-muted font-size-13">{{$data['lastmonthtotalqty']}}</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Product</span>
                        <h4 class="mb-3">
                            <span>{{$data['totalproduct']}}</span>
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">{{$data['percentage_change_product']}}%</span>
                            <span class="ms-1 text-muted font-size-13">{{$data['lastmonthtotalproduct']}}</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row-->

<div class="row">
    <div class="col-xl-8">
        <!-- card -->
        <div class="card">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h5 class="card-title me-2">Market Overview Category</h5>
                    <div class="ms-auto">
                        <div>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                ALL
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-xl-8">
                        <div>
                            <div id="market-overview" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="p-4">
                            <?php $counter = 1; ?>
                            <?php foreach ($data['top_ten_categories'] as $category => $details): ?>
                                <div class="mt-0">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                <?php echo $counter; ?>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14"><?php echo $category; ?></span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="badge rounded-pill badge-soft-success font-size-12 fw-medium">
                                                <?php echo $details['qty']; ?>, 
                                                <?php echo number_format($details['percentage'], 2); ?>%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php $counter++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->

    <div class="col-xl-4">
        <!-- card -->
        <div class="card">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h5 class="card-title me-2">Sales by Brand</h5>
                    <div class="ms-auto">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted font-size-12">Sort By:</span> <span class="fw-medium">Brand<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="#">Parva</a>
                                <a class="dropdown-item" href="#">Metier</a>
                                <a class="dropdown-item" href="#">Beliberlian</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sales-by-locations" data-colors='["#33c38e"]' style="height: 253px"></div>
                    <div class="px-2 py-2">
                        @foreach ($data['summarybrandWithPercentage'] as $category => $brand)
                            <p class="mb-1">{{ $category }} {{ number_format($brand['value']) }}<span class="float-end">{{ number_format($brand['percentage'], 2) }}%</span></p>
                            <div class="progress mt-2" style="height: 6px;">
                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                    style="width: {{ $brand['percentage'] }}%" aria-valuenow="{{ $brand['percentage'] }}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row-->
@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.js') }}"></script>

<!-- dashboard init -->
    <script>
        (function() {
            function getColors(element) {
                var colors = $(element).attr("data-colors");
                colors = JSON.parse(colors);
                return colors.map(function(color) {
                    var colorValue = color.replace(" ", "");
                    if (colorValue.indexOf("--") == -1) return colorValue;
                    var computedColor = getComputedStyle(document.documentElement).getPropertyValue(colorValue);
                    return computedColor || undefined;
                });
            }

            function createChart(elementId, options) {
                new ApexCharts(document.querySelector(elementId), options).render();
            }

            var donutOptions = {
                chart: {
                    type: "donut",
                    height: 110
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                }
            };

            var chartsData = [
                { id: "#mini-chart1", series: [{{$data['current_month_percentage']}}, 100 - {{$data['current_month_percentage']}}] },
                { id: "#mini-chart2", series: [{{$data['current_month_percentage_retur']}}, 100 - {{$data['current_month_percentage_retur']}}] },
                { id: "#mini-chart3", series: [{{$data['current_month_percentage_qty']}}, 100 - {{$data['current_month_percentage_qty']}}] },
                { id: "#mini-chart4", series: [{{$data['current_month_percentage_product']}}, 100 - {{$data['current_month_percentage_product']}}] },
            ];

            chartsData.forEach(function(chartData) {
                var options = Object.assign({}, donutOptions, {
                    series: chartData.series,
                    colors: getColors(chartData.id)
                });
                createChart(chartData.id, options);
            });

            var barOptions = {
                series: [
                    { name: "Profit", data: [12.45, 16.2, 8.9, 11.42, 12.6, 18.1, 18.2, 14.16, 11.1, 8.09, 16.34, 12.88] },
                    { name: "Loss", data: [-11.45, -15.42, -7.9, -12.42, -12.6, -18.1, -18.2, -14.16, -11.1, -7.09, -15.34, -11.88] }
                ],
                chart: {
                    type: "bar",
                    height: 400,
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "20%"
                    }
                },
                colors: getColors("#market-overview"),
                fill: {
                    opacity: 1
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value.toFixed(0) + "%";
                        }
                    }
                },
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    labels: {
                        rotate: -90
                    }
                }
            };

            createChart("#market-overview", barOptions);

            var mapColors = getColors("#sales-by-locations");
            $("#sales-by-locations").vectorMap({
                map: "world_mill_en",
                normalizeFunction: "polynomial",
                hoverOpacity: .7,
                hoverColor: false,
                regionStyle: {
                    initial: {
                        fill: "#e9e9ef"
                    }
                },
                markerStyle: {
                    initial: {
                        r: 9,
                        fill: mapColors,
                        "fill-opacity": .9,
                        stroke: "#fff",
                        "stroke-width": 7,
                        "stroke-opacity": .4
                    },
                    hover: {
                        stroke: "#fff",
                        "fill-opacity": 1,
                        "stroke-width": 1.5
                    }
                },
                backgroundColor: "transparent",
                markers: [
                    { latLng: [41.9, 12.45], name: "Parva" },
                    { latLng: [12.05, -61.75], name: "Metier" },
                    { latLng: [1.3, 103.8], name: "Beliberlian" }
                ]
            });
        })();
    </script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
