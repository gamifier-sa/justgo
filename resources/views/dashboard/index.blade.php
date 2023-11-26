@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@section('content')
<section>
  <div class="contentS2">
      <div class="detailsCards">
          <div class="row gy-4">
              <div class="col-sm-12  col-lg-4 ">
                  <div class="detailsCard">
                      <div class="progress-bar" style="background:  radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#FF513A 50%, #FFE8D7 0);">
                          <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingDown.svg" alt=""></div>
                          <progress min="0" max="100" style="visibility:hidden;height:0;width:0;"></progress>
                      </div>
                      <div class="cardContnent">
                          <h4>مبيعات الشهر</h4>
                          <span>{{ $currentMonthleySales }}</span>
                      </div>
                  </div>
              </div>
              <div class="col-sm-12  col-lg-4">
                  <div class="detailsCard">
                      <div class="progress-bar" style="background:  radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#4040F2 60%, #D8D8FE 0);">
                          <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingFlat.svg" alt=""></div>
                          <progress min="0" max="100" style="visibility:hidden;height:0;width:0;"></progress>
                      </div>
                      <div class="cardContnent">
                          <h4>الهدف الشهري</h4>
                          <span>12000</span>
                      </div>
                  </div>
              </div>
              <div class="col-sm-12  col-lg-4">
                  <div class="detailsCard">
                      <div class="progress-bar" style="background:  radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#44C13C 90%, #E6FBD9 0);">
                          <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingUp.svg" alt=""></div>
                          <progress min="0" max="100" style="visibility:hidden;height:0;width:0;"></progress>
                      </div>
                      <div class="cardContnent">
                          <h4>أجمالي المبيعات</h4>
                          <span>{{ $totalSales }}</span>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>

      <!-- العملاء  -->
      <div class="sectionS1">
          <div class="sectionHead">
              <h3>العملاء</h3>
              <div class="searchInput">
                  <input type="text" />
                  <img src="{{ asset('dashboard/') }}/assets/icons/inputSearch.svg" alt="">
              </div>
          </div>
          <div class="table-responsive-xl">
              <table class="table tableS1">
                  <thead>
                      <tr>
                      <th scope="col"></th>
                      <th scope="col">مرات الاشتراك</th>
                      <th scope="col">الباقة</th>
                      <th scope="col">المتبقي من الباقة </th>
                      <th scope="col">حالة المشترك </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">
                                <div class="user">
                                    <img src="@if($user->profile_image) {{ getImage('Users', $user->profile_image) }} @else{{ asset('dashboard/') }}/assets/images/tableUser.png @endif" alt="">
                                    <div class="info">
                                        <h5>{{ $user->name }}</h5>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                            </th>
                            <td><div class="td">{{ $user->subscription()->count() }} مرات</div></td>
                            <td>{{ $user->subscription?$user->subscription->package->name:'لا يوجد' }}</td>
                            <td>
                                <div class="tdProgress">
                                    <div class="progressStatus">4%<img src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg" alt=""></div>
                                    <span>{{ $user->subscription ? ($user->visits()->count() / $user->subscription->package->visits_no) * 100 : '0'  }}%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
                                </div>
                            </td>
                            <td>
                                <div class="subscribeStatus">مشترك جديد</div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          
      </div>

      <!-- الشركاء -->
      <div class="sectionS1">
          <div class="sectionHead">
              <h3>الشركاء </h3>
              <div class="searchInput">
                  <input type="text" />
                  <img src="{{ asset('dashboard/') }}/assets/icons/inputSearch.svg" alt="">
              </div>
          </div>
          <div class="table-responsive-xl">
              <table class="table tableS1">
                  <thead>
                      <tr>
                      <th scope="col"></th>
                      <th scope="col">عدد العملاء</th>
                      <th scope="col">المدينة</th>
                      <th scope="col">معدل تكرار الزيارة</th>
                      <th scope="col">حالة الشريك </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($gyms as $gym)
                    <tr>
                        <th scope="row">
                            <div class="user">
                                <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png" alt="">
                                <div class="info">
                                    <h5>{{ $gym->name }}</h5>
                                    <p>{{ $gym->email }}</p>
                                </div>
                            </div>
                        </th>
                        <td><div class="td"> 1080 عميل</div></td>
                        <td>{{ $gym->city->name }}</td>
                        <td>
                            <div class="tdProgress">
                                <div class="progressStatus">4%<img src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg" alt=""></div>
                                <span>40%</span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="subscribeStatus">شريك جديد</div>
                        </td>
                    </tr>
                    @endforeach
                     
                  </tbody>
              </table>
          </div>
      </div>

  </div>
</section>
@endsection