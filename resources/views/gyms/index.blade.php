@extends('gyms.layouts.app')
@section('page_title', 'Home Page')
@section('content')
    <section>
        <div class="contentS2">
            <div class="detailsCards">
                <div class="row gy-4">
                    <div class="col-sm-12  col-lg-4 ">
                        <div class="detailsCard">
                            <div class="progress-bar"
                                style="background:  radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#FF513A 50%, #FFE8D7 0);">
                                <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingDown.svg" alt=""></div>
                                <progress min="0" max="100"
                                    style="visibility:hidden;height:0;width:0;"></progress>
                            </div>
                            <div class="cardContnent">
                                <h4>مبيعات الشهر</h4>
                                <span>{{ $currentMonthleySales }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-4">
                        <div class="detailsCard">
                            <div class="progress-bar"
                                style="background:  radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#4040F2 60%, #D8D8FE 0);">
                                <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingFlat.svg" alt="">
                                </div>
                                <progress min="0" max="100"
                                    style="visibility:hidden;height:0;width:0;"></progress>
                            </div>
                            <div class="cardContnent">
                                <h4>الهدف الشهري</h4>
                                <span>{{ number_format(auth('gyms')->user()->expected_number_customers, 2) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-4">
                        <div class="detailsCard">
                            <div class="progress-bar"
                                style="background:  radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#44C13C 90%, #E6FBD9 0);">
                                <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingUp.svg" alt=""></div>
                                <progress min="0" max="100"
                                    style="visibility:hidden;height:0;width:0;"></progress>
                            </div>
                            <div class="cardContnent">
                                <h4> مبيعات اليوم </h4>
                                <span>{{ $currentDailySales }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-4">
                        <div class="detailsCard">
                            <div class="progress-bar"
                                style="background:  radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#c13c3c 90%, #dce4e4 0);">
                                <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingUp.svg" alt=""></div>
                                <progress min="0" max="100"
                                    style="visibility:hidden;height:0;width:0;"></progress>
                            </div>
                            <div class="cardContnent">
                                <h4> المبيعات الكلية</h4>
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
                                        <img src="@if ($user->profile_image) {{ getImage('Users', $user->profile_image) }} @else{{ asset('dashboard/') }}/assets/images/tableUser.png @endif"
                                            alt="">
                                        <div class="info">
                                            <h5>{{ $user->name }}</h5>
                                            <p>{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="td">{{ $user->subscription()->count() }} مرات</div>
                                </td>
                                <td>{{ $user->subscription ? $user->subscription->package->name : 'لا يوجد' }}</td>
                                <td>
                                    <div class="tdProgress">
                                        @if ($user->subscription()->count() > 0 && $user->subscription->package)
                                            <div class="progressStatus">
                                                {{ $user->subscription->package->visits_no - $user->subscription()->count() }}
                                                <img src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg"
                                                    alt="" />
                                            </div>
                                        @else
                                            <div class="progressStatus">
                                                0
                                                <img src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg"
                                                    alt="" />
                                            </div>
                                        @endif
                                        @if ($user->subscription && $user->subscription->package)
                                            @php
                                                $remainingVisits = $user->subscription->package->visits_no - $user->subscription()->count();
                                                $percentage = ($remainingVisits / $user->subscription->package->visits_no) * 100;
                                            @endphp

                                            <span>{{ $percentage }}%</span>

                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $percentage }}%"
                                                    aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        @else
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width:0%"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @endif

                                    </div>
                                </td>
                                <td>
                                    @if ($user->subscription->created_at->diffInDays(now()) <= 2)
                                        <div class="subscribeStatus">مشترك جديد</div>
                                    @else
                                        <div class="subscribeStatus">مشترك قديم</div>
                                    @endif

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
