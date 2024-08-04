<!doctype html>
<html lang="en">
	
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>my website</title>


		
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{asset('fonts/style.css')}}">

		<!-- Main css -->
		<link rel="stylesheet" href="{{asset('css/main.css')}}">


		<!-- DateRange css -->
		<link rel="stylesheet" href="{{asset('vendor/daterange/daterange.css')}}" />

		<!-- Chartist css -->
		<link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}" />
		<link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist-custom.css')}}" />	

	</head>
	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->


		<!-- *************
			************ Header section start *************
		************* -->

		<!-- Header start -->
		@include('layouts.header')
		<!-- Header end -->

		<!-- Screen overlay start -->
		<div class="screen-overlay"></div>
		<!-- Screen overlay end -->

		<!-- Quicklinks box start -->
		<div class="quick-links-box">
			<div class="quick-links-header">
				Quick Links
				<a href="#" class="quick-links-box-close">
					<i class="icon-circle-with-cross"></i>
				</a>
			</div>

			<div class="quick-links-wrapper">
				<div class="fullHeight">
					<div class="quick-links-body">
						<div class="container-fluid p-0">
							<div class="row less-gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<a href="documents.html" class="quick-tile blue">
										<i class="icon-file-text"></i>
										Documents
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="crm-dashboard.html" class="quick-tile secondary">
										<i class="icon-pie-chart1"></i>
										CRM
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="ecommerce-dashboard.html" class="quick-tile blue">
										<i class="icon-shopping-cart1"></i>
										Ecommerce
									</a>
								</div>
							</div>
							<div class="row less-gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<a href="gallery2.html" class="quick-tile photos lg">
										Photos
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="tasks.html" class="quick-tile">
										<i class="icon-check-circle"></i>
										Tasks
									</a>
									<a href="calendar-external-draggable.html" class="quick-tile blue">
										<i class="icon-calendar1"></i>
										Events
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="chat.html" class="quick-tile blue">
										<i class="icon-message-circle"></i>
										Chat
									</a>
									<a href="default-layout.html" class="quick-tile">
										<i class="icon-grid"></i>
										Layout
									</a>
								</div>
							</div>
							<div class="row less-gutters">
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="custom-alerts.html" class="quick-tile secondary">
										<i class="icon-alert-triangle"></i>
										Alerts
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="google-maps.html" class="quick-tile blue">
										<i class="icon-map-pin"></i>
										Maps
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="https://www.gmail.com/" target="_blank" class="quick-tile white">
										<i class="icon-drafts"></i>
										Gmail
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="https://www.youtube.com/" target="_blank" class="quick-tile secondary">
										<i class="icon-youtube"></i>
										Youtube
									</a>
								</div>
							</div>
							<div class="row less-gutters">
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="user-profile.html" class="quick-tile">
										<i class="icon-account_circle"></i>
										Profile
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="contacts.html" class="quick-tile">
										<i class="icon-phone"></i>
										Contacts
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="account-settings.html" class="quick-tile">
										<i class="icon-settings1"></i>
										Settings
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="login.html" class="quick-tile">
										<i class="icon-lock2"></i>
										Logout
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Quicklinks box end -->

		<!-- Quick settings start -->
		<div class="quick-settings-box">
			<div class="quick-settings-header">
				<div class="date-container">Today <span class="date" id="today-date"></span></div>
				<a href="#" class="quick-settings-box-close">
					<i class="icon-circle-with-cross"></i>
				</a>
			</div>
			<div class="quick-settings-body">
				<div class="fullHeight">
					<div class="quick-setting-list">
						<h6 class="title">Events</h6>
						<ul class="list-items">
							<li>
								<div class="list-title">Product Launch</div>
								<div class="list-location">10:00 AM</div>
							</li>
							<li>
								<div class="list-title">Team Meeting</div>
								<div class="list-location">01:30 PM</div>
							</li>
							<li>
								<div class="list-title">Q&A Session</div>
								<div class="list-location">02:30 PM</div>
							</li>
						</ul>
					</div>
					<div class="quick-setting-list">
						<h6 class="title">Notes</h6>
						<ul class="list-items">
							<li>
								<div class="list-title">Refreshing the list</div>
								<div class="list-location">03:15 PM</div>
							</li>
							<li>
								<div class="list-title">Not able to click on button</div>
								<div class="list-location">03:18 PM</div>
							</li>
						</ul>
					</div>
					<div class="quick-setting-list">
						<h6 class="title">Quick Settings</h6>
						<ul class="set-priority-list">
							<li>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" checked id="systemUpdates">
									<label class="custom-control-label" for="systemUpdates">System Updates</label>
								</div>
							</li>
							<li>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="noti">
									<label class="custom-control-label" for="noti">Notifications</label>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Quick settings end -->


		<!-- Container fluid start -->
		<div class="container-fluid">

			<!-- Navigation start -->
			@include('layouts2.navbar')
			<!-- Navigation end -->

			
			<div class="main-container">

				<

				<!-- Content wrapper start -->
				@yield('user')
				<!-- Content wrapper end -->

			</div>
			

			<!-- Footer start -->
			@include('layouts.footer')
			<!-- Footer end -->

		</div>
		<!-- Container fluid end -->

		
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('js/moment.js')}}"></script>


		
		<!-- Slimscroll JS -->
		<script src="{{asset('vendor/slimscroll/slimscroll.min.js')}}"></script>
		<script src="{{asset('vendor/slimscroll/custom-scrollbar.js')}}"></script>

		<!-- Daterange -->
		<script src="{{asset('vendor/daterange/daterange.js')}}"></script>
		<script src="{{asset('vendor/daterange/custom-daterange.js')}}"></script>

		<!-- Chartist JS -->
		<script src="{{asset('vendor/chartist/js/chartist.min.js')}}"></script>
		<script src="{{asset('vendor/chartist/js/chartist-tooltip.js')}}"></script>
		<script src="{{asset('vendor/chartist/js/custom/threshold/threshold.js')}}"></script>
		<script src="{{asset('vendor/chartist/js/custom/bar/bar-chart-orders.js')}}"></script>

		<!-- jVector Maps -->
		<script src="{{asset('vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
		<script src="{{asset('vendor/jvectormap/world-mill-en.js')}}"></script>
		<script src="{{asset('vendor/jvectormap/gdp-data.js')}}"></script>
		<script src="{{asset('vendor/jvectormap/custom/world-map-markers2.js')}}"></script>

		<!-- Rating JS -->
		<script src="{{asset('vendor/rating/raty.js')}}"></script>	
		<script src="{{asset('vendor/rating/raty-custom.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('js/main.js')}}"></script>

	</body>

</html>