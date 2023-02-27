 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Querys</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor Querys</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <h2 class="m-3">Query Count</h2>
        <div class="row">
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3><?php $c=0;
                    foreach($this->AH->getallquery() as $data)
                    {
                        if("NEW"==$data->status)
                        {
                            $c++;
                        }
                    }    
                    echo $c; 
                        ?></h3>

                <p>User New Query</p>
              </div>
              <div class="icon">
                <i class="fas fa-question"></i>
              </div>
              <a href="<?php echo base_url()?>Admin/vendorquery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
           <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3>
                    <?php echo count($this->AH->getallquery())-$c;?>
                     
                </h3>

                <p>Vendor Answer Query</p>
              </div>
              <div class="icon">
                <i class="fas fa-question"></i>
              </div>
              <a href="<?php echo base_url()?>Admin/vendorquery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
           <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3><?php echo count($this->AH->getallquery());?></h3>

                <p>Total Query</p>
              </div>
              <div class="icon">
                <i class="fas fa-question"></i>
              </div>
              <a href="<?php echo base_url()?>Admin/vendorquery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
            <form method="POST" action="<?php echo base_url();?>Admin/vendorquerybyfilter">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group mb-4">
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
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="state_id" id="state1" selectname="Select State" onchange="fillCity1(this.value);" required>
                                            <option value='0'>State</option>
                                        </select>
                                    </div>
                                 </div>
                                <div class="col-4">    
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
                                        <select class="form-control" name="status" id="status"  selectname="Select Status" required>
                                            <option value='OLD'>OLD</option>
                                            <option value='NEW'>NEW</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="abc@gmail.com" value="<?php echo $this->session->keyword;?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="fromdate" id="fromdate">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="todate" id="todate">
                                    </div>
                                </div>
                                <div class="col-2"><button type="submite" class="btn btn-block btn-primary" >Find Vendor query</button></div>
                                <div class="col-2"><a href="<?php echo base_url()?>/Admin/vendorquery" class="btn btn-block btn-primary" >Clear Filter</a></div>
                            </div>
                        </div>
                        
                        
                    </form>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendor Querys List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-responsive">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Comment</th>
                      <th>Status</th>
                      <th>Response Status</th>
                      <th>Response </th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($vquery as $vendor)
                        {
                            ?>
                            <tr>
                                <td><?php echo $vendor->id;?></td>
                                <td><?php echo $vendor->Name;?></td>
                                <td><?php echo $vendor->email;?></td>
                                <td><?php echo $vendor->Phone;?></td>
                                <td><?php echo $vendor->Comment;?></td>
                                <td><?php echo $vendor->status;?></td>
                                <!--<td><a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  onclick='EnquiryPopUp("<?php echo $vendor->id;?>","<?php echo $vendor->email;?>")'>Open modal for <?php echo $vendor->email;?></a>-->
                                <!--</td>-->
                                <td><?php  if($vendor->status=="SEND" || $vendor->status=="OLD")
                                            {
                                                echo " <span class='badge bg-success'>Response Done</span>";
                                            }
                                            else
                                            {
                                                echo " <span class='badge bg-danger'>Not Response</span>";
                                            }
                                        ?>
                                </td>
                                <td><?php echo $vendor->response;?></td>
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
                     <?php echo $page;?>
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
  
  
  
  
  <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Admin/vendorQueryAdminResponse">
      <div class="modal-body">
        <input type="text" name="id" class="form-control" id="recipient-id"  hidden>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="email" name="email" class="form-control" id="recipient-name"  required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="message-text" required></textarea>
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
    function EnquiryPopUp(id,email) {
      var z = document.getElementById("recipient-id");
      z.setAttribute("value", id);
      var x = document.getElementById("recipient-name");
      x.setAttribute("value", email);
      var y = document.getElementById("message-text");
      y.setAttribute("value", "");
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
         //document.getElementById("category").innerHTML = this.responseText;
         document.getElementById("category1").innerHTML = this.responseText;
       }
     };
     var url="<?php echo base_url();?>";
     xhttp.open("GET",url+"Getcategory", true);
     xhttp.send();
   }
   window.onload = GetCategory;

</script>