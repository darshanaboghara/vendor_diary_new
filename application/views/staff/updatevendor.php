
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Site Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Site Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
          <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="true">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">Social Link</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill" href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Service</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-normal-tab-2" data-toggle="pill" href="#custom-tabs-five-normal-2" role="tab" aria-controls="custom-tabs-five-normal-2" aria-selected="false">Other</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-five-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                      
                      <?php echo validation_errors("<div class='alert alert-danger alert-dismissible'>","</div>"); ?>
                       <form id="quickForm" method="POST" action="">
                           <input name="id" value="<?php echo $vdata->id;?>" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="planner_name">Planner Name:</label>
                                    <input type="text" name="planner_name" class="form-control" id="planner_name" value="<?php echo $vdata->planner_name;?>" placeholder="web name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $vdata->last_name;?>" placeholder="last_name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="business_name">Business Name:</label>
                                    <input type="text" name="business_name" class="form-control" id="business_name" value="<?php echo $vdata->business_name;?>" placeholder="business_name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="contact_person_name">Contact Person Name:</label>
                                    <input type="text" name="contact_person_name" class="form-control" id="contact_person_name" value="<?php echo $vdata->contact_person_name;?>" placeholder="contact_person_name">
                                </div>
                                <div class="form-group">
                                    <label for="web_name">Mobile:</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $vdata->mobile;?>" placeholder="mobile">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $vdata->email;?>" placeholder="web name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                        <textarea class="form-control" name="description" id="description" value="<?php echo $vdata->description;?>" rows="3"><?php echo $vdata->description;?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                        <textarea class="form-control" name="address" id="address" value="<?php echo $vdata->address;?>" rows="3"><?php echo $vdata->address;?></textarea>
                                </div>
                                <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                            <!-- /.card-body -->
                            
                        </form> 
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    
                    <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/updateVendorLinkbyAdmin">
                        <div class="card-body">
                            <input name="id" value="<?php echo $vdata->id;?>" hidden>
                            <div class="form-group">
                                <label for="website">Website:</label>
                                <input type="url" name="website" class="form-control" id="website" value="<?php echo $vdata->website;?>" placeholder="website Link">
                            </div>
                            <div class="form-group">
                                <label for="google_link">Google:</label>
                                <input type="url" name="google_link" class="form-control" id="google_link" value="<?php echo $vdata->google_link;?>" placeholder="Google Link">
                            </div>
                          
                            <div class="form-group">
                                <label for="facebook_link">Facebook:</label>
                                <input type="url" name="facebook_link" class="form-control" id="facebook_link" value="<?php echo $vdata->facebook_link;?>" placeholder="Facebook Link">
                            </div>
                          
                          
                            <div class="form-group">
                                <label for="linkedin_link">Linkedin:</label>
                                <input type="url" name="linkedin_link" class="form-control" id="linkedin_link" value="<?php echo $vdata->linkedin_link;?>" placeholder="Linkedin Link">
                            </div>
                          
                            <div class="form-group">
                                <label for="twitter_link">Twitter:</label>
                                    <input type="url" name="twitter_link" class="form-control" id="twitter_link" value="<?php echo $vdata->twitter_link;?>" placeholder="Twitter Link">
                            </div>
                            
                             <div class="form-group">
                                <label for="map_location">Map Link:</label>
                                    <input type="url" name="map_location" class="form-control" id="map_location" value="<?php echo $vdata->map_location;?>" placeholder="Twitter Link">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        
                        </div>
                        <!-- /.card-body -->
                        
                      </form>
                      
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                    
                    <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/updateVendorServicebyAdmin">
                        <div class="card-body">
                            <input name="id" value="<?php echo $vdata->id;?>" hidden>
                            <div class="form-group">
                                <label for="package">Package:</label>
                                <input type="text" name="package" class="form-control" id="package" value="<?php echo $vdata->package;?>" placeholder="package">
                            </div>
                        
                            <div class="form-group">
                                <label for="start_rate_range">Start Rate Range:</label>
                                <div class="input-group">
                                   
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="text" name="start_rate_range" class="form-control" id="start_rate_range" value="<?php echo $vdata->start_rate_range;?>" placeholder="start_rate_range">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="end_rate_range">End Rate Range:</label>
                                <div class="input-group">
                                   
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="text" name="end_rate_range" class="form-control" id="end_rate_range" value="<?php echo $vdata->end_rate_range;?>" placeholder="end_rate_range">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            
                        
                            <div class="form-group">
                                <label for="capacity">Capacity:</label>
                                <input type="text" name="capacity" class="form-control" id="capacity" value="<?php echo $vdata->capacity;?>" placeholder="capacity">
                            </div>
                        
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        
                        </div>
                        <!-- /.card-body -->
                        
                      </form>
                    
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-five-normal-2" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab-2">
                    
                    <div class="row">
                      <div class="col-sm-2">
                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                          <img src="<?php echo (file_exists('assets/images/' . $vdata->image))? base_url() . 'assets/images/' . $vdata->image : base_url().'assets/images/wedding-planner/demo.jpg';  ?>" class="img-fluid mb-2" alt="white sample"/>
                        </a>
                      </div>
                      <div class="col-sm-2">
                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                          <img src="<?php echo (file_exists('assets/images/' . $vdata->image_2))? base_url() . 'assets/images/' . $vdata->image_2 : base_url().'assets/images/wedding-planner/demo.jpg';  ?>" class="img-fluid mb-2" alt="white sample"/>
                        </a>
                      </div>
                      <div class="col-sm-2">
                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                          <img src="<?php echo (file_exists('assets/images/' . $vdata->image_3))? base_url() . 'assets/images/' . $vdata->image_3 : base_url().'assets/images/wedding-planner/demo.jpg';  ?>" class="img-fluid mb-2" alt="white sample"/>
                        </a>
                      </div>
                      <div class="col-sm-2">
                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                          <img src="<?php echo (file_exists('assets/images/' . $vdata->image_4))? base_url() . 'assets/images/' . $vdata->image_4 : base_url().'assets/images/wedding-planner/demo.jpg';  ?>" class="img-fluid mb-2" alt="white sample"/>
                        </a>
                      </div>
                      <div class="col-sm-2">
                        
                          <img src="<?php echo (file_exists('assets/images/' . $vdata->image_5))? base_url() . 'assets/images/' . $vdata->image_5 : base_url().'assets/images/wedding-planner/demo.jpg';  ?>" class="img-fluid mb-2" alt="white sample"/>
                        
                      </div>
                </div> 
                    
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->