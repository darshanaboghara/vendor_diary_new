 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="display: inline;">vendor Details List</h3>
                <h3 class="card-title" style="float: right;">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>
                </h3>
                <br>
                
                    <form method="POST" action="<?php echo base_url();?>staff/vendorlistbyfilter">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 col-sm-3">
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="country_id" id="country_id"  selectname="Select country" onchange="fillstate1(this.value);" required>
                                                <option value='0'>Country</option>
                                                <?php
                                                    foreach ($country as $data)
                                                    {
                                                        echo " <option value='$data->id'>$data->country_name</option>";
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="state_id" id="state1" selectname="Select State" onchange="fillCity1(this.value);" required>
                                            <option value='0'>State</option>
                                        </select>
                                    </div>
                                 </div>
                                <div class="col-6 col-sm-3">    
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="city_id" id="city1" selectname="Select City" required>
                                            <option value='0'>City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                   <div class="input-group mb-3">
                                        <select class="form-control" name="category_id" id="category1"  selectname="Select Category" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="abc@gmail.com" value="<?php echo $this->session->keyword;?>">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3"><button type="submite" class="btn btn-block btn-primary" >Find Vendor</button></div>
                            </div>
                        </div>
                    </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Business Name</th>
                      <th>Email</th>
                      <th>Mobile Number</th>
                      <th>Send</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($allvendor as $data)
                        {
                            ?>
                            <tr id="v<?php echo $data->id;?>">
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->planner_name;?></td>
                                <td><?php echo $data->business_name;?></td>
                                <td><?php echo $data->email;?></td>
                                <td><?php echo $data->mobile;?></td>
                                <td><button type="button" class="btn btn-block btn-secondary" onclick="send('<?php echo $data->id?>', '<?php echo $data->email;?>')">Send</button></td>
                                <td>
                                   
                                    <?php if( $data->status =="APPROVED")
                                    {
                                    ?>
                                    <span class="badge bg-success"><i class="far fa-check-circle"></i><?php echo $data->status;?></span>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <span class="badge bg-danger"><i class="fas fa-ban"></i><?php echo $data->status;?></span>
                                    <?php
                                    }?>
                                </td>
                                
                               
                                
                                <td>
                                    <?php if( $data->status =="APPROVED")
                                    {
                                    ?>
                                        <button type="button" class="btn btn-block btn-secondary" onclick="updatevendor('<?php echo $data->id?>', '<?php echo $data->status;?>')">UNAPPROVED</button>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <button type="button" class="btn btn-block btn-success" onclick="updatevendor('<?php echo $data->id?>', '<?php echo $data->status;?>')">APPROVED</button>
                                    <?php
                                    }?>
                                </td>
                                 <td>
                                    <a class="btn btn-block btn-primary" target='_blank' href="<?php echo base_url();?>Staff/updatevendorbyid?id=<?php echo $data->id?>">Update</a>
                                </td>
                                 <td>
                                    <button type="button" class="btn btn-block btn-danger" onclick="deleteVendor('<?php echo $data->id?>')">Delete</button>
                                </td>
                            
                            </tr>
                            <?php
                        }
                      ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php echo @$page;?>
                  <!--<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>-->
                  <!--<li class="page-item"><a class="page-link" href="#">1</a></li>-->
                  <!--<li class="page-item"><a class="page-link" href="#">2</a></li>-->
                  <!--<li class="page-item"><a class="page-link" href="#">3</a></li>-->
                  <!--<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>-->
                </ul>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Staff/addVendorByStaff" enctype="multipart/form-data">
        <div class="modal-body">
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="brand_name" value="<?php echo set_value('brand_name'); ?>" placeholder="Brand Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="planner_name" value="<?php echo set_value('planner_name'); ?>" placeholder="Planner Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password"  placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-key"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" placeholder="Mobile Number" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
                <select class="form-control" name="country_id" id="country_id"  selectname="Select country" onchange="fillstate(this.value);" required>
                        <option>Select Country</option>
                        <?php
                            foreach ($country as $data)
                            {
                                echo " <option value='$data->id'>$data->country_name</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-control" name="state_id" id="state" selectname="Select State" onchange="fillCity(this.value);" required>
                    <option>Select Country First</option>
                </select>
            </div>
            
            <div class="input-group mb-3">
                <select class="form-control" name="city_id" id="city" selectname="Select City" required>
                    <option>Select State First</option>
                </select>
            </div>
            
            <div class="input-group mb-3">
                <select class="form-control" name="category_id" id="category"  selectname="Select Category" required>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="image" id="image"  accept="image/*" >
            </div>
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary">
          </div>
      </form>
    </div>
  </div>
</div> 
<script>
    function deleteVendor(vid) {
         //alert($vid);
         if(confirm("Do You want to Delete?")) 
         {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    $("#v"+vid).remove();  
                }
            };
            xhttp.open("GET", "<?php echo base_url(); ?>Staff/deleteVendor?id=" + vid, true);
            xhttp.send();
             
         }
    }
    function updatevendor($vid,$status) {
         //alert($vid+$status);
         if(confirm("Do u want to continue?")) 
         {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                   location.reload();
                }
            };
            xhttp.open("GET", "<?php echo base_url(); ?>Staff/updatevendorstatus?vid=" + $vid+"&status="+$status, true);
            xhttp.send();
             
         }
    }
    function send(vid,email) {
         //alert($vid+$status);
         let person = prompt("Please enter your name", email);
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    //sleep(5);
                    location.reload();
                }
            };
            xhttp.open("GET", "<?php echo base_url(); ?>Staff/sendcredentialmail?vid=" + vid+"&email="+person, true);
            xhttp.send();
             
         
    }
     function fillstate(id) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("state").innerHTML = this.responseText;
      }
    };
    var url="<?php echo base_url();?>";
    xhttp.open("GET", url+"Getstate?q=" + id, true);
    xhttp.send();
  }
  function fillCity(id) {
    var x = document.getElementById("city");
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("city").innerHTML = this.responseText;
      }
    };
    var url="<?php echo base_url();?>";
    xhttp.open("GET",url+"Getcity?q=" + id, true);
    xhttp.send();
  }
 function fillstate1(id) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("state1").innerHTML = this.responseText;
      }
    };
    var url="<?php echo base_url();?>";
    xhttp.open("GET", url+"Getstate?q=" + id, true);
    xhttp.send();
  }
   function fillCity1(id) {
    var x = document.getElementById("city1");
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("city1").innerHTML = this.responseText;
      }
    };
    var url="<?php echo base_url();?>";
    xhttp.open("GET",url+"Getcity?q=" + id, true);
    xhttp.send();
  }
   function GetCategory() {
    xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         document.getElementById("category").innerHTML = this.responseText;
         document.getElementById("category1").innerHTML = this.responseText;
       }
     };
     var url="<?php echo base_url();?>";
     xhttp.open("GET",url+"Getcategory", true);
     xhttp.send();
   }
   window.onload = GetCategory;
</script>