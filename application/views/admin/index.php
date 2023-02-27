
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Website <small>Update</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/update">
                <div class="card-body">
                    <div class="form-group">
                        <label for="web_name">Web name</label>
                        <input type="url" name="web_name" class="form-control" id="web_name" value="<?php echo $site->web_name;?>" placeholder="web name">
                    </div>
                  
                    <div class="form-group">
                        <label for="contact_no">Contact Number</label>
                        <input type="text" name="contact_no" class="form-control" id="contact_no" value="<?php echo $site->contact_no;?>" placeholder="Contact number">
                    </div>
                  
                    <div class="form-group">
                        <label for="contact_email">Contact Email</label>
                        <input type="email" name="contact_email" class="form-control" id="contact_email" value="<?php echo $site->contact_email;?>" placeholder="Contact Email">
                    </div>
                  
                  
                    <div class="form-group">
                        <label for="web_frienly_name">Web Frienly Name</label>
                        <input type="text" name="web_frienly_name" class="form-control" id="web_frienly_name" value="<?php echo $site->web_frienly_name;?>" placeholder="Contact number">
                    </div>
                  
                    <div class="form-group">
                        <label for="full_address">full_address</label>
                            <textarea class="form-control" name="full_address" id="full_address" value="<?php echo $site->full_address;?>" rows="3"><?php echo $site->full_address;?></textarea>
                    <!-- <input type="email" class="form-control" name="contact_email" id="web_name" value="<?php echo $site->contact_email;?>" placeholder="Contact email"> -->
                    </div>
                    
                     <div class="form-group">
                        <label for="footer_text">Footer Text</label>
                        <input type="text" name="footer_text" class="form-control" id="footer_text" value="<?php echo $site->footer_text;?>">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Social Media <small>Update</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/update">
                <div class="card-body">
                    <div class="form-group">
                        <label for="google_link">Google</label>
                        <input type="url" name="google_link" class="form-control" id="google_link" value="<?php echo $site->google_link;?>" placeholder="Google Link">
                    </div>
                  
                    <div class="form-group">
                        <label for="facebook_link">Facebook</label>
                        <input type="url" name="facebook_link" class="form-control" id="facebook_link" value="<?php echo $site->facebook_link;?>" placeholder="Facebook Link">
                    </div>
                  
                  
                    <div class="form-group">
                        <label for="linkedin_link">Linkedin</label>
                        <input type="url" name="linkedin_link" class="form-control" id="linkedin_link" value="<?php echo $site->linkedin_link;?>" placeholder="Linkedin Link">
                    </div>
                  
                    <div class="form-group">
                        <label for="twitter_link">Twitter</label>
                            <input type="url" name="twitter_link" class="form-control" id="twitter_link" value="<?php echo $site->twitter_link;?>" placeholder="Twitter Link">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Site Color <small>Update</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/update">
                <div class="card-body">
                    <div class="form-group">
                        <label for="colour_name">Colour Name</label>
                        <input type="color" name="colour_name" class="form-control" id="colour_name" value="<?php echo $site->colour_name;?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="font_color">Font Colour Name</label>
                        <input type="color" name="font_color" class="form-control" id="font_color" value="<?php echo $site->font_color;?>">
                    </div>
                  
                   
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Site SEO <small>Update</small></h3>
                  </div>
                  <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/update">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="font_color">website title</label>
                            <input type="text" name="website_title" class="form-control" id="website_title" value="<?php echo $site->website_title;?>">
                        </div>
                      
                        <div class="form-group">
                            <label for="colour_name">Website Description</label>
                            <input type="text" name="website_description" class="form-control" id="website_description" value="<?php echo $site->website_description;?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="font_color">Website Keywords</label>
                            <input type="text" name="website_keywords" class="form-control" id="website_keywords" value="<?php echo $site->website_keywords;?>">
                        </div>
                        
                       
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Google Analytics<small>Update</small></h3>
                  </div>
                  <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/update">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="font_color">google analytics code</label>
                            <input type="text" name="google_analytics_code" class="form-control" id="google_analytics_code" value="<?php echo $site->google_analytics_code;?>">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  