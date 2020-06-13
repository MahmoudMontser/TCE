@include('Admin.Layouts.header')



<section id="depart-page">
    <div class="container pt-5">
        <!--        عنوان الصفحه-->
        <h4 class="h-header mx-auto pt-5">اضافة شعبه جديده </h4>
        <!--      نهايه  عنوان الصفحه-->

        <div class="row">
            <form action="{{URL::to('/admin/departments')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-6 mx-auto pb-5">
            {{csrf_field()}}
                <!--                حقل ادخال رقم الشعبه-->
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('department_number')) text-danger @endif" id="depart-num-pre">رقم الشعبه</span>
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
                <!--   نهاية حقل ادخال رقم الشعبه-->


                <!--  حقل ادخال اسم الماده-->
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('course_name')) text-danger @endif" id="pre">اسم المادة</span>
                    </div>
                    <input type="text"  value="{{old('course_name')}}" class="form-control text-center @if($errors->has('course_name'))  is-invalid @endif" name="course_name"  id="course_name"/>
                    @if($errors->has('course_name'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('course_name')}}
                            </small>
                        </div>
                    @endif

                </div>
                <!--   نهاية حقل ادخال اسم الماده-->


                <!--  زر اضافه-->
                <div class="input-group pt-4 d-flex justify-content-center">
                    <input type="submit" class="btn color-white c-bg-f" value="اضافة">
                </div>

                <!--  زر عوده-->
                <div class="input-group pt-4 d-flex justify-content-center">
                    <a  href="{{URL::to('/admin/departments')}}" class="btn color-white c-bg-f">عوده</a>
                </div>

            </form>

        </div>



    </div>

</section>

@include('Admin.Layouts.footer')
