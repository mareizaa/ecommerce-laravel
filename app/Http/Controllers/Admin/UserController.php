<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users');
    }

    public function index(): View
    {
        $users = User::where('role', 'client')->paginate(5);

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->assignRole('client');
        $user->save();

        return redirect()->route('users.index')->with('message', 'Successfully Edited');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->only('name', 'email', 'status');
        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }

        $user->update($data);
        return redirect()->route('users.index')->with('message', 'Successfully Edited');
    }
}
