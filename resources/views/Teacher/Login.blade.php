@include('Teacher.Layouts.header')









<section id="login-page" style="background-image: url('{{URL::to('/')}}/Assets/Img/login-bg.png')">
    <div class="container">
        <h4 class="h-header mx-auto">نظام الاختبارات الالكترونية </h4>
        <div class="row">
            <div class="col-sm-7 col-md-4 col-lg-4 mx-auto login-form">
                <h5 class="mx-auto"> تسجيل الدخول</h5>
                <!--                فورم التسيجيل-->
                <div class="row">

                    <form action="{{URL::to('teacher/login')}}" class="row p-t-30 login-form mr-1 ml-1" method="post">
                    {{csrf_field()}}
                    <!--                       error div -->

                        <?php $error_check = Session::get('error');?>
                        @if(!empty($error_check))
                            <div class="col-md-6 m-4 col-sm-10 mx-auto h-30-px row align-items-center justify-content-center login-error">

                                <p class="m-auto col-11">{{Session::get('error')}}</p>
                                <div id="close-error" class="col-1">
                                    <i class="fas fa-times-circle"></i>
                                </div>

                            </div>
                        @endif

                    <div class="form-group col-12">
                        <label for="exampleInputEmail1" class="fw-700">اسم المستخدم</label>
                        <input type="text" class="form-control" value="{{old('user_name')}}" name="user_name" placeholder="اسم المستخدم">
                    </div>

                    <div class="form-group col-12">
                        <label for="exampleInputPassword1">كلمة المرور</label>
                        <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
                    </div>

                    <button  type="submit" class="btn c-bg-f color-FFBD59 col-11 mx-auto">دخول</button>
                    <small class="p-2">هل نسيت كلمة المرور الخاصه بك !</small>
                </form>
                <!--                نهاية فورم التسجيل-->

            </div>
        </div>


    </div>

</section>
@include('Teacher.Layouts.footer')
