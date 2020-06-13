@include('Admin.Layouts.header')
<section id="add-new">

    <div class="container">
        <h4 class="h-header mx-auto pt-5">تسجيل بيانات متدرب جديد </h4>
        <div class="row">
            <form action="{{URL::to('/admin/students')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-6 mx-auto pb-5">
                    {{csrf_field()}}
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14  @if($errors->has('name')) text-danger @endif" id="pre">الاسم كامل</span>
                    </div>
                    <input type="text"  value="{{old('name')}}" class="form-control text-center @if($errors->has('name'))  is-invalid @endif" name="name"  id="inputName"/>
                    @if($errors->has('name'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('name')}}
                            </small>
                        </div>
                    @endif

                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('job_id')) text-danger @endif" id="pre">الرقم الاكاديمي</span>
                    </div>
                    <input type="text"  value="{{old('job_id')}}" class="form-control text-center @if($errors->has('job_id'))  is-invalid @endif" name="job_id"  id="job_id"/>
                    @if($errors->has('job_id'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('job_id')}}
                            </small>
                        </div>
                    @endif
                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('national_id')) text-danger @endif" id="pre">رقم الهوية الوطنيه</span>
                    </div>
                    <input type="text"  value="{{old('national_id')}}" class="form-control text-center @if($errors->has('national_id'))  is-invalid @endif" name="national_id"  id="national_id"/>
                    @if($errors->has('national_id'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('national_id')}}
                            </small>
                        </div>
                    @endif                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('phone')) text-danger @endif" id="pre">رقم الجوال</span>
                    </div>
                    <input type="tel" value="{{old('phone')}}" class="form-control text-center @if($errors->has('phone'))  is-invalid @endif" name="phone" id="inputTel">
                    @if($errors->has('phone'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('phone')}}
                            </small>
                        </div>
                    @endif
                </div>
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('email')) text-danger @endif" id="email-pre">البريد الاكتروني</span>
                    </div>
                    <input type="email"  value="{{old('email')}}" class="form-control text-center @if($errors->has('email'))  is-invalid @endif" name="email" id="inputEmail">
                    @if($errors->has('email'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('email')}}
                            </small>
                        </div>
                    @endif
                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('user_name')) text-danger @endif" id="user-name-pre">اسم المستخدم</span>
                    </div>
                    <input type="text"  value="{{old('user_name')}}" class="form-control text-center @if($errors->has('user_name'))  is-invalid @endif" name="user_name"  id="user_name"/>
                    @if($errors->has('user_name'))
                        <div class="col-sm-3">
                            <small id="user_name_error" class="text-danger">
                                {{$errors->first('user_name')}}
                            </small>
                        </div>
                    @endif
                </div>

                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('password')) text-danger @endif" id="pass-pre">كلمة المرور</span>
                    </div>
                    <input type="password" value="{{old('password')}}" class="form-control @if($errors->has('password'))  is-invalid @endif" name="password"  id="password">
                    @if($errors->has('password'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('password')}}
                            </small>
                        </div>
                    @endif                </div>
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14  @if($errors->has('password_confirmation')) text-danger @endif" id="pass-pre">تأكيد كلمة المرور</span>
                    </div>
                    <input type="password" value="{{old('password_confirmation')}}" class="form-control @if($errors->has('password_confirmation'))  is-invalid @endif" name="password_confirmation" id="password">
                    @if($errors->has('password_confirmation'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('password_confirmation')}}
                            </small>
                        </div>
                    @endif
                </div>

                <div class="input-group pt-3 d-flex justify-content-center">
                    <input type="submit" class="btn color-white c-bg-f" value="حفظ">
                </div>

                <div class="input-group pt-5 d-flex justify-content-center">
                    <a href="{{URL::to('/admin/students')}}" class="btn color-white c-bg-f">عوده</a>
                </div>



            </form>

        </div>



    </div>

</section>
@include('Admin.Layouts.footer')
