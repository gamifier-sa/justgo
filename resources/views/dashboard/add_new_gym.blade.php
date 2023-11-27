@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/add-new-partner.css" />
@endpush
@section('content')

    <section class="newUserPage">
        <form action="{{ route('gyms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row">
                    <div class="col-6">
                        <div class="gymSlug">
                            <h5> صورة الشعار </h5>
                            <div class="addGallary">
                                <img src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg" alt="" />
                                <p>رفع الصورة</p>
                                <input type="file" name="logo" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="gymSlug">
                            <h5> صورة الغلاف</h5>
                            <div class="addGallary">
                                <img src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg" alt="" />
                                <p>رفع الصورة</p>
                                <input type="file" name="cover_image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach (config('translatable.locales') as $locale)
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label>@lang('admin.' . $locale . '.name')</label>
                            <div class="form-floating">
                                <input type="text" class="form-control @error($locale . '.name') is-invalid @enderror"
                                    id="{{ $locale }}.name_inp" name="{{ $locale }}[name]"
                                    value="{{ old($locale . '.name') }}" autocomplete="off" />
                            </div>
                            <p class="invalid-feedback" id="{{ $locale }}.name_inp"></p>

                        </div><!-- end   :: Column -->
                    @endforeach
                </div>
                <div class="row">
                    @foreach (config('translatable.locales') as $locale)
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row mt-3">
                            <label>@lang('admin.' . $locale . '.description')</label>

                            <textarea class="form-control form-control-solid" style="resize: none;width:250px;height:150px"
                                name="{{ $locale }}[description]" id="{{ $locale }}.description_inp"></textarea>
                            <p class="invalid-feedback" id="{{ $locale }}.description_inp"></p>

                        </div><!-- end   :: Column -->
                    @endforeach
                </div>
                <div class="row mb-8">
                    <div class="col-md-12 ml-3 fv-row">
                        <label class="fs-5 fw-bold mb-2 required">العنوان</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="pac-input"
                            name="address" value="{{ old('address') }}"
                            autocomplete="off" />
                        <p class="invalid-feedback" id="pac-input"></p>
                    </div>
                </div>


                <input type="hidden" name="lat" id="latitude_map" value="{{ old('lat') }}">
                <input type="hidden" name="lng" id="longitude_map" value="{{ old('lng') }}">
                <div class="form-group row my-5 mt-10">
                    <div class="col-10 offset-1">
                        <div class="mapping" id="map_branch_create"
                            style="width: 500px;
                        height: 500px;">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="username">الايميل</label>
                    <div class="inputS1">
                        <input type="text" name="email" value="{{ old('email') }}" />
                    </div>
                </div>
                <div>
                    <label for="username"> نسبة الاشتراك</label>
                    <div class="inputS1">
                        <input type="text" name="subscription_rate" value="{{ old('subscription_rate') }}" />
                    </div>
                </div>
                <div>
                    <label for="username"> عدد العملاء المتوقع </label>
                    <div class="inputS1">
                        <input type="text" name="expected_number_customers"
                            value="{{ old('expected_number_customers') }}" />
                    </div>
                </div>
                <div class="partnerDetail">
                    <label for="city_id">المدن</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="" disabled selected>اختر من القائمة</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="gymSlug mt-2">
                    <h5> صور الشريك </h5>
                    <div class="addGallary">
                        <input type="file" name="images[]" multiple />
                    </div>
                </div>


            </div>

            <div class="button">
                <button class="addNewBtn" type="submit"><span>+</span> تسجيل جديد</button>
            </div>
        </form>
    </section>
    @push('scripts')

    <script>

        var lat =  '24.774265' ;
        var lng = ' 46.738586 ';
        var address = "Veterans Memorial Hwy, Beaver, UT 84713, USA";
    </script>
    <script src="{{ asset('dashboard/js/mapdashboard.js') }}"></script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaUvx2ThoZrlbDjfm3FyA3gnljkVh6RjU&callback=initMap&v=weekly"
    defer></script>
    @endpush
@endsection
