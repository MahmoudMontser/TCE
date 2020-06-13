@include('Student.Layouts.header')


<form action="{{URL::to('student/exam/'.$exam->id.'/submit/answer')}}" method="post" enctype="application/x-www-form-urlencoded">
    {{csrf_field()}}

    <section id="home">
    <div class="container pt-3 pb-5">
        <h4 class="h-header mx-auto">الاختبار </h4>
        <!--وقت الاختبار-->
        <div class="row pt-2 text-center">
            <div class="col-11 col-md-6 question-time pt-2 text-center mx-auto">
                <h6>الوقت المتبقي للاجابه <span id="countdowntimer" class="pl-4"><span id="exam-time"><span></span></h6>

            </div>
        </div>

        <!--نهايه وقت الاختبار-->


        <!--        بدايه سكشن السؤال-->




        <?php
        $x=1;
        ?>
        @foreach($exam->Questions as $question)
            @if($question->type =='MCQ')


                <div class="row pt-2">
                    <div class="col-12 col-md-8 row question m-1 mx-auto">
                        <!--زر السؤال الاول وحفظ الاجابه-->
                        <div class="col-12 save-or-delete row pt-4 px-5 mx-auto">
                            <div class="d-flex justify-content-start align-items-center question-num col-8">
                                <h6 class=""> السؤال {{$x}}</h6>
                            </div>

                        </div>
                        <!--نهاية زر السؤال الاول وحفظ الاجابه-->
                        <!--السؤال و الاختيارات-->
                        <div class="col-12 question-body d-flex flex-column pt-4 pl-5">
                            <p>{{$question->question}}</p>
                            <div class="answer pb-2">


                                @foreach($question->Items as $item)
                                <label class="radio-inline true-false-answer pt-3">
                                    <input type="radio" value="{{$item->id}}" name="answers[MCQ][{{$question->id}}]">
                                    <span>
                                    {{$item->title}}
                                   </span>
                                </label>
                                    @endforeach

                            </div>

                        </div>
                        <!--نهاية السؤال و الاختيارات-->



                    </div>

                </div>

            @elseif($question->type =='Link')


                <div class="row pt-2">
                    <div class="col-12 col-md-8 row question m-1 mx-auto">
                        <!--زر السؤال الاول وحفظ الاجابه-->
                        <div class="col-12 save-or-delete row pt-4 px-5 mx-auto">
                            <div class="d-flex justify-content-start align-items-center question-num col-8">
                                <h6 class=""> السؤال {{$x}}</h6>
                            </div>


                        </div>
                        <!--نهاية زر السؤال الاول وحفظ الاجابه-->
                        <!--السؤال و الاختيارات-->
                        <div class="col-12 question-body d-flex flex-column pt-4 pl-5">
                            <p>{{$question->question}}</p>
                            <div class="question-img text-center pt-2">
                                @if($question->image!='')
                                <img id="blah"  class="@if($errors->has('image'))  is-invalid @endif" src="{{asset('storage/app/Images/Question/Images/' . $question->id . '/'.$question->image)}}" alt="user img" style="height: 60px;width: 60px"/>

                                    @endif
                            </div>
                            <div class="linked-tables row">
                                <div class="first-table col-6">
                                    <table class="table text-center fz-12">
                                        <thead>
                                        <tr>
                                            <th scope="col">العمود الاول</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($question->Items->where('type','Link2') as $item)
                                            <tr>

                                                <td>{{$item->title}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="second-table col-6">
                                    <table class="table text-center fz-12">
                                        <thead>
                                        <tr>
                                            <th scope="col">العمود الثاني</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($question->Items->where('type','Link1') as $item)
                                            <tr>

                                                <td>{{$item->title}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="text-center pt-5 pb-5 row fz-12">

                                @foreach($question->Items->where('type','Link2') as $item)
                                    <label class="radio-inline pt-3 col-12 true-false-answer row d-flex justify-content-end" for="multi-choice-item">
                                        <input type="text" class="form-control text-center col-7" disabled value="{{$item->title}}">

                                        <select class="form-control fz-12 col-4" name="answers[link][{{$question->id}}][{{$item->id}}]" id="type">
                                            <option value="">اختر الاجابة المناسبة</option>
                                            @foreach($question->Items->where('type','Link1') as $item)
                                                <option value="{{$item->id}}" @if(old('right_item')==$item->id) selected @endif>{{$item->title}}</option>

                                            @endforeach

                                        </select>


                                    </label>

                                @endforeach

                            </div>

                        </div>
                        <!--نهاية السؤال و الاختيارات-->


                    </div>

                </div>


        @else

                <div class="row pt-2">
                    <div class="col-12 col-md-8 row question m-1 mx-auto">
                        <!--زر السؤال الاول وحفظ الاجابه-->
                        <div class="col-12 save-or-delete row pt-4 px-5 mx-auto">
                            <div class="d-flex justify-content-start align-items-center question-num col-8">
                                <h6 class=""> السؤال {{$x}}</h6>
                            </div>

                        </div>
                        <!--نهاية زر السؤال الاول وحفظ الاجابه-->
                        <!--السؤال و الاختيارات-->
                        <div class="col-12 question-body d-flex flex-column pt-4 pl-5">
                            <p>{{$question->question}}</p>
                            <div class="answer pb-2">

                                <label class="radio-inline true-false-answer pt-3">
                                    <input type="radio" value="true" name="answers[TF][{{$question->id}}]">
                                    <span>
                                    صح
                                </span>
                                </label>

                                <label class="radio-inline true-false-answer pt-3">
                                    <input type="radio" value="false" name="answers[TF][{{$question->id}}]">
                                    <span>
                                    خطأ
                                   </span>
                                </label>



                            </div>

                        </div>
                        <!--نهاية السؤال و الاختيارات-->


                    </div>

                </div>

        @endif
        <?php
        $x++;
        ?>
    @endforeach



        <!--نهاية سكشن السؤال-->


        <!--عودة-->
        <div class="input-group pt-5 d-flex justify-content-center">
            <button type="submit" class="btn color-white c-bg-f">حفظ وارسال</button>
        </div>

    </div>
</section>
    <?php
    $hours=round(\Carbon\Carbon::now()->diffInMinutes(\Carbon\Carbon::parse($exam->end_time))/60);
    $minutes=\Carbon\Carbon::now()->diffInMinutes(\Carbon\Carbon::parse($exam->end_time));
    while ($minutes > 60) :
        $minutes-=60;
    endwhile;

    ?>


</form>
@include('Student.Layouts.footer')


<script>
    $(function(){
        $("#exam-time").countdowntimer({
            hours: {{$hours}},
            minutes: {{$minutes}},

        })
    })
</script>
