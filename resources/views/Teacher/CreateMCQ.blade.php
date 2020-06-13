@include('Teacher.Layouts.header')
<section id="home">
    <div class="container pt-3">
        <h4 class="h-header mx-auto pt-2">اضافة سؤال </h4>
        <div class="row">
            <form action="{{URL::to('teacher/exam/'.$exam->id.'/create/question/MCQ')}}" method="post" enctype="application/x-www-form-urlencoded" class="col-12 col-md-7 mx-auto pb-5 row">
       {{csrf_field()}}
                <div class="pt-3 col-9">

                    <label for="true-false-question"> السؤال :</label>



                    <input type="text"  value="{{old('title')}}" class="form-control text-center @if($errors->has('title'))  is-invalid @endif" name="title"  id="title"/>
                    @if($errors->has('title'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('title')}}
                            </small>
                        </div>
                    @endif

                </div>

                <div class="pt-3 col-3">

                    <label for="true-false-degree"> الدرجه :</label>
                    <input type="text"  value="{{old('mark')}}" class="form-control text-center @if($errors->has('mark'))  is-invalid @endif" name="mark"  id="mark"/>
                    @if($errors->has('mark'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('mark')}}
                            </small>
                        </div>
                    @endif
                </div>

                <!--زر حفظ-->
                <div class="input-group pt-2 d-flex justify-content-center">
                    <div class="input-group pt-4 d-flex justify-content-center">
                        <button  type="submit" class="btn color-white c-bg-f">التالي</button>
                    </div>
                </div>

                <!--زر عوده-->
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
