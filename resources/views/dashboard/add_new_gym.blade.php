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
                    <div>
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
                                                <input type="text" class="form-control" id="inputName" placeholder="Name" data-name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="inputEmail" placeholder="Email" data-skip-name="true" data-name="email">
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
                                                <input type="text" class="form-control" id="inputName" placeholder="Name" data-name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="inputEmail" placeholder="Email" data-skip-name="true" data-name="email">
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
                                                <input type="text" class="form-control" id="inputName" placeholder="Name" data-name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="inputEmail" placeholder="Email" data-skip-name="true" data-name="email">
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
                        <input type="file" name="images[]" id="gallery-photo-add" multiple />
                        <div class="row  gallery mt-3">



                        </div>
                        <!--end::Dropzone-->
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
                            image.css('width', '200px'); // Set the desired width
                            image.css('height', 'auto'); // Set the height to auto to maintain aspect ratio
                            image.addClass('mt-3');
                            var deleteButton = $(
                                '<button class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow">X</button>'
                            );
                            deleteButton.css('position', 'absolute')
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
