<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="CSS/login/demo.css" />
        <link rel="stylesheet" type="text/css" href="CSS/login/style.css" />
		<link rel="stylesheet" type="text/css" href="CSS/login/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            
            <header>
                <h1>Login and Registration Form </h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                        	<h1>Log in</h1> 
                            {!! Form::open(array('url'=>'auth_login')) !!}
			           			 <p>
			                		{!! Form::label('email','Email:',['data-icon'=>'u'])!!}
			                		{!! Form::email('email',null,['class'=>'form-control']) !!}
                                    {!! $errors->first('email','<span class="help-block">:message</span>')!!}
			           			 </p>
			            		<p>
			                		{!! Form::label('password','Password:',['data-icon'=>'p'])!!}
			                		{!! Form::password('password',['class'=>'form-control']) !!}
                                    {!! $errors->first('password','<span class="help-block">:message</span>')!!}
			            		</p>
			            		<p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>

			            		<!--{!! Form::button('Sign In', array('type'=>'submit', 'class'=>'login button')) !!}-->
			            		<p class="change_link">
									Not a member yet ?
									<a href="auth_register" class="to_register">Join us</a>
								</p>
			       			 {!! Form::close() !!}
                   	     </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>