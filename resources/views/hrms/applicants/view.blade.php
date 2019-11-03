@extends('hrms.layouts.base')

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
                        <a href="">View Applicant </a>
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
                                    <span class="panel-title hidden-xs"> View Applicant </span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            {!! Form::open(['class' => 'form-horizontal']) !!}
                                            <input type="hidden" value="{!! csrf_token() !!}" id="token">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Job Applied </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['applications'][0]['job']['position']['name']}} {{$result['applications'][0]['job']['type']['name']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Name </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['name']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Birthday </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['birthday']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Address </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['address']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Gender </label>
                                                <div class="col-md-2">
                                                    <input type="text" value="{{$result['gender']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Marital Status </label>
                                                <div class="col-md-2">
                                                    <input type="text" value="{{$result['marital_status']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Religion </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['religion']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Phone </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['phone']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Email </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['email']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> ID Card Number </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['id_card_no']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> ID Card Address </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['id_card_address']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> NPWP Number </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$result['npwp_no']}}" class="select2-single form-control" disabled>
                                                </div>
                                            </div>

                                            <div id="careers">
                                                @foreach($result['careers'] as $key => $career)
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">@if($key == 0) Careers @endif</label>
                                                    <div class="col-md-2">
                                                        <input type="text" value="{{$career['position']}}" class="select2-single form-control" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" value="{{$career['company_name']}}" class="select2-single form-control" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" value="{{$career['status']['name']}}" class="select2-single form-control" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" value="{{$career['duration']['name']}}" class="select2-single form-control" disabled>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            <div id="educations">
                                                @foreach($result['educations'] as $key => $education)
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">@if($key == 0) Educations @endif</label>
                                                    <div class="col-md-2">
                                                        <input type="text" value="{{$education['status']['name']}}" class="select2-single form-control" disabled>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" value="{{$education['name']}}" class="select2-single form-control" disabled>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>    

                                            <div id="skills">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Skills</label>
                                                    <div class="col-md-9">
                                                        @foreach($result['skills'] as $key => $skill)
                                                        <div class="col-md-2" style="margin-bottom: 15px; padding-left: 0px;">
                                                            <input type="text" value="{{$skill['skill']['name']}}" class="select2-single form-control" disabled>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

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
@endsection