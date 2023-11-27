@extends('dashboard.layouts.app')
@section('page_title', 'Users Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/members.css" />
@endpush
@section('content')
<header class="headerOptions">
    <button class="open-sidebar"><img src="{{ asset('dashboard/') }}/assets/icons/menu.svg" alt="" /></button>

    <div class="headerActions">
      <a class="addNewBtn" href="{{ route('dashboard.users.create') }}"><span>+</span> تسجيل جديد</a>
      <div class="notifacationAndSearchBtn">
        <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg" alt="notifacation icon" />
      </div>
      <div class="notifacationAndSearchBtn">
        <img src="{{ asset('dashboard/') }}/assets/icons/search.svg" alt="search icon" />
      </div>
      <div class="userImage">
        <img src="{{ asset('dashboard/') }}/assets/images/user.png" alt="userImage" />
      </div>
    </div>
  </header>
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
                                <th scope="col"> إجراءات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($users))
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">
                                    <div class="user">
                                        @if (!$user->profile_image)
                                        <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"  alt="">

                                        @else
                                        <img src="{{ getImage('Users', $user->profile_image) }}" alt=""
                                        style="width: 50px;height:50px" />

                                        @endif

                                        <div class="info">
                                            <h5>{{ $user->name }}</h5>
                                            <p>{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="td">{{ $user->subscription()->count() }} مرات</div>
                                </td>
                                <td>{{ isset($user->subscription) ? $user->subscription->package->name :'-' }}</td>
                                <td>
                                    <div class="tdProgress">
                                        <div class="progressStatus">4%<img
                                                src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg"
                                                alt="" /></div>
                                        <span>40%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="subscribeStatus">مشترك جديد</div>
                                </td>

                                <td>
                                    <form action="{{route('dashboard.users.delete',$user->id)}}"
                                        method="post"
                                        style="display: inline-block">
                                      @csrf
                                      @method('delete')
                                      <button type="submit"
                                              class="btn btn-danger btn-sm delete-btn">
                                          <i class="fa fa-trash"></i></button>

                                          <a href="{{route('dashboard.users.edit', $user->id )}}"
                                            class="btn btn-primary  btn-sm"><i
                                                 class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="optionsButtons">
                <button class="yellowBtn">
                    نشر تنبيه للمشتركين المميزين <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg"
                        alt="notifications" />
                </button>
                <button class="upToendNotifacation">
                    نشر تنبيه لمن قارب اشتراكه على الانتهاء
                    <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg" alt="notifications" />
                </button>
                <button class="allMembersNotifacation">
                    نشر تنبيه لجميع الأعضاء <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg"
                        alt="notifications" />
                </button>
            </div>
        </div>
    </section>
@endsection
