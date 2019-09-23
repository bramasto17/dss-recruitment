@extends('hrms.layouts.base')

@section('content')
    <?php $i = @$i ? $i : 0 ; ?>
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
                        <a href="jobs"> Jobs </a>
                    </li>
                    <li class="breadcrumb-current-item"> Add Jobs</li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-spy="affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Add Jobs </span>
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

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Job </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="position_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($positions as $position)
                                                            <option value="{{$position['id']}}">{{$position['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Type </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="job_type_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($job_types as $job_type)
                                                            <option value="{{$job_type['id']}}">{{$job_type['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="requirements">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> Requirement </label>
                                                    <div class="col-md-2">
                                                        <input type="text" name="requirement[{{$i}}]" id="requirement" class="select2-single form-control" placeholder="Name" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="job_requirement_type_id[{{$i}}]" required>
                                                            <option value="" selected>Select One</option>
                                                            @foreach($job_requirement_types as $job_requirement_type)
                                                                <option value="{{$job_requirement_type['id']}}">{{$job_requirement_type['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="hidden" class="" name="priority[{{$i}}]" value="0">
                                                                <input type="checkbox" class="" name="priority[{{$i}}]" value="1">Priority
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 control-label text-left">
                                                        <a href=""><span class="add_requirement label label-info">
                                                            Add Requirement
                                                        </span></a>
                                                    </div>
                                                </div>
                                                
                                                <?php $i += 1; ?>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> </label>
                                                    <div class="col-md-2">
                                                        <input type="text" name="requirement[{{$i}}]" id="requirement" class="select2-single form-control" placeholder="Name" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="select2-multiple form-control select-primary"
                                                                name="job_requirement_type_id[{{$i}}]" required>
                                                            <option value="" selected>Select One</option>
                                                            @foreach($job_requirement_types as $job_requirement_type)
                                                                <option value="{{$job_requirement_type['id']}}">{{$job_requirement_type['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="hidden" class="" name="priority[{{$i}}]" value="0">
                                                                <input type="checkbox" class="" name="priority[{{$i}}]" value="1">Priority
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block save-client" value="Submit">
                                                </div>
                                                <div class="col-md-2"><a href="/positions/add">
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
        var wrapper = $("#requirements");
        var add_requirement = $(".add_requirement");
        $(add_requirement).click(function(e){ //on add input button click
            e.preventDefault();
            $(wrapper).append('<?php $i=$i+1; ?><div class="form-group" id="requirements"><label class="col-md-3 control-label"> </label><div class="col-md-2"><input type="text" name="requirement[{{$i}}]" id="requirement" class="select2-single form-control" placeholder="Name" required></div><div class="col-md-2"><select class="select2-multiple form-control select-primary"name="job_requirement_type_id[{{$i}}]" required><option value="" selected>Select One</option>@foreach($job_requirement_types as $job_requirement_type)<option value="{{$job_requirement_type['id']}}">{{$job_requirement_type['name']}}</option>@endforeach</select></div><div class="col-md-2"><div class="checkbox"><label><input type="hidden" class="" name="priority[{{$i}}]" value="0"><input type="checkbox" class="" name="priority[{{$i}}]" value="1">Priority</label></div></div></div>');
            // $(wrapper).append('<div class="form-group" id="requirements"><label class="col-md-3 control-label"> </label><div class="col-md-2"><input type="text" name="requirement[]" id="requirement" class="select2-single form-control" placeholder="Name" required></div><div class="col-md-2"><select class="select2-multiple form-control select-primary"name="job_requirement_type_id[]" required><option value="" selected>Select One</option>@foreach($job_requirement_types as $job_requirement_type)<option value="{{$job_requirement_type['id']}}">{{$job_requirement_type['name']}}</option>@endforeach</select></div><div class="col-md-2"><div class="checkbox"><label><input type="checkbox" class="" name="priority[]" value="1">Priority</label></div></div><div class="col-md-2 control-label text-left"> <a href=""><span class="remove_requirement label label-warning"> Remove Requirement</span></a></div></div>');
        });
        $(wrapper).on("click",".remove_requirement", function(e){
            console.log('sdsf');
            e.preventDefault(); 
            $(this).parent('div').remove();
        });
    </script>
@endsection