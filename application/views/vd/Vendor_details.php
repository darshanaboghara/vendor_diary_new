<?php

// echo ' <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089" crossorigin="anonymous"></script>
// <ins class="adsbygoogle"
//                      style="display:block"
//                      data-ad-format="fluid"
//                      data-ad-layout-key="-6x+cq+4a-w-1w"
//                      data-ad-client="ca-pub-8898782763527089"
//                      data-ad-slot="3287615491"></ins>
//                       <script>
//                      (adsbygoogle = window.adsbygoogle || []).push({});
//                 </script>' ;
if ($vdata == null) {
?>
  <div class="vendor-content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <center>
            No data Found 
            <br>
            <a class="footer-widget" style="color: red;" href="<?php echo base_url(); ?>">Go to Home</a>
          </center>
          
        </div>
      </div>
    </div>
  </div>
<?php
} else {
        $this->OH->addvendorview($vdata[0]->id,"Open Profile",null)
?>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animations.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--Ring Phone-->
    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
  <div class="vendor-content-wrapper fadeIn" style="padding-top: 10px;" id="object">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
          <!--vendor-details -->
          <div class="v-img_shadowbox" style="border-radius: 20px;">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" style="width:auto; ">
                    <div class="carousel-item active">
                       <!-- <?=  $vdata[0]->id;?>
                        <?php echo base_url() .IMAGELINK .  $vdata[0]->image;  ?>-->
                        
                      <img class="d-block image" src='<?php echo (file_exists(IMAGELINK .  $vdata[0]->image))? base_url() . IMAGELINK .  $vdata[0]->image :base_url()."assets/images/wedding-planner/defulatimg.jpeg";  ?>' alt="First slide">
                    </div>
                    <div class="carousel-item ">
                      <img class="d-block image"  src="<?php echo (file_exists(IMAGELINK . $vdata[0]->image_2))? base_url() . IMAGELINK . $vdata[0]->image_2 : base_url().'assets/images/wedding-planner/demo.jpg';  ?>" alt="First slide2">
                    </div>
                    <div class="carousel-item ">
                      <img class="d-block  image" src="<?php echo (file_exists(IMAGELINK . $vdata[0]->image_3))? base_url() . IMAGELINK . $vdata[0]->image_3 : base_url().'assets/images/wedding-planner/demo2.jpeg';  ?>" alt="First slide3">
                    </div>
                    <div class="carousel-item ">
                      <img class="d-block  image" src="<?php echo (file_exists(IMAGELINK . $vdata[0]->image_4))? base_url() . IMAGELINK . $vdata[0]->image_4 : base_url().'assets/images/wedding-planner/demo3.jpeg';  ?>" alt="First slide4">
                    </div>
                    <div class="carousel-item ">
                      <img class="d-block image " src="<?php echo (file_exists(IMAGELINK . $vdata[0]->image_5))? base_url() . IMAGELINK . $vdata[0]->image_5 : base_url().'assets/images/wedding-planner/demo4.jpeg';  ?>" alt="First slide5">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            
            <div class="vendor-infobox">
              <div class="vendorheading">
                <div class="vcontent">
                  <h2 class="h1" style="color:black;"><?php echo $vdata[0]->business_name ?></h2>
                  <p>
                    <i class="fa fa-map-marker-alt">
                    </i> <?php echo $vdata[0]->address ?>
                  </p>
                </div>
                <div class="vendor-gllry text-left">
                  <!--<a href="" class="btn-default-wishlist" id="open-popup" style="color:<?php echo $site->colour_name;?>;">-->
                  <!--  <i class="fa fa-images">-->
                  <!--  </i>-->
                  <!--  <span class="pl-1"> View Gallery-->
                  <!--</a>-->
                  <a href="#EnquiryPopUp" style="color:<?php echo $site->colour_name;?>" onclick="EnquiryPopUp('<?php echo  $vdata[0]->id  ?>','vendor-details','<?php echo $vdata[0]->planner_name ?>');" class="btn-default-wishlist shake-little" id="app-emp-phone-txt">
                    <i class="fa fa-phone-volume ">
                    </i>
                    <?php if(isset($this->session->idtoken))
                        {
                              echo $vdata[0]->mobile;
                        }
                        else
                        {
                            echo 'Send Enquiry';
                        }
                        
                    ?>
                    
                  </a>
                  <?php 
                  if($vdata[0]->RegisterBy=="ADMIN")
                  if($vdata[0]->business_claim=="No")
                  {?>
                      <a href="#ClaimBusiness" style="color:<?php echo $site->colour_name;?>" onclick="ClaimPopUp('<?php echo  $vdata[0]->id  ?>','vendor-details','<?php echo $vdata[0]->planner_name ?>');" class="btn-default-wishlist" id="Cliam ">claim this business</a>
                 <?php }?>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="card border card-shadow-none">
              <h3 class="card-header bg-white">About <?php echo $vdata[0]->business_name ?> </h3>
              <div class="card-body">
                <!--/.vendor-details -->
                <!--vendor-description -->
              
          
                <p> <?php echo $vdata[0]->description ?></p>
              </div>
            </div>
            <!--vendor-description -->
            <div class="card border card-shadow-none">
              <h3 class="card-header bg-white">Vendor Detail</h3>
              <div class="card-body vendorcard-info">

                <div class="row">
                  <div class="col-sm-12 nopadding">
                    <h3>Contact Person Name</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->contact_person_name ?>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-12 col-md-6 nopadding">
                    <h3>Industry Experience</h3>
                    <div class="tab-data address">
                      12 Years
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6 nopadding">
                    <h3>Package</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->package ?>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-12 col-md-6 nopadding">
                    <h3>Start Rate Range</h3>
                    <div class="tab-data address">
                        ₹<?php echo $vdata[0]->start_rate_range ?>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6 nopadding">
                    <h3>End Rate Range</h3>
                    <div class="tab-data address">
                      ₹<?php echo $vdata[0]->end_rate_range ?>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-12 col-md-6 nopadding">
                    <h3>Capacity</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->capacity ?>
                    </div>
                  </div>
                </div>
                <?php if($vdata[0]->youtube_link)
                {?>
                <div class="row">
                  <div class="col-sm-12 col-md-6 nopadding">
                    <h3>Youtube</h3>
                    <div class="tab-data address">
                     <iframe width="500" height="345" src="<?php echo $vdata[0]->youtube_link ?>">">
                        </iframe>
                    </div>
                  </div>
                </div>
                <? }?>
                <div class="row">
                  <div class="col-sm-12 nopadding">
                    <h3>Vendor Address</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->address ?>
                    </div>
                  </div>
                </div>
                <?php if($vdata[0]->lat!=null && $vdata[0]->long!=null || $vdata[0]->map_location)
                
                {?>
                    <div class="row">
                      <div class="col-sm-12 nopadding">
                        <h3>Google Map</h3>
                        <div class="tab-data address">
                          <iframe src=" <?php echo $vdata[0]->map_location ?>" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                          <div id="map"></div>
                          <script>
                              function initMap() {
                                  // The location of Uluru
                                  const uluru = { lat: <?php echo $vdata[0]->lat ?>, lng: <?php echo $vdata[0]->long ?> };
                                  // The map, centered at Uluru
                                  const map = new google.maps.Map(document.getElementById("map"), {
                                    zoom: 18,
                                    center: uluru,
                                  });
                                  // The marker, positioned at Uluru
                                  const marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map,
                                  });
                                }
                          </script>
                          <script      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLzGfV_ht6iFLE1t4CZlL40BmwhhqOlyw&callback=initMap&libraries=&v=weekly"      async ></script>
                        </div>
                      </div>
                    </div>
                <?php }
                else
                {?>
                    <div class="row">
                      <div class="col-sm-12 nopadding">
                        <h3>Google Map</h3>
                        <div class="tab-data address">
                          No Map Added
                        </div>
                      </div>
                    </div>
                <?php }?>
                
              </div>
            </div>
           
            <!--Vendor social media-->
            <?php if($vdata[0]->plan_status=="Paid")
            {
            ?>
            <div class="card border card-shadow-none">
              <h3 class="card-header bg-white">Social media </h3>
              <div class="card-body">
                <!--/.vendor-details -->
                <!--vendor-description -->
                <!-- Facebook -->
                    <a href="<?php echo $vdata[0]->facebook_link ?>"><i class="fab fa-facebook-f"></i></a>
                    
                    <!-- Twitter -->
                    <a href="<?php echo $vdata[0]->twitter_link ?>">
                        <i class="fab fa-twitter"></i>
                    </a> 
                    <!-- Google -->
                    <a href="<?php echo $vdata[0]->google_link ?>">
                        <i class="fab fa-google"></i>
                    </a>
                    <!-- Instagram -->
                    <a href="<?php echo $vdata[0]->linkedin_link ?>">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <!-- Linkedin -->
                    
                    <a href="whatsapp://send?text=https://vendordiary.com/Vendor_details?vid=<?php echo $vdata[0]->id;?>" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
                    
                    <div id="fb-root"></div>
                    <?$this->load->helper('url');
            
            $currentURL = current_url();?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0" nonce="CSwoyfBU"></script>
<div class="fb-share-button" data-href="https://vendordiary.com/Vendor_details?vid=<?php echo $vdata[0]->id;?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=$currentURL."?vid=".$vdata[0]->id?>" class="fb-xfbml-parse-ignore">Share</a></div>
                
              </div>
            </div>
            
            <?php }?>
            
            
             <!--Google Ads-->
            <?php if($vdata[0]->plan_status!="Paid")
            {
            ?>
           
                 <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8898782763527089"
                     data-ad-slot="5983426633"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                     <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
               
            <?php }?>
            <!--Vendor Time-->
            <div class="card border card-shadow-none">
              <h3 class="card-header bg-white">Time </h3>
              <div class="card-body">
                <div class="row">
                  <div class="col-6 nopadding">
                    <h3>Monday</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->monday_from_time ?> to <?php echo $vdata[0]->monday_to_time ?>
                    </div>
                  </div>
                  <div class="col-6 nopadding">
                    <h3>Tuesday</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->tuesday_from_time ?> to <?php echo $vdata[0]->tuesday_to_time ?>
                    </div>
                  </div>
                </div>   
                <div class="row">
                  <div class="col-6 nopadding">
                    <h3>Wednesday</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->wednesday_from_time ?> to <?php echo $vdata[0]->wednesday_to_time ?>
                    </div>
                  </div>
                  <div class="col-6 nopadding">
                    <h3>Thursday</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->thursday_from_time ?> to <?php echo $vdata[0]->thursday_from_time ?>
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-6 nopadding">
                    <h3>Friday</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->friday_from_time ?> to <?php echo $vdata[0]->friday_from_time ?>
                    </div>
                  </div>
                  <div class="col-6 nopadding">
                    <h3>Saturday</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->saturday_to_time ?> to <?php echo $vdata[0]->saturday_to_time ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 nopadding">
                    <h3>Sunday</h3>
                    <div class="tab-data address">
                      <?php echo $vdata[0]->sunday_from_time ?> to <?php echo $vdata[0]->sunday_from_time ?>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            
             <!--Vendor Review-->
            <div class="card border card-shadow-none">
              <h3 class="card-header bg-white">Vendor Review </h3>
              <div  class="card-body ex1">
                <!--/.vendor-details -->
                <!--vendor-description -->
                <?php
                if(!$vreviews)
                {
                    echo "No Review";
                }
                foreach($vreviews as $rdata)
                {
                ?>
                    <span><b><?php echo $rdata->r_name;?></b></span>
                    <?php $rating=$rdata->r_star;?>
                        <span class="rating-star" >
                            <?php $rcount=1;
                            for($i=0;$rating!=$i;$i++)
                            {
                                ?><i class="fa fa-star rated"></i><?php
                                $rcount=$rcount+1;
                            }
                            ?>
                            <?php for($i=0;$i!=5-$rating;$i++)
                            {
                                ?><i class="fa fa-star mute_rated"></i><?php
                                 $rcount=$rcount+1;
                            }
                            ?>
                        </span>
                        <br>
                        <span><?php echo $rdata->r_message;?></span>
                        <br>
                <?php    
                }
                ?>
              </div>
            </div>
             <!--Vendor Random-->
             
              <?php if($vdata[0]->plan_status!="Paid")
            {
            ?>
                <div class="card border card-shadow-none">
              <h3 class="card-header bg-white">Recommendation</h3>
              <div  class="card-body">
                  <iframe src="https://vendordiary.com/GetVendor/vendorrandom?category_id=<?=$vdata[0]->category_id?>&country_id=<?=$vdata[0]->country_id?>&state_id=<?=$vdata[0]->state_id?>&city_id=<?=$vdata[0]->city_id?>" allowfullscreen style=" left:0; top:0; width:100%; "  height="350px" frameBorder="0">
                    </iframe>
                    
                   
<!-- Home page -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8898782763527089"
                     data-ad-slot="5983426633"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                     <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
               
              </div>
            </div>
            <?}?>
            
             <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>               
 <amp-ad width="100vw" height="320"
     type="adsense"
     data-ad-client="ca-pub-8898782763527089"
     data-ad-slot="7583292577"
     data-auto-format="mcrspv"
     data-full-width="">
  <div overflow=""></div>
</amp-ad>   
          </div>
          <!-- /.review-content -->
        </div>
        <!-- list-sidebar -->
        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
          <div class="sidebar-venue">
            <div class="card">
              <div class="card-body">
                <form method="POST" action="<?php echo base_url(); ?>Venorenquiry" name="sendRequest" id="sendRequest">
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <h3 class="mb20">Request Quote
                      </h3>
                    </div>
                    <input id="vendorid" name="vendor_id" type="hidden" value="<?php echo $vdata[0]->id ?>" />
                    <input id="pagesource" name="pagesource" type="hidden" value="vender-details" />
                    <!-- Text input-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <label class="control-label sr-only" for="en_name">Name
                        </label>
                        <input id="en_name" name="full_name" required type="text" placeholder="Name" class="form-control input-md"  value="<?php if ($this->session->googlelogin == TRUE) { echo $this->session->googlename; }?>" data-valid="required" />
                      </div>
                    </div>
                     <!-- Text input-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <label class="control-label sr-only" for="en_email">Email Address
                        </label>
                        <input id="en_email" name="email_id" type="email" required placeholder="Email Address" value="<?php if ($this->session->googlelogin == TRUE) { echo $this->session->googleemail; }?>" class="form-control input-md" data-valid="required" />
                      </div>
                    </div>
                    <!-- Text input-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <label class="control-label sr-only" for="en_mobile">Mobile
                        </label>
                        <input id="en_mobile" name="mobile_number" required type="tel" placeholder="Mobile Nummber" pattern="[0-9]{10}" class="form-control input-md" maxlength="10" data-valid="required" />
                        <small>Format: 9XXXXXXXX9</small>
                      </div>
                    </div>
                   
                    <!-- Textarea -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <label class="control-label sr-only" for="comments">Comment
                        </label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write Comment" maxlength="500" data-valid="required"></textarea>
                      </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <input type="submit" name="Submit" value="Submit" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>;border-color:<?php echo $site->colour_name;?>;" class="btn btn-primary btn-block" id="SendRequest">
                      </div>
                    </div>
                  </div>
                </form>
                <form name="quote_form-otp" id="quote_form-otp" style="display:none;">
                  <div class="row">
                    <div id="quote-form-otp">
                      <input id="otp_id" name="otp_id" type="hidden" value="3" />
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <!-- form-heading-title -->
                        <h3>Verify Mobile Number</h3>
                        <p>OTP has been sent to you on your mobile number. Please enter it below.</p>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="control-label sr-only" for="input_otp"></label>
                          <input id="input_otp" type="text" name="input_otp" placeholder="Enter 6 digit OTP" class="form-control" data-valid="required" maxlength="6" />
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                          <a href="JavaScript:void(0);" id="resendotp" onclick="Mobile.OtpResend(event);" class="sendotp">Resend OPT</a>
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                        <div class="form-group">
                          <button type="submit" name="singlebutton" id="verify_otp" class="btn btn-default btn-sm" onclick="Mobile.Otp(event);">Submit</button>
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
      <!-- /.list-sidebar -->
    </div>
  </div>
  </div>


  <!-- Popup Enquiry form -->
  <div id="EnquiryPopUp" class="enquiry-container overlay mt-4">
    <div class="enquiry-form">
      <a class="close" href="#">&times;
      </a>
      <div class="content">
        <h2 style="color:<?php echo $site->colour_name;?>;"><?php echo $vdata[0]->business_name ?>
        </h2>
      </div>
      <div class="main-form">
        <!-- /.form-heading-title -->
        <!-- register-form -->
        <form method="POST" action="<?php echo base_url(); ?>Venorenquiry" name="send-enquiry" id="send-enquiry">
          <!-- form -->
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <!-- form-heading-title -->
              <h3 id="quote-text" style="color:<?php echo $site->colour_name;?>;"></h3>
              <p id="quote-shorttext">Fill this form and vendor will contact you shortly.</p>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <input id="page_source" name="page_source" type="hidden" value="vender-listing" />
              <input id="vendor_id" name="vendor_id" type="hidden" value="" />
              <input id="service_type" name="service_type" type="hidden" value="" />
              <!-- Text input-->
              <div class="form-group">
                <label class="control-label sr-only" for="full_name">
                </label>
                <input id="full_name" type="text" name="full_name" placeholder="Name" class="form-control" value="<?php if ($this->session->googlelogin == TRUE) { echo $this->session->googlename; }?>" required data-valid="required">
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <!-- Text input-->
              <div class="form-group service-form-group">
                <label class="control-label sr-only" for="email_id">
                </label>
                <input id="email_id" name="email_id" type="email" placeholder="Email Address" class="form-control" value="<?php if ($this->session->googlelogin == TRUE) { echo $this->session->googleemail; }?>" required data-valid="required" />
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <!-- Text input-->
              <div class="form-group service-form-group">
                <label class="control-label sr-only" for="mobile_number">
                </label>
                <input id="mobile_number" type="tel" name="mobile_number" placeholder="Mobile Nummber" class="form-control" value="" required maxlength="10" data-valid="required" />
              </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <!-- Text input-->
                    <div class="form-group service-form-group">
                        <label class="control-label sr-only" for="comment">
                        </label>
                        <textarea id="comment" required type="comment" name="comment" placeholder="Comment" class="form-control" value="" data-valid="required" ></textarea>
                        <!--<input id="comment" required type="comment" name="comment" placeholder="Comment" class="form-control" value="" maxlength="10" data-valid="required" />-->
                    </div>
            </div>
            <!-- Button -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
              <input type="submit" name="singlebutton" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>;border-color:<?php echo $site->colour_name;?>;" class="btn btn-default btn-sm" name="Send" value="Send" id="SendEnquiry">
            </div>
          </div>
        </form>
        <form name="quote_form_otp" id="quote_form-otp" class="quote_form-otp" style="display:none;">
          <div class="row">
            <div id="quote-form-otp">
              <input id="otp_id" name="otp_id" type="hidden" value="3" />
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <!-- form-heading-title -->
                <h3>Verify Mobile Number</h3>
                <p>OTP has been sent to you on your mobile number. Please enter it below.</p>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <!-- Text input-->
                <div class="form-group">
                  <label class="control-label sr-only" for="input_otp"></label>
                  <input id="input_otp" type="text" name="input_otp" placeholder="Enter 6 digit OTP" class="form-control" data-valid="required" maxlength="6" />
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="form-group">
                  <a href="JavaScript:void(0);" id="resendotp" onclick="Mobile.OtpResend(event);" class="sendotp">Resend OPT</a>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                <div class="form-group">
                  <button type="submit" name="singlebutton" id="verify_otp" class="btn btn-default btn-sm" onclick="Mobile.Otp(event);">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--End enquiry from -->
  <!-- Popup Claim Business form -->
  <div id="ClaimBusiness" class="enquiry-container overlay mt-4">
    <div class="enquiry-form">
      <a class="close" href="#">&times;
      </a>
      <div class="content">
        <h2 style="color:<?php echo $site->colour_name;?>;"><?php echo $vdata[0]->business_name ?>
        </h2>
      </div>
      <div class="main-form">
        <!-- /.form-heading-title -->
        <!-- register-form -->
        <form method="POST" action="<?php echo base_url();?>Vendorclaim" name="send-enquiry" id="send-enquiry">
          <!-- form -->
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <!-- form-heading-title -->
              <h3 id="quote-text" style="color:<?php echo $site->colour_name;?>;"></h3>
              <p id="quote-shorttext">Fill this form and Admin will contact you shortly.</p>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <input id="page_source" name="page_source" type="hidden" value="vender-listing" />
              <input id="vendor_claim_id" name="vendor_claim_id" type="hidden" value="" />
              <!-- Text input-->
              <div class="form-group">
                <label class="control-label sr-only" for="full_name">
                </label>
                <input id="full_name" type="text" name="full_name" placeholder="Your Name" class="form-control" value="<?php if ($this->session->googlelogin == TRUE) { echo $this->session->googlename; }?>" required data-valid="required">
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <!-- Text input-->
              <div class="form-group service-form-group">
                <label class="control-label sr-only" for="email_id">
                </label>
                <input id="email_id" name="email_id" type="email" placeholder="Business Email Address" class="form-control" value="" required data-valid="required" />
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <!-- Text input-->
              <div class="form-group service-form-group">
                <label class="control-label sr-only" for="mobile_number">
                </label>
                <input id="mobile_number" type="tel" name="mobile_number" placeholder="Contact Number" class="form-control" value="" required maxlength="10" data-valid="required" />
              </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <!-- Text input-->
                    <div class="form-group service-form-group">
                        <label class="control-label sr-only" for="comment">
                        </label>
                        <textarea id="comment" required type="comment" name="comment" placeholder="Comment" class="form-control" value="" data-valid="required" ></textarea>
                    </div>
            </div>
            <!-- Button -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
              <input type="submit" name="singlebutton" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>;border-color:<?php echo $site->colour_name;?>;" class="btn btn-default btn-sm" name="Send" value="Send" id="SendEnquiry">
            </div>
          </div>
        </form>
        <form name="quote_form_otp" id="quote_form-otp" class="quote_form-otp" style="display:none;">
          <div class="row">
            <div id="quote-form-otp">
              <input id="otp_id" name="otp_id" type="hidden" value="3" />
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <!-- form-heading-title -->
                <h3>Verify Mobile Number</h3>
                <p>OTP has been sent to you on your mobile number. Please enter it below.</p>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <!-- Text input-->
                <div class="form-group">
                  <label class="control-label sr-only" for="input_otp"></label>
                  <input id="input_otp" type="text" name="input_otp" placeholder="Enter 6 digit OTP" class="form-control" data-valid="required" maxlength="6" />
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="form-group">
                  <a href="JavaScript:void(0);" id="resendotp" onclick="Mobile.OtpResend(event);" class="sendotp">Resend OPT</a>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                <div class="form-group">
                  <button type="submit" name="singlebutton" id="verify_otp" class="btn btn-default btn-sm" onclick="Mobile.Otp(event);">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--End Claim Business -->
<style>
    img{
        border-radius: 20px;
    }
    .image{
        width: 100%;
        height:400px !important;
        object-fit:fill;
    }
    .btn-default-wishlist:hover
    {
         color: <?php echo $site->font_color;?>;
        background-color: <?php echo $site->colour_name;?>;
        border-color: <?php echo $site->colour_name;?>;
    }
    a:hover{
        text-decoration: none !important;
    }
    #object{
	visibility: hidden;
    }
    .sidebar-venue
    {
            top: 125px;
    }
    .ex1
    {
        height: 300px;
        overflow-y: scroll;
    }
</style>
  <script>
    function EnquiryPopUp(id, vl, pn) {
      var x = document.getElementById("vendor_id");
      x.setAttribute("value", id);
    }
    function ClaimPopUp(id, vl, pn) {
      var x = document.getElementById("vendor_claim_id");
      x.setAttribute("value", id);
    }
  </script>
   <script>
// 	$(window).scroll(function() {
// 		$('#animatedElement').each(function(){
// 		var imagePos = $(this).offset().top;

// 		var topOfWindow = $(window).scrollTop();
// 			if (imagePos < topOfWindow+400) {
// 				$(this).addClass("fadeIn");
// 			}
// 		});
// 	});
// </script>
 <script>
// 	$('#animatedElement').click(function() {
// 		$(this).addClass("fadeIn");
// 	});
// </script>
  
     

<?php
}


?>

  <!--<ins class="adsbygoogle"-->
  <!--                   style="display:block"-->
  <!--                   data-ad-client="ca-pub-8898782763527089"-->
  <!--                   data-ad-slot="5983426633"-->
  <!--                   data-ad-format="auto"-->
  <!--                   data-full-width-responsive="true"></ins>-->
  <!--                   <script>-->
  <!--                   (adsbygoogle = window.adsbygoogle || []).push({});-->
  <!--              </script>-->

           
                