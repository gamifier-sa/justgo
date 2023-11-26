@extends('dashboard.layouts.app')
@section('page_title', 'Users Page')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/members.css" />
@endpush
@section('content')
        <section>

          <div class="contentS2">
            <!-- العملاء  -->
            <div class="sectionS1">
              <div class="sectionHead">
                <h3>العملاء</h3>
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
                      <th scope="col">مرات الاشتراك</th>
                      <th scope="col">الباقة</th>
                      <th scope="col">المتبقي من الباقة</th>
                      <th scope="col">حالة المشترك</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row">
                        <div class="user">
                          <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png" alt="" />
                          <div class="info">
                            <h5>{{ $user->name }}</h5>
                            <p>{{ $user->email }}</p>
                          </div>
                        </div>
                      </th>
                      <td><div class="td">{{ $user->subscription()->count() }} مرات</div></td>
                      <td>{{ $user->subscription->package->name }}</td>
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
                        <div class="subscribeStatus">مشترك جديد</div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="optionsButtons">
              <button class="yellowBtn">
                نشر تنبيه للمشتركين المميزين <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg" alt="notifications" />
              </button>
              <button class="upToendNotifacation">
                نشر تنبيه لمن قارب اشتراكه على الانتهاء
                <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg" alt="notifications" />
              </button>
              <button class="allMembersNotifacation">
                نشر تنبيه لجميع الأعضاء <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg" alt="notifications" />
              </button>
            </div>
          </div>
        </section>
      @endsection