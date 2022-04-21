<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function redirect;
use function view;

class CustomerController extends Controller
{
    public function getLogin()
    {
        return view('frontend.signin');
    }

    public function postLogin(LoginRequest $request)
    {
        if(Auth::guard('customers')->attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->put('customer',Auth::guard('customers')->user());
            return redirect()->route('client-index')->with('success', 'Đăng nhập thành công');
        }
        else{
            return redirect()->back()->with('error','Thông tin tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function getRegister()
    {
        return view('frontend.signup');
    }

    public function postRegister(CustomerRequest $request)
    {
        $customer =
        [
            'name' => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            'address' => $request->address,
            "phone" => $request->phone,
        ];
        $customer = Customer::create($customer);
        Auth::guard('customers')->login($customer);
        $request->session()->flash('success', "Đăng ký thành công");
        return redirect()->route('client-index');
    }

    public function logout()
    {
        Auth::guard('customers')->logout();
        return redirect()->route('client-index')->with('success', 'Đăng xuất thành công');
    }
}
