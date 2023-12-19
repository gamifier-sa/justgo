@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@section('content')


    <section>
        <div class="sectionS1">
            <div class="sectionHead">
                <h2>الصلاحيات</h2>
            </div>
            <div class="row gy-4">
                @foreach ($roles as $role)
                    <div class="col-lg-4">
                        <div class="roleCard">
                            <h3>{{ $role->name }}</h3>
                            <div class="usage">Total admins with this role :

                            </div>
                            <ul>
                                @foreach ($role->permissions->shuffle()->take(5) as $permission)
                                    <li><span></span>{{ __($permission->action) . ' ' . __(str_replace('_', ' ', $permission->category)) }}
                                    </li>
                                @endforeach
                                @if ($role->permissions->count() - 5 > 0)
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>
                                        <em>{{ __('and') . ' ' . ($role->permissions->count() - 5) . ' ' . __('more') }}
                                            ...</em>
                                    </div>
                                @endif
                            </ul>
                            <div class="actions">
                                <a href="{{ route('dashboard.roles.show', $role->id) }}">{{ __('admin.view') }}
                                    {{ __('admin.Role') }}</a>
                                <button data-bs-toggle="modal" type="button"
                                    class="btn btn-light btn-active-light-primary my-1 edit-role-btn"
                                    data-role-id="{{ $role->id }}"
                                    data-bs-target="#staticBackdrop1">{{ __('admin.edit') }} {{ __('admin.Role') }}</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.edit') }}
                                                {{ __('admin.Role') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body scroll-y mx-4">
                                            <form id="role_form_update"
                                                action="{{ route('dashboard.roles.update', $role->id) }}"
                                                data-form-type="update"
                                                class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                                                data-redirection-url="/dashboard/roles" data-trailing="_edit">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <label class="label">{{ __('admin.Name') }}</label>
                                                        <input type="text" class="form-control" id="name_inp_edit"
                                                            name="name" value="{{ old('name', $role->name) }}" />
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="label"
                                                        class="fs-6 fw-bolder form-label mb-2">{{ __('admin.Role-Permissions') }}</label>

                                                    <div class="table-responsive-xl">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6">
                                                            <!--begin::Table body-->
                                                            <tbody class="fw-bold">
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td class="text-gray-800">
                                                                        {{ __('admin.Administrator-Access') }}
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Allows a full access to the system"
                                                                            aria-label="Allows a full access to the system"></i>
                                                                    </td>
                                                                    <td>
                                                                        <!--begin::Checkbox-->
                                                                        <label class="d-flex align-items-center">
                                                                            <input type="checkbox" id="edit-select-all"
                                                                                data-form-type="update" />
                                                                            <span class="mx-3"
                                                                                for="edit-select-all">{{ __('admin.Select-all') }}</span>
                                                                        </label><!--end::Checkbox-->
                                                                    </td>
                                                                </tr>
                                                                @foreach ($modules as $module)
                                                                    <!--end::Table row-->
                                                                    <tr>
                                                                        <!--begin::Label-->
                                                                        <td class="">
                                                                            {{ __(ucwords(str_replace('_', ' ', $module))) }}
                                                                        </td>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input group-->
                                                                        <td>

                                                                            <!--begin::Wrapper-->
                                                                            <div class="d-flex align-items-center">
                                                                                @foreach ($permissions->where('category', $module) as $permission)
                                                                                    <!--begin::Checkbox-->
                                                                                    <label
                                                                                        class="d-flex align-items-center">
                                                                                        <input type="checkbox"
                                                                                            data-id="{{ $permission->id }}"
                                                                                            name="permissions[]"
                                                                                            id="edit_{{ $permission->name }}"
                                                                                            data-id="{{ $permission->id }}" />
                                                                                        <span class="mx-3"
                                                                                            for="edit_{{ $permission->name }}">{{ __($permission->action) }}
                                                                                        </span>
                                                                                    </label>
                                                                                    <!--end::Checkbox-->
                                                                                @endforeach

                                                                            </div>
                                                                            <!--end::Wrapper-->
                                                                        </td>
                                                                        <!--end::Input group-->
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <button type="button" class="btn"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn save">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-4">
                    <button class="addRole" data-bs-toggle="modal" data-bs-target="#addNewRole">
                        <div class="img"><img src="{{ asset('dashboard/') }}/assets/images/addrole.png"
                                alt="" /></div>
                        <div class="text">{{ __('admin.add') }} {{ __('admin.Role') }}</div>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addNewRole" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.add') }}
                                        {{ __('admin.Role') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body scroll-y mx-4">
                                    <form data-form-type="add" method="POST"
                                        class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                        action="{{ route('dashboard.roles.store') }}"
                                        data-redirection-url="/dashboard/roles">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label class="label">{{ __('admin.Name') }}</label>
                                                <input type="text" class="form-control" id="" name="name"
                                                    value="{{ old('name') }}" />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="label"
                                                class="fs-6 fw-bolder form-label mb-2">{{ __('admin.Role-Permissions') }}</label>

                                            <div class="table-responsive-xl">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6">
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold">
                                                        <!--begin::Table row-->
                                                        <tr>
                                                            <td class="">{{ __('admin.Administrator-Access') }}</td>
                                                            <td>
                                                                <!--begin::Checkbox-->
                                                                <label class="d-flex align-items-center">
                                                                    <input class="form-check-input" type="checkbox"  id="add-select-all" data-form-type="add" >

                                                                    <span class="form-check-label" for="add-select-all" >{{ __("admin.Select-all") }}</span>

                                                                </label><!--end::Checkbox-->
                                                            </td>
                                                        </tr>
                                                        <!--end::Table row-->
                                                        @foreach($modules as $module)

                                                        <tr>
                                                            <!--begin::Label-->
                                                            <td class="">{{ __(ucwords( str_replace('_' , ' ' , $module) ))  }}</td>
                                                            <!--end::Label-->
                                                            <!--begin::Input group-->
                                                            <td>
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex align-items-center">
                                                                    @foreach($permissions->where('category', $module) as $permission)

                                                                    <!--begin::Checkbox-->
                                                                    <label class="d-flex align-items-center">
                                                                        <input class="form-check-input add-checkbox" type="checkbox" id="add_{{$permission->name}}" data-id="{{$permission->id}}"  name="permissions[]" >
                                                                        <label  class="custom-control-label mx-4" for="add_{{$permission->name}}">{{ __($permission->action ) }}</label>

                                                                    </label>
                                                                    <!--end::Checkbox-->
                                                                    @endforeach
                                                                </div>
                                                                <!--end::Wrapper-->
                                                            </td>
                                                            <!--end::Input group-->
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn save">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        // start code for resetting add new role modal
        $("#add-role-btn").click(function() {
            $('.add-checkbox').prop('checked', false);
            removeValidationMessages();
        }); // end code for resetting add new role modal
    </script>
    <script>
        var route = "{{ route('dashboard.roles.index') }}";
    </script>
@endpush
