<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل حساب جديد </title>

    <!-- global  -->
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/global.css" />

    <!-- only for page -->
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/login.css" />
</head>

<body>
    <div class="loginPage">

        <h1>تسجيل حساب جديد </h1>
        <form action="{{ route('gyms.PostRegister') }}" method="POST">
            @csrf
            <div class="content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div>
                    <label for="username">البريد الالكتروني </label>
                    <div class="inputS1">
                        <input type="email" name="email" autocomplete="off" value="{{ old('email') }}" />
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="partnerDetail">
                    <label for="city_id">المدن</label>
                    <select name="city_id" id="city_id" class="form-control inputS1" autocomplete="off">
                        <option value="" disabled selected>اختر من القائمة</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'seleted' : '' }}>
                                {{ $city->name }}</option>
                        @endforeach
                        @error('city_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </select>
                    @error('city_id')
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
                <div class="form-group">
                    <button type="submit" class="btn">تسجيل حساب جديد</button>
                </div>
                <div style="text-align: center;" class="mt-3">
                    <a href="{{ route('gyms.login') }}"> الرجوع الى تسجيل دخول </a>
                </div>
            </div>
        </form>
    </div>
</body>


</html>
