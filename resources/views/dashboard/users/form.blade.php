<!-- begin :: Row -->
<div class="row mb-8">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="d-block fw-semibold fs-6 mb-5">{{ __('admin.profile_Image') }}</label>
        <!--end::Label-->

        <!--begin::Image input-->
        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
        style="background-image: url('{{ isset($user) && $user->image ? getImage('Users',$user->image)  : 'assets/media/svg/avatars/blank.svg' }}')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-125px h-125px"></div>
            <!--end::Preview existing avatar-->

            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                <!--begin::Inputs-->
                <input type="file" id="image_inp"  name="image" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="avatar_remove" value() />
                <!--end::Inputs-->
            </label>
            <!--end::Label-->

            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="ki-outline ki-cross fs-3"></i>
            </span>
            <!--end::Cancel-->

            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="ki-outline ki-cross fs-3"></i>
            </span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->

        <!--begin::Hint-->
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
        {{-- <label for="image_inp">{{ __('Error In Image') }}</label> --}}

        <!--end::Hint-->
    </div>
    <!--end::Input group-->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.first_name') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="first_name_inp" name="first_name"
                value="{{ old('first_name',isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="first_name_inp">{{ __('admin.Enter-the') . __('admin.first_name') }}</label>
        </div>

    </div><!-- end   :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.last_name') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="last_name_inp" name="last_name"
                value="{{ old('last_name',isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="last_name_inp">{{ __('admin.Enter-the') . __('admin.last_name') }}</label>
        </div>

    </div><!-- end   :: Column -->

</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Email') }}</label>
            <div class="form-floating">
                <input type="email" class="form-control" id="email_inp" name="email" value="{{ old('email',isset($user) ? $user : '') }}"
                    autocomplete="off" />
                <label for="email_inp">{{ __('admin.Enter-the') . __('admin.Email') }}</label>
            </div>

        </div><!-- end   :: Column -->
          <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("admin.categories") }}</label>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="categories[]"  aria-label="{{__('admin.please-choose')}}" multiple>
                <option disabled>{{__('admin.please-choose')}}</option>
                @foreach ($categories as $category)
                @if(isset($user))
                <option value="{{ $category->id }}"  {{ old('categories') ? ((1==1) ? 'selected' : '') : (in_array($category->id, $user->categories->pluck('id')->toArray()) ? 'selected' : '') }} > {{ $category->name  }}</option>
                @else
                <option value="{{ $category->id }}" {{ old('categories') && old('categories') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endif
                @endforeach
            </select>
            <label for="category">{{__('admin.please-choose')}} {{__('admin.category')}}</label>
        </div>

    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
     <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Phone') }}</label>
     <div class="form-floating">
         <input type="tel" class="form-control" id="phone_inp" name="phone" value="{{ old('phone',isset($user) ? $user : '') }}"
             autocomplete="off" />
         <label for="phone_inp">{{ __('admin.Enter-the') . __('admin.Phone') }}</label>
     </div>
 
 </div><!-- end   :: Column -->
     <!-- begin :: Column -->
     <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("admin.password") }}</label>
        <div class="form-floating">
            <input type="password" class="form-control" id="password_inp" name="password" required autocomplete="off"/>
            <label for="password_inp">{{ __('admin.Enter-the') . __('admin.password') }}</label>
        </div>
        <p class="invalid-feedback" id="password" ></p>
    </div><!-- end   :: Column -->
 </div>
@push('scripts')
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserRequest') !!}
@endpush
