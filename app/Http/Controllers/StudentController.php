<?php

namespace App\Http\Controllers;

use App\Department;
use App\Exam;
use App\Question;
use App\QuestionItem;
use App\Result;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index(){
        return view('Admin.Student.Home');
    }

    public function create()
    {
        return view('Admin.Student.CreateStudent');
    }


    public function store(Request $request)
    {




        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|unique:students',
                'user_name' => 'required|unique:students',
                'national_id' => 'required|unique:students',
                'job_id' => 'required|unique:students',
                'phone' => 'required|unique:students',
                'password' => 'required|min:4|confirmed',
            ], [


                'name.required' => 'هذا الحقل مطلوب',
                'user_name.required' => 'هذا الحقل مطلوب',
                'national_id.required' => 'هذا الحقل مطلوب',
                'job_id.required' => 'هذا الحقل مطلوب',
                'phone.required' => 'هذا الحقل مطلوب',
                'email.required' => 'هذا الحقل مطلوب',
                'email.unique' => 'هذا الرقم موجود من قبل',
                'user_name.unique' => 'هذا الرقم موجود من قبل',
                'national_id.unique' => 'هذا الرقم موجود من قبل',
                'job_id.unique' => 'هذا الرقم موجود من قبل',
                'phone.unique' => 'هذا الرقم موجود من قبل',
                'password.required' => 'هذا الحقل مطلوب',
                'password.confirmed' => 'كلمة المرور غير مطابقة',
                'password.min' => 'كلمة المرور لا تقل عن 4 أرقام',
            ]);

        $student=new Student();
        $student->name=$request->name;
        $student->user_name=$request->user_name;
        $student->national_id=$request->national_id;
        $student->job_id=$request->job_id;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student['password'] = bcrypt($request->input('password'));
        if ($student->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/students');
        }



    }
    public function search(Request $request){
        $this->validate($request,
            [
                'job_id' => 'required',
            ], [
                'job_id.required' => 'هذا الحقل مطلوب',
            ]);

        $student=Student::where('job_id',$request->job_id)->first();
        if ($student){
            return redirect('/admin/student/'.$student->id.'/show');
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }

    public function searchIndex()
    {
        return view('Admin.Student.Search');
    }
    public function ResultSearchIndex()
    {
        return view('Admin.Result');
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
            $results=$department->Results;
            return view('Admin.Result')->with(['results'=>$results]);
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('Admin.Student.Show', compact('student'));
    }


    public function delete($id){

        $student=Student::find($id);
        if ($student->delete()) {
            session()->put('PopSuccess', "تم حذف الطالب بنجاح");

            return redirect('/admin/students');
        }
    }


    public function edit($id)
    {

        $student=Student::find($id);
        return view('Admin.Student.Edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required',
                'user_name' => 'required',
                'national_id' => 'required',
                'job_id' => 'required',
                'phone' => 'required',
                'password' => 'nullable|min:4|confirmed',
            ], [


                'name.required' => 'هذا الحقل مطلوب',
                'user_name.required' => 'هذا الحقل مطلوب',
                'national_id.required' => 'هذا الحقل مطلوب',
                'job_id.required' => 'هذا الحقل مطلوب',
                'phone.required' => 'هذا الحقل مطلوب',
                'email.required' => 'هذا الحقل مطلوب',
                'email.unique' => 'هذا الرقم موجود من قبل',
                'user_name.unique' => 'هذا الرقم موجود من قبل',
                'national_id.unique' => 'هذا الرقم موجود من قبل',
                'job_id.unique' => 'هذا الرقم موجود من قبل',
                'phone.unique' => 'هذا الرقم موجود من قبل',
                'password.confirmed' => 'كلمة المرور غير مطابقة',
                'password.min' => 'كلمة المرور لا تقل عن 4 أرقام',
            ]);

        $student=Student::find($id);
        $student->name=$request->name;
        $student->user_name=$request->user_name;
        $student->national_id=$request->national_id;
        $student->job_id=$request->job_id;
        $student->email=$request->email;
        $student->phone=$request->phone;
        if ($request['password']){
            $user['password'] = bcrypt($request->input('password'));
        }
        if ($student->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return view('Admin.Student.Show', compact('student'));
        }



    }










    public function examStart($id){
        $student=Student::find(Auth::guard('student')->id());


       $student_departments=$student->Departments->pluck(['id'])->toArray();
        $department=Department::find($id);
        if (in_array($department->id,$student_departments)) {
            $exam = Exam::where('department_id', $id)
                ->whereDate('exam_date', Carbon::today())
                ->where('start_time', '<=', Carbon::now()->format('H:i:s'))
                ->where('end_time', '>=', Carbon::now()->format('H:i:s'))
                ->first();
            if ($exam != []) {
                if ($student->Results->where('exam_id',$exam->id)->where('student_id',Auth::guard('student')->id())->first() ==[]) {
                    return view('Student.ExamIndex',['exam'=>$exam]);

                }else{
                    session()->put('error', "لا توجد اي اختبارات الان");
                    return redirect()->back();
                }

            } else {
                session()->put('error', "لا توجد اي اختبارات الان");
                return redirect()->back();
            }
        }else
        {
            session()->put('error', "انت ل");
            return redirect()->back();
        }
    }


    public function examForward(){
        return view('Student.DepartmentSearch');
    }

    public function examForwardPost(Request $request){
        $this->validate($request,
            [
                'department_number' => 'required',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
            ]);

        $student=Student::find(Auth::guard('student')->id());

        $student_departments=$student->Departments->pluck('id')->toArray();
        $department=Department::where('department_number',$request->department_number)->first();

        if ($department){

            if (in_array($department->id,$student_departments)) {
                return redirect()->to('student/department/' . $department->id );
            }else{
                session()->put('error', "انت لا تنتمي لهذه الشعبة");
                return redirect()->back();
            }
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }
    public function logout(Request $request) {
        Auth::guard('student')->logout();
        $request->session()->put('PopSuccess', "تم تسجيل الخروج");
        return redirect('student/login');
    }

    public function showDepartment($id){

        $department=Department::find($id);

        return view('Student.DepartmentForward',['department'=>$department]);
    }


    public function submitAnswer(Request $request,$id){

        $exam = Exam::where('id', $id)
            ->whereDate('exam_date', Carbon::today())
            ->where('start_time', '<=', Carbon::now()->format('H:i:s'))
            ->where('end_time', '>=', Carbon::now()->format('H:i:s'))
            ->first();


        if ($exam !=[]) {
            $result = 0;
            foreach ($request->answers as $key => $value) {


                if ($key == 'MCQ') {
                    foreach ($value as $key2 => $value2) {
                        $question = Question::find($key2);
                        $item = $question->Items->where('id', $value2)->first();


                        if ($item && $item->right_answer == '1') {

                            $result += $question->mark;
                        }

                    }

                }
                if ($key == 'link') {
                    foreach ($value as $key2 => $value2) {

                        $question = Question::find($key2);


                        $result_arr = array();
                        foreach ($value2 as $key3 => $value3) {

                            $item = QuestionItem::find($key3);
                            if ($item->right_answer == $value3) {
                                $result_arr[] = 1;
                            } else {
                                $result_arr[] = 0;
                            }
                        }
                        if (array_product($result_arr) == 1) {
                            $result += $question->mark;

                        }


                    }


                }
                if ($key == 'TF') {
                    foreach ($value as $key2 => $value2) {

                        $question = Question::find($key2);

                        if ($question && $question->right_answer == $value2) {
                            $result += $question->mark;
                        }
                    }
                }


            }

            $Result=new Result();
            $Result->student_id=Auth::guard('student')->id();
            $Result->department_id=$exam->department_id;
            $Result->exam_id=$exam->id;
            $Result->result=$result;
            if ($Result->save()){
                $request->session()->put('PopSuccess', "تم تسجيل اجابتك بنجاح درجتك هي ".$Result->result);
                return redirect('student');
            }

        }else{
            session()->put('error', "عذرا ولكن وقت الامتحان قد مر يرجي مراجعة المختص");
            return redirect()->to('student');

        }

        }





}
