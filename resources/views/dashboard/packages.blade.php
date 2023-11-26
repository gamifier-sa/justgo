@extends('dashboard.layouts.app')
@section('page_title', 'Packages')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/pakages.css" />
@endpush
@section('content')
        <section>
          <div class="contentS2">
            <div class="detailsCards">
              <div class="row  gy-4">
                @foreach ($packages as $package)
                <div class="col-sm-12 col-lg-4">
                  <div class="detailsCard">
                    <div
                      class="progress-bar"
                      style="background: radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#ff513a 50%, #ffe8d7 0);">
                      <div><img src="{{ asset('dashboard/') }}/assets/icons/trendingDown.svg" alt="" /></div>
                      <progress min="0" max="100" style="visibility: hidden; height: 0; width: 0"></progress>
                    </div>
                    <div class="cardContnent">
                      <h4>{{ $package->name }}</h4>
                      <div class="info">
                          <span>{{ $package->gymssubcription()->count() }}</span>
                          <p>معدل الاشتراكات</p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

              </div>
            </div>


            <div class="allPakages">
                <div class="row gy-4">
                  @foreach ($packages as $package)
                    <div class="col-sm-12 col-lg-4">
                        <div class="pakageCard">
                            <div class="padge d-none">خصم 20%</div>
                            <h2> {{ $package->name }} </h2>
                            <ul>
                                <li>
                                    <h5>سعر الاشتراك:</h5>
                                    <p>{{ $package->monthly_price }} SRC</p>
                                </li>
                                <li>
                                    <h5>الأندية المدعومة:</h5>
                                    @foreach ($package->gym as $gym)
                                      <p>{{ $gym->name }}</p>
                                    @endforeach
                                </li>
                                <li>
                                    <h5>المدن :</h5>
                                    @foreach ($package->cities as $city)
                                      <p>{{ $city->name }}</p>
                                    @endforeach
                                </li>
                            </ul>
                            <div class="info">
                                <span>{{ $package->gymssubcription()->count() }}</span>
                                <p>معدل الاشتراكات</p>
                            </div>
                            <a href="">
                                <img src="{{ asset('dashboard/') }}/assets/icons/editPakage.svg" alt="edit icon">
                            </a>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>

            <div class="optionsButtons">
                <button class="updateOffers">
                    تعديل العرض الحالي <img src="{{ asset('dashboard/') }}/assets/icons/editPakage.svg" alt="edit" />
                </button>
                <button class="addNewPartnerBtn">اضافة باقة جديدة <img src="{{ asset('dashboard/') }}/assets/icons/plusIcon.svg" alt="plusIcon" /></button>
                <button class="addNewOffer">أضافة عرض وخصومات <img src="{{ asset('dashboard/') }}/assets/icons/plusIcon.svg" alt="plusIcon" /></button>
            </div>

          </div>
        </section>
     @endsection