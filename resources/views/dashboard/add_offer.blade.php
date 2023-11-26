@extends('dashboard.layouts.app')
@section('page_title', 'Sales')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/subscription.css" />
@endpush
@section('content')
        <section class="subscriptionPage">

          <form action="">
            <div class="contentS2">
              <div class="row">
                <div class="col-12 col-xl-4"><h1>اضافة عروض</h1></div>
                <div class="col-12 col-xl-4">
                  <label for="">اختر من القائمة</label>
                  <div class="inputS1">
                    <select name="" id="">
                      <option value="">كاش باك</option>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="cardS1">
                    <label for="" class="labelS2"> النسبة </label>
                    <input type="text" />
                  </div>
                </div>
              </div>
            </div>

            <div class="contentS2">
              <div class="row">
                <div class="col-xl-8">
                  <h2>اختيار الباقات التي يشملها العرض</h2>

                  <div>
                    <div class="checkbox">
                      <input type="checkbox" />
                      <label for="" class="label">الباقة الذهبية</label>
                    </div>
                    <div class="checkbox">
                      <input type="checkbox" />
                      <label for="" class="label">الباقة الالماسية</label>
                    </div>
                    <div class="checkbox">
                      <input type="checkbox" />
                      <label for="" class="label">الباقة الفضية</label>
                    </div>
                  </div>

                  <div class="inputRadios">
                    <div class="inputRadio">
                      <input type="radio" />
                      <label for="" class="label">الاعضاء الجدد</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" />
                      <label for="" class="label">الاعضاء المميزين</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" />
                      <label for="" class="label">لجميع الاعضاء</label>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4">
                  <div class="cardS1">
                    <label for="" class="labelS2">اضافة بنر أعلاني</label>
                    <div class="inputImg">
                      <div class="icon"><img src="{{ asset('dashboard/') }}/assets/icons/add-image.svg" alt="" /></div>
                      <input type="file" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="buttons">
                <button class="cancel">
                  <span>الغاء</span>
                  <img src="{{ asset('dashboard/') }}/assets/icons/edit.svg" alt="" />
                </button>

                <button class="add">
                  <span>أضافة عرض وخصومات</span>
                  <img src="{{ asset('dashboard/') }}/assets/icons/plus.svg" alt="" />
                </button>
              </div>
            </div>
          </form>
        </section>
    @endsection