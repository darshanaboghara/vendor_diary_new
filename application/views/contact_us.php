<style>
	.text-default {
		color: <?php echo $site->colour_name;?> !important;
	}
</style>
<noscript>
	<div class="noscript colrw boxshadow">You have not enabled Javascript on your browser, please enable it to use the
		website
	</div>
</noscript>
<script src='https://www.google.com/recaptcha/api.js'></script>
<section
		class="main_contact d-flex align-items-center justify-content-center"
		style="background-image: url(<?php echo base_url() . 'assets/v2/images/about_bg.jpg'; ?>)"
>
	<div class="container">
		<div class="position-relative">
			<h2 class="text-capitalizes text-light text-center">Contact us</h2>
		</div>
	</div>
</section>
<section class="contact_inner_content my-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="mini_card p-3 d-flex align-items-center mb-3">
					<div class="icon_box">
						<i class="bi bi-person-circle"></i>
					</div>
					<div class="inner_content">
						<h3 class="mb-xl-2">Customer Support</h3>
						<p class="mb-2">
							Phone number:
							<a href="tel:<?php echo $site->contact_no; ?>" class="d-inline-block text-decoration-none"
							>+<?php echo $site->contact_no; ?></a
							>
						</p>
						<p>
							Email Us:
							<a class="d-inline-block text-decoration-none"
							   href="mailto:<?= @$site->contact_email ?>"> <?php echo $site->contact_email ?></a
							>
						</p>
					</div>
				</div>
				<div class="mini_card p-3 d-flex align-items-center mb-3">
					<div class="icon_box">
						<i class="bi bi-geo-alt-fill"></i>
					</div>
					<div class="inner_content">
						<h3 class="mb-xl-2">Our Address</h3>
						<p class="mb-2">
							<strong>Address:</strong>
							<span class="text-default"><?php echo $site->full_address; ?></span></p>
					</div>
				</div>
				<div class="mini_card p-3 d-flex align-items-center mb-3">
					<div class="icon_box">
						<i class="bi bi-envelope-fill"></i>
					</div>
					<div class="inner_content">
						<h3 class="mb-xl-2">Other Enquiries</h3>
						<p class="mb-2">
							Please contact us at the email below for all other inquiries.
						</p>
						<p>
							Email Us:
							<a class="d-inline-block text-decoration-none"
							   href="mailto:<?= @$site->contact_email ?>"><?php echo $site->contact_email ?></a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="text-center contact_title">
					<h3 class="mb-3">Let's Get In Touch!</h3>
					<p>
						We always love to hear from our customers! We are happy to answer your questions and
						assist you
					</p>
				</div>
				<div class="contact_input mt-4">
					<form name="contact_us" method="post" onsubmit="return submitUserForm();"
						  action="<?php echo base_url(); ?>Customercomment">
						<input
								class="form-control shadow-none rounded-pill py-0 px-3 mb-4"
								id="name" type="text" name="name" placeholder="Full Name"
								data-valid="required" required
						/>
						<div class="d-flex align-items-center w-100 mb-4">
							<input
									type="email"
									class="form-control shadow-none rounded-pill py-0 px-3 w-50 me-2"
									id="email" name="email" value="" placeholder="Email"
									data-valid="required" required
							/>
							<input
									type="text"
									class="form-control shadow-none rounded-pill py-0 px-3 w-50"
									id="mobile_number" name="mobile_number"
									placeholder="Mobile Number" value=""
									data-valid="required" required
							/>
						</div>
						<textarea
								class="form-control shadow-none"
								cols="3"
								rows="3"
								id="desc" name="desc"
								placeholder="Write Comment" data-valid="required" maxlength="500"
								required
						></textarea>
						<div class="my-2 d-flex justify-content-center">
							<div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_KEY; ?>"></div>
							<div id="g-recaptcha-error"></div>
						</div>
						<div class="mt-4">
							<button
									type="submit" name="contactus" id="contactus"
									class="btn btn-primary shadow-none text-capitalize border-0 d-block p-0"
									onclick="ContactUS.QueryForm(event);"
							>
								submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!--recaptcha started -->
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

<!--end recaptcha-->
<!-- /.contact-form -->
<!-- contact-block-section -->
</html>
