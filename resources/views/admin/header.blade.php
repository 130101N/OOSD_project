<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo"><b>Admin</b>LTE</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    @if(Auth::check())
                    <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">
                        <!-- The user image in the navbar-->
                        <img src="img/employee/{!! Auth::user()->image !!}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        {!! Auth::user()->name !!}
                        <span class="caret"></span></a> 
                         <ul class="dropdown-menu">
                                  <li><a href="order_history">Order History</a></li>
                                  <li><a href="auth_logout">Sign out</a></li>
                                </ul>
                        @else
                            <div class="dropdown">
                                <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">Sign In
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="auth_login">Sign In</a></li>
                                  <li><a href="#">Sign Out</a></li>
                                </ul>
                            </div>
                        @endif
                    
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>