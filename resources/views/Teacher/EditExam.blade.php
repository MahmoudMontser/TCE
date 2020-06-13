@include('Teacher.Layouts.header')
<section id="home">
    <div class="container pt-3">
        <!--  عنوان الصفحه -->
        <h4 class="h-header mx-auto pt-5">تعديل اختبار </h4>

        <div class="row pt-4 pb-2">
            <!-- سكشن بداية جدول العرض -->
            <div class="col-9 col-md-7 mx-auto">
                <!--  بدايةالجدول -->
                <table class="table c-first">
                    <!--  صف عناوين الجدول -->
                    <thead>
                    <tr class="text-center">
                        <th scope="col">رقم الشعبه </th>
                        <th scope="col">اسم الماده</th>
                    </tr>
                    </thead>
                    <!--  جسم الجدول ب البيانات -->
                    <tbody>
                    <tr class="text-center">
                        <td>{{$department->department_number}}</td>
                        <td>{{$department->course_name}}</td>
                    </tr>
                    </tbody>
                    <!-- نهاية جسم الجدول ب البيانات -->
                </table>
                <!--نهاية الجدول -->

            </div>
            <!-- نهاية سكشن جدول العرض -->

            <!--  بداية الفورم -->
            <form action="{{URL::to('teacher/exam/'.$exam->id.'/edit')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-7 mx-auto pb-5">
                {{csrf_field()}}






                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="depart-num-pre">رقم الامتحان</span>
                    </div>
                    <input type="text"  value="{{$exam->exam_number}}" class="form-control text-center @if($errors->has('exam_number'))  is-invalid @endif" name="exam_number"  id="exam_number"/>
                    @if($errors->has('exam_number'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('exam_number')}}
                            </small>
                        </div>
                    @endif
                </div>

                <!--  حقل ادخال تاريخ الاختبار -->



                <div class="input-group pt-3">
                    <div class="input-group-prepend ">
                        <span class="input-group-text c-bg-f color-white fz-14" id="exam-date-pre">تاريخ الاختبار</span>
                    </div>
                    <input type="date" value="{{$exam->exam_date}}"   class="form-control text-center @if($errors->has('exam_date'))  is-invalid @endif" name="exam_date" id="exam-date">
                    @if($errors->has('exam_date'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('exam_date')}}
                            </small>
                        </div>
                    @endif
                </div>
                <!--  نهاية حقل ادخال تاريخ الاختبار -->

                <!--  حقل ادخال توقيت البدايه -->
                <div class="input-group pt-3">
                    <div class="input-group-prepend ">
                        <span class="input-group-text c-bg-f color-white fz-14" id="start-time-pre">توقيت البدايه</span>
                    </div>
                    <input type="time" value="{{$exam->start_time}}" class="form-control text-center"  class="form-control text-center @if($errors->has('start_time'))  is-invalid @endif" name="start_time" id="start-time">

                    @if($errors->has('start_time'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('start_time')}}
                            </small>
                        </div>
                    @endif
                </div>

                <!--  حقل ادخال توقيت نهاية الاختبار -->
                <div class="input-group pt-3">
                    <div class="input-group-prepend ">
                        <span class="input-group-text c-bg-f color-white fz-14" id="end-time-pre">توقيت النهايه </span>
                    </div>
                    <input type="time"  value="{{$exam->end_time}}" class="form-control text-center"  class="form-control text-center @if($errors->has('end_time'))  is-invalid @endif" name="end_time" id="end-time">

                    @if($errors->has('end_time'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('end_time')}}
                            </small>
                        </div>
                    @endif
                </div>

                <!-- التالي     -->
                <div class="row pb-5">
                    <div class="input-group pt-4 d-flex justify-content-center">
                        <button  type="submit" class="btn color-white c-bg-f">التالي</button>
                    </div>
                </div>

            </form>
            <!--  نهاية الفورم -->


        </div>



        <!--  عوده      -->
        <div class="row pb-5">
            <div class="input-group pt-3 d-flex justify-content-center">
                <a href="{{URL::to('teacher')}}" class="btn color-white c-bg-f">عوده</a>

            </div>
        </div>
    </div>

</section>





@include('Teacher.Layouts.footer')
