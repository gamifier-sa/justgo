@extends('dashboard.layouts.app')
@section('page_title', 'Admins Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/members.css" />
@endpush
@section('content')

    <section class="newUserPage">
        <form action="{{ route('dashboard.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content">

                <div>
                    <label for="username">الاسم </label>
                    <div class="inputS1">
                        <input type="text" name="name" value="{{ old('name', $admin->name) }}" />
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="username">رقم الجوال</label>
                    <div class="inputS1 phone">
                        <input type="tel" name="phone" value="{{ old('phone', $admin->phone) }}" />
                        <span>+966</span>
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div>
                    <label for="username">الايميل</label>
                    <div class="inputS1">
                        <input type="text" name="email" value="{{ old('email', $admin->email) }}" />
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
                </div>

            </div>

            <div class="button">
                <button class="addNewBtn" type="submit"><span>-</span> تعديل البيانات</button>
            </div>
        </form>
    </section>


@endsection
