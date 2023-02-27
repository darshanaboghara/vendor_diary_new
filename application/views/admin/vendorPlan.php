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
              <li class="breadcrumb-item"><a href="<?= @base_url();?>Admin/dashboard">Home</a></li>
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
                <table id="example2" class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Plan Type</th>
                      <th>Plan Amount Type</th>
                      <th>Plan Amount</th>
                      <th>Plan Duration</th>
                      <th>Customer Lead</th>
                      <th>FB post</th>
                      <th>IG post</th>
                      <th>Verified Badge</th>
                      <th>Dedicated Account Manager</th>
                      <th>support</th>
                      <th>Inclusion in Package selection</th>
                      <th>newsletter</th>
                      <th>Status</th>
                      <th colspan=2>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($vplan as $data)
                        {
                            ?>
                            <tr id="rowid<?= @$data->id;?>">
                                <td><?= @$data->id;?></td>
                                <td><?= @$data->rates_name;?></td>
                                <td><?= @$data->plan_type;?></td>
                                <td><?= @$data->plan_amount_type;?></td>
                                <td><?= @$data->plan_amount;?></td>
                                <td><?= @$data->plan_duration;?></td>
                                <td><?= @$data->lead;?></td>
                                <td><?= @$data->fb_post;?></td>
                                <td><?= @$data->ig_post;?></td>
                                <td><?= @$data->verify;?></td>
                                <td><?= @$data->dam;?></td>
                                <td><?= @$data->support;?></td>
                                <td><?= @$data->ips;?></td>
                                <td><?= @$data->newsletter;?></td>
                                <td>
                                    
                                    <?php if( $data->status =="APPROVED")
                                    {
                                    ?>
                                    <span class="badge bg-success"><i class="far fa-check-circle"></i><?= @$data->status;?></span>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <span class="badge bg-danger"><i class="fas fa-ban"></i><?= @$data->status;?></span>
                                    <?php
                                    }?>
                                </td>
                                <td>
                                    <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  onclick='EnquiryPopUp(<?= json_encode($data)?>)'>Update</a>
                                    
                                    
                                    <!--<a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  onclick='EnquiryPopUp("<?= @$data->id;?>","<?= @$data->plan_amount;?>","<?= @$data->plan_duration;?>","<?= @$data->rates_name;?>","<?= @$data->lead;?>","<?= @$data->plan_type;?>","<?= @$data->plan_amount_type;?>","<?= @$data->status;?>","<?= print_r($data)?>")'>Update</a>-->
                                </td>
                                <td><a  class="btn btn-danger swalDefaultWarning" onclick='deleteplan("<?= @$data->id;?>")'>Delete</a></td>
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
      <form  method="POST" action="<?= @base_url(); ?>Admin/vendorPlanUpdate">
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
            <label for="plan_duration" class="col-form-label">Plan Duration:</label>
            <textarea class="form-control" id="plan_details" row=5 name="plan_details">
                
              </textarea>
          </div>
          
          <div class="form-group">
            <label for="lead" class="col-form-label">Customer Lead:</label>
            <input type="number" name="lead" class="form-control" id="clead"  required>
          </div>
          
          <div class="form-group">
                <label for="fbpost" class="col-form-label">FB Post:</label>
                <input type="number" name="fbpost" class="form-control" min=0 id="fbpost"  required>
            </div>
            
            <div class="form-group">
                <label for="igpost" class="col-form-label">IG Post:</label>
                <input type="number" name="igpost" class="form-control" min=0 id="igpost"  required>
            </div>
            
            <div class="form-group">
                <label for="newsletter" class="col-form-label">Branding in Monthly e-Newsletter (per year):</label>
                <input type="number" name="newsletter" class="form-control" min=0 id="newsletter"  required>
            </div>
            
            <div class="form-group">
                <label for="blog" class="col-form-label">Branding on BLOG posts (per year):</label>
                <input type="number" name="blog" class="form-control" min=0 id="blog"  required>
            </div>
            
            <div class="form-group">
                <label for="decr" class="col-form-label">Designer Emails to customer regarding (per year):</label>
                <input type="number" name="decr" class="form-control" min=0 id="decr"  required>
            </div>
            
            <div class="form-group">
                <label for="bonm" class="col-form-label">Branding on Matrimonial Website (per year) (Upselling):</label>
                <input type="number" name="bonm" class="form-control" min=0 id="bonm"  required>
            </div>
            
            <div class="form-group">
                <label for="mnewsletter" class="col-form-label">Branding in Matrimonial Website’s Monthly e-Newsletter (per year):</label>
                <input type="number" name="mnewsletter" class="form-control" min=0 id="mnewsletter"  required>
            </div>
            
            <div class="form-group">
                <label for="mblog" class="col-form-label">Branding in Matrimonial Website’s BLOG e-Newsletter (per year):</label>
                <input type="number" name="mblog" class="form-control" min=0 id="mblog"  required>
            </div>
            
            <div class="form-group">
                <label for="BCPW" class="col-form-label">Branding on Cross platform Website (per year) (Cross Selling):</label>
                <input type="number" name="BCPW" class="form-control" min=0 id="BCPW"  required>
            </div>
            
            <div class="form-group">
                <label for="verify" class="col-form-label">Verify Badge:</label>
                <select class="form-control" name="verify" id="verify" selectname="Verify" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dam" class="col-form-label">Dedicated Account Manager:</label>
                <select class="form-control" name="dam" id="dam" selectname="dam" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="support" class="col-form-label">24x7 support </label>
                <select class="form-control" name="support" id="support" selectname="support" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="ips" class="col-form-label">Inclusion in Package selection </label>
                <select class="form-control" name="ips" id="ips" selectname="ips" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="pb" class="col-form-label">Priority Branding other then above on Paid basis</label>
                <select class="form-control" name="pb" id="pb" selectname="pb" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
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
      <form  method="POST" action="<?= @base_url(); ?>Admin/addNewPlan">
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
                <label for="fbpost" class="col-form-label">FB Post:</label>
                <input type="number" name="fbpost" class="form-control" min=0 id="fbpost"  required>
            </div>
            
            <div class="form-group">
                <label for="igpost" class="col-form-label">IG Post:</label>
                <input type="number" name="igpost" class="form-control" min=0 id="igpost"  required>
            </div>
            
            <div class="form-group">
                <label for="newsletter" class="col-form-label">Branding in Monthly e-Newsletter (per year):</label>
                <input type="number" name="newsletter" class="form-control" min=0 id="newsletter"  required>
            </div>
            
            <div class="form-group">
                <label for="blog" class="col-form-label">Branding on BLOG posts (per year):</label>
                <input type="number" name="blog" class="form-control" min=0 id="blog"  required>
            </div>
            
            <div class="form-group">
                <label for="decr" class="col-form-label">Designer Emails to customer regarding (per year):</label>
                <input type="number" name="decr" class="form-control" min=0 id="decr"  required>
            </div>
            
            <div class="form-group">
                <label for="bonm" class="col-form-label">Branding on Matrimonial Website (per year) (Upselling):</label>
                <input type="number" name="bonm" class="form-control" min=0 id="bonm"  required>
            </div>
            
            <div class="form-group">
                <label for="mnewsletter" class="col-form-label">Branding in Matrimonial Website’s Monthly e-Newsletter (per year):</label>
                <input type="number" name="mnewsletter" class="form-control" min=0 id="mnewsletter"  required>
            </div>
            
            <div class="form-group">
                <label for="mblog" class="col-form-label">Branding in Matrimonial Website’s BLOG e-Newsletter (per year):</label>
                <input type="number" name="mblog" class="form-control" min=0 id="mblog"  required>
            </div>
            
            <div class="form-group">
                <label for="BCPW" class="col-form-label">Branding on Cross platform Website (per year) (Cross Selling):</label>
                <input type="number" name="BCPW" class="form-control" min=0 id="BCPW"  required>
            </div>
            
            <div class="form-group">
                <label for="verify" class="col-form-label">Verify Badge:</label>
                <select class="form-control" name="verify" id="verify" selectname="Verify" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dam" class="col-form-label">Dedicated Account Manager:</label>
                <select class="form-control" name="dam" id="dam" selectname="Verify" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="support" class="col-form-label">24x7 support </label>
                <select class="form-control" name="support" id="support" selectname="support" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="ips" class="col-form-label">Inclusion in Package selection </label>
                <select class="form-control" name="ips" id="ips" selectname="ips" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="pb" class="col-form-label">Priority Branding other then above on Paid basis</label>
                <select class="form-control" name="pb" id="pb" selectname="pb" required>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
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
  <!-- End Add Plan Model  -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<script>
    function EnquiryPopUp(data) {
      var x = document.getElementById("recipient-id");
      x.setAttribute("value", data.id);
      var y = document.getElementById("recipient-amount");
      y.setAttribute("value", data.plan_amount);
      var z = document.getElementById("plan_duration");
      z.setAttribute("value",data.plan_duration);
      var z = document.getElementById("fbpost");
      z.setAttribute("value",data.fb_post);
      var z = document.getElementById("igpost");
      z.setAttribute("value",data.ig_post);
      var z = document.getElementById("newsletter");
      z.setAttribute("value",data.newsletter);
      var z = document.getElementById("blog");
      z.setAttribute("value",data.blog);
      var z = document.getElementById("decr");
      z.setAttribute("value",data.decr);
      var z = document.getElementById("bonm");
      z.setAttribute("value",data.bonm);
      var z = document.getElementById("mnewsletter");
      z.setAttribute("value",data.mnewsletter);
      var z = document.getElementById("mblog");
      z.setAttribute("value",data.mblog);
      var z = document.getElementById("BCPW");
      z.setAttribute("value",data.BCPW);
      var z = document.getElementById("plan_details");
      z.innerHTML=data.plan_details;
      
      var a = document.getElementById("rates_name");
      a.setAttribute("value",data.rates_name);
      
      var ptv = document.getElementById("verify");
      if(data.verify=="YES")
      {
          ptv.innerHTML="<option value='YES' selected>YES</option><option value='NO' >NO</option>";
      }
      else
      {
           ptv.innerHTML="<option value='YES' >YES</option><option value='NO' selected>NO</option>";
      }
      
      
      var ptv = document.getElementById("dam");
      if(data.dam=="YES")
      {
          ptv.innerHTML="<option value='YES' selected>YES</option><option value='NO' >NO</option>";
      }
      else
      {
           ptv.innerHTML="<option value='YES'>YES</option><option value='NO' selected>NO</option>";
      }
      var ptv = document.getElementById("support");
      if(data.support=="YES")
      {
          ptv.innerHTML="<option value='YES' selected>YES</option><option value='NO' >NO</option>";
      }
      else
      {
           ptv.innerHTML="<option value='YES' >YES</option><option value='NO' selected>NO</option>";
      }
      
      var ptv = document.getElementById("ips");
      if(data.ips=="YES")
      {
          ptv.innerHTML="<option value='YES' selected>YES</option><option value='NO' >NO</option>";
      }
      else
      {
           ptv.innerHTML="<option value='YES' >YES</option><option value='NO' selected>NO</option>";
      }
      
      var ptv = document.getElementById("pb");
      //alert(data.PB);
      if(data.PB=="YES")
      {
          ptv.innerHTML="<option value='YES' selected>YES</option><option value='NO' >NO</option>";
      }
      else
      {
           ptv.innerHTML="<option value='YES' >YES</option><option value='NO' selected>NO</option>";
      }
      
      
      var ptv = document.getElementById("plan_type");
      if(data.plan_type=="FREE")
      {
          ptv.innerHTML="<option value='PAID'>Paid</option><option value='FREE' selected>Free</option>";
      }
      else
      {
           ptv.innerHTML="<option value='PAID' selected>Paid</option><option value='FREE' >Free</option>";
      }
      
      var ptv = document.getElementById("status");
      if(data.status=="APPROVED")
      {
          ptv.innerHTML='<option value="APPROVED" selected>APPROVED</option><option value="UNAPPROVED">UNAPPROVED</option>';
      }
      else
      {
           ptv.innerHTML='<option value="APPROVED" >APPROVED</option><option value="UNAPPROVED" selected>UNAPPROVED</option>';
      }
      
      var patv = document.getElementById("plan_amount_type");
      
      if(data.plan_amount_type=="INR")
      {
          patv.innerHTML='<option value="INR" selected>INR</option><option value="AUD">AUD</option><option value="USD">USD</option>';
      }
      else if(data.plan_amount_type=="AUD")
      {
           patv.innerHTML='<option value="INR" >INR</option><option value="AUD" selected>AUD</option><option value="USD">USD</option>';
      }
      else
      {
          patv.innerHTML='<option value="INR" >INR</option><option value="AUD" selected>AUD</option><option value="USD" selected>USD</option>';
      }
      
      var b = document.getElementById("clead");
      b.setAttribute("value",data.lead);
      
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
            };
            var url="<?= @base_url();?>";
            xhttp.open("GET", url+"Admin/vendorPlanDelete?id="+id, true);
            xhttp.send();
        }
        
    }
</script>


<!--<script src="https://cdn.tiny.cloud/1/jydoujgq0etsl1of3xocpyrtmfdlbrpjmh8n3gybbift4lg1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>-->
 