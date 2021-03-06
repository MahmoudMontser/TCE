@include('Teacher.Layouts.header')



<section id="depart-page">
    <div class="container pt-5">
        <h4 class="h-header mx-auto pt-5">ادخل رقم الشعبه </h4>
        <div class="row">
            <form action="{{URL::to('teacher/create/exam/department/search')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-7 mx-auto pb-5">
                {{csrf_field()}}
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
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
                <div class="input-group pt-4 d-flex justify-content-center">
                    <button  type="submit" class="btn color-white c-bg-f">بحث</button>
                </div>

                <div class="row pb-5">
                    <div class="input-group pt-3 d-flex justify-content-center">
                        <a href="{{URL::to('teacher')}}" class="btn color-white c-bg-f">عوده</a>

                    </div>
                </div>



            </form>

        </div>



    </div>

</section>

@include('Teacher.Layouts.footer')
