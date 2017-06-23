<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<title>Torneo Scudetto Zona</title>
			<!--BOOTSTRAP CSS-->
			<link href="{{asset('template/css/bootstrap.css')}}" rel="stylesheet">
			<!--SLICK SLIDER CSS-->
			<link rel="stylesheet" type="text/css" href="{{asset('template/slick/slick-theme.css')}}"/>
			<link rel="stylesheet" type="text/css" href="{{asset('template/slick/slick.css')}}"/>
			<!--BX SLIDER CSS-->
			<link rel="stylesheet" href="{{asset('template/css/jquery.bxslider.css')}}">
			<!--OWL SLIDER CSS-->
			<link href="{{asset('template/css/owl.carousel.css')}}" rel="stylesheet">
			<!--FLEX SLIDER CSS-->
			<link href="{{asset('template/css/flexslider.css')}}" rel="stylesheet">
			<!--component CSS-->
			<link href="{{asset('template/css/component.css')}}" rel="stylesheet">
			<!--PRETTY PHOTO CSS-->
			<link href="{{asset('template/css/prettyphoto.css')}}" rel="stylesheet">
			<!--ICONS CSS-->
			<link href="{{asset('template/css/font-awesome.css')}}" rel="stylesheet">
			<link href="{{asset('template/svg-icon.css')}}" rel="stylesheet">
			<!--THEME TYPO CSS-->
			<link href="{{asset('template/css/themetypo.css')}}" rel="stylesheet">
			<link href="{{asset('template/css/fullcalendar.css')}}" rel='stylesheet' />
			<!--WIDGET CSS-->
			<link rel="stylesheet" href="{{asset('template/css/widget.css')}}">
			<!--CUSTOM STYLE CSS-->
			<link rel="stylesheet" href="{{asset('template/style.css')}}">
			<!--component CSS-->
			<link href="{{asset('template/css/component.css')}}" rel="stylesheet">
			<!--COLOR CSS-->
			<link rel="stylesheet" href="{{asset('template/css/color.css')}}">
			<!--RESPONCIVE CSS-->
			<link rel="stylesheet" href="{{asset('template/css/responsive.css')}}">
		</head>
		<body class="kode-football">
			<!--// Wrapper //-->
			<div class="kode-wrapper">
			  <!--// Header //-->
	

			  <!--// Header //-->
<div class="kode-content">

			@yield('content')
</div>

		  <!--// Contact Footer //-->
		  <footer class="football-footer">
			<div class="container">
			  <div class="row">
				<!--// TEXT WIDGET //-->
				<div class="col-md-4">
				  <div class="widget spb-widget spb-text-widget">
					<div class="ft-logo">
					  <a href="#"><img src="{{asset('template/images/logo2.png')}}" alt=""></a>
					</div>
					<p>orem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet ante at nunc pretium mattis. Nunc ac semp a libero et, iaculis gravida orci.</p>
					<p>Suspendisse imperdiet dolor in tristique dignissim. Fusce lacus dolor, accumsan . .</p>
					<ul class="spb-social2">
					  <li><a href="#"> <i class="fa fa-facebook"></i></a></li>
					  <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
					  <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
					  <li><a href="#"> <i class="fa fa-rss"></i></a></li>
					  <li><a href="#"> <i class="fa fa-google-plus"></i></a></li>
					  <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
					</ul>
				  </div>
				</div>
				<!--// TEXT WIDGET //-->
				<!--// POPULAR WIDGET //-->
				<div class="col-md-4">
				  <div class="widget spb-widget spb-popular">
					<h4>Most  Popular</h4>
					<div class="spb-popular-dec">
					  <figure>
						<img src="{{asset('template/extra-images/popular-ft1.jpg')}}" alt="">
						<a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/popular-ft1.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
					  </figure>
					  <div class="text">
						<a href="#">Lorem ipsum dolor amet, conse-ctetur adipiscing elit. Donec st.</a>
						<ul class="spb-meta2">
						  <li><a href="#"><i class="fa fa-heart"></i>13 like</a></li>
						  <li><a href="#"><i class="fa fa-comment"></i>14 comment</a></li>
						</ul>
					  </div>
					</div>
					<div class="spb-popular-dec">
					  <figure>
						<img src="{{asset('template/extra-images/popular-ft2.jpg')}}" alt="">
						<a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/popular-ft2.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
					  </figure>
					  <div class="text">
						<a href="#">Lorem ipsum dolor amet, conse-ctetur adipiscing elit. Donec st.</a>
						<ul class="spb-meta2">
						  <li><a href="#"><i class="fa fa-heart"></i>13 like</a></li>
						  <li><a href="#"><i class="fa fa-comment"></i>14 comment</a></li>
						</ul>
					  </div>
					</div>
					<div class="spb-popular-dec">
					  <figure>
						<img src="{{asset('template/extra-images/popular-ft3.jpg')}}" alt="">
						<a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/popular-ft3.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
					  </figure>
					  <div class="text">
						<a href="#">Lorem ipsum dolor amet, conse-ctetur adipiscing elit. Donec st.</a>
						<ul class="spb-meta2">
						  <li><a href="#"><i class="fa fa-heart"></i>13 like</a></li>
						  <li><a href="#"><i class="fa fa-comment"></i>14 comment</a></li>
						</ul>
					  </div>
					</div>
				  </div>
				</div>
				<!--// POPULAR WIDGET //-->
				<!--// FLICKER WIDGET //-->
				<div class="col-md-4">
				  <div class="widget spb-widget spb-flicker">
					<h4>Flicker Widgets</h4>
					<ul>
					  <li>
						  <a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/flicker-ft1.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft1.jpg')}}" alt="">
					  </li>
					  <li>
						  <a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/flicker-ft2.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft2.jpg')}}" alt="">
					  </li>
					  <li>
						  <a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/flicker-ft3.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft3.jpg')}}" alt="">
					  </li>
					  <li>
						  <a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/flicker-ft4.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft4.jpg')}}" alt="">
					  </li>
					  <li>
						  <a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/flicker-ft5.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft5.jpg')}}" alt="">
					  </li>
					  <li>
						  <a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/flicker-ft6.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft6.jpg')}}" alt="">
					  </li>
					  <li>
						  <a data-rel="prettyPhoto[]" href="{{asset('template/extra-images/flicker-ft7.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft7.jpg')}}" alt="">
					  </li>
					  <li>
						  <a data-rel="prettyPhoto[]" href="e{{asset('template/xtra-images/flicker-ft8.jpg')}}" class="spb-play"><i class="fa fa-plus"></i></a>
						  <img src="{{asset('template/extra-images/flicker-ft8.jpg')}}" alt="">
					  </li>
					</ul>
					<a class="spb-btn3" href="#">Load More</a>
				  </div>
				</div>
				<!--// FLICKER WIDGET //-->
			  </div>
			  <!--// COPY RIGHT //-->
			  <div class="spb-copyright">
				<ul class="sbp-ftnav">
				  <li><a href="#">home</a></li>
				  <li><a href="#">News</a></li>
				  <li><a href="#">Topics</a></li>
				  <li><a href="#">Stats</a></li>
				  <li><a href="#">Videos</a></li>
				  <li><a href="#">post</a></li>
				</ul>
				<p>All Rights Reserved</p>
				<a id="kode-topbtn" href="#"><i class="fa fa-angle-double-up"></i></a>
			  </div>
			  <!--// COPY RIGHT //-->
			</div>



		  </footer>
		  <!--// Contact Footer //-->
		  </div>
		  <!--// Wrapper //-->
		  <!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header thbg-color">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <h4 class="modal-title">Login To Your Account</h4>
				</div>
				<div class="modal-body">
				  <form class="kode-loginform">
					<p><span>User Name</span> <input type="text" placeholder="User Name"></p>
					<p><span>Password</span> <input type="password" placeholder="Password"></p>
					<p><label><input type="checkbox"><span>Remember Me</span></label></p>
					<p class="kode-submit"><a href="#">Lost Your Password</a> <input class="thbg-colortwo" type="submit" value="Sign in"></p>
				  </form>
				</div>
			  </div>
			</div>
		  </div>
			<!-- jQuery (necessary for JavaScript plugins) -->
			<!--JavaScript-->
			<script src="{{asset('template/js/jquery.js')}}"></script>
			<!--BOOTSTRAP JavaScript-->
			<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
			<!--BOOTSTRAP PROGRESS BAR JavaScript-->
			<script src="{{asset('template/js/bootstrap-progressbar.js')}}"></script>
			<!--FLEX SLIDER JavaScript-->
			<script src="{{asset('template/js/jquery.flexslider.js')}}"></script>
			<!--OWL SLIDER JavaScript-->
			<script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
			<!--BX SLIDER JavaScript-->
			<script src="{{asset('template/js/jquery.bxslider.min.js')}}"></script>
			<!--SLICK SLIDER JavaScript-->
			<script src="{{asset('template/slick/slick.min.js')}}"></script>
			<script src="{{asset('template/js/moment.min.js')}}"></script>
			<!--ACCORDIAN JavaScript--> 
			<script src="{{asset('template/js/jquery.accordion.js')}}"></script>
			<!--PRETTY PHOTO JavaScript-->
			<script src="{{asset('template/js/jquery.prettyphoto.js')}}"></script>
			<script src="{{asset('template/js/kode_pp.js')}}"></script>
			<!--Number Count (Waypoints) JavaScript-->
			<script src="{{asset('template/js/jquery.countdown.js')}}"></script>
			<script src="{{asset('template/js/jquery.downCount.js')}}"></script>
			<script src="{{asset('template/js/modernizr.custom.js')}}"></script>
			<script src="{{asset('template/js/jquery.dlmenu.js')}}"></script>
			<script src="{{asset('template/js/waypoints-min.js')}}"></script>
			<script src="{{asset('template/js/fullcalendar.min.js')}}"></script>
			<!--CUSTOM JavaScript-->
			<script src="{{asset('template/js/functions.js')}}"></script>
		</body>
	</html>