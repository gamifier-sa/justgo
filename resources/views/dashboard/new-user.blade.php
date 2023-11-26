@extends('dashboard.layouts.app')
@section('page_title', 'Users Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/members.css" />
@endpush
@section('content')





    <section class="newUserPage">
        <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="gymSlug">
                    <h5> الصورة الشخصية</h5>
                    <div class="addGallary">
                        <img src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg" alt="" />
                        <p>رفع الصورة</p>
                        <input type="file" name="profile_image"/>
                    </div>
                </div>
                <div>
                    <label for="username">اسم المستخدم</label>
                    <div class="inputS1">
                        <input type="text" name="name" value="{{ old('name') }}" />
                    </div>
                </div>
                <div>
                    <label for="username">رقم الجوال</label>
                    <div class="inputS1 phone">
                        <input type="tel" name="phone" value="{{ old('phone') }}"/>
                        <span>+966</span>
                    </div>
                </div>
                <div>
                    <label for="username">رقم الجوال واتس اب </label>
                    <div class="inputS1 phone">
                        <input type="tel" name="whatsapp_number" value="{{ old('whatsapp_number') }}" />
                        <span>+966</span>
                    </div>
                </div>
                <div>
                    <label for="username">الايميل</label>
                    <div class="inputS1">
                        <input type="text" name="email" value="{{ old('email') }}"/>
                    </div>
                </div>
                <div>
                    <label for="username">كلمة السر </label>
                    <div class="inputS1">
                        <input type="password" name="password" value="{{ old('password') }}"  />
                    </div>
                </div>
                <div>
                    <label for="username">تأكيد كلمه السر </label>
                    <div class="inputS1">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-6">
                        <label>
                            <input type="radio" class="option-input radio" name="status" value="active" {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                            تفعيل
                        </label>

                        <label>
                            <input type="radio" class="option-input radio" name="status" value="pending" {{ old('status') == 'pending' ? 'checked' : '' }}>
                            الغاء التفعيل
                        </label>
                    </div>

                    <div class="col-6">
                        <label>
                            <input type="radio" class="option-input radio" name="gender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }}>
                            ذكر
                        </label>

                        <label>
                            <input type="radio" class="option-input radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                            أنثى
                        </label>
                    </div>
                </div>


            </div>

            <div class="button">
                <button class="addNewBtn" type="submit"><span>+</span> تسجيل جديد</button>
            </div>
        </form>
    </section>


@endsection
