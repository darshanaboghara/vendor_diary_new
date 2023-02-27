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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>question</th>
                      <th>answer</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($allfaq as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->question;?></td>
                                <td><?php echo $data->answer;?></td>
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
                                        <button type="button" class="btn btn-block btn-secondary" onclick="updatevendor('<?php echo $data->id?>', 'UNAPPROVED')">UNAPPROVED</button>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <button type="button" class="btn btn-block btn-success" onclick="updatevendor('<?php echo $data->id?>', 'APPROVED')">APPROVED</button>
                                    <?php
                                    }?>
                                </td>
                                 <td>
                                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal1" onclick='EnquiryPopUp("<?= @$data->id;?>","<?=$data->question?>","<?=$data->answer?>")'>Update</button>
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
      <form  method="POST" action="<?php echo base_url(); ?>Admin/addfaqByAdmin">
        <div class="modal-body">
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="question" value="<?php echo set_value('question'); ?>" placeholder="Question" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="answer" value="<?php echo set_value('answer'); ?>" placeholder="Answer" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
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

 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="<?php echo base_url(); ?>Admin/updatedetailsfaq">
        <div class="modal-body">
            <input type="hidden" name="id" id="recipient-id">
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="que" name="question" value="" placeholder="Question" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="ans" name="answer" value="<?php echo set_value('answer'); ?>" placeholder="Answer" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
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
function EnquiryPopUp(id,q,a) {
      var x = document.getElementById("recipient-id");
      x.setAttribute("value", id);
      var x = document.getElementById("que");
      x.setAttribute("value", q);
      var x = document.getElementById("ans");
      x.setAttribute("value", a);
}
    function deleteVendor($vid) {
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
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/deletefaq?id=" + $vid, true);
            xhttp.send();
             
         }
    }
    function updatevendor($vid,$status) {
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
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/updatefaq?id=" + $vid+"&status="+$status, true);
            xhttp.send();
             
         }
    }
</script>