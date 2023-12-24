@extends('gyms.layouts.app')
@section('page_title', 'Gifts Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/members.css" />
@endpush
@section('content')
<header class="headerOptions">
    <button class="open-sidebar"><img src="{{ asset('dashboard/') }}/assets/icons/menu.svg" alt="" /></button>

    <div class="headerActions">
      <a class="addNewBtn" href="{{ route('gyms.gifts.create') }}"><span>+</span> تسجيل جديد</a>
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
            <!-- الهدايا  -->
            <div class="sectionS1">
                <div class="sectionHead">
                    <h3>الهدايا</h3>
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
                                <th scope="col">  عدد الايام</th>
                                <th scope="col">حالة الهدية</th>
                                <th scope="col"> إجراءات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($gifts))
                            @foreach ($gifts as $gift)
                            <tr>
                                <th scope="row">
                                    <div class="user">
                                        @if (!$gift->gift_card_image)
                                        <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"  alt="">

                                        @else
                                        <img src="{{ getImage('Gifts', $gift->gift_card_image) }}" alt=""
                                        style="width: 50px;height:50px" />

                                        @endif

                                    </div>
                                </th>

                                <td> {{ $gift->number_days }}</td>


                                <td>
                                    <div class="subscribeStatus">هدية جديدة</div>
                                </td>

                                <td>
                                    <form action="{{route('gyms.gifts.delete',$gift->id)}}"
                                        method="post"
                                        style="display: inline-block">
                                      @csrf
                                      @method('delete')
                                      <button type="submit"
                                              class="btn btn-danger btn-sm delete-btn">
                                          <i class="fa fa-trash"></i></button>
                                    </form>
                                          <a href="{{route('gyms.gifts.edit', $gift->id )}}"
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

        </div>
    </section>
@endsection
