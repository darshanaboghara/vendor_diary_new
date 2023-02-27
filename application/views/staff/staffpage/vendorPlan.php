 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>Admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Vendor Plan</li>
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
                <h3 class="card-title">vendor Plan List</h3>
                 <h3 class="card-title" style="float: right;">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#AddModal">Add</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Plan Type</th>
                      <th>Plan Amount Type</th>
                      <th>Plan Amount</th>
                      <th>Plan Duration</th>
                      <th>Customer Lead</th>
                      <th>Status</th>
                      <?php if ($this->session->StaffRole->edit_plan == "All Members")  {
                      ?>
		  
	
                      <th colspan=2>Action</th>	<?php }?>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($vplan as $data)
                        {
                            ?>
                            <tr id="rowid<?php echo $data->id;?>">
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->rates_name;?></td>
                                <td><?php echo $data->plan_type;?></td>
                                <td><?php echo $data->plan_amount_type;?></td>
                                <td>$ <?php echo $data->plan_amount;?></td>
                                <td><?php echo $data->plan_duration;?></td>
                                <td><?php echo $data->lead;?></td>
                                <!--<td><?php echo $data->vendor_listing_service_providers;?></td>-->
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
                                
                                <?php if ($this->session->StaffRole->edit_plan == "All Members")  {
                      ?>
                                <td><a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  onclick='EnquiryPopUp("<?php echo $data->id;?>","<?php echo $data->plan_amount;?>","<?php echo $data->plan_duration;?>","<?php echo $data->rates_name;?>","<?php echo $data->lead;?>","<?php echo $data->plan_type;?>","<?php echo $data->plan_amount_type;?>","<?php echo $data->status;?>")'>Update</a></td>
                                <td><a  class="btn btn-danger swalDefaultWarning" onclick='deleteplan("<?php echo base64_encode($data->id);?>")'>Delete</a></td>
                               <?php } ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Plan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Staff/vendorPlanUpdate">
      <div class="modal-body">
        <input type="text" name="id" class="form-control" id="recipient-id"  hidden>
        <!--<div class="form-group">-->
        <!--    <label for="recipient-amount" class="col-form-label" id="Plan"></label>-->
        <!--  </div>-->
          
          <div class="form-group">
            <label for="rates_name" class="col-form-label">Plan Name:</label>
            <input type="text" name="rates_name" class="form-control" id="rates_name"  required>
          </div>
          
          <div class="form-group">
                <label for="plan_type" class="col-form-label">Plan Type:</label>
                <select class="form-control" name="plan_type" id="plan_type" selectname="Plan Type" required>
                    <option value="PAID">Paid</option>
                    <option value="FREE">Free</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="plan_amount_type" class="col-form-label">Plan Amount Type:</label>
                <select class="form-control" name="plan_amount_type" id="plan_amount_type" selectname="Plan amount type" required>
                    <option value="INR">INR</option>
                    <option value="AUD">AUD</option>
                    <option value="USD">USD</option>
                </select>
            </div>
            
          
          <div class="form-group">
            <label for="recipient-amount" class="col-form-label">Plan Amount:</label>
            <input type="number" name="plan_amount" class="form-control" id="recipient-amount"  required>
          </div>
          
          <div class="form-group">
            <label for="plan_duration" class="col-form-label">Plan Duration:</label>
            <input type="number" name="plan_duration" class="form-control" id="plan_duration"  required>
          </div>
          
          <div class="form-group">
            <label for="lead" class="col-form-label">Customer Lead:</label>
            <input type="number" name="lead" class="form-control" id="clead"  required>
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
  
  
  
  
  <!-- Start Add Plan Model  -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalLabel">Add New Plan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Staff/addNewPlan">
        <div class="modal-body">
            
            <div class="form-group">
                <label for="rates_name" class="col-form-label">Plan Name:</label>
                <input type="text" name="rates_name" class="form-control" id="rates_name"  required>
            </div>
            
            <div class="form-group">
                <label for="plan_type" class="col-form-label">Plan Type:</label>
                <select class="form-control" name="plan_type" id="plan_type" selectname="Plan Type" required>
                    <option value="PAID">Paid</option>
                    <option value="FREE">Free</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="plan_amount_type" class="col-form-label">Plan Amount Type:</label>
                <select class="form-control" name="plan_amount_type" id="plan_amount_type" selectname="Plan amount type" required>
                    <option value="INR">INR</option>
                    <option value="AUD">AUD</option>
                    <option value="USD">USD</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="plan_amount" class="col-form-label">Plan Amount:</label>
                <input type="number" name="plan_amount" class="form-control" id="recipient-amount"  required>
            </div>
          
            <div class="form-group">
                <label for="plan_duration" class="col-form-label">Plan Duration:</label>
                <input type="number" name="plan_duration" class="form-control" id="plan_duration"  required>
            </div>
            
            <div class="form-group">
                <label for="lead" class="col-form-label">User Lead:</label>
                <input type="number" name="lead" class="form-control" id="lead"  required>
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
  <!-- End Add Plan Model  -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<script>
    function EnquiryPopUp(id,amount,duration,pname,lead,pt,pat,status) {
      var x = document.getElementById("recipient-id");
      x.setAttribute("value", id);
      var y = document.getElementById("recipient-amount");
      y.setAttribute("value", amount);
      var z = document.getElementById("plan_duration");
      z.setAttribute("value",duration);
      
      var a = document.getElementById("rates_name");
      a.setAttribute("value",pname);
      
      var ptv = document.getElementById("plan_type");
      if(pt=="FREE")
      {
          ptv.innerHTML="<option value='PAID'>Paid</option><option value='FREE' selected>Free</option>";
      }
      else
      {
           ptv.innerHTML="<option value='PAID' selected>Paid</option><option value='FREE' >Free</option>";
      }
      
      var ptv = document.getElementById("status");
      if(status=="APPROVED")
      {
          ptv.innerHTML='<option value="APPROVED" selected>APPROVED</option><option value="UNAPPROVED">UNAPPROVED</option>';
      }
      else
      {
           ptv.innerHTML='<option value="APPROVED" >APPROVED</option><option value="UNAPPROVED" selected>UNAPPROVED</option>';
      }
      
      var patv = document.getElementById("plan_amount_type");
      
      if(pat=="INR")
      {
          patv.innerHTML='<option value="INR" selected>INR</option><option value="AUD">AUD</option><option value="USD">USD</option>';
      }
      else if(pat=="AUD")
      {
           patv.innerHTML='<option value="INR" >INR</option><option value="AUD" selected>AUD</option><option value="USD">USD</option>';
      }
      else
      {
          patv.innerHTML='<option value="INR" >INR</option><option value="AUD" selected>AUD</option><option value="USD" selected>USD</option>';
      }
      
      var b = document.getElementById("clead");
      b.setAttribute("value",lead);
      
    //   var a = document.getElementById("Plan");
    //   a.innerHTML=pname;
    }
    function deleteplan(id)
    {
        if(confirm("Do u want to continue?"))
        {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("rowid"+id).remove();
                    var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });
                
                    $('.swalDefaultWarning').click(function() {
                      Toast.fire({
                        icon: 'warning',
                        title: 'Plan Is Deleted.'
                      })
                    });
                }
                if(this.status == 401)
                {
                    alert("Access Deny");
                }
            };
            var url="<?php echo base_url();?>";
            xhttp.open("GET", url+"Staff/vendorPlanDelete?id="+id, true);
            xhttp.send();
        }
        
    }
</script>
 