<section class="main_banner d-flex align-items-center justify-content-center mt-2"
		 style="min-height:340px;background-image: url(<?php echo base_url() . 'assets/v2/images/banner.jpg' ?>)">
	<div class="container">
		<div class="coustom--wrapper">
			<form method="post" action="<?php echo base_url(); ?>GetVendor/locationchange"
				  class="form-row list-search mb-3">
				<div class="row">
					<div class="col-xl-3">
						<select class="wide" name="country_id" id="country_name"
								onchange="fillstate(this.value);">
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
					<div class="col-xl-2">
						<select class="wide" name="state_id" id="state" onchange="fillCity(this.value);">
							<option value="0">State</option>
						</select>
					</div>
					<div class="col-xl-2">
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
					<div class="col-xl-3">
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
					<div class="col-xl-2">
						<button
								type="submit"
								class="btn btn-primary d-block shadow-none border-0"
								name="Search" value="Search"
								style="background:<?php echo $site->colour_name; ?>; color:<?php echo $site->font_color; ?>;border-color:<?php echo $site->colour_name; ?>;"
						>
							<i class="bi bi-search"></i>
							Search
						</button>
					</div>
				</div>
			</form>
			<script async src="https://cse.google.com/cse.js?cx=07145184c7b92b011"></script>
			<div class="gcse-search"></div>
		</div>
	</div>
</section>
<section class="py-2">
	<div class="container">
		<div class="divider">
			<p class="m-0 text-capitalize">
				showing <span class="badge text-bg-light rounded-pill"> <?php echo count($vendors) ?> </span>
			</p>
		</div>
	</div>
</section>
<section class="main_hero_section py-4">
	<div class="container">
		<div class="row">
			<div class="col-xl-3">
				<div class="w-100">
					<div class="header">
						<p>Category</p>
					</div>
					<div class="w-100 sidebar_inner">
						<div class="row">
							<?php foreach ($category as $data) {
								echo '<div class="sidebar_content" >';
								echo '<label
										for="' . $data->category_name . '"
										class="text-capitalize label_container"
								>' . $data->category_name . '<input type="radio" class="custom-control-input radioCat1" id="' . $data->category_name . '" name="category" value="' . $data->id . '" ';
								if ($this->session->category_id == $data->id) {
									echo "checked";
								}
								echo ' > <span class="checkmark"></span></label>';
								echo '</div>';
								//echo " <option value=$data->id>$data->category_name </option>";
							} ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9" id="data">
				<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animations.css">
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
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function () {
		$(".state").select2();
	});
	$(document).ready(function () {
		$(".country").select2();
	});
	$(document).ready(function () {
		$(".city").select2();
	});
	$(document).ready(function () {
		$(".decoration").select2();
	});
</script>

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

