<!DOCTYPE html>
<html >
    <head>
        <title>The Greeting Card Shop</title>
        
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
<!--
    <script type="text/javascript">
    
    $(document).ready(function() {

    	var select = document.getElementById('category_id');

    	console.log(select);

		select.addEventListener('change', function() {
 			loadXMLDoc(select.value);
 		});
	});

    </script>

    <script type="text/javascript">
    function loadXMLDoc(categoryId)
	{
		var xmlhttp;
		
  		xmlhttp=new XMLHttpRequest();

  		

 		xmlhttp.open("GET",'products/' + categoryId, true);
 		

  		xmlhttp.onreadystatechange=function()
  			{
  				
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    				var select = document.getElementById('sub_category_id');
    				var responseData = JSON.parse(xmlhttp.responseText);
    				$('#sub_category_id').empty();

    				for (var i = 0; i < responseData.length; i++){
					    var opt = document.createElement('option');
					    opt.value = responseData[i].id;
					    opt.innerHTML = responseData[i].type;
					    console.log(opt);
					    select.appendChild(opt);
					}

				
    				
    			}
    			
  			}
  			

		xmlhttp.send();
		
	}

    </script> -->


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
                    		@if(Auth::user()->user_type_id == 1)
                    		<div class="dropdown">
                    			 <img src="img/employee/{!! Auth::user()->image !!}" class="user-image" alt="User Image" style="float: left;width: 25px;height: 25px; border-radius: 50%; margin-right: 10px;margin-top: -2px;"/>
							    <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">{!! Auth::user()->name !!}
							    <span class="caret"></span></a>
							    <ul class="dropdown-menu">
							      <li><a href="my_account">My Account</a></li>
							      <li><a href="shop_cart">cart:0</a></li>
							      <li><a href="auth_logout">Sign out</a></li>
							    </ul>
							</div>
							@else
								<div class="dropdown">
                    			 <img src="img/employee/{!! Auth::user()->image !!}" class="user-image" alt="User Image" style="float: left;width: 25px;height: 25px; border-radius: 50%; margin-right: 10px;margin-top: -2px;"/>
							    <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">{!! Auth::user()->name !!}
							    <span class="caret"></span></a>
							    <ul class="dropdown-menu">
							    	<li><a href="gcsad">Admin Panel</a></li>
							      <li><a href="my_account">My Account</a></li>
							      <li><a href="shop_cart">cart:0</a></li>
							      <li><a href="auth_logout">Sign out</a></li>
							    </ul>
							</div>
							@endif
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
                    <li><a href="/">Home</a>
                        
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

	   
	<div class="main-content" class="clearfix">
			@if(Session::has('message'))
			<p class="alert">{{Session::get('message')}}</p>
			@endif

			@yield('content');
	</div> 



<div  class="container-fluid">
	<div class="row">
		<div class="col-md-12" style="background:rgba(22, 156, 195, 1);">
		 
			<div class="col-md-2">
			</div>
			<div class="col-md-9">
				<img src="img/contact/border.png" class="img-responsive" alt="" >
				
				<div class="hello col-md-12 col-xs-12">
					<div class="col-md-4 col-xs-4">
						<h5 class="font5" style="text-align:center;line-height:1.2em;">
					<span style="line-height:1.2em;">FOLLOW US ON</span></h5>
				<h4 class="font6" style="line-height:1.3em;text-align:center;">
					<span style="line-height:1.3em;">FACEBOOK</span></h4>
				<h6 class="font7" style="line-height:1.3em;text-align:center;">
					<span style="line-height:1.3em;">orTWITTER <img src="img/contact/twiter.png" class="star"/></span></h4>
			
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="font5" style="text-align:center;line-height:1.2em;">
					<span style="line-height:1.2em;">CALL<img src="img/contact/star2.png" class="star"/>US</span></h5>
				<h4 class="font6" style="line-height:1.3em;text-align:center;">
					<span style="line-height:1.3em;">ORDER NOW</span></h4>
				<h6 class="font7" style="line-height:1.3em;text-align:center;">
					<span style="line-height:1.3em;">1-800-000-000</span></h4> 
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="font5" style="text-align:center;line-height:1.2em;">
					<span style="line-height:1.2em;"><img src="img/contact/star2.png"class="star"/>SAY HELLO<img src="img/contact/star2.png"class="star"/></span></h5>
				<h4 class="font6" style="line-height:1.3em;text-align:center;">
					<span style="line-height:1.3em;">BY EMAIL</span></h4>
				<h6 class="font7" style="line-height:1.3em;text-align:center;">
					<span style="line-height:1.3em;">info@gretingCard.com</span></h4> 
					</div>
				</div>
				<div class="conticon col-md-12 col-xs-12" >
					<div class="col-md-4 col-xs-4">
						<img src="img/contact/fa.png" class="fb1 img-responsive" alt="" /> 
					</div>
					<div class="col-md-4 col-xs-4">
						<img src="img/contact/call.png" class="fb1 img-responsive" alt="" /> 
					</div>
					<div class="col-md-4 col-xs-4">
						<img src="img/contact/email.png" class="fb1 img-responsive" alt="" /> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" >
	<div class="row" >
		<div class="col-md-12" style="background:black;height:150px;" >
		</div>
	</div>
</div>
	
    </body>

</html>