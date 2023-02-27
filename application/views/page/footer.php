  <!--  /.are you vendor --><div class="footer">
  <div class="container">
            <div class="row">             
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">About Company </h3>
                        <ul class="listnone">
						<li><a href="<?php echo base_url();?>aboutus">About us</a></li>
						<li><a href="<?php echo base_url();?>Contactus">Contact us</a></li>
						<li><a href="<?php echo base_url();?>privacyPolicy">Privacy Policy</a></li>
						<li><a href="<?php echo base_url();?>TermsofService">Terms of Uses</a></li>
						<li><a href="<?php echo base_url();?>faq">FAQ</a></li>
						<li><a href="http://vendordiary.com.au/"  target="_blank">Australia</a></li>
						<li><a href="http://vendordiary.co.nz/"  target="_blank">New Zealand</a></li>
						<!--	 <a href='https://writingbachelorthesis.com/'>costs ghostwriter bachelor</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=8efa85eeeed7d4f2278081c7c9e263a8513dce5f'></script>-->
<!--<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/870123/t/1"></script>			-->
				      </ul>
                    </div>
                </div>
				 <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">
                            Contact Address
                        </h3>
                        <!--<p><i class="fa fa-map-marker-alt"></i><?=  @$site->full_address?></p>-->
                        <a href="tel:<?=@$site->contact_no;?>"><p class="mb0 "><i class="fa fa-phone-volume"></i>  <?=  @$site->contact_no;?></p></a>
                        <a href="mailto:<?=@$site->contact_email ?>"> <p class="mb0 " ><i class="fa fa-envelope"></i>   <?=  @$site->contact_email?> </p></a>
                    </div>
                </div>
                <!-- /.footer-widget -->
                <!-- /.footer-widget -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">
                            List you Business
                        </h3>
                        <p>Are you vendor ? List your venue and service get more from listing business.</p>
                        <a href="<?php echo base_url();?>Registration" class="btn btn-default btn-sm" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>;border-color:<?php echo $site->colour_name;?>;">List your Business</a>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-12">
				 <div class="footer-widget">
					<h3 class="widget-title"> Follow Us </h3>
					<div class="social-icons">
					<a rel="noopener" aria-label="facebook" href="<?php echo  $site->facebook_link;?>" class="icon-square"target="_blank"><i rel="noopener" class="fab fa-facebook-f"></i></a>
					<a rel="noopener" aria-label="twitter" href="<?php echo  $site->twitter_link;?>" class="icon-square" target="_blank"><i rel="noopener" class="fab fa-twitter"></i> </a>
					<a rel="noopener" aria-label="linkedin"  href="<?php echo  $site->linkedin_link;?>" class="icon-square" target="_blank"><i rel="noopener" class="fab fa-linkedin"></i></a>
					<a rel="noopener" aria-label="pinterest"  href="<?php echo  $site->google_link;?>" class="icon-square" target="_blank"><i rel="noopener" class="fab fa-pinterest"></i></a>
					</div>
				</div>
				<!--Twitter Button-->
				<a href="https://twitter.com/intent/tweet?screen_name=vendordiary&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">Tweet to @TwitterDev</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<!--Facebook Btn-->
				<!--<div class="fb-like" data-href="https://www.facebook.com/search/top?q=vendordiary" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>-->
				<!--<div id="fb-root"></div>-->
    <!--            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="ltviux9a"></script>-->
    
    <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/Vendor-Diary-103751005496842&width=450&layout=standard&action=like&size=large&share=true&height=35&appId" width="280" height="35" style="border:none;overflow:hidden;color:white" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    
                <!--Linked in-->
<!--                <script src="https://platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>-->
<!--<script type="IN/FollowCompany" data-id="1337" data-counter="bottom"></script>-->
			  </div>
                <!-- /.footer-widget -->
            </div>
        </div>
    </div>    
<!-- tiny-footer-section -->
<div class="tiny-footer">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
				<p><?php echo  $site->footer_text;?></p>
			</div>
		</div>
	</div>
 </div>
 
<!--new footer-->

<!--end new footer-->

<!--<div class="gotohome"><a href="https://www.vakomatrimonial.com/"><img src="<?Php echo base_url();?>assets/images/VAKOLOGO.png"/> vako Home</a></div>-->
<!-- <div class="hiring"><a href="http://tanisha.careersitemanager.com/" target="_blank"><img src="<?Php echo base_url();?>assets/images/VAKOLOGO.png" alt='' id='HP_Bottom_Career_Banner'></a></div> -->
<!-- /.tiny-footer-section --> 



</body>

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
<!--<script async="" defer="" src="//survey.g.doubleclick.net/async_survey?site=nelvaqincneukehbtz3jv66bby"></script>-->
