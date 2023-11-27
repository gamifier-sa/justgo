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
      <div class="back-btn">
        <a href="#" onclick="history.back();">
          <img src="{{ asset('dashboard/') }}/assets/icons/arrow-right.svg" alt="" />
        </a>
      </div>
      <h1>تسجيل دخول</h1>
      <form action="{{ route('dashboard.postLogin') }}"  method="POST">
        @csrf
        <div class="content">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
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
        </div>
      </form>
    </div>
  </body>
</html>
