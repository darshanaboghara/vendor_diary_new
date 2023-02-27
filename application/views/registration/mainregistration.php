<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php echo $site->website_title; ?> Vendor Registration Page</title>

	<meta name="description" content="<?php echo $site->website_description; ?>"/>
	<meta name="keyword" content="<?php echo $site->website_keywords; ?>">

	<meta property="og:title" content="<?php echo $site->website_title; ?>">
	<meta property="og:url" content="<?php echo base_url(); ?>">
	<meta property="og:description" content="<?php echo $site->website_description; ?>">
	<meta property="og:image" content="<?php echo base_url(); ?>assets/images/<?php echo $site->upload_logo; ?>">

	<meta property="twitter:title" content="<?php echo $site->website_title; ?>">
	<meta property="twitter:url" content="<?php echo base_url(); ?>">
	<meta property="twitter:description" content="<?php echo $site->website_description; ?>">
	<meta property="twitter:image" content="<?php echo base_url(); ?>assets/images/<?php echo $site->upload_logo; ?>">

	<meta name="twitter:site" content="@devani_nimesh">

	<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
	/>

	<link
			href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
			rel="stylesheet"
	/>
	<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
	/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/v2/css/registration.css"/>

	<!--select2 start-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"
			type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<!--select2 end-->
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

	<script>
		function submitUserForm() {
			var response = grecaptcha.getResponse();
			if (response.length == 0) {
				document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
				alert("Validate Captcha");
				return false;
			}
			return true;
		}

		function verifyCaptcha() {
			document.getElementById('g-recaptcha-error').innerHTML = '';
		}
	</script>
	<!--Google Map API link-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
	<!--<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeSRMFbJ-GW_PEK8i5yIL8GWHrWKbTPPU&libraries=places&language=en-AU&callback=initialize"></script>-->
	<!--<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmq7LPp_-r30_w1KffmiXRapobuRYyalo&libraries=places&language=en-AU&callback=initialize"></script>-->
	<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmq7LPp_-r30_w1KffmiXRapobuRYyalo&libraries=places&callback=initialize"></script>
	<!--<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfH7fY0ePgeURP_UKspfcjDNuFEMuu9Ko&libraries=places&callback=initService"></script>-->
	<script>
		let autocomplete;

		function initialize() {
			var input = document.getElementById('search_input');
			autocomplete = new google.maps.places.Autocomplete(input);

			google.maps.event.addListener(autocomplete, 'place_changed', onPlacesChange);
		}

		function onPlacesChange() {
			var place = autocomplete.getPlace();
			//alert(places.result);
			//document.getElementById('city2').value = place.name;
			document.getElementById('cityLat').value = place.geometry.location.lat();
			document.getElementById('cityLng').value = place.geometry.location.lng();
		}

		//google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</head>
<body>
<script src='https://www.google.com/recaptcha/api.js'></script>
<section class="main_registration"
		 style="background-image: url('<?php echo base_url(); ?>assets/v2/images/bg_image.jpg')">
	<div class="w-100 text-center">
		<div class="mb-5">
			<h1 class="text-light">Register a new Vendor</h1>
		</div>
		<div class="registration_container p-3 mx-auto">
			<form action="" method="post" onsubmit="return submitUserForm();">
				<div class="row">
					<?php echo validation_errors("<div class='alert alert-danger alert-dismissible'>", "</div>"); ?>
					<div class="col-xl-6 col-sm-6">
						<div class="mb-3 bg-transparent position-relative input_wrapper">
							<!-- <i class="bi bi-lock outline-0 position-absolute"></i> -->
							<div class="position-relative reg_input_wrapper mb-4">
								<i class="bi bi-person-fill outline-0"></i>
								<input type="text" class="form-control rounded" name="brand_name"
									   value="<?php echo set_value('brand_name'); ?>" placeholder="Brand Name">
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<i class="bi bi-key-fill outline-0"></i>
								<input type="password" class="form-control rounded" name="password"
									   placeholder="Password">
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<i class="bi bi-telephone-fill outline-0"></i>
								<input type="text" class="form-control rounded" name="mobile_number"
									   value="<?php echo set_value('mobile_number'); ?>" placeholder="Mobile Number">
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<select class="form-control rounded wide" name="state_id" id="state"
										selectname="Select State" onchange="fillCity(this.value);">
									<option>State</option>
								</select>
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<i class="bi bi-map-fill outline-0"></i>
								<input type="text" class="form-control rounded" name="maplink" id="search_input"
									   value="<?php echo set_value('maplink'); ?>" placeholder="Map Address">
								<input type="text" class="form-control rounded" name="lan" id="cityLat" hidden>
								<input type="text" class="form-control rounded" name="long" id="cityLng" hidden>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-sm-6">
						<div class="mb-3 bg-transparent position-relative input_wrapper">
							<!-- <i class="bi bi-lock outline-0 position-absolute"></i> -->
							<div class="position-relative reg_input_wrapper mb-4">
								<i class="bi bi-envelope-fill outline-0"></i>
								<input type="email" class="form-control rounded" name="email"
									   value="<?php echo set_value('email'); ?>" placeholder="Email">
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<i class="bi bi-key-fill outline-0"></i>
								<input type="password" class="form-control rounded" name="cpassword"
									   placeholder="Confirm Password">
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<select class="form-control rounded wide" name="country_id" id="country_id"
										selectname="Select country" onchange="fillstate(this.value);">
									<option>Country</option>
									<?php
									foreach ($country as $data) {
										echo " <option value='$data->id'>$data->country_name</option>";
									}
									?>
								</select>
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<select class="form-control rounded wide" name="city_id" id="city"
										selectname="Select City">
									<option>City</option>
								</select>
							</div>
							<div class="position-relative reg_input_wrapper mb-4">
								<select class="form-control rounded wide" name="category_id" id="category"
										selectname="Select Category">
								</select>
							</div>
						</div>
					</div>
					<div class="col-xl-12 d-flex justify-content-center">
						<div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_KEY; ?>"></div>
						<div id="g-recaptcha-error"></div>
					</div>
					<div class="col-xl-12">
						<div class="d-flex align-items-center justify-content-between">
							<div class="form-check checkbox_wrapper">
								<label
										for="agreeTerms"
										class="checkbox_container text-light"
								>
									<input type="checkbox" class="form-check-input checkbox_input" id="agreeTerms"
										   name="terms" value="agree">
									I agree to the <a href="#"><span class="text-dark fw-bold">terms</span></a>
								</label>
							</div>
							<button type="submit" class="btn btn-primary shadow-none border-0 text-capitalize reg_btn">
								Register
							</button>
						</div>
						<div class="w-100 text-center">
							<a href="<?php echo base_url(); ?>login"
							   class="text-decoration-none text-capitalize text-light d-flex align-items-center justify-content-center link_box"
							>
								<i class="bi bi-arrow-left ouline-0 me-2"></i>
								I already have a membership
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
</body>
<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"
></script>
<script
		type="text/javascript"
		src="http://code.jquery.com/jquery-1.11.0.min.js"
></script>
<script
		type="text/javascript"
		src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"
></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$(".js-example-basic-single").select2();
	});
</script>
<script>
	function fillstate(id) {
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("state").innerHTML = this.responseText;
			}
		};
		var url = "<?php echo base_url();?>";
		xhttp.open("GET", url + "Getstate?q=" + id, true);
		xhttp.send();
	}

	function fillCity(id) {
		var x = document.getElementById("city");
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("city").innerHTML = this.responseText;
			}
		};
		var url = "<?php echo base_url();?>";
		xhttp.open("GET", url + "Getcity?q=" + id, true);
		xhttp.send();
	}

	function GetCategory() {
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("category").innerHTML = this.responseText;
			}
		};
		var url = "<?php echo base_url();?>";
		xhttp.open("GET", url + "Getcategory", true);
		xhttp.send();
	}

	window.onload = GetCategory;

	function fillInAddress() {
		// Get the place details from the autocomplete object.
		const place = autocomplete.getPlace();
		let address1 = "";
		let postcode = "";

		// Get each component of the address from the place details,
		// and then fill-in the corresponding field on the form.
		// place.address_components are google.maps.GeocoderAddressComponent objects
		// which are documented at http://goo.gle/3l5i5Mr
		for (const component of place.address_components) {
			const componentType = component.types[0];

			switch (componentType) {
				case "street_number": {
					address1 = `${component.long_name} ${address1}`;
					break;
				}

				case "route": {
					address1 += component.short_name;
					break;
				}

				case "postal_code": {
					postcode = `${component.long_name}${postcode}`;
					break;
				}

				case "postal_code_suffix": {
					postcode = `${postcode}-${component.long_name}`;
					break;
				}
				case "locality":
					document.querySelector("#locality").value = component.long_name;
					break;

				case "administrative_area_level_1": {
					document.querySelector("#state").value = component.short_name;
					break;
				}
				case "country":
					document.querySelector("#country").value = component.long_name;
					break;
			}
		}
		address1Field.value = address1;
		postalField.value = postcode;
		// After filling the form with address components from the Autocomplete
		// prediction, set cursor focus on the second address line to encourage
		// entry of subpremise information such as apartment, unit, or floor number.
		address2Field.focus();
	}
</script>
<!-- jQuery -->
<!--<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<!--Goole Ad Off-->
<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089" crossorigin="anonymous"></script>-->
<!-- Home page -->

<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</html>
<script>
	$(document).ready(function () {
		$('.wide').select2();
	});
</script>

