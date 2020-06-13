@include('Teacher.Layouts.header')
<section id="home">
    <div class="container pt-3">
        <h4 class="h-header mx-auto pt-2">اضافة سؤال </h4>
        <div class="row">
            <form action="{{URL::to('teacher/question/'.$question->id.'/edit/MCQ')}}" method="post" enctype="application/x-www-form-urlencoded" class="col-12 col-md-7 mx-auto pb-5 row">

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




                <!--زر حفظ-->
                <div class="input-group pt-2 d-flex justify-content-center">
                    <div class="input-group pt-4 d-flex justify-content-center">
                        <button  type="submit" class="btn color-white c-bg-f">حفظ</button>
                    </div>
                </div>
            </form>
                @if(isset($question))
                    <div class="col-12 row">

                        <div class="answer-header pt-4 col-12">
                            <span class="d-block">الخيارات:</span>
                        </div>



                        <div class="answer mx-auto text-center col-12 pt-3 pb-5">






                            @if($question->Items->count()>0)
                                @foreach($question->Items as $item)
                                <label class="radio-inline pt-3 true-false-answer row d-flex justify-content-end" for="multi-choice-item">
                                    <form action="{{URL::to('teacher/item/'.$item->id.'/edit/MCQ')}}" method="post" class="col-12 col-md-9 row" enctype="application/x-www-form-urlencoded" >

                                        {{csrf_field()}}
                                        <button type="submit" class="text-center c-first btn btn-sm" class="col-1">


                                            <i class="fas fa-pen fa-2x"></i>

                                        </button>
                                        <a href="{{URL::to('teacher/item/'.$item->id.'/delete/MCQ')}}" class="col-1">
                                <span class="text-center" style="color: #dc3545;">
                                    <i class="far fa-times-circle fa-2x"></i>
                                </span>
                                        </a>
                                        <input type="text"  value="{{$item->title}}" class="col-8 @if($errors->has('item_title'))  is-invalid @endif" name="item_title"  id="item_title"/>



                                        <input type="checkbox" @if($item->right_answer =='1') checked   @endif name="is_right"  class="col-1 form-control">

                                        @if($errors->has('item_title'))
                                            <div class="col-sm-3">
                                                <small id="passwordHelp" class="text-danger">
                                                    {{$errors->first('item_title')}}
                                                </small>
                                            </div>
                                        @endif

                                    </form>
                                </label>
                                @endforeach
                            @endif


                                <label class="radio-inline pt-3 true-false-answer row d-flex justify-content-end" for="multi-choice-item">

                                    <form action="{{URL::to('teacher/question/'.$question->id.'/add/item/MCQ')}}" class="col-12 col-md-9 row" method="post"  enctype="application/x-www-form-urlencoded" >

                                        {{csrf_field()}}

                                    <button type="submit"  href="" class="col-2 btn btn-sm">
                                <span class="text-center c-first">

                                    <i class="fas fa-plus-circle fa-2x"></i>
                                </span>
                                    </button>

                                    <input type="text"  value="{{old('item_title')}}" class="col-8 @if($errors->has('item_title'))  is-invalid @endif" name="item_title"  id="item_title"/>



                                    <input type="checkbox"  name="is_right"  class="col-1 form-control">

                                    @if($errors->has('item_title'))
                                        <div class="col-sm-3">
                                            <small id="passwordHelp" class="text-danger">
                                                {{$errors->first('item_title')}}
                                            </small>
                                        </div>
                                    @endif


                                    </form>
                                </label>


                        </div>



                    </div>



            @endif




                <!--زر عوده-->
            <div class="row pb-5">
                <div class="input-group pt-3 d-flex justify-content-center">
                    <a href="{{URL::to('teacher/exam/'.$question->exam_id.'/create/question')}}" class="btn color-white c-bg-f">عوده</a>

                </div>
            </div>



        </div>



    </div>

</section>


@include('Teacher.Layouts.footer')
