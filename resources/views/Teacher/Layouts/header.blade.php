<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/animate.min.css" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/bootstrapRtl.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/style.css" type="text/css">


    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/OwlCarousel2/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/OwlCarousel2/owl.theme.default.min.css" />

    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/owl-carousel/owl.transitions.css" />


    <link href="https://fonts.googleapis.com/css?family=Lalezar&display=swap" rel="stylesheet">
    <title>Header</title>

</head>




<body dir="rtl">



<section id="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 nav-open">
                <i class="fas fa-align-right fa-2x color-FFBD59"></i>
            </div>
            <div class="col-4 text-center web-name">
                <h3>TC.Exam</h3>
            </div>
            @if(!\Illuminate\Support\Facades\Auth::guard('teacher')->guest())
                <div class="col-4 top-header-user">
                    <a href="{{URL::to('/teacher/logout')}}">
                        <i class="fas fa-sign-out-alt fa-2x color-FFBD59">
                        </i>
                    </a>
                </div>
            @endif
        </div>
    </div>


</section>









@if(Session::get('PopSuccess') != '')


    <!--success div-->
    <div class="col-md-12 m-2 col-sm-12 mx-auto btn-success h-30-px row align-items-center done-success">

        <p class="m-auto col-11 text-center">{{ Session::get("PopSuccess") }}</p>
        <div id="close-done-success" class="col-1">
            <i class="fa fa-times-circle"></i>
        </div>

    </div>
    <!--/// success div-->

    {{ Session::forget('PopSuccess') }}

@endif
@if(Session::get('error') != '')
    <!--success div-->
    <div class="col-md-12 m-2 col-sm-12 mx-auto btn-danger h-30-px row align-items-center done-success">

        <p class="m-auto col-11 text-center">{{ Session::get("error") }} </p>
        <div id="close-done-success" class="col-1">
            <i class="fa fa-times-circle"></i>
        </div>

    </div>
    <!--/// success div-->

{{ Session::forget('error') }}

@endif







