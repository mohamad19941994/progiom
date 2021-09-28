<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   /* public function __construct()
    {
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');
    }*/

    public function index()
    {
        $users = User::orderBy('id')->get();
       
        return view('dashboard.users.index', compact('users'));


    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1'
        ]);


        $request_data = $request->except(['password', 'password_confirmation', 'permissions']);

        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);

        $user->attachRole('admin');
        //$user->permissions()->sync($request->permissions);
        //dd($request->permissions);
        $user->attachPermissions($request->permissions);

        //dd('done');

        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'permissions' => 'required|min:1'
        ]);
        $request_data = $request->except(['permissions']);

        $user->update($request_data);

        $user->syncPermissions($request->permissions);

        //dd($request->permissions);


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');
    }
}
