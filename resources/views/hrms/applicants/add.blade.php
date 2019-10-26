@extends('hrms.layouts.base')

@section('content')
    <?php 
        $career_count = @$career_count ? $career_count : 0 ; 
        $education_count = @$education_count ? $education_count : 0 ; 
        $skill_count = @$skill_count ? $skill_count : 0 ; 
        $expectation_count = @$expectation_count ? $expectation_count : 0 ; 
    ?>
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard"> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href="/applicants"> Applicants </a>
                    </li>
                    <li class="breadcrumb-current-item"> Add Applicants</li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Add Applicants </span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @if(Session::has('flash_message'))
                                                <div class="alert alert-success">
                                                    {{Session::get('flash_message')}}
                                                </div>
                                            @endif
                                            {!! Form::open(['class' => 'form-horizontal']) !!}
                                            <input type="hidden" value="{!! csrf_token() !!}" id="token">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Name </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="name" class="select2-single form-control" placeholder="Name" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Birthday </label>
                                                <div class="col-md-6">
                                                    <input type="date" name="birthday" id="datepicker1" class="select2-single form-control" placeholder="Birthday" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Address </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="address" id="address" class="select2-single form-control" placeholder="Address" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Gender </label>
                                                <div class="col-md-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="radio" class="" name="gender" id="gender" value="Male"> Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="radio" class="" name="gender" id="gender" value="Female"> Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Marital Status </label>
                                                <div class="col-md-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="radio" class="" name="marital_status" id="marital_status" value="0"> Single
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="radio" class="" name="marital_status" id="marital_status" value="1"> Married
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Religion </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary" name="religion" required>
                                                        <option value="" selected>Religion</option>
                                                        @foreach($religions as $religion)
                                                            <option value="{{$religion}}">{{$religion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Phone </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="phone" id="phone" class="select2-single form-control" placeholder="Phone" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Email </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="email" id="email" class="select2-single form-control" placeholder="Email" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> ID Card Number </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="id_card_no" id="id_card_no" class="select2-single form-control" placeholder="ID Card Number" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> ID Card Address </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="id_card_address" id="id_card_address" class="select2-single form-control" placeholder="ID Card Address" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> NPWP Number </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="npwp_no" id="npwp_no" class="select2-single form-control" placeholder="NPWP Number" required>
                                                </div>
                                            </div>

                                            <div id="careers">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> Careers </label>
                                                    <div class="col-md-2">
                                                        <input type="text" name="career_position[]" id="career_position" class="select2-single form-control" placeholder="Position" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="career_company[]" id="career_company" class="select2-single form-control" placeholder="Company Name" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="career_grade[]" required>
                                                            <option value="" selected>Grade</option>
                                                            @foreach($grades as $grade)
                                                                <option value="{{$grade}}">{{$grade}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 control-label text-left">
                                                        <a href=""><span class="add_career label label-info">
                                                            Add Career
                                                        </span></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="educations">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> Educations </label>
                                                    <div class="col-md-2">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="education_stage[]" required>
                                                            <option value="" selected>Stage</option>
                                                            @foreach($education_stages as $stage)
                                                                <option value="{{$stage}}">{{$stage}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="education_name[]" id="education_name" class="select2-single form-control" placeholder="Education Name" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="education_grade[]" required>
                                                            <option value="" selected>Grade</option>
                                                            @foreach($grades as $grade)
                                                                <option value="{{$grade}}">{{$grade}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 control-label text-left">
                                                        <a href=""><span class="add_education label label-info">
                                                            Add Education
                                                        </span></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="skills">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> Skills </label>
                                                    <div class="col-md-2">
                                                        <input type="text" name="skill_name[]" id="skill_name" class="select2-single form-control" placeholder="Name" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="skill_type_id[]" required>
                                                            <option value="" selected>Skill Type</option>
                                                            @foreach($skill_types as $skill_type)
                                                                <option value="{{$skill_type['id']}}">{{$skill_type['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="skill_grade[]" required>
                                                            <option value="" selected>Grade</option>
                                                            @foreach($grades as $grade)
                                                                <option value="{{$grade}}">{{$grade}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 control-label text-left">
                                                        <a href=""><span class="add_skill label label-info">
                                                            Add Skill
                                                        </span></a>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Job Applied </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary" name="job_id" id="job_id" required>
                                                        <option value="" selected>Job Applied</option>
                                                        @foreach($jobs as $job)
                                                            <option value="{{$job['id']}}">{{$job['position']['name'].' '.$job['type']['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="job_requirements">
                                                
                                            </div>                                         

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block save-client" value="Submit">
                                                </div>
                                                <div class="col-md-2"><a href="/applicants/add">
                                                        <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var skill_wrapper = $("#skills");
        var add_skill = $(".add_skill");
        $(add_skill).click(function(e){ //on add input button click
            e.preventDefault();
            $(skill_wrapper).append('<div class="form-group"> <label class="col-md-3 control-label"> </label> <div class="col-md-2"> <input type="text" name="skill_name[]" id="skill_name" class="select2-single form-control" placeholder="Name" required> </div><div class="col-md-2"> <select class="select2-multiple form-control select-primary" name="skill_type_id[]" required> <option value="" selected>Skill Type</option> @foreach($skill_types as $skill_type) <option value="{{$skill_type['id']}}">{{$skill_type['name']}}</option> @endforeach </select> </div><div class="col-md-2"> <select class="select2-multiple form-control select-primary" name="skill_grade[]" required> <option value="" selected>Grade</option> @foreach($grades as $grade) <option value="{{$grade}}">{{$grade}}</option> @endforeach </select> </div></div>');
        });
        $(skill_wrapper).on("click",".remove_skill", function(e){
            console.log('sdsf');
            e.preventDefault(); 
            $(this).parent('div').remove();
        });

        var career_wrapper = $("#careers");
        var add_career = $(".add_career");
        $(add_career).click(function(e){ //on add input button click
            e.preventDefault();
            $(career_wrapper).append('<div class="form-group"> <label class="col-md-3 control-label"> </label> <div class="col-md-2"> <input type="text" name="career_position[]" id="career_position" class="select2-single form-control" placeholder="Position" required> </div><div class="col-md-2"> <input type="text" name="career_company[]" id="career_company" class="select2-single form-control" placeholder="Company Name" required> </div><div class="col-md-2"> <select class="select2-multiple form-control select-primary" name="career_grade[]" required> <option value="" selected>Grade</option> @foreach($grades as $grade) <option value="{{$grade}}">{{$grade}}</option> @endforeach </select> </div></div>');
        });
        $(career_wrapper).on("click",".remove_career", function(e){
            console.log('sdsf');
            e.preventDefault(); 
            $(this).parent('div').remove();
        });

        var education_wrapper = $("#educations");
        var add_education = $(".add_education");
        $(add_education).click(function(e){ //on add input button click
            e.preventDefault();
            $(education_wrapper).append('<div class="form-group"> <label class="col-md-3 control-label"> </label> <div class="col-md-2"> <select class="select2-multiple form-control select-primary" name="education_stage[]" required> <option value="" selected>Stage</option> @foreach($education_stages as $stage) <option value="{{$stage}}">{{$stage}}</option> @endforeach </select> </div><div class="col-md-2"> <input type="text" name="education_name[]" id="education_name" class="select2-single form-control" placeholder="Education Name" required> </div><div class="col-md-2"> <select class="select2-multiple form-control select-primary" name="education_grade[]" required> <option value="" selected>Grade</option> @foreach($grades as $grade) <option value="{{$grade}}">{{$grade}}</option> @endforeach </select> </div></div>');
        });
        $(education_wrapper).on("click",".remove_education", function(e){
            console.log('sdsf');
            e.preventDefault(); 
            $(this).parent('div').remove();
        });

        jQuery.ajaxSetup({
                beforeSend: function() {
                   $('#job_requirements').empty();
                },
                complete: function(){
                },
                success: function() {}
              });
              // $(document).ready(function() {
              //   $('#job_id').select2();
              // });
              // bind change event to select
              var job = $('#job_id');
              $( document ).ready(function() {
                  job.trigger('change');
              });
              job.on('change', function () {
                  var id = $(this).val(); // get selected value
                  var token = $('#token').val(); // get selected value
                  // alert(id);

                  // if (url) { // require a URL
                      // window.location = '/profile-emp/'+url; // redirect
                  // }
                  // var url = {!! json_encode(\Route::getFacadeRoot()->current()->uri() == 'profile') !!};
                  // url = (url == true) ? 'profile-data' : 'profile-emp-data';

                  // var data = {job_id:  id, _token: token};
                  $.ajax({
                        type: "GET",
                        dataType: 'json',
                        url: 'job-data/'+id,
                        success: function (data) {
                             // console.log(data.html);
                            $('#job_requirements').html(data.html);
                             // window.location = "/profile-emp";
                        },error: function(XMLHttpRequest, textStatus, errorThrown) {
                         console.log(errorThrown);
                      }
                    });
              });
    </script>
@endsection