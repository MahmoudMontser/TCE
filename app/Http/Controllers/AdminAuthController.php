<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function login(){
        return view('Admin.Login');
    }
    public function postlogin(){


        if (auth()->attempt(['user_name' => request('user_name'), 'password' => request('password')])) {

                return redirect('admin');

        }
        else{
            Session::flash('error', 'بيانات المستخدم غير صحيحة');
            return redirect('admin/login');
        }
    }
}
