@extends('hrms.layouts.public-base')

@section('content')
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
                        <a href="">Submit Applications </a>
                    </li>
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
                                                    <input type="text" name="npwp_no" id="npwp_no" class="select2-single form-control" placeholder="NPWP Number">
                                                </div>
                                            </div>

                                            <div id="careers">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> Careers </label>
                                                    <div class="col-md-2" style="padding-right: 2px;">
                                                        <input type="text" name="career_position[]" id="career_position" class="select2-single form-control" placeholder="Position" required>
                                                    </div>
                                                    <div class="col-md-2" style="padding-left: 2px; padding-right: 2px;">
                                                        <input type="text" name="career_company[]" id="career_company" class="select2-single form-control" placeholder="Company Name" required>
                                                    </div>
                                                    <div class="col-md-1" style="padding-left: 2px; padding-right: 2px;">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="career_status[]" required>
                                                            <option value="" selected>Status</option>
                                                            @foreach($career_statuses as $career_status)
                                                                <option value="{{$career_status['id']}}">{{$career_status['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1" style="padding-left: 2px; padding-right: 2px;">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="career_duration[]" required>
                                                            <option value="" selected>Durasi</option>
                                                            @foreach($career_durations as $career_duration)
                                                                <option value="{{$career_duration['id']}}">{{$career_duration['name']}}</option>
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
                                                            @foreach($education_statuses as $education_status)
                                                                <option value="{{$education_status['id']}}">{{$education_status['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="education_name[]" id="education_name" class="select2-single form-control" placeholder="Education Name" required>
                                                    </div>
                                                    <div class="col-md-2 control-label text-left">
                                                        <a href=""><span class="add_education label label-info">
                                                            Add Education
                                                        </span></a>
                                                    </div>
                                                </div>
                                            </div>                                   

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Skills </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select-primary"
                                                            name="skill_id[]" id="skill_drp" required>
                                                        @foreach($skills as $skill)
                                                            <option value="{{$skill['id']}}">{{$skill['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
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
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/function.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#skill_drp').attr("multiple","multiple");
            $('#skill_drp').val("");
            $('#skill_drp').select2({
            });
        });
    </script>
    <script>

        var career_wrapper = $("#careers");
        var add_career = $(".add_career");
        $(add_career).click(function(e){ //on add input button click
            e.preventDefault();
            $(career_wrapper).append('<div class="form-group"> <label class="col-md-3 control-label"></label> <div class="col-md-2" style="padding-right: 2px;"> <input type="text" name="career_position[]" id="career_position" class="select2-single form-control" placeholder="Position" required> </div><div class="col-md-2" style="padding-left: 2px; padding-right: 2px;"> <input type="text" name="career_company[]" id="career_company" class="select2-single form-control" placeholder="Company Name" required> </div><div class="col-md-1" style="padding-left: 2px; padding-right: 2px;"> <select class="select2-multiple form-control select-primary" name="career_status[]" required> <option value="" selected>Status</option> @foreach($career_statuses as $career_status) <option value="{{$career_status['id']}}">{{$career_status['name']}}</option> @endforeach </select> </div><div class="col-md-1" style="padding-left: 2px; padding-right: 2px;"> <select class="select2-multiple form-control select-primary" name="career_duration[]" required> <option value="" selected>Durations</option> @foreach($career_durations as $career_duration) <option value="{{$career_duration['id']}}">{{$career_duration['name']}}</option> @endforeach </select> </div></div>');
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
            $(education_wrapper).append('<div class="form-group"> <label class="col-md-3 control-label"> </label> <div class="col-md-2"> <select class="select2-multiple form-control select-primary" name="education_stage[]" required> <option value="" selected>Stage</option> @foreach($education_statuses as $status) <option value="{{$status['id']}}">{{$status['name']}}</option> @endforeach </select> </div><div class="col-md-4"> <input type="text" name="education_name[]" id="education_name" class="select2-single form-control" placeholder="Education Name" required> </div></div>');
        });
        $(education_wrapper).on("click",".remove_education", function(e){
            console.log('sdsf');
            e.preventDefault(); 
            $(this).parent('div').remove();
        });
    </script>
@endsection