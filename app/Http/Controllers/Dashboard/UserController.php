<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
// use App\Models\Category;
use App\Repositories\Classes\CategoryRepository;
use App\Services\Classes\CategoryService;
use App\Services\Classes\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    protected $userService;
    protected $categoryService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
         $this->authorize('view_users');
        $users = User::paginate(10);
        return view(checkView('dashboard.users'), get_defined_vars());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_users');
        return view(checkView('dashboard.new-user'));
    }
    /**
     * @param UserRequest $request
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create_users');

        $this->userService->store($request->validated());
        return redirect()->route('dashboard.users.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
         $this->authorize('show_users');

        $user = $this->userService->find($id);
        if ($request->ajax())
            return response()->json($user);

        return view('dashboard.users.show', compact('user'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $this->authorize('update_users');

        $user = $this->userService->show($id);

        return view(checkView('dashboard.edit-user'), compact('user'));
    }

    /**
     * @param UserRequest $request
     * @param              $id
     */
    public function update(UserRequest $request, $id)
    {
         $this->authorize('update_users');

         $this->userService->update($request->validated(), $id);
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_users');

        $this->userService->destroy($id);
        return redirect()->route('dashboard.users.index');
    }
    public function search(Request $request)
    {
        $searchValue = $request->input('search');
        $users = User::where('email', 'like', '%' . $searchValue . '%')
        ->orWhere('name', 'like', '%' . $searchValue . '%')->get();

        return view('dashboard.users-search-results', compact('users'));
    }
}
