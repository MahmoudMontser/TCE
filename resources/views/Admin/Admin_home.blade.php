@include('Admin.Layouts.header')



<section id="home">
    <div class="container home-carousel">
        <div class="owl-carousel my-auto mx-auto">
            <div class="item d-flex flex-column p-5 text-center">
                <h6 class="pb-2">استعلام عن النتائج </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-search-database-80.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('admin/results/search')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>


            <div class="item d-flex flex-column p-5 text-center">
                <h6 class="pb-2">متدرب </h6>
                <img src="{{URL::to('/')}}/Assets/Img/trainee.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('/admin/students')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>

            <div class="item d-flex flex-column p-5 text-center">
                <h6 class="pb-2">مدرب</h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-teacher-48.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('/admin/teachers')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>

            <div class="item d-flex flex-column p-5 text-center">
                <h6 class="pb-2">شعب </h6>
                <img src="{{URL::to('/')}}/Assets/Img/Image%202.png" class="mx-auto" alt="" style="width: 70px;">
                <a href="{{URL::to('/admin/departments')}}" class="btn c-bg-f color-white m-t-10">اضغط هنا</a>
            </div>

        </div>
    </div>


</section>
@include('Admin.Layouts.footer')

