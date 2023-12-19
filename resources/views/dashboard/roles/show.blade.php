@extends('dashboard.layouts.app')
@section('page_title', 'Home Page')
@section('content')
    <section>
        <div class="sectionS1">
            <div class="sectionHead">
                <h2>الصلاحيات</h2>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="roleCard">
                        <h3>{{ $role->name }}</h3>
                        <div class="usage">{{ $role->name }}</div>
                        <ul>
                            @foreach ($role->permissions->shuffle()->take(5) as $permission)
                                <li><span></span>{{ __($permission->action) . ' ' . __(str_replace('_', ' ', $permission->category)) }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="actions">
                            <button data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">{{ __('admin.edit') }}
                                {{ __('admin.Role') }}</button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <form id="role_form_update" action="{{ route('dashboard.roles.update', $role->id) }}"
                                    data-form-type="update" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                    method="POST" data-redirection-url="/dashboard/roles" data-trailing="_edit">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="label">{{ __('admin.Name') }}</label>
                                            <input type="text" class="form-control" id="name_inp_edit" name="name"
                                                value="{{ old('name', $role->name) }}" />
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
                                                                        <label class="d-flex align-items-center">
                                                                            <input class="form-check-input edit-checkbox" @if($role->permissions->contains('id', $permission->id)) checked @endif type="checkbox" id="edit_{{$permission->name}}" value="{{$permission->id}}" data-id="{{$permission->id}}"  name="permissions[]" >

                                                                            <span class="mx-3"
                                                                            for="edit_{{$permission->name}}">{{ __($permission->action ) }}
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
                                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn save">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="assignedAdmins">
                        <h3>{{__('admin.Admins-Assigned')}}( {{ $role->admins->count() }} )</h3>
                        <div class="table-responsive-xl">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">{{__('admin.Admin')}}</th>
                                        <th scope="col">{{__('admin.Joined-Date')}}</th>
                                        <th scope="col">{{__('admin.Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($role->admins as $index=>$admin)

                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>
                                            <div class="user">
                                                <img src="{{asset('dashboard/assets/images/tableUser.png')}}" alt="" />

                                                <p>{{ $admin->email }}</p>
                                            </div>
                                        </td>
                                        <td>{{$admin->createsince}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{__('admin.Actions')}}&nbsp;
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li>
                                                        <a href="{{route('dashboard.admins.edit', $admin->id)}}" class="dropdown-item" ><span>{{__('admin.edit')}}</span> <img
                                                                src="{{asset('dashboard/assets/icons/edit.svg')}}" alt="" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="{{ asset('js/dashboard/forms/roles/common.js') }}"></script>
<script>
    let roleId = "{{ $role['id'] }}"
</script>
