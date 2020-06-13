<?php

namespace App\Http\Controllers;

use App\Department;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\DeclareDeclare;

class DepartmentController extends Controller
{
    public function index(){
        return view('Admin.Department.Home');
    }
    public function create()
    {
        return view('Admin.Department.CreateDepartment');
    }


    public function store(Request $request)
    {




        $this->validate($request,
            [
                'course_name' => 'required',
                'department_number' => 'required|unique:departments',
            ], [
                'course_name.required' => 'هذا الحقل مطلوب',
                'department_number.required' => 'هذا الحقل مطلوب',
                'department_number.unique' => 'هذا الرقم موجود من قبل',

            ]);

        $departments=new Department();
        $departments->course_name=$request->course_name;
        $departments->department_number=$request->department_number;
        if ($departments->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/departments');
        }



    }

    public function EditSearchIndex()
    {
        return view('Admin.Department.EditSearch');
    }

    public function EditSearch(Request $request){
        $this->validate($request,
            [
                'department_number' => 'required',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
            ]);


        $department=Department::where('department_number',$request->department_number)->first();
        if ($department){

            return view('Admin.Department.EditSearch',['department'=>$department]);
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }



    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'course_name' => 'required',
                'department_number' => 'required',
            ], [
                'course_name.required' => 'هذا الحقل مطلوب',
                'department_number.required' => 'هذا الحقل مطلوب',


            ]);

        $department=Department::find($id);
        $department->course_name=$request->course_name;
        $department->department_number=$request->department_number;

        if ($department->update()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect()->to('admin/departments/'.$department->id.'/show');
        }



    }



    public function ShowSearchIndex()
    {
        return view('Admin.Department.ShowSearch');
    }

    public function ShowSearch(Request $request){
        $this->validate($request,
            [
                'department_number' => 'required',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
            ]);



        $department=Department::where('department_number',$request->department_number)->first();
        if ($department){

            return redirect()->to('admin/departments/'.$department->id.'/show');
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }
    public function show($id){
        $department=Department::find($id);
        return view('Admin.Department.Show', ['department'=>$department]);

    }



    public function DeleteSearchIndex()
    {
        return view('Admin.Department.DeleteSearch');
    }

    public function DeleteSearch(Request $request){
        $this->validate($request,
            [
                'department_number' => 'required',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
            ]);


        $department=Department::where('department_number',$request->department_number)->first();
        if ($department){

            return view('Admin.Department.DeleteSearch',['department'=>$department]);
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }


    public function delete($id){

        $department=Department::find($id);
        if ($department->delete()) {
            session()->put('PopSuccess', "تم حذف الشعبة بنجاح");
            return redirect('/admin/departments');
        }
    }

    public function AddTeacher(Request $request){

        return view('Admin.Department.AddTeacher');
    }

    public function AddTeacherPost(Request $request){

        $this->validate($request,
            [

                'department_number' => 'required|exists:departments,department_number',
                'job_id' => 'required|exists:teachers,job_id',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
                'department_number.exists' => 'هذه الشعبة غير موجودة',
                'job_id.required' => 'هذا الحقل مطلوب',
                'job_id.exists' => 'هذا المدرس غير موجود',

            ]);

        $department=Department::where('department_number',$request->department_number)->first();
        $teacher=Teacher::where('job_id',$request->job_id)->first();
        $department->teacher_id=$teacher->id;
        if ($department->update()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect()->to('admin/departments/'.$department->id.'/show');
        }

    }




    public function remove_teacherSearchIndex()
    {
        return view('Admin.Department.RemoveTeacher');
    }


    public function remove_teacherSearch(Request $request){
        $this->validate($request,
            [
                'department_number' => 'required',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
            ]);


        $department=Department::where('department_number',$request->department_number)->first();
        $teacher=Teacher::find($department->teacher_id);
        if ($department){

            return view('Admin.Department.RemoveTeacher',['department'=>$department,'teacher'=>$teacher]);
        }else{
            session()->put('error', "هذا الرقم غير صحيح");
            return redirect()->back();
        }
    }


    public function remove_teacher($id){

        $department=Department::find($id);
        $department->teacher_id=null;
        if ($department->update()){
            session()->put('PopSuccess', "تم الغاء استناد شعبه لمدرب بنجاح");
            return redirect()->to('admin/departments/'.$department->id.'/show');
        }
    }


    public function AddStudent()
    {
        return view('Admin.Department.AddStudent');
    }
    public function AddStudentsearch(Request $request,$type){
        if ($type=='department'){

            $departments=Department::where('department_number', 'LIKE', '%' .$request->department_number. '%')->get();

            return view('Admin.Department.AddStudent',['departments'=>$departments]);
        }
        if ($type=='student'){

            $students=Student::where('job_id', 'LIKE', '%' . $request->job_id . '%')->get();
            return view('Admin.Department.AddStudent',['students'=>$students]);

        }

        if ($type=='add'){
            $this->validate($request,
                [

                    'department_number' => 'required|exists:departments,department_number',
                    'job_id' => 'required|exists:students,job_id',
                ], [
                    'department_number.required' => 'هذا الحقل مطلوب',
                    'department_number.exists' => 'هذه الشعبة غير موجودة',
                    'job_id.required' => 'هذا الحقل مطلوب',
                    'job_id.exists' => 'هذا المدرس غير موجود',

                ]);

        }
    }
    public function AddStudentPost(Request $request){

        $validator=Validator::make($request->all(),
            [

                'department_number' => 'required|exists:departments,department_number',
                'job_id' => 'required|exists:students,job_id',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
                'department_number.exists' => 'هذه الشعبة غير موجودة',
                'job_id.required' => 'هذا الحقل مطلوب',
                'job_id.exists' => 'هذا الطالب غير موجود',

            ]);
        if ($validator->passes()){

            $department=Department::where('department_number',$request->department_number)->first();
            $student=Student::where('job_id',$request->job_id)->first();

            if (!$department->Students()->where('student_id', $student->id)->exists() ){



            $department->Students()->attach($student->id);

            $request->session()->put('PopSuccess', "تم إضافة طالب بنجاح");
            return view('Admin.Department.AddStudent');
            }else{
                $request->session()->put('error', "الطالب موجود بالفعل");
                return view('Admin.Department.AddStudent');
            }

        }else{
            return view('Admin.Department.AddStudent')->with(['errors'=>$validator->errors()]);

        }


    }
    public function RemoveStudent()
    {
        return view('Admin.Department.RemoveStudent');
    }
    public function RemoveStudentsearch(Request $request,$type){
        if ($type=='department'){

            $departments=Department::where('department_number', 'LIKE', '%' .$request->department_number. '%')->get();

            return view('Admin.Department.RemoveStudent',['departments'=>$departments]);
        }
        if ($type=='student'){

            $students=Student::where('job_id', 'LIKE', '%' . $request->job_id . '%')->get();
            return view('Admin.Department.RemoveStudent',['students'=>$students]);

        }


    }
    public function RemoveStudentPost(Request $request){

        $validator=Validator::make($request->all(),
            [

                'department_number' => 'required|exists:departments,department_number',
                'job_id' => 'required|exists:students,job_id',
            ], [
                'department_number.required' => 'هذا الحقل مطلوب',
                'department_number.exists' => 'هذه الشعبة غير موجودة',
                'job_id.required' => 'هذا الحقل مطلوب',
                'job_id.exists' => 'هذا الطالب غير موجود',

            ]);
        if ($validator->passes()){

            $department=Department::where('department_number',$request->department_number)->first();
            $student=Student::where('job_id',$request->job_id)->first();
            if ($department->Students()->where('student_id', $student->id)->exists() ){

            $department->Students()->detach($student->id);

            $request->session()->put('PopSuccess', "تم إزالة طالب بنجاح");
            return view('Admin.Department.RemoveStudent');
                }else{

                $request->session()->put('error', "الطالب ليس موجود بتلك الشعبة");
                return view('Admin.Department.RemoveStudent');
            }

        }else{
            return view('Admin.Department.RemoveStudent')->with(['errors'=>$validator->errors()]);

        }


    }






}
