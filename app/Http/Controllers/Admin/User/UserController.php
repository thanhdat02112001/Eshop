<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index () {
        $users = User::paginate(10);
        return view('backend.user.listuser', compact('users'));
    }

    public function create () {
        return view('backend.user.adduser');
    }

    public function store (UserRequest $request) {
        $user = [
            'email' => $request->email,
            'name' => $request->fullname,
            'password' => Hash::make($request->password),
        ];
        $profile = [
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $user = User::create($user);
        $user->profile()->create($profile);
        $request->session()->flash("success","thêm người dùng thành công!");
        return redirect("/admin/user");
    }

    public function edit ($id) {
        $user = User::find($id);
        return view('backend.user.edituser', compact('user'));
    }

    public function update (UserRequest $request, $id) {
        $userUpdate = [
            'email' => $request->email,
            'name' => $request->fullname,
            'password' => Hash::make($request->password),
        ];
        $profileUpdate = [
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $user = User::find($id);
        $user->update($userUpdate);
        $user->profile()->update($profileUpdate);
        $request->session()->flash("success","sửa người dùng thành công!");
        return redirect("/admin/user");
    }

    public function delete ($id) {
        $category = User::find($id);
        $category->delete();
        return redirect()->route('user-home');
    }
}
