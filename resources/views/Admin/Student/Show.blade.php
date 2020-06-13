@include('Admin.Layouts.header')
<section id="add-new">
    <div class="container">
        <h4 class="h-header mx-auto pt-5"> بيانات متدرب </h4>
        <div class="row">
            <form action="" class="col-9 col-md-6 mx-auto pb-5">
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="pre">الاسم كامل</span>
                    </div>
                    <input type="text" class="form-control text-center" id="name" value="{{$student->name}}" disabled>

                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="pre">الرقم الاكاديمي</span>
                    </div>
                    <input type="text" class="form-control text-center" id="work-num"  value="{{$student->job_id}}" disabled>

                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="pre">رقم الهوية الوطنيه</span>
                    </div>
                    <input type="text" class="form-control text-center" id="id-num" value="{{$student->national_id}}" disabled>
                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="pre">رقم الجوال</span>
                    </div>
                    <input type="tel" class="form-control text-center" id="tel" value="{{$student->phone}}" disabled>

                </div>
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="email-pre">البريد الاكتروني</span>
                    </div>
                    <input type="email" class="form-control text-center" id="email" value="{{$student->email}}" disabled>

                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="user-name-pre">اسم المستخدم</span>
                    </div>
                    <input type="text" class="form-control text-center" id="user-name" value="{{$student->user_name}}" disabled>

                </div>

                <div class="input-group pt-3 d-flex justify-content-center tools">
                    <a href="" class="pr-4">
                        <span class="download">
                            <i class="fas fa-file-download fa-3x"></i>
                        </span>
                    </a>
                    <a href="{{ URL::to('admin/students/'.$student->id.'/edit') }}" class="pr-4">
                        <span class="edit">
                            <i class="fas fa-pencil-alt fa-3x"></i>
                        </span>
                    </a>
                    <a href="{{URL::to('admin/students/'.$student->id.'/delete')}}" style="color: #dc3545;" class="pr-4">
                        <span class="delete">
                            <i class="far fa-times-circle fa-3x"></i>
                        </span>
                    </a>


                </div>

                <div class="input-group pt-5 d-flex justify-content-center">
                    <a href="{{URL::to('/admin/students')}}" class="btn color-white c-bg-f">عوده</a>
                </div>



            </form>

        </div>



    </div>

</section>




@include('Admin.Layouts.footer')
