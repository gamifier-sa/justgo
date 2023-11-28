@extends('dashboard.layouts.app')
@section('page_title', 'Users Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/members.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/js//sweetalert2/sweetalert2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
                            @if (isset($users))
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">
                                            <div class="user">
                                                @if (!$user->profile_image)
                                                    <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"
                                                        alt="">
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
                                        <td>{{ isset($user->subscription) ? $user->subscription->package->name : '-' }}
                                        </td>
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
                                            <form action="{{ route('dashboard.users.delete', $user->id) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fa fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                                class="btn btn-primary  btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" dir="ltr" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 184px;">إرسال إشعار </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="notificationForm">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"
                                        style="margin-left: 412px;">العنوان</label>
                                    <input type="text" class="form-control" id="title">
                                    <span class="text-danger" id="titleError"></span>

                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label"
                                        style="margin-left: 412px;">الرسالة</label>
                                    <textarea class="form-control" id="message"></textarea>
                                    <span class="text-danger" id="titleError"></span>

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                            <button type="button" class="btn btn-primary" id="submitForm"> إرسال </button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="optionsButtons">
                <button class="yellowBtn">
                    نشر تنبيه للمشتركين المميزين <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg"
                        alt="notifications" />
                </button>
                <button type="button" class="upToendNotifacation" id="endSubscriptionButton">
                    نشر تنبيه لمن قارب اشتراكه على الانتهاء
                    <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg" alt="notifications" />
                </button>
                <button class="allMembersNotifacation" type="button" data-toggle="modal" data-target="#exampleModal">
                    نشر تنبيه لجميع الأعضاء <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg"
                        alt="notifications" />
                </button>
            </div>
        </div>

    </section>
    @push('scripts')
    <script src="{{ asset('dashboard/') }}/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $('#endSubscriptionButton').click(function() {
                    var csrf = "{{ csrf_token() }}"

                    $.ajax({
                        url: '{{ route('dashboard.endSubscription') }}', // Update this URL to match your route
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        success: function(response) {
                            Swal.fire({
                                text: "تم إرسال الإشعارات بنجاح",
                                icon: "success"
                            });
                        },
                        error: function(error) {
                            console.error('Error ending subscription:', error);
                            alert('Failed to end subscription. Please try again.');
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#submitForm').click(function() {
                    var title = $('#title').val();
                    var messsage = $('#message').val();

                    var csrf = "{{ csrf_token() }}"
                    $.ajax({
                        url: '{{ route('dashboard.pushToAllusers') }}', // Update this URL to match your route
                        type: 'POST',
                        data: {
                            title: title,
                            messsage: messsage

                        },
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        success: function(response) {

                            Swal.fire({
                                text: "تم إرسال إشعار بنجاح",
                                icon: "success"
                            }).then(() => {
                                location.reload(); // Reload the page
                            });
                        },
                        error: function(error) {
                            if (error.responseJSON.errors) {
                                displayErrors(error.responseJSON.errors);
                            } else {
                                console.error('Error sending notification:', error);
                                alert('Failed to send notification. Please try again.');
                            }
                        }
                    });
                });

                function displayErrors(errors) {
                    // Display validation errors for each input
                    $('#titleError').text(errors.title ? errors.title[0] : '');
                    $('#messageError').text(errors.message ? errors.message[0] : '');
                }
            });
        </script>
    @endpush
@endsection
