@include('Admin.Layouts.header')


<form id="RemoveStudent" action="{{URL::to('/admin/departments/remove/student')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-7 mx-auto pb-2">
    <input type="text" name="job_id"  id="job_id_clone" hidden>
    {{csrf_field()}}

    <input type="text" name="department_number" id="department_number_clone" hidden>
</form>

<section id="depart-page">
    <div class="container pt-3">
        <h4 class="h-header mx-auto pt-5">حذف متدرب من شعبة </h4>
        <div class="row">
            <form id="student_form" action="{{URL::to('/admin/departments/remove/student/search/student')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-7 mx-auto pb-5">
                    {{csrf_field()}}
                <div class="row">
                    <!--حقل ادخال الرقم الاكاديمي للمتدرب-->
                    <div class="input-group pt-3 col-10">
                        <div class="input-group-prepend ">
                            <span class="input-group-text c-bg-f color-white fz-14" id="id-num-pre">الرقم الاكاديمي</span>
                        </div>
                        <input type="text"  value="{{old('job_id')}}" class="form-control text-center @if($errors->has('job_id'))  is-invalid @endif" name="job_id"  id="job_id"/>
                        @if($errors->has('job_id'))
                            <div class="col-sm-3">
                                <small id="passwordHelp" class="text-danger">
                                    {{$errors->first('job_id')}}
                                </small>
                            </div>
                        @endif                    </div>
                    <!-- نهاية حقل ادخال الرقم الاكاديمي للمتدرب-->

                    <!--زر البحث-->
                    <div class="input-group pt-3 d-flex justify-content-center col-2">
                        <button  type="button" onclick="submitStudent()" class="btn color-white c-bg-f">بحث</button>
                    </div>
                    <!--نهاية زر البحث-->
                </div>
            </form>

            <!--جدول عرض نتائح بحث المتدرب-->

            @if(isset($students))
            <div class="col-9 col-md-7 mx-auto">
                <table class="table c-first">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">السجل الاكاديمي</th>
                        <th scope="col">اسم المتدرب</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr class="text-center">
                            <td>{{$student->job_id}}</td>
                            <td>{{$student->name}} </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            @endif
            <!-- نهاية جدول عرض نتائح بحث المتدرب-->
        </div>
        <!-- الشعبه -->
        <div class="row pt-4">
            <form  id="department_form" action="{{URL::to('/admin/departments/remove/student/search/department')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-7 mx-auto pb-5">
                {{csrf_field()}}
                <div class="row">
                    <!--حقل ادخال رقم الشعبه-->
                    <div class="input-group pt-3 col-10">
                        <div class="input-group-prepend ">
                            <span class="input-group-text c-bg-f color-white fz-14" id="depart-num-pre">رقم الشعبه</span>
                        </div>
                        <input type="text"  value="{{old('department_number')}}" class="form-control text-center @if($errors->has('department_number'))  is-invalid @endif" name="department_number"  id="department_number"/>
                        @if($errors->has('department_number'))
                            <div class="col-sm-3">
                                <small id="passwordHelp" class="text-danger">
                                    {{$errors->first('department_number')}}
                                </small>
                            </div>
                        @endif
                    </div>
                    <!--نهاية حقل ادخال رقم الشعبه-->

                    <!--زر البحث-->
                    <div class="input-group pt-3 d-flex justify-content-center col-2">
                        <button  type="button"  onclick="submitDepartment()" class="btn color-white c-bg-f">بحث</button>
                    </div>
                    <!--نهاية زر البحث-->
                </div>
            </form>

            <!--جدول عرض نتائح بحث الشعبه-->
            @if(isset($departments))
            <div class="col-9 col-md-7 mx-auto">
                <table class="table c-first">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">رقم الشعبه </th>
                        <th scope="col">اسم الماده</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                    <tr class="text-center">
                        <td>{{$department->department_number}}</td>
                        <td>{{$department->course_name}} </td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            @endif
            <!-- نهاية جدول عرض نتائح بحث الشعبه-->


        </div>

        <!--     اضافه       -->
        <div class="row">
            <div class="input-group pt-3 d-flex justify-content-center">
                <button type="button"  id="submit_remove" onclick="submit_remove()" class="btn color-white c-bg-f">حذف</button>

            </div>
        </div>

        <!--زر عوده-->
        <div class="row pb-5">
            <div class="input-group pt-3 d-flex justify-content-center">
                <a href="{{URL::to('/admin/departments')}}" class="btn color-white c-bg-f">عوده</a>

            </div>
        </div>


    </div>

</section>


<script>
        function submitDepartment() {
            $('#department_form').submit();
        }
        function submitStudent() {
            $('#student_form').submit();
        }
        function submit_remove() {
            console.log('remove');
            $('#job_id_clone').val($('#job_id').val());
            $('#department_number_clone').val($('#department_number').val());
            $('#RemoveStudent').submit();
        }
</script>

@include('Admin.Layouts.footer')
