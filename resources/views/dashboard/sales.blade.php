@extends('dashboard.layouts.app')
@section('page_title', 'Sales')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/sales.css" />
@endpush
@section('content')
        <section>
          <div class="contentS2">
            <div class="detailsCards">
              <div class="row gy-4">
                <div class="col-sm-12 col-lg-4">
                  <div class="detailsCard">
                    <div
                      class="progress-bar"
                      style="
                        background: radial-gradient(closest-side, white 79%, transparent 80% 100%),
                          conic-gradient(#ff513a 50%, #ffe8d7 0);
                      "
                    >
                      <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingDown.svg" alt="" /></div>
                      <progress min="0" max="100" style="visibility: hidden; height: 0; width: 0"></progress>
                    </div>
                    <div class="cardContnent">
                      <h4>مبيعات الشهر</h4>
                      <span>{{ $currentMonthleySales }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                  <div class="detailsCard">
                    <div
                      class="progress-bar"
                      style="
                        background: radial-gradient(closest-side, white 79%, transparent 80% 100%),
                          conic-gradient(#4040f2 60%, #d8d8fe 0);
                      "
                    >
                      <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingFlat.svg" alt="" /></div>
                      <progress min="0" max="100" style="visibility: hidden; height: 0; width: 0"></progress>
                    </div>
                    <div class="cardContnent">
                      <h4>الهدف الشهري</h4>
                      <span>12000</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                  <div class="detailsCard">
                    <div
                      class="progress-bar"
                      style="
                        background: radial-gradient(closest-side, white 79%, transparent 80% 100%),
                          conic-gradient(#44c13c 90%, #e6fbd9 0);
                      "
                    >
                      <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingUp.svg" alt="" /></div>
                      <progress min="0" max="100" style="visibility: hidden; height: 0; width: 0"></progress>
                    </div>
                    <div class="cardContnent">
                      <h4>أجمالي المبيعات</h4>
                      <span>{{ $totalSales }}</span>
                      <a href="#" class="detailsBtn">التفاصيل</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="salesContent">
              <div class="row gy-4">
                <div class="col-12 col-lg-3">
                  <div class="salesCard">
                    <h4>اجمالي الايرادات</h4>
                    <p class="price">{{ $totalSales }}ريال</p>
                    <p class="description">اجمالي الايرادات مرتفع بنسبة 0% عن الشهر الماضي</p>
                    <div class="totalIncomeProgress">
                      <div
                        role="progressbar"
                        aria-valuenow="0"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="--value: 0"
                      ></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-3">
                  <div class="salesCard">
                    <p class="price">+{{ $currentMonthUserCount }} <br />مستخدم جديد</p>
                    <img src="{{ asset('dashboard/') }}/assets/icons/numberOfUsers.svg" alt="" />
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="salesCard">
                    <h4>زيارات النوادي</h4>
                    <canvas id="applicationVisits"></canvas>
                  </div>
                </div>
              </div>

              <!-- افضل المبيعات  -->
              <div class="sectionS1">
                <div class="sectionHead">
                  <h3>افضل المبيعات</h3>
                </div>
                <div class="table-responsive-xl">
                  <table class="table tableS1">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">المبيعات</th>
                        <th scope="col">الرسم البياني</th>
                        <th scope="col">اسم الباقة</th>
                        <th scope="col">عدد المبيعات</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">01</th>
                        <td><div class="salsePersentage primary">46%</div></td>
                        <td>
                          <div class="tdProgress primary">
                            <div class="progress">
                              <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: 46%"
                                aria-valuenow="25"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </div>
                        </td>
                        <td>الباقة الماسية</td>
                        <td>792730</td>
                      </tr>
                      <tr>
                        <th scope="row">02</th>
                        <td><div class="salsePersentage secondary">17%</div></td>
                        <td>
                          <div class="tdProgress secondary">
                            <div class="progress">
                              <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: 17%"
                                aria-valuenow="25"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </div>
                        </td>
                        <td>الباقة الماسية</td>
                        <td>792730</td>
                      </tr>
                      <tr>
                        <th scope="row">03</th>
                        <td><div class="salsePersentage third">19%</div></td>
                        <td>
                          <div class="tdProgress third">
                            <div class="progress">
                              <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: 19%"
                                aria-valuenow="25"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </div>
                        </td>
                        <td>الباقة الماسية</td>
                        <td>792730</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <button class="saveReport">حفظ القرير</button>
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
    datasets: [
      {
        label: "زبارات النوادي",
        data: {!! json_encode($visitCounts) !!},
        // backgroundColor: "#2611E5",
        borderColor: "#2611E5",
        borderWidth: 2, // Border width for bars
        fill: {
          target: "origin",
          // above: 'rgba(38, 17, 229, 0.1)',
        },
        backgroundColor: function (context) {
          const chart = context.chart
          const { ctx, chartArea } = chart

          // This case happens on initial chart load
          if (!chartArea) return
          return getGradient(ctx, chartArea)
        },
      },
    ],
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
        xAxes: [
          {
            categoryPercentage: 0.0,
            barPercentage: 0.0,
          },
        ],
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


