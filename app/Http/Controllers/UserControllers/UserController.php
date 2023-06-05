<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }

    public function new_user()
    {
        $users = User::where('status', 'Off')->get();
        return view('admin.users.users_new', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            return view('admin.users.Update-users', compact('user'));
        } else {
            return redirect()->route('users')->with('not_found', 'This Not Found 404 ^+^');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:50'],
            'role_as' => ['required'],
            'status' => ['required'],
        ]);

        $user = User::find($request->input('user_id'));

        if (!$user) {
            return view('users')->with('not_found', 'This Not Found 404 ^+^');
        } else {
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->role_as = $request->input('role_as');
            $user->status = $request->input('status');
            $user->adress = $request->input('adress');

            $user->save();

            return redirect('users')->with('user_mod', 'User Updated Successfully ^+^');
        }
    }

    public function delete(Request $request)
    {
        $user = User::find($request->input('user_id'));

        if (!$user) {
            return back();
        } else {
            $user->delete();
            return redirect('users')->with('user_destroy', 'User Deleted Successfully ^+^');
        }
    }
}
