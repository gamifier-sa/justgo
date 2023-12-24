@extends('gyms.layouts.app')
@section('page_title', 'Sales')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/sales.css" />
@endpush
@section('content')
    <section>
        <div class="contentS2">
            <div class="detailsCards">
                <div class="row gy-4">
                    <div class="col-sm-12 col-lg-6">
                        <div class="detailsCard">
                            <div class="progress-bar"
                                style="
                        background: radial-gradient(closest-side, white 79%, transparent 80% 100%),
                          conic-gradient(#ff513a 50%, #ffe8d7 0);
                      ">
                                <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingDown.svg" alt="" />
                                </div>
                                <progress min="0" max="100"
                                    style="visibility: hidden; height: 0; width: 0"></progress>
                            </div>
                            <div class="cardContnent">
                                <h4>مبيعات الشهر</h4>
                                <span>  {{ $currentMonthleySales }} ريال</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6">
                        <div class="detailsCard">
                            <div class="progress-bar"
                                style="
                        background: radial-gradient(closest-side, white 79%, transparent 80% 100%),
                          conic-gradient(#44c13c 90%, #e6fbd9 0);
                      ">
                                <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingUp.svg" alt="" />
                                </div>
                                <progress min="0" max="100"
                                    style="visibility: hidden; height: 0; width: 0"></progress>
                            </div>
                            <div class="cardContnent">
                                <h4>المبيعات الكلية</h4>
                                <span>{{ $totalSales }} ريال</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="salesContent">
                <div class="row gy-4">
                    <div class="col-12 col-lg-6">
                        <div class="salesCard">
                            <h4>اجمالي الايرادات</h4>
                            <p class="price">{{ $totalSales }}ريال</p>
                            <p class="description">اجمالي الايرادات مرتفع بنسبة 0% عن الشهر الماضي</p>
                            <div class="totalIncomeProgress">
                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                    style="--value: 0"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="salesCard">
                            <h4> نسبة المبيعات عن كل شهر </h4>
                            <canvas id="applicationVisits"></canvas>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const cta = document.getElementById("applicationVisits")

        function getGradient(ctx, chartArea) {
            let gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top)
            gradient.addColorStop(0.9, "rgba(38, 17, 229, 0.5)")
            gradient.addColorStop(0, "transparent")
            return gradient
        }

        const chartData = {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: "نسبة المبيعات عن كل شهر",
                data: {!! json_encode($currentMonthlySales) !!},
                // backgroundColor: "#2611E5",
                borderColor: "#2611E5",
                borderWidth: 2, // Border width for bars
                fill: {
                    target: "origin",
                    // above: 'rgba(38, 17, 229, 0.1)',
                },
                backgroundColor: function(context) {
                    const chart = context.chart
                    const {
                        ctx,
                        chartArea
                    } = chart

                    // This case happens on initial chart load
                    if (!chartArea) return
                    return getGradient(ctx, chartArea)
                },
            }, ],
        }

        new Chart(cta, {
            type: "line",
            data: chartData,
            options: {
                barPercentage: 1,
                plugins: {
                    legend: {
                        display: false,
                        align: "start",
                        labels: {
                            usePointStyle: false,
                            pointStyle: "square",
                            boxWidth: 10,
                            boxHeight: 10,
                        },
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false, // Remove x-axis grid lines
                        },
                    },
                    xAxes: [{
                        categoryPercentage: 0.0,
                        barPercentage: 0.0,
                    }, ],
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false, // Remove x-axis grid lines
                        },
                    },
                },
                elements: {
                    line: {
                        borderWidth: 2, // Border width for the line
                        // tension: 0.3, // Adjust the line tension as needed
                    },
                    point: {
                        radius: 0, // Set point radius to 0 to remove circular points
                    },
                },
            },
        })
    </script>
@endpush
