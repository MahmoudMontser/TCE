@include('Student.Layouts.header')




<section id="home">
    <div class="container">
        <div class="mx-auto row mt-5">
            <div class="col-md-3 col-10 d-flex flex-column p-5 mt-2 text-center mx-auto trainer-home-item">
                <h6 class="pb-2">استعلام نتائج الاختبار </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-search-database-80.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('student/results/search')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>

            <div class="col-md-3 col-10 d-flex flex-column p-5 mt-2 text-center mx-auto trainer-home-item">
                <h6 class="pb-2">الاختبار</h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-exam-80.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('student/exam/forward')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>

        </div>
    </div>


</section>


@include('Student.Layouts.footer')
