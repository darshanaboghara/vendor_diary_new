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
              <li class="breadcrumb-item active">Customer Ask</li>
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
                <h3 class="card-title">Customer Ask List</h3>
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
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($customer_comment as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->name;?></td>
                                <td><?php echo $data->email;?></td>
                                <td><?php echo $data->mobile_number;?></td>
                                <td><?php echo $data->comment;?></td>
                                <td><?php echo $data->status;?></td>
                                <td><a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  onclick='EnquiryPopUp("<?php echo $data->id;?>","<?php echo $data->email;?>","<?php echo $data->comment;?>")'>Send Mail</a></td>
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
      <form  method="POST" action="<?php echo base_url(); ?>Admin/customerCommentAdminResponse">
      <div class="modal-body">
        <input type="text" name="id" class="form-control" id="recipient-id"  hidden>
        <input type="text" name="customermessage"  id="customermessage"  hidden>
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
    function EnquiryPopUp(id,email,message) {
      var z = document.getElementById("recipient-id");
      z.setAttribute("value", id);
      var x = document.getElementById("recipient-name");
      x.setAttribute("value", email);
      var y = document.getElementById("message-text");
      y.setAttribute("value", "");
      var y = document.getElementById("customermessage");
      y.setAttribute("value", message);
    }

</script>