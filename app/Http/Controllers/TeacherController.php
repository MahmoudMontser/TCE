<?php

namespace App\Http\Controllers;

use App\Department;
use App\Exam;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{

    public function index(){
        return view('Admin.Teacher.Home');
    }

    public function create()
    {
        return view('Admin.Teacher.CreateTeacher');
    }


    public function store(Request $request)
    {




        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|unique:teachers',
                'user_name' => 'required|unique:teachers',
                'national_id' => 'required|unique:teachers',
                'job_id' => 'required|unique:teachers',
                'phone' => 'required|unique:teachers',
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

        $teacher=new Teacher();
        $teacher->name=$request->name;
        $teacher->user_name=$request->user_name;
        $teacher->national_id=$request->national_id;
        $teacher->job_id=$request->job_id;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        $teacher['password'] = bcrypt($request->input('password'));
        if ($teacher->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/teachers');
        }



    }
    public function search(Request $request){
        $this->validate($request,
            [
                'job_id' => 'required',
            ], [
                'job_id.required' => 'هذا الحقل مطلوب',
            ]);

        $teacher=Teacher::where('job_id',$request->job_id)->first();
        if ($teacher){
            return redirect('/admin/teacher/'.$teacher->id.'/show');
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }

    public function searchIndex()
    {
        return view('Admin.Teacher.Search');
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('Admin.Teacher.Show', compact('teacher'));
    }


    public function delete($id){

        $teacher=Teacher::find($id);
        if ($teacher->delete()) {
            session()->put('PopSuccess', "تم حذف المدرب بنجاح");

            return redirect('/admin/teachers');
        }
    }


    public function edit($id)
    {

        $teacher=Teacher::find($id);
        return view('Admin.teacher.Edit',compact('teacher'));
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

        $teacher=Teacher::find($id);
        $teacher->name=$request->name;
        $teacher->user_name=$request->user_name;
        $teacher->national_id=$request->national_id;
        $teacher->job_id=$request->job_id;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        if ($request['password']){
            $user['password'] = bcrypt($request->input('password'));
        }
        if ($teacher->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return view('Admin.Teacher.Show', compact('teacher'));
        }



    }


//////////////////









    public function departmentSearchIndex()
    {
        return view('Teacher.AddExamSearch');
    }


    public function departmentSearch(Request $request){
        $this->validate($request,
            [
                'department_number' => 'required',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
            ]);


        $department=Department::where('department_number',$request->department_number)->first();
        if ($department){

            return view('Teacher.CreateExam',['department'=>$department]);
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }



    public function editexam(Request $request ,$id){

        $exam=Exam::find($id);
        $department=Department::find($exam->department_id);


            return view('Teacher.EditExam',['department'=>$department,'exam'=>$exam]);
    }
    public function updateexam(Request $request,$id){




        $validator=Validator::make($request->all(),
            [

                'exam_number' => 'required',
                'start_time'       => 'required',
                'exam_date'       => 'required|date',
                'end_time'         => 'required|after:start_time'

            ], [



                'exam_number.required' => 'هذا الحقل مطلوب',
                'exam_date.required' => 'هذا الحقل مطلوب',
                'start_time.required' => 'هذا الحقل مطلوب',
                'end_time.required' => 'هذا الحقل مطلوب',
                'after.start_time' => 'هذا الوقت غير صالح',
                'after.end_time' => 'هذا الوقت غير صالح',
                'exam_number.unique' => 'هذا الرقم موجود من قبل',
            ]);



        $exam=Exam::find($id);
        $department=Department::find($exam->department_id);
        if ($validator->passes()) {



            $exam->exam_number=$request->exam_number;
            $exam->exam_date=$request->exam_date;
            $exam->start_time=$request->start_time;
            $exam->end_time=$request->end_time;

            if ($exam->save()){
                $request->session()->put('PopSuccess', "تم تعديل الامتحان بنجاح ");
                return redirect('/teacher/exam/'.$exam->id);
            }
        }else{
            return back()->with(['exam'=>$exam,'department'=>$department,'errors'=>$validator->errors()]);
        }
    }



    public function createExamPost(Request $request,$id){

        $department = Department::find($id);


        $validator=Validator::make($request->all(),
            [

                'exam_number' => 'required|unique:exams',
                'start_time'       => 'required|date_format:H:i',
                'exam_date'       => 'required|date',
                'end_time'         => 'required|date_format:H:i|after:start_time'

            ], [



                'exam_number.required' => 'هذا الحقل مطلوب',
                'exam_date.required' => 'هذا الحقل مطلوب',
                'start_time.required' => 'هذا الحقل مطلوب',
                'end_time.required' => 'هذا الحقل مطلوب',
                'after.start_time' => 'هذا الوقت غير صالح',
                'after.end_time' => 'هذا الوقت غير صالح',
                'exam_number.unique' => 'هذا الرقم موجود من قبل',
            ]);



        if ($validator->passes()) {


            $exam=new Exam();
            $exam->department_id=$id;
            $exam->exam_number=$request->exam_number;
            $exam->exam_date=$request->exam_date;
            $exam->start_time=$request->start_time;
            $exam->end_time=$request->end_time;

            if ($exam->save()){
                $request->session()->put('PopSuccess', "تم إنشاء الامتحان بنجاح قم بأضافة الاسئلة");
                return redirect('/teacher/exam/'.$exam->id.'/create/question');
            }
        }else{
            return view('Teacher.CreateExam',['department'=>$department,'errors'=>$validator->errors()]);
        }
    }



    public function createQuestionHome($id){
        $exam=Exam::find($id);
        return view('Teacher.CreateQuestionHome',['exam'=>$exam]);
    }

    public function createMCQ($id){
        $exam=Exam::find($id);
        return view('Teacher.CreateMCQ',['exam'=>$exam]);
    }
    public function createLinked($id){
        $exam=Exam::find($id);
        return view('Teacher.CreateLinked',['exam'=>$exam]);
    }
    public function createTF($id){
        $exam=Exam::find($id);
        return view('Teacher.CreateTF',['exam'=>$exam]);
    }



    public function logout(Request $request) {
        Auth::guard('teacher')->logout();
        $request->session()->put('PopSuccess', "تم تسجيل الخروج");
        return redirect('teacher/login');
    }





    public function examSearchIndex()
    {
        return view('Teacher.ExamSearch');
    }

    public function examSearch(Request $request){
        $this->validate($request,
            [
                'exam_number' => 'required',
            ], [
                'exam_number.required' => 'هذا الحقل مطلوب',
            ]);


        $exam=Exam::where('exam_number',$request->exam_number)->first();
        if ($exam){


            return redirect()->to('teacher/exam/'.$exam->id);

        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }

    public function examIndex($id){
        $exam=Exam::find($id);
        return view('Teacher.ExamIndex',['exam'=>$exam]);
    }




    public function ResultSearchIndex()
    {
        return view('Teacher.Result');
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
            return view('Teacher.Result')->with(['results'=>$results]);
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }



}
