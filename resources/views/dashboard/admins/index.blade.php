@extends('dashboard.layouts.app')
@section('page_title', 'Admins Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/members.css" />
@endpush
@section('content')
    <header class="headerOptions">
        <button class="open-sidebar"><img src="{{ asset('dashboard/') }}/assets/icons/menu.svg" alt="" /></button>

        <div class="headerActions">
            <a class="addNewBtn" href="{{ route('dashboard.admins.create') }}"><span>+</span> تسجيل جديد</a>
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
                    <h3>المديرين</h3>
                    <div class="searchInput">
                        <input type="text" id="searchInput" />
                        <img src="{{ asset('dashboard/') }}/assets/icons/inputSearch.svg" alt="" />
                    </div>
                </div>
                <div class="table-responsive-xl">
                    <table class="table tableS1">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">الايميل</th>
                                <th scope="col">الجوال</th>
                                <th scope="col"> إجراءات</th>

                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @if (isset($admins))
                                @foreach ($admins as $admin)
                                    <tr>
                                        <th scope="row">
                                            <div class="user">
                                                <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"
                                                    alt="">
                                                <div class="info">
                                                    <h5>{{ $admin->name }}</h5>
                                                    <p>{{ $admin->email }}</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="td">{{ $admin->email }} </div>
                                        </td>
                                        <td>
                                            <div class="td">{{ $admin->phone }} </div>
                                        </td>

                                        <td>
                                            <form action="{{ route('dashboard.admins.delete', $admin->id) }}"
                                                method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fa fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('dashboard.admins.edit', $admin->id) }}"
                                                class="btn btn-primary  btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    {!! $admins->links('dashboard.pagination') !!}
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
@push('scripts')
    <script>
        $('#searchInput').on('input', function() {
            var searchValue = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ route('dashboard.admins.search') }}',
                data: {
                    search: searchValue
                },
                success: function(response) {

                    $('#searchResults').html(response);


                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    </script>
@endpush
