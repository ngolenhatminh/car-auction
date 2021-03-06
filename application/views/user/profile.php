<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Document</title>
	<style>
		/* Always set the map height explicitly to define the size of the div
		 * element that contains the map. */
		#map {
			height: 800px;
			width: 800px;
			margin-left: auto;
			margin-right: auto;

		}
		/* Optional: Makes the sample page fill the window. */
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		img{
			width: 200px;;
			height: 200px;

		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo base_url()."dashboard" ?>">Start Bootstrap</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Notification
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Buy Product</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url()."product/sell" ?>">Sell Product</a>
				</li>
				<li class="nav-item">
					<div class="btn-group">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							My Account
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?php echo base_url(); ?>user/profile">Profile</a>
							<a class="dropdown-item" href="<?php echo base_url()." "?>">Change Password</a>
							<a class="dropdown-item" href="<?php echo base_url()." "?>">Order</a>
							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="<?php echo base_url(); ?>user/logout">Logout</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container pt-5">
	<div class="col pt-5">
		<div class="row">
			<div class="col mb-3">
				<div class="card">
					<div class="card-body">
						<div class="e-profile ">
							<div class="row justify-content-center align-items-center">
								<div class="col-12 col-sm-auto mb-3 ">
									<div class="mx-auto" style="width: 250px;">
										<div class="d-flex justify-content-center align-items-center rounded" style="height: 250px; background-color: rgb(233, 236, 239);">
											<img src='<?= base_url() ?>assets/images/users/<?= $user->image ?>' alt="user_image">
										</div>
									</div>
								</div>
								<div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
									<?php echo form_open_multipart('user/upload');?>
									<div class="text-center text-sm-left mb-2 mb-sm-0">
<!--										<h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">--><?php //echo base_url()."" ?><!--Name</h4>-->
<!--										<div class="text-muted"><small>--><?php //echo base_url()."" ?><!--</small>Email</div>-->
<!--										<div class="text-muted"><small>--><?php //echo base_url()."" ?><!--</small>My Description</div>-->
<!--										<div class="text-muted"><small>--><?php //echo base_url()."" ?><!--</small>phone</div>-->
<!--										<div class="text-muted"><small>--><?php //echo base_url()."" ?><!--</small>location</div>-->
										<div class="row">
											<div class="col">
												<div class="form-group">
													<input class="form-control" type='file' name='userfile' size='20' />
												</div>
											</div>
										</div>
										<div class="mt-2 pt-4">
											<button class="btn btn-primary" type="submit">
												<i class="fa fa-fw fa-camera"></i>
												<span>Upload Photo</span>
											</button>
										</div>
									</div>
									</form>

								</div>
							</div>
							<ul class="nav nav-tabs">
								<li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane active">
									<form method="post" action="<?php echo base_url(); ?>user/update" novalidate="">
										<div class="row">
											<div class="col">
												<div class="row">
													<div class="col">
														<div class="form-group">
															<label>Username</label>
															<input class="form-control" type="text" name="username" value="<?php echo $user->username ?>">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col">
														<div class="form-group">
															<label>Email</label>
															<input class="form-control" type="text" name="email" value="<?php echo $user->email ?>">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col">
														<div class="form-group">
															<label>Location</label>
															<div id="map"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col d-flex justify-content-center">
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</div>
												</div>
											</div>
										</div>


									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

</div>
<script>
	// Code from Google API, key from friend
	// Note: This example requires that you consent to location sharing when
	// prompted by your browser. If you see the error "The Geolocation service
	// failed.", it means you probably did not give permission for the browser to
	// locate you.
	var map, infoWindow;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 15
		});
		infoWindow = new google.maps.InfoWindow;

		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};

				infoWindow.setPosition(pos);
				infoWindow.setContent('Your Location.');
				infoWindow.open(map);
				map.setCenter(pos);
			}, function() {
				handleLocationError(true, infoWindow, map.getCenter());
			});
		} else {
			// Browser doesn't support Geolocation
			handleLocationError(false, infoWindow, map.getCenter());
		}
	}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ?
				'Error: The Geolocation service failed.' :
				'Error: Your browser doesn\'t support geolocation.');
		infoWindow.open(map);
	}
</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo81YH7Kxp3aYVuMPROHhQJNKSDpSXu-Y&callback=initMap">
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
