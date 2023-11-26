@extends('dashboard.layouts.app')
@section('page_title', 'Sales')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/subscription.css" />
<style>
  .subscriptionPage form .contentS2 .checkbox input[type=radio] {
  appearance: none;
  background-color: #d9d9d9;
  width: 15px;
  height: 10px;
  border: 1px solid #888585;
  display: grid;
  place-content: center;
}
.subscriptionPage form .contentS2 .checkbox input[type=radio]::before {
  display: block;
  content: "";
  width: 12px;
  height: 6.5px;
  transform: scale(0);
  transition: 120ms transform ease-in-out;
  box-shadow: inset 1em 1em var(--form-control-color);
  background: #4040f2;
}
.subscriptionPage form .contentS2 .checkbox input[type=radio]:checked::before {
  transform: scale(1);
}
</style>
@endpush
@section('content')
        <section class="subscriptionPage">

          <form action="{{ route('dashboard.offers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="contentS2">
              <div class="row">
                <div class="col-12 col-xl-4"><h1>اضافة عروض</h1></div>
                <div class="col-12 col-xl-4">
                  <label for="">اختر من القائمة</label>
                  <div class="inputS1">
                    <select name="type" id="">
                      <option value="cache_back">كاش باك</option>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="cardS1">
                    <label for="" class="labelS2"> النسبة </label>
                    <input type="number" name="percentage" value="{{ old('percentage') }}" />
                  </div>
                </div>
              </div>
            </div>

            <div class="contentS2">
              <div class="row">
                <div class="col-xl-8">
                  <h2>اختيار الباقات التي يشملها العرض</h2>

                  <div>
                    @foreach ($packages as $package)
                    <div class="checkbox">
                      <input id="packageId{{ $package->id }}" type="radio" name="package_id" value="{{ $package->id }}" />
                      <label for="packageId{{ $package->id }}"  class="label">{{ $package->name }}</label>
                    </div>
                    @endforeach
                  </div>

                  <div class="inputRadios">
                    <div class="inputRadio">
                      <input type="radio" name="for_who"  value="new_users"/>
                      <label for="" class="label">الاعضاء الجدد</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" name="for_who"  value="special_users"/>
                      <label for="" class="label">الاعضاء المميزين</label>
                    </div>
                    <div class="inputRadio">
                      <input type="radio" name="for_who"  value="all_users"/>
                      <label for="" class="label">لجميع الاعضاء</label>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4">
                  <div class="cardS1">
                    <label for="" class="labelS2">اضافة بنر أعلاني</label>
                    <div class="inputImg">
                      <div class="icon"><img src="{{ asset('dashboard/') }}/assets/icons/add-image.svg" alt="" /></div>
                      <input type="file" name="image" />
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