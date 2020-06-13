@include('Teacher.Layouts.header')




<section id="home">
    <div class="container pt-3">
        <h4 class="h-header mx-auto pt-2">اضافة سؤال </h4>
        <div class="row">
            <form action="{{URL::to('teacher/question/'.$question->id.'/edit/Linked')}}" method="post" enctype="multipart/form-data" class="col-12 col-md-7 mx-auto pb-5 row">

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
                <div class="input-group col-12 col-md-8 pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14" id="pre">تحميل ملف</span>
                    </div>
                    <input type="file" name="image" class="form-control text-center" id="file">
                    @if($question->image!='')
                    <img id="blah"  class="@if($errors->has('image'))  is-invalid @endif" src="{{asset('storage/app/Images/Question/Images/' . $question->id . '/'.$question->image)}}" alt="user img" style="height: 60px;width: 60px"/>

                    @endif
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
                        <button  type="submit" class="btn color-white c-bg-f">حفظ</button>
                    </div>
                </div>



            </form>








            <div class="col-12 row">
                <!--كلمة الاختيارات-->
                <div class="answer-header pt-4 col-12">
                    <span class="d-block">الخيارات:</span>
                </div>
                <!--// كلمة الاختيارات-->

                <!--  صف الاسئله الاول -->
                <div class="answer mx-auto text-center col-12 col-md-7 pt-5 pb-5">

                    <!--      حقل ادخال سؤال بالاختياي    -->
                    <!--      حقل ادخال سؤال بالاختياي                  -->
                    <!--      حقل ادخال سؤال بالاختياي                  -->
                    @foreach($question->Items->where('type','Link2') as $item)
                    <label class="radio-inline pt-3 true-false-answer row d-flex justify-content-end" for="multi-choice-item">

                        <form action="{{URL::to('teacher/item/'.$item->id.'/edit/Linked')}}" method="post" class="col-12 col-md-9 row" enctype="application/x-www-form-urlencoded" >

                            {{csrf_field()}}
                        <a href="{{URL::to('teacher/item/'.$item->id.'/delete/Linked')}}" class="col-1">
                                <span class="text-center" style="color: #dc3545;">
                                    <i class="far fa-times-circle fa-2x"></i>
                                </span>
                        </a>

                        <button type="submit" class="text-center c-first btn btn-sm" class="col-1">


                            <i class="fas fa-pen fa-2x"></i>

                        </button>


                        <input type="text" value="{{$item->title}}" class="form-control text-center col-6 @if($errors->has('Link2_item'))  is-invalid @endif" name="Link2_item">

                        <select    name="right_item" class="form-control @if($errors->has('right_item'))  is-invalid @endif  fz-12 col-3" id="type">
                            <option value="">اختر الاجابة المناسبة</option>
                            @foreach($question->Items->where('type','Link1') as $item1)


                                <option value="{{$item1->id}}" @if($item->right_answer==$item1->id) selected @endif>{{$item1->title}}</option>

                        @endforeach

                        </select>

                        </form>
                    </label>
                    @endforeach
                    <!--      حقل ادخال سؤال بالاختياي                  -->
                    <label class="radio-inline pt-3 true-false-answer row d-flex justify-content-end" for="multi-choice-item">
                        <form action="{{URL::to('teacher/question/'.$question->id.'/add/item/Linked/Link2')}}" class="col-12 col-md-10 row" method="post"  enctype="application/x-www-form-urlencoded" >

                            {{csrf_field()}}
                            <button type="submit"  href="" class="col-2 btn btn-sm">
                                <span class="text-center c-first">

                                    <i class="fas fa-plus-circle fa-2x"></i>
                                </span>
                            </button>

                            <input type="text" value="{{old('Link2_item')}}" class="form-control text-center col-6 @if($errors->has('Link2_item'))  is-invalid @endif" name="Link2_item">

                        <select    name="right_item" class="form-control @if($errors->has('right_item'))  is-invalid @endif  fz-12 col-4" id="type">

                            <option value="">اختر الاجابة المناسبة</option>

                        @foreach($question->Items->where('type','Link1') as $item)

                            <option value="{{$item->id}}" @if(old('right_item')==$item->id) selected @endif>{{$item->title}}</option>

                                @endforeach

                        </select>
                            </form>
                    </label>


                </div>
                <!--نهاية صف الاسئله الاول -->

                <!--  صف الاسئله الثاني -->
                <div class="answer mx-auto text-center col-12 col-md-5 pt-5 pb-5">
                    <!--      حقل ادخال سؤال احد الصفوف    -->

                    @foreach($question->Items->where('type','Link1') as $item)
                    <label class="radio-inline pt-3 true-false-answer row d-flex justify-content-end" for="multi-choice-item">
                        <a href="{{URL::to('teacher/item/'.$item->id.'/delete/Linked')}}" class="col-1">
                                <span class="text-center" style="color: #dc3545;">
                                    <i class="far fa-times-circle fa-2x"></i>
                                </span>
                        </a>
                        <input type="text" class="form-control text-center col-8" value="{{$item->title}}">

                    </label>
                    @endforeach
                    <!--       حقل ادخال سؤال احد الصفوف      -->
                    <label class="radio-inline pt-3 true-false-answer row d-flex justify-content-end" for="multi-choice-item">





                        <form action="{{URL::to('teacher/question/'.$question->id.'/add/item/Linked/Link1')}}" class="col-12 col-md-9 row" method="post"  enctype="application/x-www-form-urlencoded" >

                            {{csrf_field()}}

                            <button type="submit"  href="" class="col-2 btn btn-sm">
                                <span class="text-center c-first">

                                    <i class="fas fa-plus-circle fa-2x"></i>
                                </span>
                            </button>
                            <input type="text" value="{{old('Link1_item')}}" class="form-control text-center col-8 @if($errors->has('Link1_item'))  is-invalid @endif" name="Link1_item">
                        </form>


                    </label>

                </div>
                <!-- نهايه صف الاسئله الثاني -->
            </div>










            <!--زر عوده-->

                <div class="input-group pt-4 d-flex justify-content-center">
                    <a href="{{URL::to('teacher/exam/'.$question->exam_id.'/create/question')}}" class="btn color-white c-bg-f">عوده</a>
                </div>

                <!--نهاية زر عوده-->



        </div>



    </div>

</section>

@include('Teacher.Layouts.footer')
