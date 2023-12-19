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
                            <h3>Super Admin</h3>
                            <div class="usage">Total admins with this role : 1</div>
                            <ul>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                            </ul>
                            <div class="actions">
                                <a href="">View Role</a>
                                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Edit Role</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body scroll-y mx-4">
                                            <form action="">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <label class="label">Name</label>
                                                        <input type="text" class="form-control" id=""
                                                            name="name" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="label" class="fs-6 fw-bolder form-label mb-2">Role
                                                        Permissions</label>

                                                    <div class="table-responsive-xl">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6">
                                                            <!--begin::Table body-->
                                                            <tbody class="fw-bold">
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td class="">Administrator Access</td>
                                                                    <td>
                                                                        <!--begin::Checkbox-->
                                                                        <label class="d-flex align-items-center">
                                                                            <input type="checkbox" id="edit-select-all"
                                                                                data-form-type="update" />
                                                                            <span class="mx-3"
                                                                                for="edit-select-all">Select All</span>
                                                                        </label><!--end::Checkbox-->
                                                                    </td>
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="">Admins</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex align-items-center">
                                                                            <!--begin::Checkbox-->
                                                                            <label class="d-flex align-items-center">
                                                                                <input type="checkbox" id="edit_view_admins"
                                                                                    data-id="1" name="permissions[]"
                                                                                    value="1" />
                                                                                <span class="mx-3"
                                                                                    for="edit_view_admins">view </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label class="d-flex align-items-center">
                                                                                <input type="checkbox" id="edit_show_admins"
                                                                                    data-id="2" name="permissions[]"
                                                                                    value="2" />
                                                                                <span class="mx-3"
                                                                                    for="edit_show_admins">show</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label class="d-flex align-items-center">
                                                                                <input type="checkbox"
                                                                                    id="edit_create_admins" data-id="3"
                                                                                    name="permissions[]" value="3" />
                                                                                <span class="mx-3"
                                                                                    for="edit_create_admins">create</span>
                                                                            </label><!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label class="d-flex align-items-center">
                                                                                <input type="checkbox"
                                                                                    id="edit_update_admins" data-id="4"
                                                                                    name="permissions[]" value="4" />
                                                                                <span class="mx-3"
                                                                                    for="edit_update_admins">update</span>
                                                                            </label><!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label class="d-flex align-items-center">
                                                                                <input type="checkbox"
                                                                                    id="edit_delete_admins" data-id="5"
                                                                                    name="permissions[]" value="5" />
                                                                                <span class="mx-3"
                                                                                    for="edit_delete_admins">delete</span>
                                                                            </label><!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <button type="button" class="btn"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn save">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="roleCard">
                            <h3>Super Admin</h3>
                            <div class="usage">Total admins with this role : 1</div>
                            <ul>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                                <li><span></span> show awards</li>
                            </ul>
                            <div class="actions">
                                <a href="">View Role</a>
                                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Edit Role</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop2" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">...</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button class="addRole" data-bs-toggle="modal" data-bs-target="#addNewRole">
                            <div class="img"><img src="{{ asset('dashboard/') }}/assets/images/addrole.png" alt="" /></div>
                            <div class="text">Add new Role</div>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addNewRole" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add new Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body scroll-y mx-4">
                                        <form action="">
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="label">Name</label>
                                                    <input type="text" class="form-control" id=""
                                                        name="name" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="label" class="fs-6 fw-bolder form-label mb-2">Role
                                                    Permissions</label>

                                                <div class="table-responsive-xl">
                                                    <!--begin::Table-->
                                                    <table class="table align-middle table-row-dashed fs-6">
                                                        <!--begin::Table body-->
                                                        <tbody class="fw-bold">
                                                            <!--begin::Table row-->
                                                            <tr>
                                                                <td class="">Administrator Access</td>
                                                                <td>
                                                                    <!--begin::Checkbox-->
                                                                    <label class="d-flex align-items-center">
                                                                        <input type="checkbox" id="edit-select-all"
                                                                            data-form-type="update" />
                                                                        <span class="mx-3" for="edit-select-all">Select
                                                                            All</span> </label><!--end::Checkbox-->
                                                                </td>
                                                            </tr>
                                                            <!--end::Table row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="">Admins</td>
                                                                <!--end::Label-->
                                                                <!--begin::Input group-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Checkbox-->
                                                                        <label class="d-flex align-items-center">
                                                                            <input type="checkbox" id="edit_view_admins"
                                                                                data-id="1" name="permissions[]"
                                                                                value="1" />
                                                                            <span class="mx-3"
                                                                                for="edit_view_admins">view </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                        <!--begin::Checkbox-->
                                                                        <label class="d-flex align-items-center">
                                                                            <input type="checkbox" id="edit_show_admins"
                                                                                data-id="2" name="permissions[]"
                                                                                value="2" />
                                                                            <span class="mx-3"
                                                                                for="edit_show_admins">show</span>
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                        <!--begin::Checkbox-->
                                                                        <label class="d-flex align-items-center">
                                                                            <input type="checkbox" id="edit_create_admins"
                                                                                data-id="3" name="permissions[]"
                                                                                value="3" />
                                                                            <span class="mx-3"
                                                                                for="edit_create_admins">create</span>
                                                                        </label><!--end::Checkbox-->
                                                                        <!--begin::Checkbox-->
                                                                        <label class="d-flex align-items-center">
                                                                            <input type="checkbox" id="edit_update_admins"
                                                                                data-id="4" name="permissions[]"
                                                                                value="4" />
                                                                            <span class="mx-3"
                                                                                for="edit_update_admins">update</span>
                                                                        </label><!--end::Checkbox-->
                                                                        <!--begin::Checkbox-->
                                                                        <label class="d-flex align-items-center">
                                                                            <input type="checkbox" id="edit_delete_admins"
                                                                                data-id="5" name="permissions[]"
                                                                                value="5" />
                                                                            <span class="mx-3"
                                                                                for="edit_delete_admins">delete</span>
                                                                        </label><!--end::Checkbox-->
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Input group-->
                                                            </tr>
                                                        </tbody>
                                                        <!--end::Table body-->
                                                    </table>
                                                    <!--end::Table-->
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn save">Save</button>
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
