@extends('dashboard.layouts.app')
@section('page_title', 'Gifts')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/gifts.css" />
@endpush
@section('content')

        <section class="giftsPage">
          <form action="{{ route('dashboard.gifts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="contentS2">
              <div class="row">
                <div class="col-sm-6 col-xl-8"><h1>ارسل الهدايا للعملاء</h1></div>
                <div class="col-sm-6 col-xl-4">
                  <div class="cardS1">
                    <label for="" class="labelS2"> عدد الايام </label>
                    <input type="text" name="number_days" value="{{ old('number_days') }}" />
                  </div>
                </div>
              </div>
            </div>

            <div>
              <div class="cardS2">
                <div class="inputImg">
                  <div class="icon">
                    <img  id="gift_card_image-preview" src="{{ asset('dashboard/') }}/assets/icons/add-image.svg" alt="" />
                    <span>رفع الصورة</span>
                  </div>
                  <input type="file" name="gift_card_image" onchange="previewImage(this, 'gift_card_image-preview')" />
                </div>
              </div>
              <label for="" class="labelS2">اضافة بطاقة هدية</label>
              <div>
                <div class="buttons">
                  <button class="cancel">
                    <span>الغاء</span>
                    <img src="{{ asset('dashboard/') }}/assets/icons/edit.svg" alt="" />
                  </button>

                  <button class="add">
                    <span>ارسال الهدية</span>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </section>
        @push('scripts')
        <script>
            function previewImage(input, previewId) {
                var preview = document.getElementById(previewId);
                var file = input.files[0];

                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
        @endpush
     @endsection
