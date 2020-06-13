<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeacherAuthController extends Controller
{
    public function login(){
        return view('Teacher.Login');
    }
    public function postlogin(){


        if (auth()->guard('teacher')->attempt(['user_name' => request('user_name'), 'password' => request('password')])) {

                return redirect('teacher');

        }
        else{
            Session::flash('error', 'بيانات المستخدم غير صحيحة');
            return redirect('teacher/login');
        }
    }
}
