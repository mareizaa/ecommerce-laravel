<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Requests\UserUpdateRequest as RequestsUserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'client')->paginate(5);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        User::create($request->only('name', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
        return back()->with('message', 'Successfully Created');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
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
