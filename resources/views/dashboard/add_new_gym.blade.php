@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/add-new-partner.css" />
    
@endpush
@section('content')
    <section>

        <section class="newUserPage">
            <form action="{{ route('dashboard.gyms.store') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-6 col-xs-12">
                                <div class="form-group">
                                    <label for="{{ $locale }}.name">
                                        @lang('admin.name') @lang('admin.' . $locale . '.in')</label>
                                    <input type="text" id="{{ $locale }}.name" name="{{ $locale }}[name]"
                                        class="form-control @error($locale . '.name') is-invalid @enderror "
                                        placeholder="@lang('admin.name') @lang('admin.' . $locale . '.in')"
                                        value="{{ old($locale . '.name') }}">
                                </div>

                                @error($locale . '.name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-6 col-xs-12">
                                <div class="form-group">
                                    <label for="{{ $locale }}.description">
                                        @lang('admin.description') @lang('admin.' . $locale . '.in')</label>
                                    <textarea type="text" id="{{ $locale }}.description" name="{{ $locale }}[description]"
                                        class="form-control @error($locale . '.description') is-invalid @enderror "
                                        placeholder="@lang('admin.description') @lang('admin.' . $locale . '.in')" value="{{ old($locale . '.description') }}" rows="5">{{ old($locale . '.description') }} </textarea>
                                </div>

                                @error($locale . '.description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <label for="username"> العنوان </label>
                        <div class="inputS1 phone">
                            <input type="text" name="address" value="{{ old('address') }}" />
                            <span>+966</span>
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

                    <div class="gymSlug">
                        <h5> صور الشريك </h5>
                        <div class="addGallary">
                            <input type="file" name="images" multiple />
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

                <div class="button">
                    <button class="addNewBtn" type="submit"><span>+</span> تسجيل جديد</button>
                </div>
            </form>
        </section>
    </section>
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
