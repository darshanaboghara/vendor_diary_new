 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin">Home</a></li>
              <li class="breadcrumb-item active">Staff Details</li>
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
                <h3 class="card-title" style="display: inline;">Staff Details List</h3>
                <h3 class="card-title" style="float: right;">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#AddModal">Add</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php
                    if(count($allstaff))
                    {?>
                        <table id="example" class="table table-bordered table-responsive table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>User Name</th>
                              <th>Email</th>
                              <th>Mobile Number</th>
                              <!--<th>Password</th>-->
                              <th>Role</th>
                              <th>Last Login</th>
                              <th>Status</th>
                              <th>Action</th>
                              <th>Update</th>
                              <th>Delete</th>
                              <th>Log</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($allstaff as $data)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id;?></td>
                                        <td><?php echo $data->username;?></td>
                                        <td><?php echo $data->email;?></td>
                                        <td><?php echo $data->mobile;?></td>
                                        <!--<td><?php echo $data->password;?></td>-->
                                        <td><?php echo $this->AH->getrolenamebyid($data->role);?></td>
                                        <td><?php echo date("d-M-Y (H:i:s)", strtotime($data->last_login)); ?></td>
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
                                                <button type="button" class="btn btn-block btn-secondary" onclick="updatestaff('<?php echo $data->id?>', '<?php echo $data->status;?>')">UNAPPROVED</button>
                                            <?php
                                                
                                            }
                                            else
                                            {?>
                                                <button type="button" class="btn btn-block btn-success" onclick="updatestaff('<?php echo $data->id?>', '<?php echo $data->status;?>')">APPROVED</button>
                                            <?php
                                            }?>
                                        </td>
                                         <td>
                                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#UpdateModal" onclick="StaffUpdatePopUp('<?php echo $data->id?>','<?php echo $data->username?>','<?php echo $data->email?>','<?php echo $data->mobile?>','<?php echo $data->password?>','<?php echo $data->role?>','<?php echo $data->status?>')"><i class="fa fa-pencil-alt text-yellow"></i></button>
                                        </td>
                                         <td>
                                          <i  onclick="deleteStaff('<?php echo $data->id?>')" class="fa fa-trash text-red"></i>
                                        </td>
                                        <td>
                                            <a class="btn btn-block btn-primary" target='_blank' href="<?= base_url();?>Admin/stafflogshow/<?= $data->id;?>">Show Log</a>
                                        </td>
                                    
                                    </tr>
                                    <?php
                                }
                              ?>
                          </tbody>
                        </table>
                    <?php 
                        
                    }
                    else
                    {
                        echo "No data Available";
                    }
                  ?>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php echo $page;?>
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

  
<!--Update Staff Model-->
    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="UpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateModalLabel">Update Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Admin/updatestaffDetails">
        <div class="modal-body">
            <input type="text" name="id" class="form-control" id="recipient-id"  hidden>
            <div class="form-group">
                <label for="username" class="col-form-label">User Name:</label>
                <input type="text" name="username" class="form-control" id="username"  required>
            </div>
            
            <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email"  required>
            </div>
            
            <div class="form-group">
                <label for="mobile" class="col-form-label">Mobile:</label>
                <input type="text" name="mobile" class="form-control" id="mobile"  required>
            </div>
            
            <div class="form-group">
                <label for="password" class="col-form-label">Password:</label>
                <input type="text" name="password" class="form-control" id="password"  required>
            </div>
            
            <div class="form-group">
                <label for="role" class="col-form-label">Staffe Role:</label>
                <select class="form-control" name="role" id="role" selectname="Plan amount type" required>
                    <?php
                        foreach($this->AH->getAllStaffRole() as $data)
                        {
                            echo '<option id="role'.$data->id.'" class="roleselect" value='.$data->id.'>'.$data->role_name.'</option>';
                        }
                    ?>
                    <!--<option value="1">Staff-Full-Access</option>-->
                    <!--<option value="2">Staff-Low-Access</option>-->
                    <!--<option value="3">test</option>-->
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
<!--End Update Staff Model-->

 <!-- Start Add Staff Model  -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalLabel">Add New Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Admin/addNewStaff">
        <div class="modal-body">
            
            <div class="form-group">
                <label for="username" class="col-form-label">User Name:</label>
                <input type="text" name="username" class="form-control" id="username"  required>
            </div>
            
            <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email"  required>
            </div>
            
            <div class="form-group">
                <label for="mobile" class="col-form-label">Mobile:</label>
                <input type="text" name="mobile" class="form-control" id="mobile"  required>
            </div>
            
            <div class="form-group">
                <label for="password" class="col-form-label">Password:</label>
                <input type="text" name="password" class="form-control" id="password"  required>
            </div>
            
            <div class="form-group">
                <label for="role" class="col-form-label">Staffe Role:</label>
                <select class="form-control" name="role" id="role" selectname="Plan amount type" required>
                    <option value="1">Staff-Full-Access</option>
                    <option value="2">Staff-Low-Access</option>
                    <option value="3">test</option>
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
  <!-- End Add Staff Model  -->
  

  
<script>
    //save old id for selected or not
    var oldId = "";
    function StaffUpdatePopUp(id,uname,email,mobile,pwd,role,status)
    {
        
        var x = document.getElementById("recipient-id");
            x.setAttribute("value", id);
        var y = document.getElementById("username");
            y.setAttribute("value", uname);
        var z = document.getElementById("email");
            z.setAttribute("value",email);
        var a = document.getElementById("mobile");
            a.setAttribute("value",mobile);
        var b = document.getElementById("password");
            b.setAttribute("value",pwd);
            
        //Remove Old selected option
        if(oldId != ""){
           var x = document.getElementById(oldId);
            x.removeAttribute("selected");
        }
        
        //set selected Option  
        var ptv = document.getElementById("role"+role);
        var att = document.createAttribute("selected");
        ptv.setAttributeNode(att);
        
        //save new selected option
        oldId="role"+role;
          
          var ptv = document.getElementById("status");
          if(status=="APPROVED")
          {
              ptv.innerHTML='<option value="APPROVED" selected>APPROVED</option><option value="UNAPPROVED">UNAPPROVED</option>';
          }
          else
          {
               ptv.innerHTML='<option value="APPROVED" >APPROVED</option><option value="UNAPPROVED" selected>UNAPPROVED</option>';
          }
      
    }
    function updatestaff($vid,$status) {
         //alert($vid+$status);
         if(confirm("Do You want to continue?")) 
         {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                   location.reload();
                }
            };
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/updatestaff?vid=" + $vid+"&status="+$status, true);
            xhttp.send();
             
        }
    }
    function deleteStaff($vid) {
         //alert($vid);
         if(confirm("Do You want to Delete?")) 
         {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                   location.reload();
                }
            };
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/deleteStaff?id=" + $vid, true);
            xhttp.send();
             
         }
    }
  </script>
  
  