@extends('hrms.layouts.base')

@section('content')

        <!-- -------------- Topbar -------------- -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon">
                <a href="/dashboard">
                    <span class="fa fa-home"></span>
                </a>
            </li>
            <li class="breadcrumb-active">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-link">
                <a href="/dashboard">Home</a>
            </li>
            <li class="breadcrumb-current-item">Dashboard</li>
        </ol>
    </div>

</header>
<!-- -------------- /Topbar -------------- -->

<!-- -------------- Content -------------- -->
<section id="content" class="table-layout animated fadeIn">

    <!-- -------------- Column Center -------------- -->
    <div class="chute chute-center">

        <!-- -------------- Quick Links -------------- -->
        <div class="row">
            @if(Auth::user()->isHR())
            <div class="col-sm-6 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-6 col-xs-offset-3 ph10">
                                <img src="/assets/img/pages/clipart0.png" class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-12" style="text-align: center;">
                                <h3 class="text-muted"><a href="{{route('list-departments')}}"> DEPARTMENT <br> MANAGER</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-6 col-xs-offset-3 ph10">
                                <img src="/assets/img/pages/clipart6.png" class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-12" style="text-align: center;">
                                <h3 class="text-muted"><a href="{{route('list-positions')}}"> POSITION <br> MANAGER</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-6 col-xs-offset-3 ph10">
                                <img src="/assets/img/pages/clipart3.png" class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-12" style="text-align: center;">
                                <h3 class="text-muted"><a href="{{route('list-jobs')}}"> JOB <br> MANAGER</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-6 col-xs-offset-3 ph10">
                                <img src="/assets/img/pages/clipart2.png" class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-12" style="text-align: center;">
                                <h3 class="text-muted"><a href="{{route('list-applications')}}"> APPLICATION <br> MANAGER</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
             </div>
           </div>
         </section>
    @endsection