@include('Student.Layouts.header')



<section id="depart-page">
    <div class="container pt-3">
        <h4 class="h-header mx-auto pt-5">استعلام نتائج الاختبار </h4>

        <!-- الشعبه -->
        <div class="row pt-4">
            <form action="" class="col-9 col-md-7 mx-auto pb-2">

                <div class="input-group pt-3">
                    <div class="input-group-prepend ">
                        <span class="input-group-text c-bg-f color-white fz-14" id="depart-num-pre">رقم الشعبه</span>
                    </div>
                    <input type="search" class="form-control text-center" id="depart-num">

                </div>
                <div class="input-group pt-3 d-flex justify-content-center">
                    <button  type="submit" class="btn color-white c-bg-f">استعلام</button>
                </div>

            </form>
            <!--                جدول النتائج -->
            <div class="col-9 col-md-7 mx-auto">
                <table class="table c-first">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">الدرجه</th>
                        <th scope="col">الماده</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        <td>10</td>
                        <td>فيزياء</td>
                    </tr>
                    <tr class="text-center">
                        <td>9</td>
                        <td>رياضيات</td>
                    </tr>

                    </tbody>
                </table>

            </div>


            <!-- نهاية جدول النتائج -->

        </div>



        <!--  عوده      -->
        <div class="row pb-5">
            <div class="input-group pt-3 d-flex justify-content-center">
                <a href="trainee-home.php" class="btn color-white c-bg-f">عوده</a>

            </div>
        </div>
    </div>

</section>

@include('Student.Layouts.footer')
