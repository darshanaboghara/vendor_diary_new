<?php
if ($vendors == null) {
	echo "No data found";
} else {
	$gads = 0;
	//die( base_url());
	echo '<div class="row">';
	foreach ($vendors as $data) {
		$this->OH->addvendorview($data->id, "View on search", null);
?>
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 float-left">
			<?php $gads = $gads + 1; ?>
			<div class="vendor-thumbnail vd-item-block" id="product">
				<div class="vendor-img zoomimg">
					<a href="img<?php echo $data->id ?>" href="<?php echo base_url() . 'Vendor_details/';
																if ($data->planner_name) {
																	echo $data->planner_name;
																} else {
																	echo $data->business_name;
																} ?>" target="_blank">
						<!--<img src="<?php echo base_url() ?>assets/images/<?php echo $data->image; ?>" alt="" class="img-fluid">
                                        <?= $data->id; ?>
                                        -->
						<?php $r = rand(1, 40); ?>
						<img loading="lazy" src='<?php echo (file_exists(IMAGELINK . $data->image)) ? base_url() . IMAGELINK . $data->image : base_url() . "assets/images/wedding-planner/$r.jpeg"; ?>' class="img-fluid" alt="<?php echo !empty($data->planner_name) ? $data->planner_name : $data->business_name; ?>" />
					</a>
				</div>
				<div class="vendor-content">
					<div class="vendor-line">
						<div class="vendor-detail1">
							<p class="vendor-location" title="<?php echo $data->address ?>" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; ">
								<i class="fa fa-map-marker-alt"></i>
								<?php if ($data->address) {
									echo $data->address;
								} else {
									echo "<del>Not found</del>";
								}
								?>
							</p>

							<h2 itemprop="name" class="vendor-title ellipsis">
								<?php if ($data->plan_status == "Paid") {
								?>
									<img loading="lazy" class="mx-1" src="https://akam.cdn.jdmagicbox.com/images/icontent/newwap/newprot/jdvrsl_verified.svg" style="-webkit-user-drag: none;">
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

							<p class="vendor-address">
								<?php echo $this->OH->getcatnamebyid($data->category_id); ?>
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
										?><i class="fa fa-star rated" onclick="rating('<?php echo $data->id ?>','<?php echo $rcount; ?>')"></i>
										<?php
											$rcount = $rcount + 1;
										}
										?>
										<?php for ($i = 0; $i != 5 - $rating; $i++) {
										?><i class="fa fa-star mute_rated" onclick="rating('<?php echo $data->id ?>','<?php echo $rcount; ?>')"></i>
										<?php
											$rcount = $rcount + 1;
										}
										?>
									</span>
									<span>(<?php echo $rcount; ?>)</span>
								</div>
								<div>
									<a href="tel:<?php echo $data->mobile; ?>"><?php echo $data->mobile; ?></a>
								</div>
							</div>
						<?php
						} else {
						?>
							<div class="d-flex flex-column vd-sec2">
								<div class="">
									<span class="rating-star">
										<?php $rcount = 1;
										for ($i = 0; $rating != $i; $i++) {
										?><i class="fa fa-star rated" onclick="alert('You need to login first')"></i>
										<?php
											$rcount = $rcount + 1;
										}
										?>
										<?php for ($i = 0; $i != 5 - $rating; $i++) {
										?><i class="fa fa-star mute_rated" onclick="alert('You need to login first')"></i>
										<?php
											$rcount = $rcount + 1;
										}
										?>
									</span>
									<span><?php echo '(' . $this->OH->getvendorreview($data->id) . ')'; ?></span>
								</div>
								<div>
									<span class="blurry-text" onclick="alert('You need to login first')"><?php echo (substr($data->mobile, 0, 2) . 'XXXXXXXX'); ?>
									</span>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>

				<div class="vendor-line pricing-enq">
					<div class="vendor-btn vendor-detail1">
						<a href="#EnquiryPopUp" style="color:<?php echo $site->colour_name; ?>;" onclick="EnquiryPopUp('<?php echo $data->id ?>','vender-listing','<?php echo $data->planner_name ?>');" class="vd-enquiry">
							<i class="fa fa-envelope"></i>
							Send Enquiry
						</a>
						<div class="social" style="float:right;color:<?= $site->colour_name; ?>;">
							<a href="<?php $data->facebook_link ?>" style="color:<?php echo $site->colour_name; ?>;">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a href="<?php $data->twitter_link ?>" style="color:<?php echo $site->colour_name; ?>;">
								<i class="fab fa-twitter"></i>
							</a>
							<a href="<?php $data->google_link ?>" style="color:<?php echo $site->colour_name; ?>;">
								<i class="fab fa-google"></i>
							</a>
							<a href="<?php $data->linkedin_link ?>" style="color:<?php echo $site->colour_name; ?>;">
								<i class="fab fa-linkedin-in"></i>
							</a>
							<a href="whatsapp://send?text=https://vendordiary.com/Vendor_details?vid=<?php $data->id; ?>" style="color:<?php echo $site->colour_name; ?>;" data-action="share/whatsapp/share">
								<i class="fab fa-whatsapp"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}
}
?>