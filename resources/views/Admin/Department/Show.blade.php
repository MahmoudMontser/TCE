@include('Admin.Layouts.header')
<section id="depart-page">
    <div class="container">
        <h4 class="h-header mx-auto pt-5">بيانات الشعبه </h4>
        <div class="row">
            <form action="" class="col-9 col-md-6 mx-auto pb-5">
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="depart-num-pre">رقم الشعبه</span>
                    </div>
                    <input type="text" class="form-control text-center" id="" value="{{$department->department_number}}" readonly>

                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="course-name-pre">اسم الماده</span>
                    </div>
                    <input type="text" class="form-control text-center" id="course-name" value="{{$department->course_name}}" readonly>

                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="depart-teacher-pre">المدرب</span>
                    </div>
                    <input type="text" class="form-control text-center" id="depart-teacher" value="{{($department->Teacher)? $department->Teacher->name:'لا يوجد'}}" readonly>

                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="trainee-num-pre">عدد المتدربين</span>
                    </div>
                    <input type="text" class="form-control text-center" id="trainee-num" value="{{($department->Students)? $department->Students->count():'0'}}" readonly>

                </div>

                <div class="input-group pt-5 d-flex justify-content-center">
                    <a href="{{URL::to('/admin/departments')}}" class="btn color-white c-bg-f">عوده</a>
                </div>



            </form>

        </div>



    </div>

</section>

@include('Admin.Layouts.footer')
