
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Admin Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Admin Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
          <div class="row">
          <div class="col-md-6">
            <div class="card card-tabs">
              <div class="card-header p-0 pt-1">
                
                      
                       <form id="quickForm" method="POST" action="">
                            <div class="card-body">
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
                                
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            
                        </form>
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