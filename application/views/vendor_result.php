<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-624d7abccb713695"></script>

<div class="page-header">
	<div class="container">
		<div class="row">
			<!-- page caption -->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
				<div class="page-caption list-search-mob">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
						<form method="POST" action="<?php echo base_url(); ?>GetVendor/locationchange"
							  class="form-row list-search">
							<!-- location -->
							<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
								<select class="wide" name="country_id" id="country_name"
										onchange="fillstate(this.value);">
									<option value="0">Country</option>
									<?php
									foreach ($country as $data) {
										echo " <option value='$data->id' ";
										if ($this->session->country_id == $data->id) {
											echo "selected";
										}
										echo ">$data->country_name</option>";
									} ?>
								</select>
							</div>
							<!-- /.location -->
							<!-- location -->
							<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
								<select class="wide" name="state_id" id="state" onchange="fillCity(this.value);">
									<option value="0">State</option>
								</select>
							</div>
							<!-- /.location -->
							<!-- location -->
							<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
								<select class="wide" name="city_id" id="city">
									<option value="0">City</option>
									<?php
									foreach ($city as $data) {
										echo " <option value='$data->id'";
										if ($this->session->city_id == $data->id) {
											echo "selected";
										}
										echo ">$data->city_name</option>";
									} ?>
								</select>
							</div>
							<!-- /.location -->
							<!-- services -->
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
								<select class="wide" name="category_id" id="category">
									<option value="0">Looking For
									</option>
									<?php foreach ($category as $data) {
										echo " <option value='$data->id' ";
										if ($this->session->category_id == $data->id) {
											echo "selected";
										}
										echo ">$data->category_name </option>";
									} ?>
								</select>
							</div>
							<!-- /.services-->
							<div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-3">
								<input class="btn btn-default btn-block" type="submit" name="Search" value="Search"
									   style="background:<?php echo $site->colour_name; ?>; color:<?php echo $site->font_color; ?>;border-color:<?php echo $site->colour_name; ?>;">
							</div>
						</form>
						<script async src="https://cse.google.com/cse.js?cx=07145184c7b92b011"></script>
						<div class="gcse-search"></div>
						<!--                   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"-->
						<!--crossorigin="anonymous"></script>-->
					</div>
				</div>
			</div>
			<!-- /.page caption -->
		</div>
	</div>
</div>
<div class="page-resultstrip">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="searchresult-value">
					<strong style="color:<?php echo $site->colour_name; ?>;">Showing <?php echo count($vendors) ?> </strong>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="container nopadding">
		<div class="row">
			<div id="filter-result" class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
				<div class="mf-heading">
					<div class="mf-inside">
						<div class="vendorfilter">
							<p class="sc-jWBwVP beLxyK"> Vendor Filters </p>
						</div>
						<div class="reset" id="filtercross">
							<svg viewBox="0 0 24 24"
								 style="display: inline-block; color: rgba(0, 0, 0, 0.87); fill: rgb(255, 255, 255); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
								<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
							</svg>
						</div>
					</div>
				</div>
				<!--<div class="filter-form">-->
				<!--    <h3 class="widget-title"> Location</h3>-->
				<!--    <form class="form-row">-->
				<!--        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb20">-->
				<!-- Locations -->
				<!--            <div class="filter">-->

				<!--                <div class="custom-control custom-checkbox ellipsis">-->
				<!--                    <input type="checkbox" class="custom-control-input" id="Delhi" name="location" value="delhi">-->
				<!--                    <label class="custom-control-label" for="Delhi"> Delhi</label>-->
				<!--                </div>-->

				<!--                <div class="custom-control custom-checkbox ellipsis">-->
				<!--                    <input type="checkbox" class="custom-control-input" id="Noida" name="location" value="noida">-->
				<!--                    <label class="custom-control-label" for="Noida"> Noida</label>-->
				<!--                </div>-->

				<!--                <div class="custom-control custom-checkbox ellipsis">-->
				<!--                    <input type="checkbox" class="custom-control-input" id="Gurgaon" name="location" value="gurgaon">-->
				<!--                    <label class="custom-control-label" for="Gurgaon"> Gurgaon</label>-->
				<!--                </div>-->

				<!--                <div class="custom-control custom-checkbox ellipsis">-->
				<!--                    <input type="checkbox" class="custom-control-input" id="Faridabad" name="location" value="faridabad">-->
				<!--                    <label class="custom-control-label" for="Faridabad"> Faridabad</label>-->
				<!--                </div>-->

				<!--                <div class="custom-control custom-checkbox ellipsis">-->
				<!--                    <input type="checkbox" class="custom-control-input" id="Ghaziabad" name="location" value="ghaziabad">-->
				<!--                    <label class="custom-control-label" for="Ghaziabad"> Ghaziabad</label>-->
				<!--                </div>-->
				<!--            </div>-->
				<!-- /.Locations -->
				<!--        </div>-->
				<!--    </form>-->
				<!--</div>-->
				<div class="filter-form">
					<h3 class="widget-title"> Category</h3>
					<form class="form-row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb20">
							<!-- Category -->
							<div class="filter">
								<?php foreach ($category as $data) {
									echo '<div class="custom-control custom-radio ellipsis ">';
									echo '<input type="radio" class="custom-control-input radioCat1" id="' . $data->category_name . '" name="category" value="' . $data->id . '" ';
									if ($this->session->category_id == $data->id) {
										echo "checked";
									}
									echo ' ><label class="custom-control-label" for="' . $data->category_name . '"> ' . $data->category_name . ' </label>';
									echo '</div>';
									//echo " <option value=$data->id>$data->category_name </option>";
								} ?>
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="wedding-planners" name="category" value="wedding-planners">-->
								<!--    <label class="custom-control-label" for="wedding-planners"> Wedding Planners </label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="beauty-and-makeup" name="category" value="beauty-and-makeup">-->
								<!--    <label class="custom-control-label" for="beauty-and-makeup"> Beauty & Makeup</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="banquets-and-wedding-venues" name="category" value="banquets-and-wedding-venues">-->
								<!--    <label class="custom-control-label" for="banquets-and-wedding-venues"> Banquets & Wedding Venues</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="photographers" name="category" value="photographers">-->
								<!--    <label class="custom-control-label" for="photographers"> Photographers</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="mehndi-artist" name="category" value="mehndi-artist">-->
								<!--    <label class="custom-control-label" for="mehndi-artist"> Mehndi Artist</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="caterers" name="category" value="caterers">-->
								<!--    <label class="custom-control-label" for="caterers"> Caterers</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="music-and-entertainment" name="category" value="music-and-entertainment">-->
								<!--    <label class="custom-control-label" for="music-and-entertainment"> Music & Entertainment</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="hotel-accommodation" name="category" value="hotel-accommodation">-->
								<!--    <label class="custom-control-label" for="hotel-accommodation"> Hotel Accommodation</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="decorators" name="category" value="decorators">-->
								<!--    <label class="custom-control-label" for="decorators"> Decorators</label>-->
								<!--</div>-->
								<!--<div class="custom-control custom-radio ellipsis">-->
								<!--    <input type="radio" class="custom-control-input" id="honeymoon-packages" name="category" value="honeymoon-packages">-->
								<!--    <label class="custom-control-label" for="honeymoon-packages"> Honeymoon Packages</label>-->
								<!--</div>-->
							</div>
							<!-- /.Category -->
						</div>
					</form>
				</div>
				<div class="mobfilter-btn">
					<button type="button" class="btn btn-default btn-block btn-sm" id="filterdone">Done</button>
				</div>
			</div>


			<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12" id="data">
				<!--Google Ads-->
				<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
				<!--<ins class="adsbygoogle"-->
				<!--     style="display:block"-->
				<!--     data-ad-format="fluid"-->
				<!--     data-ad-layout-key="-7i+dt+2s-e-4d"-->
				<!--     data-ad-client="ca-pub-8080073184920665"-->
				<!--     data-ad-slot="9161824241"></ins>-->
				<!--<script>-->
				<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
				<!--</script>-->
				<!--Google Ads-->

				<!--  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"-->
				<!--     crossorigin="anonymous"></script>-->
				<!--Home page -->
				<!--<ins class="adsbygoogle"-->
				<!--     style="display:block"-->
				<!--     data-ad-client="ca-pub-8898782763527089"-->
				<!--     data-ad-slot="5983426633"-->
				<!--     data-ad-format="auto"-->
				<!--     data-full-width-responsive="true"></ins>-->
				<!--<script>-->
				<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
				<!--</script>      -->


				<!--Goole Ad Off-->

				<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"-->
				<!--      crossorigin="anonymous"></script>-->
				<!-- <ins class="adsbygoogle"-->
				<!--      style="display:block"-->
				<!--      data-ad-format="autorelaxed"-->
				<!--      data-ad-client="ca-pub-8898782763527089"-->
				<!--      data-ad-slot="7583292577"></ins>-->
				<!-- <script>-->
				<!--      (adsbygoogle = window.adsbygoogle || []).push({});-->
				<!--</script> -->

				<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animations.css">
				<?php
				if ($vendors == null) {
					echo "No data found";
					// <!--Goole Ad Off-->
					//     echo ' <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"
					//      crossorigin="anonymous"></script>
					//  <!--Home page -->
					// <ins class="adsbygoogle"
					//      style="display:block"
					//      data-ad-client="ca-pub-8898782763527089"
					//      data-ad-slot="5983426633"
					//      data-ad-format="auto"
					//      data-full-width-responsive="true"></ins>
					// <script>
					//      (adsbygoogle = window.adsbygoogle || []).push({});
					// </script>';


				} else {
					$gads = 0;
					//die( base_url());
					foreach ($vendors as $data) {
						$this->OH->addvendorview($data->id, "View on search", null);

						?>

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 float-left slideExpandUp">

							<!--Goole Ad Off-->
							<?php $gads = $gads + 1; ?>
							<div class="vendor-thumbnail" id="product">
								<!-- Vendor thumbnail -->
								<div class="vendor-img zoomimg">
									<a id="img<?php echo $data->id ?>" href="<?php echo base_url() . 'Vendor_details/';
									if ($data->planner_name) {
										echo $data->planner_name;
									} else {
										echo $data->business_name;
									} ?>" target="_blank">
										<!--<img src="<?php echo base_url() ?>assets/images/<?php echo $data->image; ?>" alt="" class="img-fluid">
                                        <?= $data->id; ?>
                                        -->
										<?php $r = rand(1, 40); ?>
										<img loading="lazy"
											 src='<?php echo (file_exists(IMAGELINK . $data->image)) ? base_url() . IMAGELINK . $data->image : base_url() . "assets/images/wedding-planner/$r.jpeg"; ?>'
											 alt="Vendor Image Not Found" class="img-fluid">
									</a>
									<!-- demo.jpg -->
								</div>
								<div class="vendor-content">
									<!-- Vendor Content -->
									<div class="vendor-line">
										<div class="vendor-detail1">
											<p class="vendor-location" title="<?php echo $data->address ?>"
											   style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; ">
												<i class="fa fa-map-marker-alt"></i>
												<?php if ($data->address) {
													echo $data->address;
												} else {
													echo "<del>Not found</del>";
												}
												?>

											<h2 itemprop="name" class="vendor-title ellipsis">

												<?php if ($data->plan_status == "Paid") {
													?>
													<img loading="lazy"
														 src="https://akam.cdn.jdmagicbox.com/images/icontent/newwap/newprot/jdvrsl_verified.svg"
														 style="-webkit-user-drag: none;">
												<?php }
												?>

												<a itemprop="url" href="<?php echo base_url() . 'Vendor_details/';
												if ($data->planner_name) {
													echo url_title($data->planner_name, 'dash', true);
												} else {
													echo url_title($data->business_name, 'dash', true);
												} ?>" class="title" target="_blank">
													<?php if ($data->planner_name) {
														echo $data->planner_name;
													} else {
														echo "<del>Not Found</del>";
													}
													?>
												</a>

											</h2>
											<p class="vendor-address"><?php echo $this->OH->getcatnamebyid($data->category_id); ?>
												<?php if ($data->plan_status == "Paid") { ?>
													<?php if ($data->cat_2) echo ',' . $this->OH->getcatnamebyid($data->cat_2); ?>
													<?php if ($data->cat_3) echo ',' . $this->OH->getcatnamebyid($data->cat_3); ?>
													<?php if ($data->cat_4) echo ',' . $this->OH->getcatnamebyid($data->cat_4); ?>
													<?php if ($data->cat_5) echo ',' . $this->OH->getcatnamebyid($data->cat_5); ?>
												<?php } ?>
											</p>

										</div>
										<?php //$rating=rand(1,5);
										if ($data->rating == "") {
											$rating = 0;
										} else {

											$rating = (int)$data->rating;
										}
										if ($this->session->googlelogin == TRUE) { ?>
											<div class="d-flex flex-column">
												<div class="">
														<span class="rating-star">
															<?php $rcount = 1;
															for ($i = 0; $rating != $i; $i++) {
																?><i class="fa fa-star rated"
																	 onclick="rating('<?php echo $data->id ?>','<?php echo $rcount; ?>')"></i><?php
																$rcount = $rcount + 1;
															}
															?>
															<?php for ($i = 0; $i != 5 - $rating; $i++) {
																?><i class="fa fa-star mute_rated"
																	 onclick="rating('<?php echo $data->id ?>','<?php echo $rcount; ?>')"></i><?php
																$rcount = $rcount + 1;
															}


															?>
															<!--<i class="fa fa-star rated"></i>-->
															<!--<i class="fa fa-star rated"></i>-->
															<!--<i class="fa fa-star rated"></i>-->
															<!--<i class="fa fa-star mute_rated"></i>-->
															<!--<i class="fa fa-star mute_rated"></i>-->
														</span>
													<span><?php echo '(' . $this->OH->getvendorreview($data->id) . ')'; ?></span>
												</div>
												<div>
													<a href="tel:<?php echo $data->mobile; ?>"><?php echo $data->mobile; ?></a>
												</div>
											</div>
											<?php

										} else {
											?>
											<div class="d-flex flex-column">
												<div class="">
												<span class="rating-star">
                                            <?php $rcount = 1;
											for ($i = 0; $rating != $i; $i++) {
												?><i class="fa fa-star rated"
													 onclick="alert('You need to login first')"></i><?php
												$rcount = $rcount + 1;
											}
											?>
													<?php for ($i = 0; $i != 5 - $rating; $i++) {
														?><i class="fa fa-star mute_rated"
															 onclick="alert('You need to login first')"></i><?php
														$rcount = $rcount + 1;
													}
													?>
                                            <!--<i class="fa fa-star rated"></i>-->
													<!--<i class="fa fa-star rated"></i>-->
													<!--<i class="fa fa-star rated"></i>-->
													<!--<i class="fa fa-star mute_rated"></i>-->
													<!--<i class="fa fa-star mute_rated"></i>-->
                                        </span>
													<span>
													<?php echo '(' . $this->OH->getvendorreview($data->id) . ')'; ?>
												</span>
												</div>
												<div>
													<span class="blurry-text"
														  onclick="alert('You need to login first')"><?php echo(substr($data->mobile, 0, 2) . 'XXXXXXXX'); ?></span>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="vendor-line pricing-enq">
									<div class="vendor-btn vendor-detail1">
										<a href="#EnquiryPopUp" style="color:<?php echo $site->colour_name; ?>;"
										   onclick="EnquiryPopUp('<?php echo $data->id ?>','vender-listing','<?php echo $data->planner_name ?>');"><i
													class="fa fa-envelope"></i> Send Enquiry</a>
										<div class="social" style="float:right;color:<?= $site->colour_name; ?>;">
											<a href="<?= $data->facebook_link ?>"
											   style="color:<?php echo $site->colour_name; ?>;"><i
														class="fab fa-facebook-f"></i></a>
											<a href="<?= $data->twitter_link ?>"
											   style="color:<?php echo $site->colour_name; ?>;"><i
														class="fab fa-twitter"></i></a>
											<a href="<?= $data->google_link ?>"
											   style="color:<?php echo $site->colour_name; ?>;"><i
														class="fab fa-google"></i></a>
											<a href="<?= $data->linkedin_link ?>"
											   style="color:<?php echo $site->colour_name; ?>;"><i
														class="fab fa-linkedin-in"></i></a>
											<a href="whatsapp://send?text=https://vendordiary.com/Vendor_details?vid=<?= $data->id; ?>"
											   style="color:<?php echo $site->colour_name; ?>;"
											   data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
										</div>
									</div>
								</div>

								<!-- /.Vendor Content -->
							</div>
							<!-- /.Vendor thumbnail -->
						</div>
					<?php }
				}
				?>

				<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>

			</div>
		</div>

		<div class="row" id="page">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">

						<ul class="pagination">
							<!--<a href="<?php echo base_url(); ?>GetVendor" class="page-link"="1" rel="start">First</a>-->
							<?php
							print_r($page);
							?>


							<!-- <li class="page-item"><a href="https://www.planyourvivah.com/vendor-listing/all?&amp;page=3" class="page-link"="3" rel="prev">&lt;</a></li>
							<li class="page-item"><a href="https://www.planyourvivah.com/vendor-listing/all?&amp;page=2" class="page-link"="2">2</a></li>
							<li class="page-item"><a href="https://www.planyourvivah.com/vendor-listing/all?&amp;page=3" class="page-link"="3">3</a></li>
							<li class="page-item active"><a class="page-link " href="#">4</a></li>
							<li class="page-item"><a href="https://www.planyourvivah.com/vendor-listing/all?&amp;page=5" class="page-link"="5">5</a></li>
							<li class="page-item"><a href="https://www.planyourvivah.com/vendor-listing/all?&amp;page=6" class="page-link"="6">6</a></li>
							<li class="page-item"><a href="https://www.planyourvivah.com/vendor-listing/all?&amp;page=5" class="page-link"="5" rel="next">&gt;</a></li>
							<li class="page-item"><a href="https://www.planyourvivah.com/vendor-listing/all?&amp;page=26" class="page-link"="26">Last</a></li> -->
						</ul>
					</nav>
				</div>

				<!--Goole Ad Off-->

				<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"-->
				<!--     crossorigin="anonymous"></script>-->
				<!--<ins class="adsbygoogle"-->
				<!--     style="display:block"-->
				<!--     data-ad-client="ca-pub-8898782763527089"-->
				<!--     data-ad-slot="5983426633"-->
				<!--     data-ad-format="auto"-->
				<!--     data-full-width-responsive="true"></ins>-->
				<!--<script>-->
				<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
				<!--</script> -->
			</div>
		</div>
	</div>
</div>


<!-- Popup Inquiry form -->
<div id="EnquiryPopUp" class="enquiry-container overlay mt-4">
	<div class="enquiry-form">
		<a class="close" href="#">&times;
		</a>
		<div class="content">
			<h2 id="plannername">
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
						<h3 id="quote-text"></h3>
						<p id="quote-shorttext">Fill this form and vendor will contact you shortly.</p>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<input id="page_source" name="page_source" type="hidden" value="vender-listing"/>
						<input id="vendor_id" name="vendor_id" type="hidden" value=""/>
						<input id="service_type" name="service_type" type="hidden" value=""/>
						<!-- Text input-->
						<div class="form-group">
							<label class="control-label sr-only" for="full_name">
							</label>
							<input id="full_name" required type="text" name="full_name" placeholder="Name"
								   class="form-control" value="<?php if ($this->session->googlelogin == TRUE) {
								echo $this->session->googlename;
							} ?>" data-valid="required">
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<!-- Text input-->
						<div class="form-group service-form-group">
							<label class="control-label sr-only" for="email_id">
							</label>
							<input id="email_id" required name="email_id" type="email" placeholder="Email Address"
								   class="form-control" value="<?php if ($this->session->googlelogin == TRUE) {
								echo $this->session->googleemail;
							} ?>" <?php if ($this->session->googlelogin == TRUE) {
								echo "readonly";
							} ?> data-valid="required"/>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<!-- Text input-->
						<div class="form-group service-form-group">
							<label class="control-label sr-only" for="mobile_number">
							</label>
							<input id="mobile_number" required type="tel" name="mobile_number"
								   placeholder="Mobile Nummber" class="form-control" value="" maxlength="10"
								   data-valid="required"/>
						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<!-- Text input-->
						<div class="form-group service-form-group">
							<label class="control-label sr-only" for="comment">
							</label>
							<textarea id="comment" required type="tel" name="comment" placeholder="Comment"
									  class="form-control" value="" data-valid="required"></textarea>
							<!--<input id="comment" required type="tel" name="comment" placeholder="Comment" class="form-control" value="" maxlength="10" data-valid="required" />-->
						</div>
					</div>

					<!-- Button -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
						<input type="submit" name="singlebutton" class="btn btn-default btn-sm" name="Send" value="Send"
							   id="SendEnquiry">
					</div>
				</div>
			</form>
			<form name="quote_form_otp" id="quote_form-otp" class="quote_form-otp" style="display:none;">
				<div class="row">
					<div id="quote-form-otp">
						<input id="otp_id" name="otp_id" type="hidden" value="3"/>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
							<!-- form-heading-title -->
							<h3>Verify Mobile Number</h3>
							<p>OTP has been sent to you on your mobile number. Please enter it below.</p>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label sr-only" for="input_otp"></label>
								<input id="input_otp" type="text" name="input_otp" placeholder="Enter 6 digit OTP"
									   class="form-control" data-valid="required" maxlength="6"/>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
							<div class="form-group">
								<a href="JavaScript:void(0);" id="resendotp" onclick="Mobile.OtpResend(event);"
								   class="sendotp">Resend OPT</a>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
							<div class="form-group">
								<button type="submit" name="singlebutton" id="verify_otp" class="btn btn-default btn-sm"
										onclick="Mobile.Otp(event);">Submit
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.Popup Inquiry form -->

<script>
	function EnquiryPopUp(id, vl, pn) {
		var x = document.getElementById("vendor_id");
		var pn1 = document.getElementById("plannername");
		x.setAttribute("value", id);
		pn1.innerHTML = pn;
	}

	function GetCategory() {
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("category").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "Getcategory", true);
		xhttp.send();
	}

	$(document).off("click", ".radioCat1");
	$(".radioCat1").on('click', function () {

		if ($(this).data('checked', true)) {
			let v = $(this).val();
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("data").innerHTML = this.responseText;
					console.log(this.responseText);
				}
			};
			var base = "<?php echo base_url(); ?>";
			//alert(window.location.origin);
			xhttp.open("GET", window.location.origin + "/GetVendor/vendorbycategoryfilter?cid=" + v, true);
			//  xhttp.open("GET", base+"GetVendor/vendorbycategoryfilter?cid="+v, true);
			xhttp.send();
		}
	});

	function fillCity(id) {
		var x = document.getElementById("city");
		x.style.display = "block";
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

	function fillstate(id) {
		var x = document.getElementById("state");
		x.style.display = "block";
		var x = document.getElementById("city");
		x.style.innerHTML = "";
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

	fillstate(<?php echo $this->session->country_id;?>);

	function rating(id, ratingpoint) {
		let person = prompt("Write a Review can be written?", "Write a Review can be written?");
		let text;
		if (person == null || person == "") {
			text = "User Not give Message the prompt.";
		} else {
			text = person;
		}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText == "No quiry found") {
					alert("Your Review Not Submited. need to Enquiry First. Base on you Can give review");
				} else {
					alert("Your rating submited")
				}
			}
		};
		var url = "<?php echo base_url();?>";
		xhttp.open("GET", url + "Reviews/newreviews?vid=" + id + "&rnumber=" + ratingpoint + "&message=" + text, true);
		xhttp.send();
	}
</script>
<style>
	.pagination .page-link:hover {
		z-index: 2;
		color: <?php echo $site->font_color;?>;
		background-color: <?php echo $site->colour_name;?>;
		border-color: <?php echo $site->colour_name;?>;
	}

	a:hover {
		color: #000000;
		text-decoration: none;
	}

	.custom-radio .custom-control-input:checked ~ .custom-control-label::before {
		background-color: <?php echo $site->colour_name;?>;
	}

	#product:hover {
		transition: box-shadow .3s;
		box-shadow: 0 0 11px rgba(33, 33, 33, .2);
	}
</style>

