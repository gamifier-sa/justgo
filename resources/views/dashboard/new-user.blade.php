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
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="gymSlug">
                    <h5> الصورة الشخصية</h5>
                    <div class="addGallary">
                        <img src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg" alt="" />
                        <p>رفع الصورة</p>
                        <input type="file" name="profile_image" />
                    </div>
                    @error('profile_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username">اسم المستخدم</label>
                    <div class="inputS1">
                        <input type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username">رقم الجوال</label>
                    <div class="inputS1 phone">
                        <input type="tel" name="phone" value="{{ old('phone') }}" />
                        <span>+966</span>
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username">رقم الجوال واتس اب </label>
                    <div class="inputS1 phone">
                        <input type="tel" name="whatsapp_number" value="{{ old('whatsapp_number') }}" />
                        <span>+966</span>
                    </div>
                    @error('whatsapp_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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
                    <label for="username">كلمة السر </label>
                    <div class="inputS1">
                        <input type="password" name="password" value="{{ old('password') }}" />
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username">تأكيد كلمه السر </label>
                    <div class="inputS1">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3 row">
                    <div class="col-6">
                        <label>
                            <input type="radio" class="option-input radio" name="status" value="active"
                                {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                            تفعيل
                        </label>

                        <label>
                            <input type="radio" class="option-input radio" name="status" value="pending"
                                {{ old('status') == 'pending' ? 'checked' : '' }}>
                            الغاء التفعيل
                        </label>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label>
                            <input type="radio" class="option-input radio" name="gender" value="male"
                                {{ old('gender', 'male') == 'male' ? 'checked' : '' }}>
                            ذكر
                        </label>

                        <label>
                            <input type="radio" class="option-input radio" name="gender" value="female"
                                {{ old('gender') == 'female' ? 'checked' : '' }}>
                            أنثى
                        </label>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>

            <div class="button">
                <button class="addNewBtn" type="submit"><span>+</span> تسجيل جديد</button>
            </div>
        </form>
    </section>


@endsection
