@include('Student.Layouts.header')

<section id="home">
    <div class="container pt-5">
        <h4 class="h-header mx-auto pb-5">تقديم اختبار</h4>
        <div class="row pt-3">
            <div class="col-9 col-md-7 mx-auto">
                <table class="table c-first">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">رقم الشعبه</th>
                        <th scope="col">اسم الماده</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        <td>{{$department->department_number}}</td>
                        <td>{{$department->course_name}}</td>
                    </tr>


                    </tbody>
                </table>

            </div>
        </div>
        <!-- التالي   -->
        <div class="row">
            <div class="input-group pt-3 d-flex justify-content-center">
                <a href="{{URL::to('student/exam/start/'.$department->id)}}" class="btn color-white c-bg-f">التالي</a>

            </div>
        </div>
        <!--  عوده      -->
        <div class="row pb-5">
            <div class="input-group pt-3 d-flex justify-content-center">
                <a href="{{URL::to('student')}}" class="btn color-white c-bg-f">عوده</a>

            </div>
        </div>



    </div>

</section>
@include('Student.Layouts.footer')
