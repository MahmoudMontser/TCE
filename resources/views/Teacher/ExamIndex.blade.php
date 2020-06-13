@include('Teacher.Layouts.header')


<section id="home">
    <div class="container pt-3 pb-5">
        <h4 class="h-header mx-auto">الاختبار </h4>
        <!--وقت الاختبار-->
        <div class="row pt-2 text-center">
            <div class="col-11 col-md-6 question-time pt-2 text-center mx-auto row">
                <h6 class="col-7">وقت الاجابه : <span>{{\Carbon\Carbon::parse($exam->end_time)->diffInMinutes(\Carbon\Carbon::parse($exam->start_time))  }} دقيقة</span></h6>
                <div class="col-4 question-tool d-flex flex-column text-center justify-content-center mx-auto">

                    <a href="{{URL::to('teacher/exam/'.$exam->id.'/edit')}}" class="pb-1 fz-12">
                        اضغط للتعديل
                    </a>
                </div>
            </div>
        </div>
        <!--نهايه وقت الاختبار-->


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
                        <div class="col-9 question-body d-flex flex-column pt-2 pl-5">
                            <p>{{$question->question}}</p>
                            <div class="answer pt-2 pb-2">


                                @foreach($question->Items as $item)
                                    <label class="radio-inline true-false-answer pt-3">
                                        <input type="radio" name="answer-item">
                                        <span>
                            {{$item->title}}
                           </span>
                                    </label>
                                @endforeach

                            </div>

                        </div>
                        <!--نهاية السؤال و الاختيارات-->
                        <!--بداية سكشن ادوات التعديل والحذف-->
                        <div class="col-3 question-tool d-flex flex-column text-center my-auto">

                            <a href="{{URL::to('teacher/question/'.$question->id.'/edit/MCQ')}}" class="pt-2">
                        <span class="delete">
                            <i class="fas fa-pencil-alt fa-2x"></i>
                        </span>
                            </a>
                            <a href="{{URL::to('teacher/question/'.$question->id.'/delete')}}" style="color: #dc3545;" class="pt-2">
                        <span class="delete">
                            <i class="far fa-times-circle fa-2x"></i>
                        </span>
                            </a>
                        </div>
                        <!--نهاية سكشن ادوات التعديل والحذف-->

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
                        <div class="col-10 question-body d-flex flex-column pt-2 pl-5">
                            <p>{{$question->question}}</p>

                            <div class="question-img text-center pt-2">

                                @if($question->image!='')
                                    <img src="{{asset('storage/app/Images/Question/Images/' . $question->id . '/'.$question->image)}}" alt="" class="mx-auto">
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


                        </div>
                        <!--نهاية السؤال و الاختيارات-->
                        <!--بداية سكشن ادوات التعديل والحذف-->
                        <div class="col-2 question-tool d-flex flex-column text-center my-auto">

                            <a href="{{URL::to('teacher/question/'.$question->id.'/edit/Linked')}}" class="pt-2">
                                <span class="delete">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </span>
                            </a>
                            <a href="{{URL::to('teacher/question/'.$question->id.'/delete')}}" style="color: #dc3545;" class="pt-2">
                                <span class="delete">
                                    <i class="far fa-times-circle fa-2x"></i>
                                </span>
                            </a>
                        </div>
                        <!--نهاية سكشن ادوات التعديل والحذف-->

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
                        <div class="col-9 question-body d-flex flex-column pt-2 pl-5">
                            <p>{{$question->question}}</p>
                            <div class="answer pt-2 pb-2">


                                <label class="radio-inline true-false-answer pt-3">
                                    <i class="fas fa-check"></i><input value="true"  CHECKED type="radio" name="right_answer">
                                </label>

                                <label class="radio-inline true-false-answer pt-3">
                                    <i class="fas fa-times"></i><input type="radio" value="false" name="right_answer">
                                </label>

                            </div>

                        </div>
                        <!--نهاية السؤال و الاختيارات-->
                        <!--بداية سكشن ادوات التعديل والحذف-->
                        <div class="col-3 question-tool d-flex flex-column text-center my-auto">

                            <a href="{{URL::to('teacher/question/'.$question->id.'/edit/TF')}}" class="pt-2">
                        <span class="delete">
                            <i class="fas fa-pencil-alt fa-2x"></i>
                        </span>
                            </a>
                            <a href="{{URL::to('teacher/question/'.$question->id.'/delete')}}" style="color: #dc3545;" class="pt-2">
                        <span class="delete">
                            <i class="far fa-times-circle fa-2x"></i>
                        </span>
                            </a>
                        </div>
                        <!--نهاية سكشن ادوات التعديل والحذف-->

                    </div>

                </div>

        @endif
        <?php
        $x++;
        ?>
    @endforeach
    <!--        بدايه سكشن السؤال-->

        <!--نهاية سكشن السؤال-->

        <!--        بدايه سكشن السؤال-->


        <!--عودة-->
        <div class="input-group pt-5 d-flex justify-content-center">
            <a href="{{URL::to('teacher/exam/'.$exam->id.'/create/question')}}" class="btn color-white c-bg-f">اضافة سؤال</a>
        </div>
        <div class="row pb-5">
            <div class="input-group pt-3 d-flex justify-content-center">
                <a href="{{URL::to('teacher')}}" class="btn color-white c-bg-f">عوده</a>

            </div>
        </div>

    </div>

</section>




@include('Teacher.Layouts.footer')
