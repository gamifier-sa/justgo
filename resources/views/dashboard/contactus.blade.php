@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/inquiries-and-complaints.css" />
@endpush
@section('content')
    <section>

        <div class="contentS2">
            <!-- الاستفسارات والشكاوى  -->
            <div class="sectionS1">
                <div class="sectionHead">
                    <h3>الاستفسارات والشكاوى</h3>
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
                                <th scope="col">تاريخ النشر</th>
                                <th scope="col">المدينة</th>
                                <th scope="col">نص الشكوى</th>
                                <th scope="col">حالة الشكوى</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">
                                        <div class="user">
                                            <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"
                                                alt="" />
                                            <div class="info">
                                                <h5>{{ $contact->user->name }} </h5>
                                                <p>{{ $contact->user->email }}</p>
                                            </div>
                                        </div>
                                    </th>
                                    <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                    <td>جده</td>
                                    <td>
                                        <div class="textofComplaintStatus">{{ $contact->message }} </div>
                                    </td>
                                    <td>
                                        <div class="inquireStatus {{ contactUsStatus($contact->status) }}">تم الحل</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $contacts->links('dashboard.pagination') !!}
                </div>
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
                url: '{{ route('dashboard.contactus.search') }}',
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
