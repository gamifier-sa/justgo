<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Services\Classes\AdminService;
use App\Services\Classes\RoleService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;
    protected $roleService;

    public function __construct(AdminService $adminService,RoleService  $roleService)
    {
        $this->adminService = $adminService;
        $this->roleService = $roleService;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_admins');

        $admins = Admin::paginate(10);

        return view(checkView('dashboard.admins.index'), get_defined_vars());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_admins');

        $roles = $this->roleService->findBy(request());
        return view(checkView('dashboard.admins.create'),compact('roles'));
    }

    /**
     * @param AdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminRequest $request)
    {
      $this->authorize('create_admins');
        $this->adminService->store($request->validated());
        return redirect()->route('dashboard.admins.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($admin)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
         $this->authorize('update_admins');

        $admin = $this->adminService->show($id);
        $roles = $this->roleService->findBy(request());
        return view(checkView('dashboard.admins.edit'),  get_defined_vars());
    }

    /**
     * @param AdminRequest $request
     * @param              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, $id)
    {
       $this->authorize('update_admins');

         $this->adminService->update($request->validated(), $id);
        return redirect()->route('dashboard.admins.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_admins');

         $this->adminService->destroy($id);
        return redirect()->route('dashboard.admins.index');

    }
    public function search(Request $request)
    {
        $searchValue = $request->input('search');
        $users = Admin::where('email', 'like', '%' . $searchValue . '%')
        ->orWhere('name', 'like', '%' . $searchValue . '%')->get();

        return view('dashboard.admin-search-results', compact('users'));
    }
}
