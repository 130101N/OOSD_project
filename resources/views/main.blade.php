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
                    <div class="col-md-9">
                    	<!--@if(Auth::check())
                    		<div class="dropdown">
							    <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">{!! Auth::user()->name !!}
							    <span class="caret"></span></a>
							    <ul class="dropdown-menu">
							      <li><a href="order_history">Order History</a></li>
							      <li><a href="auth_logout">Sign Out</a></li>
							    </ul>
							</div>
						@else
							<div class="dropdown">
							    <a class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color:white;">Sign In
							    <span class="caret"></span></a>
							    <ul class="dropdown-menu">
							      <li><a href="auth_login">Sign In</a></li>
							      <li><a href="auth_logout">Sign Out</a></li>
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
                    <div class="col-md-3">
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
                    <li><a href="">Home</a>
                        
                    </li>
           
                    <li><a href="#">About Us</a>
                        
                    </li>
                
                    <li><a href="shop">Shop</a>
                        
                    </li>
               
                    <li><a href="my_account">My Account</a>
                        
                    </li>
                   
              
           </ul>
	
     </div>
           
       </header> 
	   
	<section id="slider"><!--slider-->
	<img src="back23.jpg" class="img-responsive" alt="" width="100%" height="400"/>
		<div class="container-fuild" >
			<div class="row" >
				<div class="myslide col-md-12" >
					<div id="slider-carousel" class="carousel slide" data-ride="carousel" >
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-md-12">
									<img src="img/1920/025.png" class="girl img-responsive" alt="" width="100%" style=""/>
									<div class="mainHead" >
										<h1 class="head1" style="text-align:center;"><a href="#">~ The Ultimate Greeting Card Shop ~</a></h1>
										<p style="text-align: center; line-height: 0.9em;  letter-spacing: normal;  margin: 0;" class="font_7">
											Send Your Greeting someone you love</p>
									</div>
									<div class="col-md-6" style="position:absolute;top:30%;">
									</div>
									<div class="col-md-6" style="position:absolute;top:45%;left:-10px;">
										<h1><span>kebrok</span>.com</h1>
										<h2>Facinating Facilities</h2>
										<button type="button" class="btn btn-default get">Order your card</button>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-md-12";>
									<img src="img/1920/032.png" class="girl img-responsive" alt="" width="150%" style=""/>
									<div class="mainHead" >
										<h1 class="head1" style="text-align:center;"><a href="#">~ The Ultimate Greeting Card Shop ~</a></h1>
										<p style="text-align: center; line-height: 0.9em;  letter-spacing: normal;  margin: 0;" class="font_7">
											Send Your Greeting someone you love</p>
									</div>
									<div class="col-md-6" style="position:absolute;top:30%;">
									</div>
									<div class="col-md-6" style="position:absolute;top:45%;">
										<h1><span>kebrok</span>.com</h1>
										<h2>Facinating Facilities</h2>
										<button type="button" class="btn btn-default get">Order your card</button>
									</div>
								</div>
							</div>
							
							<div class="item">
<div class="col-md-12";>
									<img src="img/1920/042.png" class="girl img-responsive" alt="" width="150%" style=""/>
									<div class="mainHead" >
										<h1 class="head1" style="text-align:center;"><a href="#">~ The Ultimate Greeting Card Shop ~</a></h1>
										<p style="text-align: center; line-height: 0.9em;  letter-spacing: normal;  margin: 0;" class="font_7">
											Send Your Greeting someone you love</p>
									</div>
									<div class="col-md-6" style="position:absolute;top:30%;">
									</div>
									<div class="col-md-6" style="position:absolute;top:45%;">
										<h1><span>kebrok</span>.com</h1>
										<h2>Facinating Facilities</h2>
										<button type="button" class="btn btn-default get">Order your card</button>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-md-12";>
									<img src="img/1920/025.png" class="girl img-responsive" alt="" width="150%" style=""/>
									<div class="mainHead" >
										<h1 class="head1" style="text-align:center;"><a href="#">~ The Ultimate Greeting Card Shop ~</a></h1>
										<p style="text-align: center; line-height: 0.9em;  letter-spacing: normal;  margin: 0;" class="font_7">
											Send Your Greeting someone you love</p>
									</div>
									<div class="col-md-6" style="position:absolute;top:30%;">
									</div>
									<div class="col-md-6" style="position:absolute;top:45%;">
										<h1><span>kebrok</span>.com</h1>
										<h2>Facinating Facilities</h2>
										<button type="button" class="btn btn-default get">Order your card</button>
									</div>
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<div class="header"></div>
        <div class="scroll"></div>
        <ul id="navigation">
            <li class="home"><a href="" title="Home"></a></li>
            <li class="comment"><a href="" title="Comments"></a></li>
            <li class="search"><a href="https://www.google.lk/webhp?source=search_app&gws_rd=ssl" title="Search"></a></li>
            <li class="Info"><a href="" title="Info"></a></li>
			<li class="telephone"><a href="" title="Call"></a></li>
            <li class="shopping_cart"><a href="" title="Shopping Cart"></a></li>
            <li class="mail"><a href="https://mail.google.com/mail/u/0/?tab=wm#inbox" title="Mail"></a></li>
        </ul>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="text-align:center; font-family: 'PT Sans',sans-serif;font-weight:bold;">
				<h2>Experience an online card</h2>
				<p>See one of our beautiful design in action</p>
			</div>
		</div>
	</div>
    <img src="img/blu3.png" class="img-responsive" alt="" width="150%" height="400"/>  
	<div class="container">
		<div class="row">
			<div class="page-heading js-wrap-view-all" >
			<h2 class="homepage-heading">Best Sellers</h2>
			<p>Our most popular Greeting cards based on sales</p>
			<a href="#" class="link-blue with-arrow"><b class="icon-arrow-small-right"></b>Browse Best Sellers</a>
		</div>
		</div>
	</div>

<div class="container">
	<div id="marquePic2" class="marque-box"  >
	<table class="table" cellspacing="0" cellpadding="0" border="0">
	  <tbody>
	    <tr>
	      <td data-marqueebox="1">
	        <div class="marque-main">
	          <ul>
	            <li>
	              <a href="#">
	                <img src="img/card/6.jpg" alt="1111111" >
	              </a>
	              <div class="splendid-links" style="position:relative; bottom:10px;left:-26px;"><img src="img/cart_pro.png"/></div>
	            </li>
	            <li>
	              <a href="#">
	                <img src="img/card/7.jpg" alt="2222222" >
	              </a>
	              <div class="splendid-links" style="position:relative; bottom:10px;left:-26px;"><img src="img/cart_pro.png"/></div>
	            </li>
	            <li>
	              <a href="#">
	                <img src="img/card/3.jpg" alt="3333333" >
	              </a>
	              <div class="splendid-links" style="position:relative; bottom:10px;left:-26px;"><img src="img/cart_pro.png"/></div>
	            </li>
	            <li>
	              <a href="#">
	                <img src="img/card/4.jpg" alt="4444444" >
	              </a>
	              <div class="splendid-links" style="position:relative; bottom:10px;left:-26px;"><img src="img/cart_pro.png"/></div>
	            </li>
	            <li>
	              <a href="#">
	                <img src="img/card/5.jpg" alt="5555555" >
	              </a>
	              <div class="splendid-links" style="position:relative; bottom:10px;left:-26px;"><img src="img/cart_pro.png"/></div>
	            </li>
				<li>
	              <a href="#">
	                <img src="img/card/5.jpg" alt="5555555" >
	              </a>
	              <div class="splendid-links" style="position:relative; bottom:10px;left:-26px;"><img src="img/cart_pro.png"/></div>
	            </li>
				<li>
	              <a href="#">
	                <img src="img/card/5.jpg" alt="5555555" >
	              </a>
	              <div class="splendid-links" style="position:relative; bottom:10px;left:-26px;"><img src="img/cart_pro.png"/></div>
	            </li>
	          </ul>
	        </div>
	      </td>
	      <td data-marqueebox="2">
	      </td>
	    </tr>
	  </tbody>
	</table>
	</div>
</div>
<div  class="container-fluid">
	<div class="row">
		<div class="col-full">
		
		
		
		</div>
	</div>
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