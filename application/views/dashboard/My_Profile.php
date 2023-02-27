<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title ">My Profile
                    </h3>
                    <p>Change your profile information edit and save.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card">
                            <div class="card-header">Profile
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url();?>Dashboard/update_profile">
                                    <!-- Form Name -->
                                    <div class="personal-form-info">
                                        <div class="row">
                                            <!-- Text input-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h3>Vendor Details
                                                </h3>
                                                <div class="dashboard-section-line">
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="business_name">Business Name</label>
                                                    <input id="business_name" type="text" name="business_name" placeholder="Business Name" class="form-control" value="<?php echo $vdata->business_name; ?>" data-valid="required">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="vfirstname">First Name</label>
                                                    <input id="vfirstname" type="text" name="vfirstname" placeholder="Vender First Name" class="form-control" value="<?php echo $vdata->contact_person_name; ?>" data-valid="required">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="vlastname">Last Name</label>
                                                    <input id="vlastname" type="text" name="vlastname" placeholder="Vender Last Name" value="<?php echo $vdata->last_name; ?>" class="form-control" data-valid="required">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="vdescribe">Descriptions</label>
                                                    <textarea class="form-control" id="vdescribe" name="vdescribe" rows="2" placeholder="Describe your business and services" data-valid="required" spellcheck="true"><?php echo $vdata->description; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="vaddress">Vendor Address</label>
                                                    <textarea class="form-control" id="vaddress" name="vaddress" rows="2" placeholder="Vendor Address" data-valid="required"><?php echo $vdata->address; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="map_location">Vendor Google Map URL Address</label>
                                                    <textarea class="form-control" type="URL" id="map_location" name="map_location" rows="2" placeholder="map_location" data-valid="required"><?php echo $vdata->map_location; ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="capacity">Capacity</label>
                                                    <input id="capacity" type="text" name="capacity" placeholder="Capacity" value="<?php echo $vdata->capacity; ?>" class="form-control" data-valid="required">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="package">Package Price</label>
                                                    <input id="package" type="text" name="package" placeholder="Package" value="<?php echo $vdata->package; ?>" class="form-control" data-valid="required">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="start_rate_range">start_rate_range</label>
                                                    <input id="start_rate_range" type="text" name="start_rate_range" placeholder="Start Rate range" value="<?php echo $vdata->start_rate_range; ?>" class="form-control" data-valid="required">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="end_rate_range">end_rate_range</label>
                                                    <input id="end_rate_range" type="text" name="end_rate_range" placeholder="End Rate Range" value="<?php echo $vdata->end_rate_range; ?>" class="form-control" data-valid="required">
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group row">
                                                    <label class="control-label col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" for="industry_exp">Category</label>
                                                    <br>
                                                    <select class="form-control col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" name="category_id" id="category">
                                                        <option value="0">Select Category</option>
                                                        <?php $category=$this->OH->getallvendorcategory();
                                                        ?>
                                                        <?php foreach ($category as $data) {
                                                            echo " <option value='$data->id' ";
                                                            if($vdata->category_id==$data->id)
                                                            {
                                                                echo "selected";
                                                            }
                                                            echo ">$data->category_name </option>";
                                                        } ?>
                                                    </select>
                                                    
                                                    <?php if($vdata->plan_status=="Paid")
                                                    {?>
                                                    
                                                    <select class="form-control col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" name="cat_2" id="category">
                                                        <option value="0">Select Category</option>
                                                        <?php $category=$this->OH->getallvendorcategory();
                                                        ?>
                                                        <?php foreach ($category as $data) {
                                                            echo " <option value='$data->id' ";
                                                            if($vdata->cat_2==$data->id)
                                                            {
                                                                echo "selected";
                                                            }
                                                            echo ">$data->category_name </option>";
                                                        } ?>
                                                    </select>
                                                    <select class="form-control col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" name="cat_3" id="category">
                                                        <option value="0">Select Category</option>
                                                        <?php $category=$this->OH->getallvendorcategory();
                                                        ?>
                                                        <?php foreach ($category as $data) {
                                                            echo " <option value='$data->id' ";
                                                            if($vdata->cat_3==$data->id)
                                                            {
                                                                echo "selected";
                                                            }
                                                            echo ">$data->category_name </option>";
                                                        } ?>
                                                    </select>
                                                    <select class="form-control col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" name="cat_4" id="category">
                                                        <option value="0">Select Category</option>
                                                        <?php $category=$this->OH->getallvendorcategory();
                                                        ?>
                                                        <?php foreach ($category as $data) {
                                                            echo " <option value='$data->id' ";
                                                            if($vdata->cat_4==$data->id)
                                                            {
                                                                echo "selected";
                                                            }
                                                            echo ">$data->category_name </option>";
                                                        } ?>
                                                    </select>
                                                    <select class="form-control col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" name="cat_5" id="category">
                                                        <option value="0">Select Category</option>
                                                        <?php $category=$this->OH->getallvendorcategory();
                                                        ?>
                                                        <?php foreach ($category as $data) {
                                                            echo " <option value='$data->id' ";
                                                            if($vdata->cat_5==$data->id)
                                                            {
                                                                echo "selected";
                                                            }
                                                            echo ">$data->category_name </option>";
                                                        } ?>
                                                    </select>
                                                    
                                                    <?php } ?>
                                                    <!--<label class="control-label" for="industry_exp">Industry Experience</label>
                                                    <select class="form-control" name="industry_exp" id="industry_exp" data-valid="required" selectname="Industry Experience" >
                                                        <option value="">Industry Experience</option>
                                                        <option value="0" selected="">New</option>
                                                        <option value="1">1 Year</option>
                                                        <option value="2">2 Years</option>
                                                        <option value="3">3 Years</option>
                                                        <option value="4">4 Years</option>
                                                        <option value="5">5 Years</option>
                                                        <option value="6">6 Years</option>
                                                        <option value="7">7 Years</option>
                                                        <option value="8">8 Years</option>
                                                        <option value="9">9 Years</option>
                                                        <option value="10">10 Years</option>
                                                        <option value="11">11 Years</option>
                                                        <option value="12">12 Years</option>
                                                    </select>-->
                                                     <!--<div class="nice-select wide selectpicker" tabindex="0"><span class="current">New</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option">Industry Experience</li>
                                                            <li data-value="0" class="option selected focus">New</li>
                                                            <li data-value="1" class="option">1 Year</li>
                                                            <li data-value="2" class="option">2 Years</li>
                                                            <li data-value="3" class="option">3 Years</li>
                                                            <li data-value="4" class="option">4 Years</li>
                                                            <li data-value="5" class="option">5 Years</li>
                                                            <li data-value="6" class="option">6 Years</li>
                                                            <li data-value="7" class="option">7 Years</li>
                                                            <li data-value="8" class="option">8 Years</li>
                                                            <li data-value="9" class="option">9 Years</li>
                                                            <li data-value="10" class="option">10 Years</li>
                                                            <li data-value="11" class="option">11 Years</li>
                                                            <li data-value="12" class="option">12 Years</li>
                                                        </ul>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="social-form-info mb-0">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h3>Social Media
                                                </h3>
                                                <div class="dashboard-section-line">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="website_link">Website Link</label>
                                                    <input id="website_link" type="text" name="website_link" placeholder="Website Link" value="<?php echo $vdata->website; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="facebook_page">Facebook</label>
                                                    <input id="facebook_page" type="text" name="facebook_page" placeholder="Facebook Page Link" value="<?php echo $vdata->facebook_link; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="instagram_page">Instagram</label>
                                                    <input id="instagram_page" type="text" name="twitter_link" placeholder="Twitter Page Link" value="<?php echo $vdata->twitter_link; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="youtube_link">Linkedin</label>
                                                    <input id="youtube_link" type="text" name="linkedin_link" placeholder="linkedin Link" value="<?php echo $vdata->linkedin_link; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="youtube_link">YouTube</label>
                                                    <input id="youtube_link" type="text" name="youtube_link" placeholder="youtube Link" value="<?php echo $vdata->youtube_link; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <button class="btn btn-default" id="submit_details" type="submit" onclick="VendorSignUP.UpdateDetails11(event);">Update profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>