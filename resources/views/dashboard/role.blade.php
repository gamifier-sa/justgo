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
                        <button>Edit Role</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="assignedAdmins">
                    <h3>Admins Assigned</h3>
                    <div class="table-responsive-xl">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ADMIN</th>
                                    <th scope="col">JOINED DATE</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="user">
                                            <img src="../assets/images/tableUser.png" alt="" />

                                            <p>brooklyn.s@gmail.com</p>
                                        </div>
                                    </td>
                                    <td>1 month ago</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions&nbsp;
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item" href="#"><span>Edit</span> <img
                                                            src="..../assets/icons/edit.svg" alt="" />
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
