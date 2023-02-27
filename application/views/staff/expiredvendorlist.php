<?php $active="Vendor Details";?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expired Vendor Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expired Vendor Details</li>
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
                
                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                        <!--<button type="button" class="btn btn-block btn-primary btn-sm float-right mr-5" data-toggle="modal" data-target="#exampleModal">Add</button>-->
                        <?php echo @$page;?>
                    <!--<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>-->
                    <!--<li class="page-item"><a class="page-link" href="#">1</a></li>-->
                    <!--<li class="page-item"><a class="page-link" href="#">2</a></li>-->
                    <!--<li class="page-item"><a class="page-link" href="#">3</a></li>-->
                    <!--<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>-->
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="display table table-bordered table-responsive" style="width:100%">
                   <thead>
                      <tr>
                          <th style="width: 10px">#</th>
                          <th>Name</th>
                          <th>Plan Status</th>
                          <th>Email</th>
                          <th>Mobile Number</th>
                          <th>Status</th>
                          <th>Update</th>
                      </tr>
                   </thead>
                   <tbody>
                      <?php
                        foreach($allvendor as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->planner_name;?></td>
                                <td><?php echo $data->plan_status;?></td>
                                <td><?php echo $data->email;?></td>
                                <td><?php echo $data->mobile;?></td>
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
                                    <a class="btn btn-block btn-primary" target='_blank' href="<?php echo base_url();?>Admin/updatevendorbyid?id=<?php echo $data->id?>">Update</a>
                                </td>
                                
                            
                            </tr>
                            <?php
                        }
                      ?>
                  </tbody>
                   <tfoot>
                      <tr>
                         <th style="width: 10px">#</th>
                          <th>Name</th>
                          <th>Plan Status</th>
                          <th>Email</th>
                          <th>Mobile Number</th>
                          <th>Status</th>
                          <th>Update</th>
                      </tr>
                   </tfoot>
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