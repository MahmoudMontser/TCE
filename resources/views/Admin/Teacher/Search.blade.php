
@include('Admin.Layouts.header')

<section id="depart-page">
    <div class="container pt-5">
        <div class="row p-t-100">
            <form action="{{URL::to('/admin/teacher/search')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-6 mx-auto pb-5">
                {{csrf_field()}}
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('job_id')) text-danger @endif " id="id-trainee-pre">الرقم الوظيفي</span>
                    </div>
                    <input type="text"  value="{{old('job_id')}}" class="form-control text-center @if($errors->has('job_id'))  is-invalid @endif" name="job_id"  id="job_id"/>
                    @if($errors->has('job_id'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('job_id')}}
                            </small>
                        </div>
                    @endif

                </div>
                <div class="input-group pt-4 d-flex justify-content-center">
                    <button  type="submit" class="btn color-white c-bg-f">بحث</button>
                </div>

                <div class="input-group pt-5 d-flex justify-content-center">
                    <a href="{{URL::to('/admin/teachers')}}" class="btn color-white c-bg-f">عوده</a>
                </div>



            </form>

        </div>



    </div>

</section>




@include('Admin.Layouts.footer')



