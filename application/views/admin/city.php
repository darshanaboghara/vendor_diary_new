
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
          
          <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="true">city</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-five-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                      
                      <?php echo validation_errors("<div class='alert alert-danger alert-dismissible'>","</div>"); ?>
                        <table id="example" class="table table-bordered table-responsive table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>City Name</th>
                              <th>Country Id</th>
                              <th>State Id</th>
                              <th>Status</th>
                              <th>Action</th>
                              <th>Update</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($city as $data)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id;?></td>
                                        <td><?php echo $data->city_name;?></td>
                                        <td><?php echo $data->country_id;?></td>
                                        <td><?php echo $data->state_id;?></td>
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
                                                <button type="button" class="btn btn-block btn-secondary" onclick="updateAreaStatus('<?php echo $data->id?>', '<?php echo $data->status;?>','city_master')">UNAPPROVED</button>
                                            <?php
                                                
                                            }
                                            else
                                            {?>
                                                <button type="button" class="btn btn-block btn-success" onclick="updateAreaStatus('<?php echo $data->id?>', '<?php echo $data->status;?>','city_master')">APPROVED</button>
                                            <?php
                                            }?>
                                        </td>
                                         <td><a  class="btn btn-primary" data-toggle="modal" data-target="#updateModal"  onclick='EnquiryPopUp("<?php echo $data->id;?>","<?php echo $data->city_name;?>","city_master")'>Update</a></td>
                                         <td>
                                            <button type="button" class="btn btn-block btn-danger" onclick="deleteArea('<?php echo $data->id?>','city_master')">Delete</button>
                                        </td>
                                    
                                    </tr>
                                    <?php
                                }
                              ?>
                          </tbody>
                        </table>
                  </div>
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
                  
                </div>
              </div>
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
 
  <!-- Start Update Plan Model -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Category Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Admin/updateAreaCity">
      <div class="modal-body">
        <input type="text" name="vid" class="form-control" id="recipient-id"  hidden>
        <!--<div class="form-group">-->
        <!--    <label for="recipient-amount" class="col-form-label" id="Plan"></label>-->
        <!--  </div>-->
          
          <div class="form-group">
            <label for="rates_name" class="col-form-label">Category Name:</label>
            <input type="text" name="city_name" class="form-control" id="city_name"  required>
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
  function EnquiryPopUp(id,cname,table)
    {
          var x = document.getElementById("recipient-id");
          x.setAttribute("value", id);
          var y = document.getElementById("city_name");
          y.setAttribute("value", cname);
        //   var z = document.getElementById("plan_duration");
        //   z.setAttribute("value",duration);
    }
      function updateAreaStatus($aid,$status,$table) {
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
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/updateAreaStatus?vid=" + $aid+"&status="+$status+"&table="+$table, true);
            xhttp.send();
             
            }
        }
        function deleteArea($aid,$table) {
         //alert($vid+$status);
         if(confirm("Do you want to Delete?")) 
         {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                   location.reload();
                }
            };
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/deleteArea?vid=" + $aid+"&table="+$table, true);
            xhttp.send();
             
            }
        }
  </script>