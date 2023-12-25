@extends('dashboard.layouts.app')
@section('page_title', 'Parteners Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/partners.css" />
@endpush
@section('content')
    <header class="headerOptions">
        <button class="open-sidebar"><img src="{{ asset('dashboard/') }}/assets/icons/menu.svg" alt="" /></button>

        <div class="headerActions">
            <a class="addNewBtn" href="{{ route('dashboard.gyms.create') }}"><span>+</span> تسجيل جديد</a>
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
            <!-- الشركاء  -->
            <div class="sectionS1">
                <div class="sectionHead">
                    <h3>الشركاء</h3>
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
                                <th scope="col">عدد العملاء</th>
                                <th scope="col">المدينة</th>
                                <th scope="col">معدل تكرار الزيارة</th>
                                <th scope="col">حالة الشريك</th>
                                <th scope="col"> إجراءات</th>

                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach ($gyms as $gym)
                                <tr>
                                    <th scope="row">
                                        <div class="user">
                                            @if (!isset($gym->logo))
                                                <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"
                                                    alt="" />
                                            @else
                                                <img src="{{ getImage('Gyms', $gym->logo) }}" alt="" />
                                            @endif
                                            <div class="info">
                                                <h5>{{ $gym->name }}</h5>
                                                <p>{{ $gym->email }}</p>
                                            </div>
                                        </div>
                                    </th>

                                    <td>{{ $gym->client_count }} عميل</td>
                                    <td>{{ $gym->city->name }}</td>
                                    <td>

                                        <div class="tdProgress">
                                            <div class="progressStatus">{{ $gym->visit_percentage }}%<img
                                                    src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg"
                                                    alt="" /></div>
                                            <span>{{ $gym->visit_percentage }}%</span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($gym->admin_active == 'active')
                                            <button class="btn btn-success update-gym-admin-active-btn"
                                                onclick="updateAdminActive({{ $gym->id }}, 'notactive')">مفعل</button>
                                        @else
                                            <button class="btn btn-danger update-gym-admin-active-btn"
                                                onclick="updateAdminActive({{ $gym->id }}, 'active')">غير مفعل
                                            </button>
                                        @endif

                                    </td>
                                    <td>
                                        <form action="{{ route('dashboard.gyms.delete', $gym->id) }}" method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                <i class="fa fa-trash"></i></button>
                                        </form>

                                        <a href="{{ route('dashboard.gyms.edit', $gym->id) }}"
                                            class="btn btn-primary  btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {!! $gyms->links('dashboard.pagination') !!}

                </div>
            </div>

            <a href="{{ route('dashboard.gyms.create') }}" class="addNewPartnerBtn">تسجيل شريك جديد <img
                    src="{{ asset('dashboard/') }}/assets/icons/plusIcon.svg" alt="plusIcon" /></a>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        function updateAdminActive(gymId, status) {
            var csrf = "{{ csrf_token() }}";

            $.ajax({
                type: 'PATCH',
                url: '{{ route('dashboard.gyms.updateAdminActive', ['gym' => ':gymId']) }}'.replace(':gymId',
                    gymId),
                dataType: 'json',
                data: {
                    status: status
                },
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                success: function(response) {
                    location.reload()
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        $(document).ready(function() {
            $('.update-gym-admin-active-btn').click(function() {
                var gymId = $(this).data('gym-id');
                var status = $(this).data('status');

                updateAdminActive(gymId, status);
            });
        });
    </script>
    <script>
        $('#searchInput').on('input', function() {
            var searchValue = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ route('dashboard.gyms.search') }}',
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
