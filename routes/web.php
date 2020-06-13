<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/','Home');


Route::get('admin/login','AdminAuthController@login')->name('login');
Route::post('admin/login','AdminAuthController@postlogin');





Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function() {
    Route::get('/', function () {
        return view('Admin.Admin_home');
    });
    Route::resource('users', 'UserController');
    Route::resource('students', 'StudentController');
    Route::get('students/{id}/delete','StudentController@delete')->name('students.delete');
    Route::post('student/{id}/edit','StudentController@update')->name('students.update');
    Route::get('student/{id}/show','StudentController@show')->name('students.show');
    Route::get('student/search','StudentController@searchIndex')->name('students.searchIndex');
    Route::post('student/search','StudentController@search')->name('students.search');




    Route::resource('teachers', 'TeacherController');
    Route::get('teachers/{id}/delete','TeacherController@delete')->name('teachers.delete');
    Route::post('teacher/{id}/edit','TeacherController@update')->name('teachers.update');
    Route::get('teacher/{id}/show','TeacherController@show')->name('teachers.show');
    Route::get('teacher/search','TeacherController@searchIndex')->name('teachers.searchIndex');
    Route::post('teacher/search','TeacherController@search')->name('teachers.search');


    Route::resource('departments', 'DepartmentController');
    Route::get('departments/edit/search','DepartmentController@EditSearchIndex')->name('departments.EditSearchIndex');
    Route::post('departments/edit/search','DepartmentController@EditSearch')->name('departments.EditSearch');
    Route::post('department/{id}/edit','DepartmentController@update')->name('departments.update');
    Route::get('departments/show/search','DepartmentController@ShowSearchIndex')->name('departments.ShowSearchIndex');
    Route::post('departments/show/search','DepartmentController@ShowSearch')->name('departments.ShowSearchIndex');
    Route::get('departments/{id}/show','DepartmentController@show')->name('departments.show');
    Route::get('departments/delete/search','DepartmentController@DeleteSearchIndex')->name('departments.DeleteSearchIndex');
    Route::post('departments/delete/search','DepartmentController@DeleteSearch')->name('departments.EditSearch');
    Route::get('departments/{id}/delete','DepartmentController@delete')->name('departments.delete');
    Route::get('departments/add/teacher','DepartmentController@AddTeacher')->name('departments.AddTeacher');
    Route::post('departments/add/teacher','DepartmentController@AddTeacherPost')->name('departments.AddTeacherPost');
    Route::post('departments/add/student','DepartmentController@AddStudentPost')->name('departments.AddStudentPost');
    Route::post('departments/remove/student','DepartmentController@RemoveStudentPost')->name('departments.RemoveStudentPost');

    Route::get('departments/remove_teacher/search','DepartmentController@remove_teacherSearchIndex')->name('departments.remove_teacherSearchIndex');
    Route::post('departments/remove_teacher/search','DepartmentController@remove_teacherSearch')->name('departments.remove_teacherSearch');
    Route::get('departments/{id}/remove_teacher','DepartmentController@remove_teacher')->name('departments.remove_teacher');

    Route::get('departments/add/student','DepartmentController@AddStudent')->name('departments.AddStudent');
    Route::post('departments/add/student/search/{type}','DepartmentController@AddStudentsearch')->name('departments.AddStudentsearch');

    Route::get('departments/remove/student','DepartmentController@RemoveStudent')->name('departments.RemoveStudent');
    Route::post('departments/remove/student/search/{type}','DepartmentController@RemoveStudentsearch')->name('departments.RemoveStudentsearch');



    Route::get('results/search','StudentController@ResultSearchIndex')->name('results.ResultSearchIndex');
    Route::post('results/search','StudentController@ResultSearch')->name('results.ResultSearch');

    Route::get('users/{id}/delete','UserController@delete')->name('users.delete');
    Route::post('user/{id}/edit','UserController@update')->name('users.update');
    Route::get('logout', 'UserController@logout');
});




Route::get('teacher/login','TeacherAuthController@login')->name('login');
Route::post('teacher/login','TeacherAuthController@postlogin');
Route::group(['prefix'=>'teacher', 'middleware'=>'teacher'], function(){
    Route::get('/', function () {
        return view('Teacher.Teacher_home');
    });

    Route::get('create/exam/department/search','TeacherController@departmentSearchIndex')->name('teachers.departmentSearchIndex');
    Route::post('create/exam/department/search','TeacherController@departmentSearch')->name('teachers.departmentSearch');


    Route::post('create/exam/{id}','TeacherController@createExamPost')->name('teachers.createExamPost');

    Route::get('exam/{id}/create/question', 'TeacherController@createQuestionHome');


    Route::get('exam/{id}/create/question/MCQ', 'TeacherController@createMCQ');
    Route::post('exam/{id}/create/question/MCQ', 'QuestionController@createMCQPost');

    Route::get('question/{id}/edit/MCQ', 'QuestionController@editMCQ');
    Route::post('question/{id}/edit/MCQ', 'QuestionController@updateMCQ');
    Route::post('question/{id}/add/item/MCQ', 'QuestionController@AddItemMCQ');
    Route::get('item/{id}/delete/MCQ', 'QuestionController@deleteItemMCQ');

    Route::post('item/{id}/edit/MCQ', 'QuestionController@EditItemMCQ');

    Route::get('question/{id}/delete', 'QuestionController@delete');

    Route::get('exam/{id}/create/question/Linked', 'TeacherController@createLinked');
    Route::post('exam/{id}/create/question/Linked', 'QuestionController@createLinkedPost');

    Route::get('question/{id}/edit/Linked', 'QuestionController@editLinked');
    Route::post('question/{id}/edit/Linked', 'QuestionController@updateLinked');
    Route::get('exam/{id}/edit', 'TeacherController@editexam');
    Route::post('exam/{id}/edit', 'TeacherController@updateexam');

    Route::post('question/{id}/add/item/Linked/{type}', 'QuestionController@AddItemLinked');

    Route::get('item/{id}/delete/Linked', 'QuestionController@deleteItemLinked');
    Route::post('item/{id}/edit/Linked', 'QuestionController@EditItemLinked');




    Route::get('exam/{id}/create/question/TF', 'TeacherController@createTF');
    Route::post('exam/{id}/create/question/TF', 'QuestionController@createTFPost');

    Route::get('question/{id}/edit/TF', 'QuestionController@editTF');
    Route::post('question/{id}/edit/TF', 'QuestionController@updateTF');


    Route::get('exam/search','TeacherController@examSearchIndex')->name('teachers.examSearchIndex');
    Route::post('exam/search','TeacherController@examSearch')->name('teachers.examSearch');
    Route::get('exam/{id}','TeacherController@examIndex')->name('teachers.examIndex');



    Route::get('logout', 'TeacherController@logout');

    Route::get('results/search','TeacherController@ResultSearchIndex')->name('results.ResultSearchIndex');
    Route::post('results/search','TeacherController@ResultSearch')->name('results.ResultSearch');

});








Route::get('student/login','StudentAuthController@login')->name('login');
Route::post('student/login','StudentAuthController@postlogin');
Route::group(['prefix'=>'student', 'middleware'=>'student'], function(){
    Route::get('/', function () {
        return view('Student.Student_home');
    });

    Route::get('exam/start/{id}','StudentController@examStart')->name('teachers.examStart');
    Route::get('department/{id}','StudentController@showDepartment')->name('teachers.showDepartment');
    Route::get('exam/forward','StudentController@examForward')->name('teachers.examForward');
    Route::post('exam/forward','StudentController@examForwardPost')->name('teachers.examForwardPost');
    Route::post('exam/{id}/submit/answer','StudentController@submitAnswer')->name('teachers.submitAswer');


    Route::get('results/search','ExamController@ResultSearchIndex')->name('results.ResultSearchIndex');
    Route::post('results/search','ExamController@ResultSearch')->name('results.ResultSearch');


    Route::get('logout', 'StudentController@logout');

});
