 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff Cash Transfers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>Admin">Home</a></li>
              <li class="breadcrumb-item active">Staff cash transfer</li>
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
                <!--<h3 class="card-title" style="float: right;">-->
                <!--    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#AddModal">Add</button>-->
                <!--</h3>-->
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
                              <th>Cash have</th>
                              <th>Transfer to Admin</th>
                              <th>Total cash</th>
                              <th>Pay</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($allstaff as $data)
                                {
                                    $this->db->select('*');
                                    $this->db->where('StaffID', $data->id);
                                    $this->db->from('staff_Add_vendor');
                            		$query = $this->db->get();
                            		$allvendor = $query->result();
                            		
                            		$paymant=0;
            						$panding=0;
            						$total=0;
                                    foreach($allvendor as $data2)
                                    {
                                        
                                        if($data2->payment=="No" && $data2->status =="APPROVED")
                                        {
                                             $paymant= $paymant+$data2->affiliate;
                                        }
                                        if($data2->payment=="No" && $data2->status =="UNAPPROVED")
                                        {
                                            $panding=$panding+$data2->affiliate;
                                        }
                                        if($data2->payment=="Yes" && $data2->status =="APPROVED")
                                        {
                                            $total=$total+$data2->affiliate;
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id;?></td>
                                        <td><?= @$data->username;?></td>
                                        <td><?php echo @$data->email;?></td>
                                        <td><?php echo @$data->mobile;?></td>
                                        <td>$<?php echo @$data->collect_amount;?></td>
                                        <td>$<?php echo @$data->Transfer_to_admin;?></td>
                                        <td>$<?php echo @$data->total_amount;?></td>
                                         <td>
                                             <?if($data->collect_amount<=0)
                                             {
                                                ?>
                                                <button type="button" class="btn btn-block btn-danger disabled"  disabled>Received</button>
                                                <?php
                                             }else
                                             {
                                                 ?>
                                                 <button type="button" class="btn btn-block btn-success" onclick="payStaff('<?php echo $data->id;?>','<?php echo @$data->collect_amount;?>','<?php echo $data2->id;?>')">Take $<?php echo @$data->collect_amount;?></button>
                                            <?php
                                             }?>
                                            
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
    function payStaff($staffid,$pay) {
         //alert($vid);
         if(confirm("Do You want to Pay?")) 
         {
             if($pay<=0)
             {
                 alert("Paymant Not be $0 ");
             }
             else
             {
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                      alert("Staff Paymant of "+$pay+" is Done"); 
                      location.reload();
                    }
                };
                xhttp.open("GET", "<?php echo base_url(); ?>Admin/paystaffbyid?sid=" + $staffid+"&amouth="+$pay, true);
                xhttp.send();
                //alert($staffid,$pay);
             }
           
             
         }
         else
         {
             alert('Transaction not execute')
         }
    }
  </script>
  
  