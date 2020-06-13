@include('Teacher.Layouts.header')
<section id="home">
    <div class="container pt-3">
        <h4 class="h-header mx-auto pt-2">تعديل سؤال </h4>
        <div class="row">
            <form action="{{URL::to('teacher/question/'.$question->id.'/edit/TF')}}" method="post" enctype="application/x-www-form-urlencoded" class="col-12 col-md-7 mx-auto pb-5 row">
                {{csrf_field()}}
                <div class="pt-3 col-9">

                    <label for="true-false-question"> السؤال :</label>



                    <input type="text"  value="{{$question->question}}" class="form-control text-center @if($errors->has('title'))  is-invalid @endif" name="title"  id="title"/>
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
                    <input type="text"  value="{{$question->mark}}" class="form-control text-center @if($errors->has('mark'))  is-invalid @endif" name="mark"  id="mark"/>
                    @if($errors->has('mark'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('mark')}}
                            </small>
                        </div>
                    @endif
                </div>



                <div class="answer-header pt-4">
                    <span class="d-block">الخيارات:</span>
                </div>

                <!--اختاري صح او خطأ-->
                <div class="answer mx-auto text-center pt-5 pb-5">

                    <label class="radio-inline true-false-answer pt-3">
                        <i class="fas fa-check"></i><input value="true"  @if($question->right_answer=='true') CHECKED  @endif type="radio" name="right_answer">
                    </label>

                    <label class="radio-inline true-false-answer pt-3">
                        <i class="fas fa-times"></i><input type="radio" @if($question->right_answer=='false') CHECKED  @endif value="false" name="right_answer">
                    </label>

                </div>
                <!--نهاية اختاري صح او خطأ-->
                <!--زر حفظ-->
                <div class="input-group pt-2 d-flex justify-content-center">
                    <div class="input-group pt-4 d-flex justify-content-center">
                        <button  type="submit" class="btn color-white c-bg-f">التالي</button>
                    </div>
                </div>

                <!--زر عوده-->
                <div class="row pb-5">
                    <div class="input-group pt-3 d-flex justify-content-center">
                        <a href="{{URL::to('teacher/exam/'.$question->exam_id.'/create/question')}}" class="btn color-white c-bg-f">عوده</a>

                    </div>
                </div>

            </form>

        </div>



    </div>

</section>


@include('Teacher.Layouts.footer')
