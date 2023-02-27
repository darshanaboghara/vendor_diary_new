 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Details</li>
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
                <h3 class="card-title" style="display: inline;">Category List</h3>
                <h3 class="card-title" style="float: right;">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($allcategory as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->category_name;?></td>
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
                                        <button type="button" class="btn btn-block btn-secondary" onclick="updatecategory('<?php echo $data->id?>', '<?php echo $data->status;?>')">UNAPPROVED</button>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <button type="button" class="btn btn-block btn-success" onclick="updatecategory('<?php echo $data->id?>', '<?php echo $data->status;?>')">APPROVED</button>
                                    <?php
                                    }?>
                                </td>
                                 
                                    <td><a  class="btn btn-primary" data-toggle="modal" data-target="#updateModal"  onclick='EnquiryPopUp("<?php echo $data->id;?>","<?php echo $data->category_name;?>","<?php echo $data->status;?>")'>Update</a></td>
                                
                                 <td>
                                    <button type="button" class="btn btn-block btn-danger" onclick="deleteCategory('<?php echo $data->id?>')">Delete</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Admin/addCategory">
        <div class="modal-body">
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="category_name" value="<?php echo set_value('category_name'); ?>" placeholder="Category Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
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
      <form  method="POST" action="<?php echo base_url(); ?>Admin/updatecategoryname">
      <div class="modal-body">
        <input type="text" name="id" class="form-control" id="recipient-id"  hidden>
        <!--<div class="form-group">-->
        <!--    <label for="recipient-amount" class="col-form-label" id="Plan"></label>-->
        <!--  </div>-->
          
          <div class="form-group">
            <label for="rates_name" class="col-form-label">Category Name:</label>
            <input type="text" name="cate_name" class="form-control" id="cate_name"  required>
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
    function EnquiryPopUp(id,cname,status)
    {
          var x = document.getElementById("recipient-id");
          x.setAttribute("value", id);
          var y = document.getElementById("cate_name");
          y.setAttribute("value", cname);
        //   var z = document.getElementById("plan_duration");
        //   z.setAttribute("value",duration);
    }
    function deleteCategory($vid) {
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
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/deleteCategory?id=" + $vid, true);
            xhttp.send();
             
         }
    }
    function updatecategory($vid,$status) {
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
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/updatecategory?vid=" + $vid+"&status="+$status, true);
            xhttp.send();
             
         }
    }
</script>