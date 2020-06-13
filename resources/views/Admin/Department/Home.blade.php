@include('Admin.Layouts.header')



<section id="all-depart">

    <div class="container pb-5">
        <div class="row">
            <h4 class="h-header mx-auto pt-5">الشعب </h4>

        </div>
        <div class="row pb-2">
            <div class="col-5 col-md-3 mx-auto text-center depart-item d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2">اضافة شعبه جديده </h6>
                <img src="{{URL::to('/')}}/Assets/Img/Image%202.png" alt="">
                <a href="{{URL::to('/admin/departments/create')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>

            <div class="col-5 col-md-3 mx-auto depart-item text-center d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2">اضافة متدرب لشعبه </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-read-online-64.png" alt="">
                <a href="{{URL::to('admin/departments/add/student')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>

            <div class="col-5 col-md-3 mx-auto depart-item text-center d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2">اسناد شعبه لمدرب </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-teacher-48.png" alt="">
                <a href="{{URL::to('admin/departments/add/teacher')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>
            <div class="col-5 col-md-3 mx-auto depart-item text-center d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2">تعديل بيانات شعبه </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-settings-64.png" alt="">
                <a href="{{URL::to('admin/departments/edit/search')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>


        </div>
        <!--        -->
        <div class="row pb-2">
            <div class="col-5 col-md-3 mx-auto text-center depart-item d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2">حذف شعبه </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-delete-file-80.png" alt="">
                <a href="{{URL::to('/admin/departments/delete/search')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>

            <div class="col-5 col-md-3 mx-auto depart-item text-center d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2">حذف متدرب من شعبه  </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-denied-64.png" alt="">
                <a href="{{URL::to('/admin/departments/remove/student')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>

            <div class="col-5 col-md-3 mx-auto depart-item text-center d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2"> الغاء اسناد شعبه لمدرب </h6>
                <img src="{{URL::to('/')}}/Assets/Img/icons8-denied-50.png" alt="">
                <a href="{{URL::to('/admin/departments/remove_teacher/search')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>
            <div class="col-5 col-md-3 mx-auto depart-item text-center d-flex p-4 m-2 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <h6 class="pb-2">استعراض بيانات الشعبه </h6>
                <img src="{{URL::to('/')}}/Assets/Img/Image%202.png" alt="">
                <a href="{{URL::to('/admin/departments/show/search')}}" class="btn c-bg-f color-white m-t-5">اضغط هنا</a>
            </div>


        </div>
        <!--        عوده -->

        <div class="input-group pt-5 d-flex justify-content-center">
            <a href="{{URL::to('/admin')}}" class="btn color-white c-bg-f">عوده</a>
        </div>

    </div>

</section>

@include('Admin.Layouts.footer')
