<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {

        $users = User::paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {

        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
            'role_as' => ['required', 'integer']

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        return redirect('admin/user')->with('message', 'User Added Successfully');
    }


    public function edit(int $userId){

        $user=User::findOrFail($userId);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request,$userId)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
            'role_as' => ['required', 'integer']

        ]);

        User::findOrFail($userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        return redirect('admin/user')->with('message', 'User Updated Successfully');
    }

    public function delete(int $userId)
    {

        $userId = User::findOrFail($userId);
        $userId->delete();
        return redirect('admin/user')->with('message', 'User deleted Successfully');

    }

}
