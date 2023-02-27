 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Details</li>
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
                <h3 class="card-title" style="display: inline;">Customer Details List</h3>
                <h3 class="card-title" style="float: right;">
                    
                </h3>
                <br>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Business Name</th>
                      <th>Email</th>
                      <th>Mobile Number</th>
                      <th>Query</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($allcutomer as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->first_name;?></td>
                                <td><?php echo $data->last_name;?></td>
                                <td><?php echo $data->email;?></td>
                                <td><?php echo $data->phone;?></td>
                                <td><?php echo $this->OH->getvendorqurey($data->email);?></td>
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
                                        <button type="button" class="btn btn-block btn-secondary" onclick="updatevendor('<?php echo $data->id?>', '<?php echo $data->status;?>')">UNAPPROVED</button>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <button type="button" class="btn btn-block btn-success" onclick="updatevendor('<?php echo $data->id?>', '<?php echo $data->status;?>')">APPROVED</button>
                                    <?php
                                    }?>
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
<script>
    function updatevendor($vid,$status) {
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
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/updatecutomer?vid=" + $vid+"&status="+$status, true);
            xhttp.send();
             
         }
    }
</script>