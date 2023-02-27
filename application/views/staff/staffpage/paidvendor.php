 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Plan Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor Plan Update</li>
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
                    <!--<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>-->
                </h3>
                <br>
                <form method="POST" action="<?php echo base_url();?>Admin/paidvendorlistbyfilter">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
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
                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="state_id" id="state1" selectname="Select State" onchange="fillCity1(this.value);" required>
                                            <option value='0'>State</option>
                                        </select>
                                    </div>
                                 </div>
                                <div class="col-3">    
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="city_id" id="city1" selectname="Select City" required>
                                            <option value='0'>City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                   <div class="input-group mb-3">
                                        <select class="form-control" name="category_id" id="category1"  selectname="Select Category" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="abc@gmail.com" value="<?php echo $this->session->keyword;?>">
                                    </div>
                                </div>
                                <div class="col-3"><button type="submite" class="btn btn-block btn-primary" >Find Vendor</button></div>
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
                      <th>Email</th>
                      <th>Mobile Number</th>
                      <th>Plan Status</th>
                      <th>Plan Expire</th>
                      <th>Status</th>
                      <th>Update By New plan</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($allvendor as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->planner_name;?></td>
                                <td><?php echo $data->email;?></td>
                                <td><?php echo $data->mobile;?></td>
                                <td><?php echo $data->plan_status;?></td>
                                <td><?php echo $data->plan_expired_on;?></td>
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
                                    <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  onclick='EnquiryPopUp("<?php echo $data->id;?>","<?php echo $data->email;?>")'>Update New Plan</a>
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
  
    <!-- Start Update Plan Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paid Plan To Vendor By Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Staff/paidByStaff">
      <div class="modal-body">
        <input type="text" name="id" class="form-control" id="recipient-id"  hidden>
        <input type="email" name="email" class="form-control" id="recipient-email"  hidden>
          
           <div class="form-group">
                <label for="status" class="col-form-label" id="recipient-name"></label>
            </div>
          
          <div class="form-group">
                <label for="plan_type" class="col-form-label">Plan Type:</label>
                <select class="form-control" name="plan_type" id="plan_type" selectname="Plan Type" required>
                    <?php 
                        foreach($vplan as $data)
                        {
                            echo "<option value='$data->id'>$data->rates_name</option>";
                        }
                    ?>
                </select>
            </div>
            
          
          <div class="form-group">
                <label for="status" class="col-form-label">Plan Status:</label>
                <select class="form-control" name="status" id="status" selectname="Plan Status" required>
                    <option value="APPROVED">APPROVED</option>
                    <option value="UNAPPROVED">UNAPPROVED</option>
                </select>
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
  <!-- End Update Plan Model -->
  
 <script>
    function EnquiryPopUp(id,email)
    {
      var x = document.getElementById("recipient-id");
      x.setAttribute("value", id);
      var x = document.getElementById("recipient-name");
      x.innerHTML=email;
      var x = document.getElementById("recipient-email");
      x.value=email;
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
                 document.getElementById("category1").innerHTML = this.responseText;
               }
             };
             var url="<?php echo base_url();?>";
             xhttp.open("GET",url+"Getcategory", true);
             xhttp.send();
           }
       window.onload = GetCategory;
 </script>