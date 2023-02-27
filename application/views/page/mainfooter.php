<section class="main_footer py-5 px-3">
	<div class="container">
		<div class="row">
			<div class="col-xl-2 col-md-6">
				<div>
					<h6 class="text-capitalize">About Company</h6>
					<ul class="mt-3 px-0">
						<li class="list-unstyled mb-2">
							<a
									href="<?php echo base_url(); ?>aboutus"
									class="text-capitalize text-light text-decoration-none"
							>
								about us
							</a>
						</li>
						<li class="list-unstyled mb-2">
							<a
									href="<?php echo base_url(); ?>Contactus"
									class="text-capitalize text-light text-decoration-none"
							>
								Contact us
							</a>
						</li>
						<li class="list-unstyled mb-2">
							<a
									href="<?php echo base_url(); ?>privacyPolicy"
									class="text-capitalize text-light text-decoration-none"
							>
								Privacy Policy
							</a>
						</li>
						<li class="list-unstyled mb-2">
							<a
									href="<?php echo base_url(); ?>TermsofService"
									class="text-capitalize text-light text-decoration-none"
							>
								Terms of Uses
							</a>
						</li>
						<li class="list-unstyled mb-2">
							<a
									href="<?php echo base_url(); ?>faq"
									class="text-capitalize text-light text-decoration-none"
							>
								FAQ
							</a>
						</li>
						<li class="list-unstyled mb-2">
							<a
									href="http://vendordiary.com.au/"
									class="text-capitalize text-light text-decoration-none"
							>
								Australia
							</a>
						</li>
						<li class="list-unstyled mb-2">
							<a
									href="http://vendordiary.co.nz/"
									class="text-capitalize text-light text-decoration-none"
							>
								New Zealand
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-2 col-md-6">
				<div>
					<h6 class="text-capitalize mb-3">Contact Address</h6>
					<a
							href="tel:<?= @$site->contact_no; ?>"
							class="d-flex align-items-center text-decoration-none text-light mb-2"
					>
						<i class="bi bi-telephone-outbound-fill me-2"></i>
						<?= @$site->contact_no; ?></a
					>
					<a
							href="mailto:<?= @$site->contact_email ?>"
							class="d-flex align-items-center text-decoration-none text-light"
					>
						<i class="bi bi-envelope-fill me-2"></i>
						<?= @$site->contact_email ?>
					</a>
				</div>
			</div>
			<div class="col-xl-4 text-md-center mt-md-4 mt-xl-0">
				<div>
					<h6 class="text-capitalize mb-3">List you Business</h6>
					<p class="text-light mb-3">
						Are you vendor ? List your venue and service get more from
						<br>listing business.
					</p>
					<a
							href="<?php echo base_url(); ?>Registration"
							class="d-block btn btn-primary text-capitalize w-50 mx-auto border-0 shadow-none business_link"
					>List your Business</a
					>
				</div>
			</div>
			<div class="col-xl-2 col-md-6 mt-md-4 mt-xl-0">
				<a href="#">
					<img src="<?php echo base_url(); ?>/assets/v2/images/logo.png" alt="" class="w-100"/>
				</a>
			</div>
			<div class="col-xl-2 col-md-6 mt-md-4 mt-xl-0">
				<div>
					<h6 class="text-capitalize mb-3 text-start text-md-center">
						Follow Us
					</h6>
					<div class="d-flex align-items-center justify-content-md-center">
						<a
								href="<?php echo  $site->facebook_link;?>"
								class="text-decoration-none me-1 footer_link_box d-flex align-items-center justify-content-center"
						>
							<i class="fab fa-facebook-f"></i>
						</a>
						<!--<a
								href="<?php /*echo  $site->twitter_link;*/?>"
								class="text-decoration-none me-1 footer_link_box d-flex align-items-center justify-content-center"
						>
							<i class="fab fa-twitter"></i>
						</a>-->
						<a
								href="<?php echo  $site->linkedin_link;?>"
								class="text-decoration-none me-1 footer_link_box d-flex align-items-center justify-content-center"
						>
							<i class="fab fa-linkedin"></i>
						</a>
						<a
								href="<?php echo  $site->google_link;?>"
								class="text-decoration-none me-1 footer_link_box d-flex align-items-center justify-content-center"
						>
							<i class="fab fa-pinterest"></i>
						</a>
					</div>
					<div class="twitter_link mt-3">
						<a href="https://twitter.com/intent/tweet?screen_name=vendordiary&ref_src=twsrc%5Etfw" class="text-decoration-none text-light d-flex align-items-center px-2 py-1" data-show-count="false">Tweet to @TwitterDev</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					<iframe class="footer_btn_box d-flex align-items-center mt-3 justify-content-center" src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/Vendor-Diary-103751005496842&width=450&layout=standard&action=like&size=large&share=true&height=35&appId" width="280" height="35" style="border:none;overflow:hidden;color:white" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
				</div>
			</div>
			<div class="col-xl-12 mt-4">
				<div class="copy_wright_content py-2">
					<p><?php echo  $site->footer_text;?></p>
				</div>
			</div>
		</div>
	</div>
</section>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"
></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(".categories").slick({
		dots: false,
		cssEase: "linear",
		arrows: true,
		fade: true,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 2000,
	});
</script>

</html>
<style>
	.icon-square:hover
	{
		/*background-color: <?php echo $site->colour_name;?>;*/
		color: <?php echo $site->font_color;?>;
	}
	/*.vendor-icon-circle:hover p*/
	/*{*/
	/*    color: <?php echo $site->colour_name;?>;*/
	/*}*/
	.footer-widget ul li a:hover
	{
		color: <?php echo $site->colour_name;?>;
	}
</style>
<!-- Start of HubSpot Embed Code -->
<!--<script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/20288544.js"></script>-->
<!--https://app.hubspot.com/live-messages/20288544/inbox/-->
<!-- End of HubSpot Embed Code -->


<!-- Start of HubSpot Embed Code -->
<!--<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25116719.js"></script>-->
<!--https://app.hubspot.com/live-messages/25116719/inbox/-->
<!-- End of HubSpot Embed Code -->


<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/61a5c8089099530957f74129/1flnpap9i';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
</script>
<!--End of Tawk.to Script-->


<!--Visiter time out start -->
<script>
	setTimeout(function(){
		// location.reload("<?php echo base_url()?>Customerlogin")
		//modal.style.display = "block";
		// window.location.replace('<?php echo base_url()?>Customerlogin');

	},5000);

</script>
<script>
	$(document).ready(function() {
		$('.wide').select2();
	});
</script>
<style>
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		line-height: 50px !important;
	}
	.select2-container .select2-selection--single {
		height: 50px !important;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow b{
		top:100% !important;
	}
</style>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<script>
	/*     if (!navigator.serviceWorker.controller) {
		navigator.serviceWorker.register("/serviceworker.js").then(function(reg) {
			console.log("Service worker has been registered for scope: " + reg.scope);
		});
	}*/
</script>

<!-- GetButton.io widget -->
<script type="text/javascript">
	(function () {
		var options = {
			whatsapp: "+918488939330", // WhatsApp number
			call: "+918488939330", // Call phone number
			call_to_action: "Message us", // Call to action
			button_color: "#129BF4", // Color of button
			position: "left", // Position may be 'right' or 'left'
			order: "whatsapp,call", // Order of buttons
			pre_filled_message: "Hello There, I have an inquiry", // WhatsApp pre-filled message
		};
		var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
		s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
		var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
	})();
</script>
<!-- /GetButton.io widget -->
