<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

	<meta name="robots" content="index, follow">
	<title><?php echo $site->website_title;?></title>
	<meta name="description" content="<?php echo $site->website_description;?>" />
	<meta name="keyword" content="<?php echo $site->website_keywords;?>">

	<meta property="og:title" content="<?php echo $site->website_title;?>">
	<meta property="og:url" content="<?php echo base_url();?>">
	<meta property="og:description" content="<?php echo $site->website_description;?>">
	<meta property="og:image" content="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>favicons/<?php echo  $site->upload_favicon ?>">
	<!--<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>favicons/favicon-16x16.png">-->
	<link rel="manifest" href="<?php echo base_url(); ?>favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<title></title>
	<meta name="description" content="" />
	<meta name="referrer" content="origin">

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
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/v2/css/login.css"/>

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

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		#overlay {
			position: fixed;
			display: none;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: rgba(0,0,0,0.5);
			z-index: 2;
			cursor: pointer;
		}
		img
		{
			padding-left: 15px !important;
		}
	</style>
	<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
	<meta name="google-signin-client_id" content="<?php echo GOOGLE_AUTH_CID;?>">
	<script>
		function onSuccess(googleUser) {
			console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
			var profile = googleUser.getBasicProfile();
			console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
			console.log('Name: ' + profile.getName());
			console.log('Image URL: ' + profile.getImageUrl());
			console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
			var id_token = googleUser.getAuthResponse().id_token;
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo base_url()?>Customerlogin/googlelogin');
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//  console.log(this.responseText);
					//   console.log(id_token);
					window.location.href="<?php echo base_url()."Customerdashboard";?>";
				}
			};
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.send('idtoken=' + id_token);

		}
		function onFailure(error) {
			console.log(error);
		}
		function renderButton() {
			gapi.signin2.render('my-signin2', {
				'scope': 'profile email',
				'width': 240,
				'height': 50,
				'longtitle': true,
				'theme': 'dark',
				'onsuccess': onSuccess,
				'onfailure': onFailure
			});
		}
	</script>

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<section class="main_login" style="background-image: url('<?php echo base_url(); ?>assets/v2/images/bg_image.jpg')">
	<div id="overlay"></div>

	<div class="w-100 text-center" id="vendor-login">
		<div class="mb-5">
			<div>
				<img width="200px" src=" <?php echo base_url() . 'assets/images/' . $site->upload_logo; ?>">

			</div>
			<h1 class="text-light">Welcome</h1>
			<p class="text-white">
				Manage your Event or Ceremony with <span>"<?php echo $site->web_frienly_name;?>"</span>
				<div id="message" style="color:red;"><?php echo $this->session->flashdata('message_name');?></div>
			</p>
		</div>
		<div class="login_container p-3 mx-auto">
			<a class="backtohome text-white" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>
				<p>Home</p>
			</a>
				<form name="login" id="login" action="#">
					<div class="row">
						<div class="col-xl-12 col-sm-12">
							<div class="mb-3 bg-transparent position-relative input_wrapper">
								<div class="position-relative reg_input_wrapper mb-4">
									<i class="bi bi-envelope-fill outline-0"></i>
									<input id="email" type="email" name="email" placeholder="Email" class="form-control" data-valid="required"  tabIndex="1" autofocus autocomplete="off">
									<div id="error"></div>
								</div>
								<div class="position-relative reg_input_wrapper mb-4">
									<i class="bi bi-key-fill outline-0"></i>
									<input id="newpassword" type="password" name="password" placeholder="Password" class="form-control" data-valid="required"  tabIndex="1" autofocus autocomplete="off">
									<div id="errorpaassword"></div>
								</div>
								<div class="position-relative reg_input_wrapper mb-4">
									<div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_KEY;?>"></div>
									<div id="g-recaptcha-error"></div>
								</div>
							</div>
						</div>
						<div class="col-xl-12">
							<div class="d-flex align-items-center justify-content-between">
								<p class="mt-2">
									<a href="javascript:void(0);" onclick="ForgotPassword();"
									   class="wizard-form-small-text"> Forgot your password?
									</a>
								</p>
								<button type="submit" onclick="newlogin();" tabIndex="2" name="loginbutton" value="LOGIN"
										id="loginbutton"
										class="btn btn-primary shadow-none border-0 text-capitalize reg_btn">
									Login
								</button>
							</div>
							<div class="my-2">
								<hr>
								<form name="login2" id="login2" action="#">
									<div class="row">

										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
											<!--<a href="#" id="googlelogout" onclick="signOut();" style="display:none">Sign out</a>-->
											<center> <div id="my-signin2"></div></center>
										</div>

									</div>
								</form>
							</div>
							<div class="w-100 text-center">
								<a href="<?php echo base_url();?>CustomerRegistration"
								   class="text-decoration-none text-capitalize text-light d-flex align-items-center justify-content-center link_box"
								>
									<i class="bi bi-arrow-left ouline-0 me-2"></i>
									Connect with Us Signup Now
								</a>
							</div>
						</div>
					</div>
				</form>
		</div>
	</div>

	<div class="w-100 text-center" id="vendor-reset-password" style="display:none;">
		<div class="mb-5">
			<div>
				<img width="200px" src=" <?php echo base_url() . 'assets/images/' . $site->upload_logo; ?>">
			</div>
			<h1 class="text-light">Forgot Your Password?</h1>
			<p class="text-white">Don't worry, it happens to the best of us.</p>
		</div>
		<div class="login_container p-3 mx-auto">
			<a class="backtohome text-white" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>
				<p>Home</p>
			</a>
				<form name="forgot-password" id="forgot-password">
					<div class="row">
						<div class="col-xl-12 col-sm-12">
							<div class="mb-3 bg-transparent position-relative input_wrapper">
								<div class="position-relative reg_input_wrapper mb-4">
									<i class="bi bi-envelope-fill outline-0"></i>
									<input id="forgot_password" type="text" name="forgot_password"
										   placeholder="Email Address" class="form-control" data-valid="required"
										   autocomplete="off">
									<div id="ferror"></div>
								</div>
							</div>
						</div>
						<div class="col-xl-12">
							<div class="d-flex align-items-center justify-content-between">
								<p class="mt-2">
									<a href="javascript:void(0);" onclick="BackToLogin();" class="wizard-form-small-text">
										Back to Login
									</a>
								</p>
								<button type="button" onclick="passwordf();" tabIndex="4" name="loginbutton" value="LOGIN"
										id="loginbutton"
										class="btn btn-primary shadow-none border-0 text-capitalize reg_btn">
									SUBMIT
								</button>
							</div>
							<div class="w-100 text-center">
								<a href="<?php echo base_url();?>CustomerRegistration"
								   class="text-decoration-none text-capitalize text-light d-flex align-items-center justify-content-center link_box"
								>
									<i class="bi bi-arrow-left ouline-0 me-2"></i>
									Connect with Us Signup Now
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
	$(document).on('keypress', 'input,select', function (e) {
		if (e.which == 13) {
			e.preventDefault();
			var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
			console.log($next.length);
			if (!$next.length) {
				$next = $('[tabIndex=1]');
			}
			$next.focus();
		}
	});

	$("#email").keypress(function (event) {
		if (event.keyCode === 13) {
			sendotp();
		}
	});


	function newlogin() {
		document.getElementById("message").innerHTML = "";
		document.getElementById("error").innerHTML = "";
		document.getElementById("errorpaassword").innerHTML = "";
		document.getElementById("g-recaptcha-error").innerHTML = "";
		on();
		var response = grecaptcha.getResponse();
		if (response.length == 0) {
			off();
			document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">validate recaptcha</span>';
			return false;
		}

		var x = document.getElementById("newpassword");
		var z = document.getElementById("email");
		var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		if (!z.value.match(mailformat)) {
			off();
			document.getElementById("error").innerHTML = "<p class='label label-danger'>Enter Valid Email</p>";
			return;
		}
		if (x.value == "") {
			off();
			document.getElementById("errorpaassword").innerHTML = "<p class='label label-danger'>Enter Password</p>";
			return;
		} else {
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					//alert(this.responseText);
					// document.getElementById("error").remove();
					if (this.responseText == "Wrong Password") {
						off();
						document.getElementById("message").innerHTML = "<p class='label label-danger'>" + this.responseText + " </p>";
					} else if (this.responseText == "Email Id Not Found") {
						off();
						document.getElementById("message").innerHTML = "<p class='label label-danger'>" + this.responseText + " </p>";
					} else if (this.responseText == "Login Success") {
						off();
						window.location.replace("Dashboard/My_Profile");
					}
				} else {
					document.getElementById("message").innerHTML = "<p> <img src='http://www.sudburycatholicschools.ca/wp-content/plugins/3d-flip-book/assets/images/dark-loader.gif' style='height: 50px;width: 50px;'> </p>";
					off();
				}
			}

			xhttp.open("GET", "Login/validateemailpwd?password=" + x.value + "&email=" + z.value, true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("password=" + x.value + "&email=" + z.value);
		}
	}

	function on() {
		document.getElementById("overlay").style.display = "block";
	}

	function off() {
		document.getElementById("overlay").style.display = "none";
	}

	function passwordf() {
		on();
		var femail = document.getElementById("forgot_password");
		console.info(femail.value);
		var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		if (!femail.value.match(mailformat)) {
			off();
			document.getElementById("ferror").innerHTML = "<p class='label label-danger'>Enter Valid Email</p>";
			return;
		} else if (femail.value == "") {
			off();
			document.getElementById("ferror").innerHTML = "<p class='label label-danger'>Enter Email</p>";
			return;
		} else {
			console.info(femail.value);
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					off();
					if (this.responseText == "Password Send Sucessfully") {
						alert("Your password send to you an email")
						location.reload();
					} else {
						document.getElementById("ferror").innerHTML = "<p class='label label-danger'> " + this.responseText + " </p>";
					}

				}
			}
			var url = "<?php echo base_url();?>";
			xhttp.open("GET", url + "Login/passwordforgot?email=" + femail.value, true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("&email=" + femail.value);
		}
	}

	function ForgotPassword() {
		// alert("hello");
		document.getElementById("vendor-reset-password").style.removeProperty("display");
		document.getElementById("vendor-login").style.display = "none";
	}

	function BackToLogin() {
		// alert("hello");
		document.getElementById("vendor-login").style.removeProperty("display");
		document.getElementById("vendor-reset-password").style.display = "none";
	}
</script>

<style type="text/css">
	.lds-ellipsis {
		display: inline-block;
		position: relative;
		width: 64px;
		height: 16px;
	}

	.lds-ellipsis div {
		position: absolute;
		top: 6px;
		width: 11px;
		height: 11px;
		border-radius: 50%;
		background: #fff;
		animation-timing-function: cubic-bezier(0, 1, 1, 0);
	}

	.lds-ellipsis div:nth-child(1) {
		left: 6px;
		animation: lds-ellipsis1 0.6s infinite;
	}

	.lds-ellipsis div:nth-child(2) {
		left: 6px;
		animation: lds-ellipsis2 0.6s infinite;
	}

	.lds-ellipsis div:nth-child(3) {
		left: 26px;
		animation: lds-ellipsis2 0.6s infinite;
	}

	.lds-ellipsis div:nth-child(4) {
		left: 45px;
		animation: lds-ellipsis3 0.6s infinite;
	}

	@keyframes lds-ellipsis1 {
		0% {
			transform: scale(0);
		}

		100% {
			transform: scale(1);
		}
	}

	@keyframes lds-ellipsis3 {
		0% {
			transform: scale(1);
		}

		100% {
			transform: scale(0);
		}
	}

	@keyframes lds-ellipsis2 {
		0% {
			transform: translate(0, 0);
		}

		100% {
			transform: translate(19px, 0);
		}
	}
</style>
