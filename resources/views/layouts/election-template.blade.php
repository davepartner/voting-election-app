<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Voting app</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


   


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Election app, laravel voting app, voting app" />


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->

<link href=" {{ asset('election-template/css/bootstrap.css') }} " rel="stylesheet"  type='text/css'>

<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>


<link href=" {{ asset('election-template/css/style.css') }} " rel="stylesheet"  type='text/css'>

<link href=" {{ asset('election-template/css/flexslider.css') }} " rel="stylesheet"  type='text/css' media="screen">

<!---strat-slider---->
<script type="text/javascript" src=" {{asset ('election-template/js/jquery-1.11.1.min.js') }}"></script>
<!---//-slider---->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    @yield('css')
</head>

<body>


@if (!Auth::guest())
<!-- header -->
<div class="header_bg">
		<div class="container">
			<!-----start-header----->
			<div class="header">
				<div class="logo">
					<a href="index.html"><img src="images/logo1.png" alt=" " /></a>
				</div>
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil " id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="act"><a href="/">
							<span class="glyphicon glyphicon-home" style=" font-size: 15px;" aria-hidden="true"></span>
 
							Home</a></li>
							@if (!Auth::guest())

							<li ><a href="/categories">
							<span class="glyphicon glyphicon-th-list" style=" font-size: 15px;" aria-hidden="true"></span>
 
							Categories</a></li>
							<li ><a href="#">
							<span class="glyphicon glyphicon-user" style=" font-size: 15px;" aria-hidden="true"></span>
 
							{{ Auth::user()->name }}</a></li>

							<li> 

							<a href="{!! url('/logout') !!}" 
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            
											<span class="glyphicon glyphicon-off" style=" font-size: 15px;" aria-hidden="true"></span>
 
											Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
							</li>
							@endif

						</ul>
					</div><!-- /.navbar-collapse -->	
					
				</nav>
			</div>
		</div>
	</div>
	{{-- <div class="header_bottom"> --}}
	</div>

	@endif


	@if (!Auth::guest())
<div class="text-center well">
<span class="glyphicon glyphicon-time" style="color: grey; font-size: 15px;" aria-hidden="true"></span>
                                       
									   <b>Nomination period: </b> 
                     {{ $getViewSetting->nomination_start_date->format('D d, M') }} -  
                     {{ $getViewSetting->nomination_end_date->format('D d, M, Y') }} 
                     
                     </a> 

|

<span class="glyphicon glyphicon-bell" style="color: grey; font-size: 15px;" aria-hidden="true"></span>
                                        <b> Voting period: </b> 
                     {{ $getViewSetting->voting_start_date->format('D d, M') }} -  
                     {{ $getViewSetting->voting_end_date->format('D d, M, Y') }} 
   </div>                  

@endif









@yield('content')

 <!-- jQuery 3.1.1 -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


            	<!-- scroll_top_btn -->
		<script type="text/javascript" src="{{ asset('election-template/js/move-top.js') }}"></script>
		<script type="text/javascript" src="{{ asset('election-template/js/easing.js') }}"></script>
	    <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
		<!--end scroll_top_btn -->
<!-- for bootstrap working -->
	 <script type="text/javascript" src="{{ asset('election-template/js/bootstrap-3.1.1.min.js') }}"></script>
<!-- //for bootstrap working -->




    @yield('scripts')
</body>
</html>