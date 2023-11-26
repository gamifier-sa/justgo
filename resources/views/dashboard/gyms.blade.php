@extends('dashboard.layouts.app')
@section('page_title', 'Parteners Page')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/partners.css" />
@endpush
@section('content')
        <section>

          <div class="contentS2">
            <!-- الشركاء  -->
            <div class="sectionS1">
              <div class="sectionHead">
                <h3>الشركاء</h3>
                <div class="searchInput">
                  <input type="text" />
                  <img src="{{ asset('dashboard/') }}/assets/icons/inputSearch.svg" alt="" />
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
                      <th scope="col">حالة الشريك</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($gyms as $gym)
                    <tr>
                      <th scope="row">
                        <div class="user">
                          <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png" alt="" />
                          <div class="info">
                            <h5>{{ $gym->name }}</h5>
                            <p>{{ $gym->email }}</p>
                          </div>
                        </div>
                      </th>
                      <td>1080 عميل</td>
                      <td>{{ $gym->city->name }}</td>
                      <td>
                        <div class="tdProgress">
                          <div class="progressStatus">4%<img src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg" alt="" /></div>
                          <span>40%</span>
                          <div class="progress">
                            <div
                              class="progress-bar"
                              role="progressbar"
                              style="width: 25%"
                              aria-valuenow="25"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
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

            <a href="{{ route('dashboard.gyms.create') }}" class="addNewPartnerBtn">تسجيل شريك جديد <img src="{{ asset('dashboard/') }}/assets/icons/plusIcon.svg" alt="plusIcon" /></a>
          </div>
        </section>
     @endsection