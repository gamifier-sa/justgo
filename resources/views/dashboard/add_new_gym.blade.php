@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/add-new-partner.css" />
@endpush
@section('content')

    <section class="newUserPage">
        <form action="{{ route('dashboard.gyms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="content">
                <div class="row">
                    <div class="col-6">
                        <div class="gymSlug">
                            <h5> صورة الشعار </h5>
                            <div class="addGallary">
                                <img id="logo-preview" src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg"
                                    style="width:50px;height:50px" alt="" />
                                <p>رفع الصورة</p>
                                <input type="file" onchange="previewImage(this, 'logo-preview')" name="logo" />
                            </div>
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="gymSlug">
                            <h5> صورة الغلاف</h5>
                            <div class="addGallary">
                                <img id="cover_image-preview" src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg"
                                    style="width:50px;height:50px" alt="" />
                                <p>رفع الصورة</p>
                                <input type="file" onchange="previewImage(this, 'cover_image-preview')"
                                    name="cover_image" />
                            </div>
                            @error('cover_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                            @error($locale . '.name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!-- end   :: Column -->
                    @endforeach
                </div>
                <div class="row">
                    @foreach (config('translatable.locales') as $locale)
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row mt-3">
                            <label>@lang('admin.' . $locale . '.description')</label>

                            <textarea class="form-control form-control-solid" style="resize: none;width:250px;height:150px"
                                name="{{ $locale }}[description]" id="{{ $locale }}.description_inp">{{ old($locale . '.description') }}</textarea>
                            <p class="invalid-feedback" id="{{ $locale }}.description_inp"></p>
                            @error($locale . '.description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!-- end   :: Column -->
                    @endforeach
                </div>
                <div class="row mb-8">
                    <div class="col-md-12 ml-3 fv-row">
                        <label class="fs-5 fw-bold mb-2 required">العنوان</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address-input"
                            name="address" value="{{ old('address') }}" autocomplete="off" />
                        <p class="invalid-feedback" id="address-input"></p>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div>
                        <!-- Repeater Html Start -->
                        <div id="repeater">
                            <!-- Repeater Heading -->
                            <div class="repeater-heading">
                                <h5 class="pull-left">Repeater</h5>
                                <button type="button" class="btn btn-primary pt-5 pull-right repeater-add-btn">
                                    Add
                                </button>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Repeater Items -->
                            <div class="items" data-group="test">
                                <!-- Repeater Content -->
                                <div class="item-content">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name"
                                                data-name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputEmail" placeholder="Email"
                                                data-skip-name="true" data-name="email">
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeater Remove Btn -->
                                <div class="pull-right repeater-remove-btn">
                                    <button class="btn btn-danger remove-btn">
                                        Remove
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="items" data-group="test">
                                <!-- Repeater Content -->
                                <div class="item-content">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name"
                                                data-name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Email" data-skip-name="true" data-name="email">
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeater Remove Btn -->
                                <div class="pull-right repeater-remove-btn">
                                    <button class="btn btn-danger remove-btn">
                                        Remove
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="items" data-group="test">
                                <!-- Repeater Content -->
                                <div class="item-content">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name"
                                                data-name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Email" data-skip-name="true" data-name="email">
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeater Remove Btn -->
                                <div class="pull-right repeater-remove-btn">
                                    <button class="btn btn-danger remove-btn">
                                        Remove
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- Repeater End -->
                    </div> --}}

                </div>


                <input type="hidden" name="lat" id="latitude_map" value="{{ old('lat') }}">
                <input type="hidden" name="lng" id="longitude_map" value="{{ old('lng') }}">

                <div class="form-group row my-5 mt-10">
                    <div class="col-10 offset-1">
                        <div class="mapping" id="map" style="width: 500px;
                        height: 500px;">
                        </div>
                    </div>
                </div>
                @error('lat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('lng')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div>
                    <label for="username">الايميل</label>
                    <div class="inputS1">
                        <input type="text" name="email" value="{{ old('email') }}" />
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username"> نسبة الاشتراك</label>
                    <div class="inputS1">
                        <input type="text" name="subscription_rate" value="{{ old('subscription_rate') }}" />
                    </div>
                    @error('subscription_rate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username"> عدد العملاء المتوقع </label>
                    <div class="inputS1">
                        <input type="text" name="expected_number_customers"
                            value="{{ old('expected_number_customers') }}" />
                    </div>
                    @error('expected_number_customers')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username">كلمة السر </label>
                    <div class="inputS1">
                        <input type="password" name="password" value="{{ old('password') }}" autocomplete="off" />
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username">تأكيد كلمه السر </label>
                    <div class="inputS1">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                            autocomplete="off" />
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="partnerDetail">
                    <label for="city_id">المدن</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="" disabled selected>اختر من القائمة</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <div class="col-3">
                            <label>
                                <input type="radio" class="option-input radio" name="gender" value="men"
                                    {{ old('gender', 'men') == 'men' ? 'checked' : '' }}>
                                رجالى

                            </label>

                        </div>
                        <div class="col-3">

                            <label>
                                <input type="radio" class="option-input radio" name="gender" value="womens"
                                    {{ old('gender') == 'womens' ? 'checked' : '' }}>
                                نسائى
                            </label>
                        </div>
                        <div class="col-3">

                            <label>
                                <input type="radio" class="option-input radio" name="gender" value="both"
                                    {{ old('gender') == 'both' ? 'checked' : '' }}>
                                كلاهما
                            </label>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="gymSlug mt-2">
                    <h5> صور الشريك </h5>
                    <div class="addGallary">
                        <input type="file" name="images[]" id="gallery-photo-add" multiple />
                        <div class="row  gallery mt-3"></div>
                    </div>
                    @error('images')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


            </div>

            <div class="button">
                <button class="addNewBtn" type="submit"><span>+</span> تسجيل جديد</button>
            </div>
        </form>
    </section>
    @push('scripts')
        <script>
            var lat = '24.774265';
            var lng = ' 46.738586 ';
            var address = "Veterans Memorial Hwy, Beaver, UT 84713, USA";
        </script>
        <script src="{{ asset('dashboard/js/mapdashboard.js') }}"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaUvx2ThoZrlbDjfm3FyA3gnljkVh6RjU&libraries=places">
        </script>

        <script>
            $(function() {

                var input = document.getElementById('address-input');
                var autocomplete = new google.maps.places.Autocomplete(input);
            });
        </script>
        <script>
            $(function() {
                var map;
                var userMarker;

                // Initialize the map with a default center
                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: -25.344,
                            lng: 131.036
                        },
                        zoom: 10
                    });

                    // Try to get the user's current location
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var userLocation = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };

                            // Update the map center to the user's location
                            map.setCenter(userLocation);

                            // Show a marker at the user's current position
                            userMarker = new google.maps.Marker({
                                position: userLocation,
                                map: map,
                                title: 'Your Location',
                                draggable: true // Make the marker draggable
                            });

                            // Add event listener for marker drag
                            google.maps.event.addListener(userMarker, 'dragend', function(event) {
                                updateHiddenInputs(event.latLng.lat(), event.latLng.lng());
                            });
                        }, function() {
                            // Handle errors (optional)
                            console.error('Error getting user location');
                        });
                    } else {
                        // Browser doesn't support Geolocation (optional)
                        console.error('Browser does not support Geolocation');
                    }
                }

                // Function to update hidden input fields
                function updateHiddenInputs(latitude, longitude) {
                    $('#latitude_map').val(latitude);
                    $('#longitude_map').val(longitude);
                }

                // Rest of your existing code...

                // Initialize the map
                initMap();


            });
        </script>
        <script>
            $(function() {
                // Multiple images preview in browser
                var imagesPreview = function(input, placeToInsertImagePreview) {

                    if (input.files) {
                        var filesAmount = input.files.length;

                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();

                            reader.onload = function(event) {
                                var image = $($.parseHTML('<img>')).attr('src', event.target.result);
                                image.css('width', '100px'); // Set the desired width
                                image.css('height', '100px'); // Set the height to auto to maintain aspect ratio
                                image.addClass('mt-3');
                                var deleteButton = $(
                                    '<button class="btn btn-icon btn-circle btn-active-color-primary w-10px h-10px bg-body shadow">X</button>'
                                );
                                deleteButton.css({
                                    'position': 'relative',
                                    'top': '-126px',
                                    'left': '30px',
                                    'border-radius': '50px'
                                });
                                deleteButton.click(function() {
                                    image.parent().remove()
                                    deleteButton.remove();
                                });

                                var container = $('<div class="col-3 "></div>');
                                container.append(image);
                                container.append(deleteButton);
                                container.appendTo(placeToInsertImagePreview);
                            }

                            reader.readAsDataURL(input.files[i]);
                        }
                    }

                };
                $('#gallery-photo-add').on('change', function() {
                    imagesPreview(this, 'div.gallery');
                });
            });
        </script>
        <script>
            function previewImage(input, previewId) {
                var preview = document.getElementById(previewId);
                var file = input.files[0];

                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush
@endsection
@push('scripts')
    <script src="{{ asset('dashboard/js/repeater.js') }}"></script>
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
@endpush
