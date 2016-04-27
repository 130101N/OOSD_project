<!DOCTYPE html>
<html >
    <head>
        <title>The Greeting Card Shop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        {!! Html::style('CSS/contact.css')!!}
        {!! Html::style('CSS/jquery.picMarque.css')!!}
        {!! Html::style('CSS/myCss.css')!!}
        {!! Html::style('CSS/styles.css')!!}

        <!--Slider resources-->
        {!! Html::script('js/jquery-1.9.1.min.js')!!}
        {!! Html::script('js/jssor.js')!!}
        {!! Html::script('js/jssor.slider.js')!!}
        
         
         {!! Html::script('js/script.js')!!}
         <!--naya-->
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
         {!! Html::style('CSS/style1.css')!!}
         {!! Html::script('js/jquery-1.3.2.js')!!}

         <!--shop page-->
         {!! Html::style('CSS/shop.css')!!}

         <!--admin page-->
         {!! Html::style('CSS/admin.css')!!}
         {!! Html::style('CSS/admin/AdminLTE.min.css')!!}
         {!! Html::style('CSS/admin/skin-blue.min.css')!!}
         {!! Html::style('CSS/admin/_all-skins.min.css')!!}

          <!--for charts-->
        {!! Html::script('js/Chart.js')!!}
        
    
        
 <script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginLeft':'-15px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},100);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-15px'},100);
                    }
                );
            });
        </script>
        
        <!--Marque resourdes-->
        {!! Html::script('http://code.jquery.com/jquery.js')!!}
        {!! Html::script('js/jquery.picMarque.js')!!}

        <script type="text/javascript">
      $(document).ready(function(){
        var picData = [      //image data（json），param：image（image path），title（image title），link（image link）
                          {
                            image:'img/1.jpg',
                            title:'image title 1',
                            link:'#'
                          },
                          {
                            image:'img/2.jpg',
                            title:'image title 2',
                            link:'#'
                          },
                          {
                            image:'img/3.jpg',
                            title:'image title 3',
                            link:'#'
                          },
                          {
                            image:'img/4.jpg',
                            title:'image title 4',
                            link:'#'
                          },
                          {
                            image:'img/5.jpg',
                            title:'image title 5',
                            link:'#'
                          }]

        // init pic
        $("#marquePic").picMarque({
          speed: 320,//scroll speed（ms）
          errorimg: 'http://www.siaa.org.cn/style/common/nophoto.jpg',//error image path grey#F1F1F1
          data: picData
        })

        // init pic for template
        $("#marquePic2").picMarque()
      });
 
    </script>




    </head>
    <body>
        <header>
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <!--@if(Auth::check())
                            <div class="dropdown">
                                <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">{!! Auth::user()->name !!}
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="order_history">Order History</a></li>
                                  <li><a href="auth_logout">Sign out</a></li>
                                </ul>
                            </div>
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

                        <div class="dropdown">
                                <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">Admin Pannel
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="category">Category</a></li>
                                  <li><a href="product">Product</a></li>
                                  <li><a href="employee">Employee</a></li>
                                </ul>
                            </div>-->
                    </div>
                    <div class="col-md-2">
                        
                        <div class="sign">
                            <ul class="signIn">
                               
                            </ul>
                            
                        </div>
                        @if(Auth::check())
                            <div class="dropdown">
                                 <img src="img/employee/{!! Auth::user()->image !!}" class="user-image" alt="User Image" style="float: left;width: 25px;height: 25px; border-radius: 50%; margin-right: 10px;margin-top: -2px;"/>
                                <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">{!! Auth::user()->name !!}
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="shop_cart">cart:0</a></li>
                                  <li><a href="auth_logout">Sign out</a></li>
                                </ul>
                            </div>
                        @else
                            <div class="dropdown">
                                <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">Sign In
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="auth_login">Sign In</a></li>
                                  <li><a href="auth_register">Sign Up</a></li>
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        
        <div id='cssmenu'>
            <ul>
                    <li><a href="#">Home</a>
                        
                    </li>
           
                    <li><a href="about_us">About Us</a>
                        
                    </li>
                
                    <li><a href="shop">Shop</a>
                        
                    </li>
               
                    <li><a href="my_account">My Account</a>
                        
                    </li>
                   
              
           </ul>
    
     </div>
           
       </header> 
	<div class="container">
        <div class="row">
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar" style="    background-color: #222d32;    position: absolute;top: 78px;left: 0;padding-top: 10px;height: 100%; width: 230px;z-index: 810;">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/employee/{!! Auth::user()->image !!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! Auth::user()->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." style="    color: #666;border-top-left-radius: 2px !important;border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;border-bottom-left-radius: 2px !important;    box-shadow: none;background-color: #374850; border: 1px solid transparent; height: 35px;"/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat" style="   color: #666;border-top-left-radius: 2px !important;border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;border-bottom-left-radius: 2px !important;    box-shadow: none;background-color: #374850;border: 1px solid transparent;height: 35px;"><i class="fa fa-search" style="    display: inline-block; font: normal normal normal 14px/1 FontAwesome;font-size: inherit;text-rendering: auto;-webkit-font-smoothing: antialiased;"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li><a href="shop">Website</a></li>
            @foreach($privileges as $adprivileges) 
                <li><a href="{{ $adprivileges->type}}">{{ $adprivileges->type}}</a></li>
            @endforeach
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
            <div class="col-md-2">

            </div>
             <div class="col-md-10">
              <div class="main-content" class="clearfix">
            @if(Session::has('message'))
            <p class="alert">{{Session::get('message')}}</p>
            @endif

            @yield('content')
    </div>
            </div>
     	</div>
    </div>
     


</body>
</html>