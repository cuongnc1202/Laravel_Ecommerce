<nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown">
                <span class="hidden-xs "><b>{{auth()->user()->name}}</b></span>
            </a>
            <ul class="dropdown-menu bg-primary">
                <li class="user-header">
                    <img src="{{ url('/assets') }}/img/user3-128x128.jpg" class="img-circle"
                        alt="User Image">

                    <p>
                        <b>{{auth()->user()->name}}</b> - Web Developer
                        <small>Member since Nov. 2012</small>
                    </p>
                </li>
                <li class="user-footer bg-success">
                    <div class="row">
                        <div class="col-6">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pull-right">
                                <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat">Log out</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>