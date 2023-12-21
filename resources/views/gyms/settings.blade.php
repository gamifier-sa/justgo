@extends('gyms.layouts.app')
@section('page_title', 'Settings')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/settings.css" />
@endpush
@section('content')
    <section class="settingsPage">
        <div class="content">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings"
                        type="button" role="tab" aria-controls="nav-settings" aria-selected="true">
                        اعدادات الحساب
                    </button>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                    <form action="{{ route('dashboard.settings.update', $setting->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">

                            <div class="col-lg-6">
                                <label for="username">رقم الجوال</label>
                                <div class="inputS1 phone">
                                    <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}" />
                                    <span>+966</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="username">رقم الجوال واتس اب </label>
                                <div class="inputS1 phone">
                                    <input type="text" name="whatsapp_number"
                                        value="{{ old('whatsapp_number', $setting->whatsapp_number) }}" />
                                    <span>+966</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="username">الايميل</label>
                                <div class="inputS1">
                                    <input type="text" name="email" value="{{ old('email', $setting->email) }}" />
                                </div>
                            </div>
                            <div class="row">
                                @foreach (config('translatable.locales') as $locale)
                                    <!-- begin :: Column -->
                                    <div class="col-md-6 fv-row mt-3">
                                        <label>@lang('admin.' . $locale . '.contact_us')</label>

                                        <textarea class="form-control form-control-solid" style="resize: none;height:250px"
                                            name="{{ $locale }}[contact_us]" id="{{ $locale }}.contact_us_inp">{{ $setting->translate($locale)->contact_us }}</textarea>
                                        <p class="invalid-feedback" id="{{ $locale }}.contact_us_inp"></p>
                                        @error($locale . '.contact_us')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- end   :: Column -->
                                @endforeach
                                @foreach (config('translatable.locales') as $locale)
                                    <!-- begin :: Column -->
                                    <div class="col-md-6 fv-row mt-3">
                                        <label>@lang('admin.' . $locale . '.terms_conditions')</label>

                                        <textarea class="form-control form-control-solid" style="resize: none;height:250px"
                                            name="{{ $locale }}[terms_conditions]" id="{{ $locale }}.terms_conditions_inp">{{ $setting->translate($locale)->terms_conditions }}</textarea>
                                        <p class="invalid-feedback" id="{{ $locale }}.terms_conditions_inp"></p>
                                        @error($locale . '.terms_conditions')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- end   :: Column -->
                                @endforeach
                            </div>
                            <div class="col-12">
                                <div class="buttons">
                                    <button class="buttonS1">الغاء</button>
                                    <button class="buttonS2" type="submit">تغيير</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-laguage" role="tabpanel" aria-labelledby="nav-laguage-tab">
                    <form action="">
                        <div class="langSwitcher">
                            <label for="lang">اختيار اللغة</label>
                            <div class="inputS1">
                                <select name="" id="">
                                    <option value="">اللغة العربية</option>
                                    <option value="">اللغة الانجليزية</option>
                                </select>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="buttonS1">الغاء</button>
                            <button class="buttonS2">تغيير</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-policy" role="tabpanel" aria-labelledby="nav-policy-tab">
                    <form action="">
                        <h2>السياسة والاحكام</h2>
                        <p>
                            --------------------------------------------------------------------------------------------
                            ----------------------------------------------------------------------------------
                            ----------------------------------------------------------------------------------------
                        </p>
                        <div class="buttons">
                            <button class="buttonS1">الغاء</button>
                            <button class="buttonS2">تغيير</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-cities" role="tabpanel" aria-labelledby="nav-cities-tab">...</div>
            </div>
        </div>
    </section>
@endsection
