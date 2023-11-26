@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/') }}/css/add-new-partner.css" />
@endpush
@section('content')
        <section>

          <div class="contentS2">
            <form action="{{ route('dashboard.gyms.store') }}" method="POST">
              @csrf
              <div class="sectionS1">
                <div class="sectionHead">
                  <h3>تسجيل شريك جديد</h3>
                </div>
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <div>
                      <div class="user">
                        <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png" alt="" />
                        <div class="info">
                          <h5>اسم الشريك</h5>
                          <p>brooklyn.s@gmail.com</p>
                        </div>
                      </div>
                      <div class="gymSlug">
                        <h5>شعار النادي</h5>
                        <div class="addGallary">
                          <img src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg" alt="" />
                          <p>رفع الصورة</p>
                          <input type="file" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-8">
                    <div class="partnerDetails">
                      <div class="partnerDetail">
                        <label for="mainBranch">المقر الرئيسي</label>
                        <input type="text" id="mainBranch" name="mainBranch" placeholder="الرياض" />
                      </div>
                      <div class="partnerDetail">
                        <label for="branches">الفروع</label>
                        <select name="branches" id="branches">
                          <option value="" disabled selected>اختر من القائمة</option>
                          <option value="branch 1">branch 1</option>
                        </select>
                      </div>
                      <div class="partnerDetail">
                        <label for="mainBranch">نسبة الاشتراك</label>
                        <input type="number" id="mainBranch" name="mainBranch" placeholder="50%" />
                      </div>
                      <div class="partnerDetail">
                        <label for="mainBranch">عدد العملاء المتوقع</label>
                        <input type="number" id="mainBranch" name="mainBranch" placeholder="1900 شهرياً" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="optionsButtons">
                <a href="{{ route('dashboard.gyms.index') }}" class="yellowBtn" type="reset">الغاء</a>
                <button type="submit" class="addNewPartnerBtn">تسجيل شريك جديد <img src="{{ asset('dashboard/') }}/assets/icons/plusIcon.svg" alt="plusIcon" /></button>
                <button class="deleteAllData" type="reset">تفريغ البيانات</button>
              </div>
            </form>
          </div>
        </section>
      @endsection