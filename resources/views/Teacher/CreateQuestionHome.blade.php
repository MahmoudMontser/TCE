@include('Teacher.Layouts.header')




<section id="home">
    <div class="container">
        <h4 class="h-header mx-auto pt-3">اضافة السؤال </h4>
        <h4 class="h-header mx-auto pt-2">اختر نوع السؤال </h4>

        <div class="mx-auto row mt-2">
            <div class="col-md-3 col-10 d-flex flex-column p-5 mt-2 text-center mx-auto trainer-home-item">
                <h6 class="pb-2">اختيار من متعدد </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-multiple-choice-100.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('/teacher/exam/'.$exam->id.'/create/question/MCQ')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>

            <div class="col-md-3 col-10 d-flex flex-column p-5 mt-2 text-center mx-auto trainer-home-item">
                <h6 class="pb-2">صح وخطأ  </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-true-false-24.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('/teacher/exam/'.$exam->id.'/create/question/TF')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>

            <div class="col-md-3 col-10 d-flex flex-column p-5 mt-2 text-center mx-auto trainer-home-item">
                <h6 class="pb-2">وصل</h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-choice-80.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('/teacher/exam/'.$exam->id.'/create/question/Linked')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>
        </div>

        <!--  عوده      -->
        <div class="row pb-5">
            <div class="input-group pt-3 d-flex justify-content-center">
                <a href="{{URL::to('teacher')}}" class="btn color-white c-bg-f">عوده</a>

            </div>
        </div>

    </div>


</section>




@include('Teacher.Layouts.footer')
