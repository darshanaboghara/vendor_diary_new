
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Area</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Area</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Erorr Message-->
    <?php
        if($this->session->flashdata('erorr')!== null)
        {
    ?>
    <div class="container-fluid">
        <div class="row">
              <div class="col-md-12">
                
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        <?php echo @$this->session->flashdata('erorr');?>
                    </div>
                    
                  
              </div>
              <!-- /.col -->
        </div>
    </div>
    <?php } ?>
    <!-- End Erorr Message-->
    <!-- Success Message-->
    <?php
        if($this->session->flashdata('Success')!== null)
        {
    ?>
    <div class="container-fluid">
        <div class="row">
              <div class="col-md-12">
                
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        <?php echo @$this->session->flashdata('Success');?>
                    </div>
                    
                  
              </div>
              <!-- /.col -->
        </div>
    </div>
    <?php } ?>
    <!-- End Success Message-->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New <small>Country</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/AddCountry">
                <div class="card-body">
                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" name="country_name" class="form-control" id="country_name" required  placeholder="Country Name">
                    </div>
                  
                    <div class="form-group">
                        <label for="country_code">Country Code</label>
                        <input type="text" name="country_code" class="form-control" id="country_code" required placeholder="Country Code">
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
         
        </div>
        <!-- /.row -->
        
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New <small>State</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/AddState">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Custom Select</label>
                                <select class="custom-select" name="country_id" required>
                                    <option >Select Country</option>
                                    <?php
                                    foreach($country as $data)
                                    {
                                        echo " <option value=$data->id>$data->country_name ($data->country_code)</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label for="state_name">State Name</label>
                        <input type="text" name="state_name" class="form-control" id="state_name"  required placeholder="State Name">
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
                <h3 class="card-title">Add New <small>City</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="<?php echo base_url();?>Admin/AddCity">
                <div class="card-body">
                    <div class="form-group">
                        <label>Select Country</label>
                            <select name="country_id"  class="custom-select" required onchange="fillstate(this.value);">
                                <option value="0">Select Country</option>
                                    <?php
                                    foreach($country as $data)
                                    {
                                        echo " <option value=$data->id>$data->country_name ($data->country_code)</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                        
                     <div class="form-group">
                        <label>Select State</label>
                            <select class="custom-select" id="state" required name="state_id">
                                <option>Select First Country</option>
                            </select>
                        </div>
                  
                    <div class="form-group">
                        <label for="city_name">City Name</label>
                        <input type="text" name="city_name" class="form-control" required id="city_name"  placeholder="City Name">
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
  
  <script>
    function fillstate(id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("state").innerHTML = this.responseText;
            }
        };
        var url="<?php echo  base_url();?>";
        xhttp.open("GET",url+"Getstate?q=" + id, true);
        xhttp.send();
   }
  </script>
  