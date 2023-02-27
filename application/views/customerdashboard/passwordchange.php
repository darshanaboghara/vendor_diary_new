<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title ">My Profile Password change
                    </h3>
                    <p>Change your profile Password.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card">
                            <div class="card-header">Profile Password change
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url();?>Customerdashboard/passwordchange">
                                    <!-- Form Password Chnage -->
                                    <div class="social-form-info mb-0">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h3>Password Change
                                                </h3>
                                                <div class="dashboard-section-line">
                                                </div>
                                            </div>
                                            
                                            <?php echo validation_errors("<div class='alert alert-danger alert-dismissible'>","</div>"); ?>
                                            <?php if($this->session->flashdata('Error')!= null)
                                                {?>
                                                <div class='alert alert-danger alert-dismissible mx-3'>
                                                
                                                   <?php echo $this->session->flashdata('Error');?>
                                                
                                            </div>
                                            <?php }?>
                                            
                                            <?php if($this->session->flashdata('Success')!= null)
                                                {?>
                                                <div class='alert alert-success alert-dismissible mx-3'>
                                                
                                                   <?php echo $this->session->flashdata('Success');?>
                                                
                                            </div>
                                            <?php }?>
                                            
                                            <div class="form-group">
                                                <label for="oldpwd">Old Password:</label>
                                                <input type="text" name="oldpwd" class="form-control" id="oldpwd"  placeholder="Type Old Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="New Password">New Password:</label>
                                                <input type="text" name="newpwd" class="form-control" id="New Password" placeholder="Type New Password">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="Confirm New Password">Confirm New Password:</label>
                                                <input type="text" name="cnewpwd" class="form-control" id="Confirm New Password" placeholder="Type Confirm New Password">
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