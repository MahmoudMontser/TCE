@include('Admin.Layouts.header')
<section id="depart-page">
    <div class="container pt-5">
        <h4 class="h-header mx-auto pt-5">استعراض بيانات شعبه </h4>
        <div class="row">
            <form action="{{URL::to('/admin/departments/show/search')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-6 mx-auto pb-5">
                {{csrf_field()}}                <div class="input-group pt-3">
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

                <div class="input-group pt-5 d-flex justify-content-center">
                    <a href="{{URL::to('/admin/departments')}}" class="btn color-white c-bg-f">عوده</a>
                </div>



            </form>

        </div>



    </div>

</section>
@include('Admin.Layouts.footer')
