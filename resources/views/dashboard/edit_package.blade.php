@extends('dashboard.layouts.app')
@section('page_title', 'Parteners Page')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/new-user.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
  .select2-container--default .select2-selection--multiple{
    background: #edf2f5;
    height: 52px;
    border: none
  }
</style>
@endpush
@section('content')
        <section class="newUserPage">
          <form action="{{ route('dashboard.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content">
              @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
              <div class="m-autov text-center">
                <div class="gymSlug">
                  <h5>شعار النادي</h5>
                  <div class="addGallary text-center">
                    
                    <img src="@if($package->icon) {{ getImage('Packages', $package->icon) }} @else {{ asset('dashboard/') }}/assets/icons/addGallary.svg @endif" alt="" />
                    <p>رفع الصورة</p>
                    <input type="file" name="icon"/>
                  </div>
                </div>
              </div>
              @foreach (config('translatable.locales') as $locale)
              <div>
                <label for="username">اسم الباقة ({{ $locale }})</label>
                <div class="inputS1">
                  <input type="text" name="{{ $locale }}[name]" value="{{ old($locale . '.name', $package->translate($locale)->name) }}"/>


                </div>
              </div>
              @endforeach
              
              @foreach (config('translatable.locales') as $locale)
              <div>
                <label for="username">وصف الباقة ({{ $locale }})</label>
                <div class="inputS1">
                  <input type="text" name="{{ $locale }}[description]" value="{{ old($locale . '.description', $package->translate($locale)->description) }}"/>
                </div>
              </div>
              @endforeach
              <div>
                <label for="username">السعر اليومي </label>
                <div class="inputS1 phone">
                  <input type="number" min="0" name="daily_price" value="{{ old('daily_price') ?? $package->daily_price }}" />
                  <span>SAR</span>
                </div>
              </div>
              <div>
                <label for="username">السعر الشهري </label>
                <div class="inputS1 phone">
                  <input type="number" min="0" name="monthly_price" value="{{ old('monthly_price') ?? $package->monthly_price  }}"/>
                  <span>SAR</span>
                </div>
              </div>
              <div>
                <label for="username"> سعر الربع سنوي </label>
                <div class="inputS1 phone">
                  <input type="number" min="0" name="quarterly_price" value="{{ old('quarterly_price') ?? $package->quarterly_price  }}"/>
                  <span>SAR</span>
                </div>
              </div>
              <div>
                <label for="username">السعر السنوي </label>
                <div class="inputS1 phone">
                  <input type="number" min="0" name="annual_price" value="{{ old('annual_price') ?? $package->annual_price  }}"/>
                  <span>SAR</span>
                </div>
              </div>
              <div>
                <label for="username">عدد الزيادات المتاحة</label>
                <div class="inputS1">
                  <input type="number" min="1" step="1" name="visits_no" value="{{ old('visits_no') ?? $package->visits_no  }}"/>
                </div>
              </div>
              <div>
                <label for="username">النوادي المتاحة لتلك الباقة</label>
                <div class="inputS1">
                  <select class="js-example" name="gyms[]" multiple="multiple">
                    @foreach ($gyms as $gym)
                      <option value="{{ $gym->id }}" {{ in_array($gym->id, $package->gym->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $gym->name }}</option> 
                    @endforeach
                </select>
                </div>
              </div>
            </div>

            <div class="button">
              <button class="addNewBtn"><span>+</span> تسجيل جديد</button>
            </div>
          </form>
        </section>
      @endsection
      @push('scripts')
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
        $(document).ready(function() {
            $('.js-example').select2();
        });
      </script>
      @endpush