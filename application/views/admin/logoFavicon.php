
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
        
        <!--<div class="row">-->
          <!-- left column -->
        <!--  <div class="col-md-12">-->
            <!-- jquery validation -->
        <!--    <div class="card card-primary">-->
        <!--      <div class="card-header">-->
        <!--        <h3 class="card-title">Logo & Favicone Color <small>Update</small></h3>-->
        <!--      </div>-->
              <!-- /.card-header -->
              <!-- form start -->
        <!--      <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/update">-->
                
        <!--      </form>-->
        <!--    </div>-->
            <!-- /.card -->
        <!--    </div>-->
          <!--/.col (left) -->
          <!-- right column -->
        <!--  <div class="col-md-6">-->

        <!--  </div>-->
          <!--/.col (right) -->
        <!--</div>-->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Change Logo and favicon</h3>
              </div>
              <div class="card-body">
    
                    <!--<img src="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>" alt="Forest" width="100" height="100">-->
                    <!--<div class="desc">-->
                    <!--    <?php print_r(@$upload_logo['error']); ?>-->
                    <!--    <?php echo form_open_multipart('Admin/webLogo'); ?>-->
                    <!--        <input type='file' class='form-control' name='upload_logo' size='20' />-->
                    <!--        <input class='btn btn-sm' type='submit' name='submit' value='upload' /> -->
                    <!--   </form>-->
                    <!--</div>-->
                    
                <div class="row">
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img class="border" src="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>" alt="Photo 1" class="img">
                      <div class="desc">
                        <?php print_r(@$upload_logo['error']); ?>
                        <?php echo form_open_multipart('Admin/webLogo'); ?>
                            <input type='file' class='form-control' name='upload_logo' size='20' />
                            <input class="btn btn-block btn-secondary" type='submit' name='submit' value='upload' /> 
                        </form>
                        </div>
                      <!--<div class="ribbon-wrapper ribbon-lg">-->
                      <!--  <div class="ribbon bg-success text-lg">-->
                      <!--    Ribbon-->
                      <!--  </div>-->
                      <!--</div>-->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="<?php echo base_url(); ?>favicons/<?php echo  $site->upload_favicon ?>" lt="Photo 3" class="img">
                      <div class="desc">
                            <?php print_r(@$upload_logo['error']); ?>
                            <?php echo form_open_multipart('Admin/faviconchange'); ?>
                                <input type='file' class='form-control' name='upload_favicon' size='20' />
                                <input class="btn btn-block btn-secondary" type='submit' name='submit' value='upload' /> 
                            </form>
                        </div>
                      <!--<div class="ribbon-wrapper ribbon-xl">-->
                      <!--  <div class="ribbon bg-warning text-lg">-->
                      <!--    Ribbon-->
                      <!--  </div>-->
                      <!--</div>-->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Change Logo and favicon
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->