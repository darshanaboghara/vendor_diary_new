<?php
if ($vendors == null) {
	echo "No data found";

} else {
	$gads = 0;
	//die( base_url());
	echo '<div class="row">';
	foreach ($vendors

			 as $data) {
		$this->OH->addvendorview($data->id, "View on search", null);
		?>
		<div class="col-xl-4 col-sm-6 mb-3">
			<?php $gads = $gads + 1; ?>
			<div class="card w-100 border-0">
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
					<img loading="lazy"
						 style="max-width:350px;height:250px;max-height:250px;"
						 src='<?php echo (file_exists(IMAGELINK . $data->image)) ? base_url() . IMAGELINK . $data->image : base_url() . "assets/images/wedding-planner/$r.jpeg"; ?>'
						 class="card-img-top"
						 alt="<?php echo !empty($data->planner_name) ? $data->planner_name : $data->business_name; ?>"
					/>
				</a>
				<div class="card-body">
					<?php //$rating=rand(1,5);
					if ($data->rating == "") {
						$rating = 0;
					} else {

						$rating = (int)$data->rating;
					}
					if ($this->session->googlelogin == TRUE) { ?>
						<div class="rating-star mb-2 d-flex align-items-center">
							<div class="rating_star_container">
								<?php $rcount = 1;
								for ($i = 0; $rating != $i; $i++) {
									?><i class="bi bi-star-fill outline-0 text-warning"
										 onclick="rating('<?php echo $data->id ?>','<?php echo $rcount; ?>')"></i><?php
									$rcount = $rcount + 1;
								}
								?>
								<?php for ($i = 0; $i != 5 - $rating; $i++) {
									?><i class="bi bi-star text-muted"
										 onclick="rating('<?php echo $data->id ?>','<?php echo $rcount; ?>')"></i><?php
									$rcount = $rcount + 1;
								}
								?>
							</div>
							<span class="text-muted">(<?php echo $rcount; ?>)</span>
						</div>
						<?php

					} else {

						?>
						<div class="rating-star mb-2 d-flex align-items-center">
							<div class="d-flex rating_star_container">
								<?php $rcount = 1;
								for ($i = 0; $rating != $i; $i++) {
									?><i class="bi bi-star-fill outline-0 text-warning"
										 onclick="alert('You need to login first')"></i><?php
									$rcount = $rcount + 1;
								}
								?>
								<?php for ($i = 0; $i != 5 - $rating; $i++) {
									?><i class="bi bi-star text-muted"
										 onclick="alert('You need to login first')"></i><?php
									$rcount = $rcount + 1;
								}
								?>
								<span class="text-muted"><?php echo '(' . $this->OH->getvendorreview($data->id) . ')'; ?></span>
							</div>
						</div>
						<?php
					}
					?>
					<p title="<?php echo $data->address ?>"
					   class="card-text mb-2 d-flex align-items-center text-capitalize text-wrap">
						<i class="bi bi-geo-alt outline-0"></i>
						<?php if ($data->address) {
							echo $data->address;
						} else {
							echo "<del>Not found</del>";
						}
						?>
					</p>
					<h6 class="title text-capitalize d-flex items-center">
						<?php if ($data->plan_status == "Paid") {
							?>
							<img loading="lazy"
								 class="mx-1"
								 src="https://akam.cdn.jdmagicbox.com/images/icontent/newwap/newprot/jdvrsl_verified.svg"
								 style="-webkit-user-drag: none;width:48px;height:auto;">
						<?php }
						?>
						<a class="text-decoration-none" itemprop="url"
						   href="<?php echo base_url() . 'Vendor_details/';
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
					</h6>
					<span class="vendor_address mt-1 mb-2">
										<?php echo $this->OH->getcatnamebyid($data->category_id); ?>
										<?php if ($data->plan_status == "Paid") { ?>
											<?php if ($data->cat_2) echo ',' . $this->OH->getcatnamebyid($data->cat_2); ?>
											<?php if ($data->cat_3) echo ',' . $this->OH->getcatnamebyid($data->cat_3); ?>
											<?php if ($data->cat_4) echo ',' . $this->OH->getcatnamebyid($data->cat_4); ?>
											<?php if ($data->cat_5) echo ',' . $this->OH->getcatnamebyid($data->cat_5); ?>
										<?php } ?></span>
					<?php
					if ($this->session->googlelogin == TRUE) { ?>
						<div>
							<a href="tel:<?php echo $data->mobile; ?>"><?php echo $data->mobile; ?></a>
						</div>
					<?php } else {
						?>
						<span class="blurry-text"
							  onclick="alert('You need to login first')"><?php echo(substr($data->mobile, 0, 2) . 'XXXXXXXX'); ?>
										</span>
						<?php
					}
					?>
					<div class="mb-2 link_box d-flex align-items-centersssss">
						<a href="<?php $data->facebook_link ?>"
						   style="color:<?php echo $site->colour_name; ?>;">
							<i class="bi bi-facebook"></i>
						</a>
						<a href="<?php $data->twitter_link ?>"
						   style="color:<?php echo $site->colour_name; ?>;">
							<i class="bi bi-twitter"></i>
						</a>
						<a href="<?php $data->google_link ?>"
						   style="color:<?php echo $site->colour_name; ?>;">
							<i class="bi bi-google"></i>
						</a>
						<a href="<?php $data->linkedin_link ?>"
						   style="color:<?php echo $site->colour_name; ?>;">
							<i class="bi bi-linkedin"></i>
						</a>
						<a href="whatsapp://send?text=https://vendordiary.com/Vendor_details?vid=<?php $data->id; ?>"
						   style="color:<?php echo $site->colour_name; ?>;"
						   data-action="share/whatsapp/share">
							<i class="bi bi-whatsapp"></i>
						</a>
					</div>
					<div class="pt-2 btn_box w-100">
						<div
								class="d-flex align-items-center justify-content-between"
						>
							<a href="#EnquiryPopUp" style="color:<?php echo $site->colour_name; ?>;"
							   class="btn btn-light"
							   onclick="EnquiryPopUp('<?php echo $data->id ?>','vender-listing','<?php echo $data->planner_name ?>');">
								<i class="bi bi-envelope"></i>
								Send Enquiry
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
