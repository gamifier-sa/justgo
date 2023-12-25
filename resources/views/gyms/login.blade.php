<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل دخول</title>

    <!-- global  -->
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/global.css" />

    <!-- only for page -->
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/login.css" />
</head>

<body>
    <div class="loginPage">

        <h1>تسجيل دخول</h1>
        <form action="{{ route('gyms.postLogin') }}" method="POST">
            @csrf
            @if (session('success'))
                <div class="btn btn-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
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
                        <input type="email" name="email" />
                    </div>
                </div>
                <div>
                    <label for="username">كلمة المرور</label>
                    <div class="inputS1">
                        <input type="password" name="password" />
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">تسجيل دخول</button>
                </div>
                <div style="text-align: center;" class="mt-3">
                    <a href="{{ route('gyms.register') }}">تسجيل حساب جديد ؟</a>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Check if the success message exists
        var successMessage = $('.alert-success');
        if (successMessage.length) {
            // Hide the success message after 5000 milliseconds (5 seconds)
            setTimeout(function() {
                successMessage.fadeOut('slow');
            }, 5000);
        }
    });
</script>

</html>
