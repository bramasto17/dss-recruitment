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
                        <a href="/jobs"> Job </a>
                    </li>
                    <li class="breadcrumb-current-item"> Edit Job</li>
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
                                    <span class="panel-title hidden-xs"> Edit Job </span>
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
                                                            @if($result['position_id'] == $position['id'])
                                                                <option value="{{$position['id']}}" selected>{{$position['name']}}</option>
                                                            @else
                                                                <option value="{{$position['id']}}">{{$position['name']}}</option>
                                                            @endif
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
                                                            @if($result['job_type_id'] == $job_type['id'])
                                                                <option value="{{$job_type['id']}}" selected>{{$job_type['name']}}</option>
                                                            @else
                                                                <option value="{{$job_type['id']}}">{{$job_type['name']}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Requirements </label>
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
                                                <div class="col-md-2"><a href="/jobs/edit/{{$result['id']}}">
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
    @push('scripts')
        <script src="/assets/js/custom.js"></script>
        <script src="/assets/js/function.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#skill_drp').attr("multiple","multiple");
                var skill_chosen = [];
                @foreach ($result['requirements'] as $value)
                    skill_chosen.push({{$value['skill']['id']}});
                @endforeach

                $('#skill_drp').val(skill_chosen);
                $('#skill_drp').select2({
                });
            });
        </script>
    @endpush
@endsection