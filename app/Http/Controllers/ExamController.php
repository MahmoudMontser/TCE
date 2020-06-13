<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function ResultSearchIndex()
    {
        return view('Student.Result');
    }


    public function ResultSearch(Request $request){
        $this->validate($request,
            [
                'department_number' => 'required',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
            ]);

        $department=Department::where('department_number',$request->department_number)->first();

        if ($department){
            $results=$department->Results->where('student_id',Auth::guard('student')->id());
            return view('Student.Result')->with(['results'=>$results]);
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }
}
