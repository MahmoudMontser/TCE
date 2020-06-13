@include('Admin.Layouts.header')




<section id="depart-page">
    <div class="container pt-3">
        <h4 class="h-header mx-auto pt-5">استعلام </h4>

        <!-- الشعبه -->
        <div class="row pt-4">
            <form action="{{URL::to('admin/results/search')}}" method="post" enctype="multipart/form-data" class="col-9 col-md-7 mx-auto pb-5">
                {{csrf_field()}}
                <div class="input-group pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text c-bg-f color-white fz-14 @if($errors->has('department_number')) text-danger @endif" id="depart-num-pre">رقم الشعبه</span>
                    </div>
                    <input type="text"  value="{{old('department_number')}}" class="form-control text-center @if($errors->has('department_number'))  is-invalid @endif" name="department_number"  id="department_number"/>
                    @if($errors->has('department_number'))
                        <div class="col-sm-3">
                            <small id="passwordHelp" class="text-danger">
                                {{$errors->first('department_number')}}
                            </small>
                        </div>
                    @endif
                </div>


                <div class="input-group pt-4 d-flex justify-content-center">
                    <button  type="submit" class="btn color-white c-bg-f">بحث</button>
                </div>
            </form>



            @if(isset($results))
            <div class="col-9 col-md-7 mx-auto">
                <table class="table c-first">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">الدرجه</th>
                        <th scope="col">اسم المتدرب</th>
                        <th scope="col">رقم الامتحان</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                    <tr class="text-center">
                        <td>{{$result->result}}</td>
                        <td>{{\App\Student::find($result->student_id)->name}}<i class="fas fa-user ml-1"></i></td>
                        <td>{{\App\Exam::find($result->exam_id)->exam_number}}</td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        @endif

        <!--  عوده      -->
    </div>
    <div class="row pb-5">
        <div class="input-group pt-3 d-flex justify-content-center">
            <a href="{{URL::to('admin')}}" class="btn color-white c-bg-f">عوده</a>

        </div>
    </div>


    </div>

</section>




@include('Admin.Layouts.footer')
