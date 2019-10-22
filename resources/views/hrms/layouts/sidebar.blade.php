<!-- -------------- Sidebar - Author -------------- -->
<div class="sidebar-widget author-widget">
    <div class="media">
        <a href="/profile" class="media-left">
            @if(isset(Auth::user()->employee->photo))
                <img src="{{asset('photos/'.Auth::user()->employee->photo)}}" width="40px" height="30px" class="img-responsive">
            @else
                <img src="/assets/img/avatars/profile_pic.png" class="img-responsive">
            @endif

        </a>

        <div class="media-body">
            <div class="media-author"><a href="/profile">{{Auth::user()->name}}</a></div>
        </div>
    </div>
</div>

<!-- -------------- Sidebar Menu  -------------- -->
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a  href="{{route('dashboard')}}">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="/departments">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Departments</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-departments')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Departments </a>
                </li>
                <li>
                    <a href="{{route('list-departments')}}">
                        <span class="glyphicon glyphicon-tags"></span> Departments Listing </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/positions">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Positions</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-positions')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Positions </a>
                </li>
                <li>
                    <a href="{{route('list-positions')}}">
                        <span class="glyphicon glyphicon-tags"></span> Positions Listing </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/jobs">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Jobs</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-jobs')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Jobs </a>
                </li>
                <li>
                    <a href="{{route('list-jobs')}}">
                        <span class="glyphicon glyphicon-tags"></span> Jobs Listing </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/applicants">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Applicants</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-applicants')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Applicants </a>
                </li>
                <li>
                    <a href="{{route('list-applicants')}}">
                        <span class="glyphicon glyphicon-tags"></span> Applicants Listing </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/applicants">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Applications</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('list-applicants')}}">
                        <span class="glyphicon glyphicon-tags"></span> Applications Listing </a>
                </li>
            </ul>
        </li>
</ul>
<!-- -------------- /Sidebar Menu  -------------- -->