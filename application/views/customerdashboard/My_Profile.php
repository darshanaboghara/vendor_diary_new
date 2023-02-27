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
                                <form method="post" action="<?php echo base_url();?>Customerdashboard/update_profile">
                                    <!-- Form Name -->
                                    <div class="personal-form-info">
                                        <div class="row">
                                            <!-- Text input-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h3>Customer Details
                                                </h3>
                                                <div class="dashboard-section-line">
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="business_name">Email</label>
                                                    <input id="business_name" type="text" name="business_name" placeholder="Business Name" class="form-control" value="<?php echo $this->session->googleemail; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="vfirstname">First Name</label>
                                                    <input id="vfirstname" type="text" name="vfirstname" placeholder="Vender First Name" class="form-control" value="<?php echo $this->session->googlename; ?>" readonly data-valid="required">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="vlastname">Last Name</label>
                                                    <input id="vlastname" type="text" name="vlastname" placeholder="Vender Last Name" value="<?php echo $this->session->googlelname; ?>" class="form-control" readonly data-valid="required">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="phone">Mobile Number</label>
                                                    <input id="vlastname" type="number" name="phone" placeholder="Mobile Number" value="<?php echo $this->session->phone; ?>" class="form-control" <?php if(!$this->session->phone==null){ echo 'readonly';
                                                    }?>  required maxlength="13" minlength="10">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                     <?php if($this->session->phone==null){?>
                                                        <input  type="submit" class="btn btn-default">
                                                    <?}?>
                                                </div>
                                            </div>
                                            
                                            <!--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                                            <!--    <button class="btn btn-default" id="submit_details" type="submit" onclick="VendorSignUP.UpdateDetails11(event);">Update profile</button>-->
                                            <!--</div>-->
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