@extends('dashboard.layouts.app')
@section('page_title', 'Settings')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/settings.css" />
@endpush
@section('content')
        <section class="settingsPage">
          <div class="content">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button
                  class="nav-link active"
                  id="nav-settings-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-settings"
                  type="button"
                  role="tab"
                  aria-controls="nav-settings"
                  aria-selected="true"
                >
                  اعدادات الحساب
                </button>
                <button
                  class="nav-link"
                  id="nav-laguage-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-laguage"
                  type="button"
                  role="tab"
                  aria-controls="nav-laguage"
                  aria-selected="false"
                >
                  اعدادات اللغة
                </button>
                <button
                  class="nav-link"
                  id="nav-policy-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-policy"
                  type="button"
                  role="tab"
                  aria-controls="nav-policy"
                  aria-selected="false"
                >
                  السياسة و الاحكام
                </button>
                <button
                  class="nav-link"
                  id="nav-cities-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-cities"
                  type="button"
                  role="tab"
                  aria-controls="nav-cities"
                  aria-selected="false"
                >
                  المدن
                </button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div
                class="tab-pane fade show active"
                id="nav-settings"
                role="tabpanel"
                aria-labelledby="nav-settings-tab"
              >
                <form action="">
                  <div class="imgSec">
                    <label for="image">الصورة</label>
                    <div class="inputImg">
                      <div class="icon"><img src="{{ asset('dashboard/') }}/assets/icons/add-image.svg" alt="" /></div>
                      <input type="file" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="username">اسم المستخدم</label>
                      <div class="inputS1">
                        <input type="text" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="username">الاسم الاول</label>
                      <div class="inputS1">
                        <input type="text" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="username">رقم الجوال</label>
                      <div class="inputS1 phone">
                        <input type="text" />
                        <span>+966</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="username">الايميل</label>
                      <div class="inputS1">
                        <input type="text" />
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="buttons">
                        <button class="buttonS1">الغاء</button>
                        <button class="buttonS2">تغيير</button>
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