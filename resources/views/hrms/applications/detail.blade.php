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
                        <a href="/dashboard"> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href="applicants"> Applicants </a>
                    </li>
                    <li class="breadcrumb-current-item"> Applicants Listings </li>
                </ol>
            </div>
        </header>


        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Applicants Lists for {{$result['position']['name']}} {{$result['type']['name']}}</span>
                                </div>
                                <div class="panel-body pn">
                                    <div class="panel-menu allcp-form theme-primary mtn">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a class="btn @if(!app('request')->input('gender')) btn-primary @else btn-secondary @endif dropdown-toggle" href="?" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">All</a>
                                                <a class="btn @if(app('request')->input('gender') == 'male') btn-primary @else btn-secondary @endif dropdown-toggle" href="?gender=male" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">Male</a>
                                                <a class="btn @if(app('request')->input('gender') == 'female') btn-primary @else btn-secondary @endif dropdown-toggle" href="?gender=female" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">Female</a>
                                            </div>
                                            <div class="col-md-4 col-md-offset-5">
                                                <a class="btn @if(!app('request')->input('top')) btn-primary @else btn-secondary @endif dropdown-toggle" href="?" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">All</a>
                                                <a class="btn @if(app('request')->input('top') == '5') btn-primary @else btn-secondary @endif dropdown-toggle" href="?top=5" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">Top 5</a>
                                                <a class="btn @if(app('request')->input('top') == '10') btn-primary @else btn-secondary @endif dropdown-toggle" href="?top=10" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">Top 10</a>
                                                <a class="btn @if(app('request')->input('top') == '25') btn-primary @else btn-secondary @endif dropdown-toggle" href="?top=25" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">Top 25</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Phone</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Age</th>
                                                <th class="text-center">Marital Status</th>
                                                <th class="text-center">Career Score</th>
                                                <th class="text-center">Education Score</th>
                                                <th class="text-center">Skill Score</th>
                                                <th class="text-center">Final Score</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($result['applications'] as $key => $application)
                                                <tr>
                                                    <td class="text-center">{{$key + 1}}</td>
                                                    <td class="text-center">{{$application['applicant']['name']}}</td>
                                                    <td class="text-center">{{$application['applicant']['phone']}}</td>
                                                    <td class="text-center">{{$application['applicant']['email']}}</td>
                                                    <td class="text-center">{{$application['applicant']['age_score']}}</td>
                                                    <td class="text-center">{{$application['applicant']['marital_status']}}</td>
                                                    <td class="text-center">{{$application['applicant']['career_score']}}</td>
                                                    <td class="text-center">{{$application['applicant']['education_score']}}</td>
                                                    <td class="text-center">{{$application['applicant']['skill_score']}}</td>
                                                    <td class="text-center">{{$application['alternative_score']}}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group text-right">
                                                            <button type="button"
                                                                    class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"> Action
                                                                <span class="caret ml5"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="/applicants/{{$application['applicant']['id']}}">View Detail</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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