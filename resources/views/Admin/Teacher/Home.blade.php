@include('Admin.Layouts.header')

<section id="depart-page">

    <div class="container pb-5">
        <!-- عنوان الصفحه-->
        <div class="row pb-4">
            <h4 class="h-header mx-auto pt-5">اعدادات مدرب </h4>
        </div>
        <!-- نهايه عنوان الصفحه-->

        <div class="row pb-2">
            <!-- سكشن تسجيل بيانات متدرب جديد-->
            <div class="col-5 col-md-4 mx-auto text-center depart-item d-flex p-5 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <!-- عنوان سكشن تسجيل بيانات متدرب جديد-->
                <h6 class="pb-2">إضافة بيانات مدرب جديد </h6>
                <!--صورة سكشن تسجيل بيانات متدرب جديد-->
                <img src="{{URL::to('/')}}/Assets/Img/icons8-teacher-48.png" alt="">
                <!--زر اضغط في سكشن تسجيل بيانات متدرب جديد-->
                <a href="{{URL::to('admin/teachers/create')}}" class="btn c-bg-f color-white m-t-15">اضغط هنا</a>
            </div>
            <!--  نهاية سكشن تسجيل بيانات متدرب جديد-->

            <!--  بداية سكشن تعديل بيانات متدرب -->
            <div class="col-5 col-md-4 mx-auto depart-item text-center d-flex p-5 flex-column justify-content-center
             align-items-center" style="background-image: url('{{URL::to('/')}}/Assets/Img/depart-item.png')">
                <!--  عنوان سكشن تعديل بيانات متدرب -->
                <h6 class="pb-2">تعديل بيانات مدرب </h6>
                <!--  صورة سكشن تعديل بيانات متدرب -->
                <img src="{{URL::to('/')}}/Assets/Img/icons8-teacher-48.png" alt="">
                <!-- زر اضغط هنا في سكشن تعديل بيانات متدرب -->
                <a href="{{URL::to('/admin/teacher/search')}}" class="btn c-bg-f color-white m-t-15">اضغط هنا</a>
            </div>
            <!--  نهاية سكشن تعديل بيانات متدرب -->


        </div>

        <!--        عوده -->

        <div class="input-group pt-5 d-flex justify-content-center">
            <a href="{{URL::to('/admin')}}" class="btn color-white c-bg-f">عوده</a>
        </div>

    </div>

</section>
@include('Admin.Layouts.footer')
