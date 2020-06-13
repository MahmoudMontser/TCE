<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentAuthController extends Controller
{
    public function login(){
        return view('Student.Login');
    }
    public function postlogin(){


        if (auth()->guard('student')->attempt(['user_name' => request('user_name'), 'password' => request('password')])) {

                return redirect('student');

        }
        else{
            Session::flash('error', 'بيانات المستخدم غير صحيحة');
            return redirect('student/login');
        }
    }



}
