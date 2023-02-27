 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin">Home</a></li>
              <li class="breadcrumb-item active">Staff Details</li>
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
                <h3 class="card-title" style="float: right;">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#AddModal">Add</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php
                    if(count($stafflog))
                    {?>
                        <table id="example" class="table table-bordered table-responsive table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Log Message</th>
                              <th>IP Address</th>
                              <th>Log Time</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($stafflog as $data)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id;?></td>
                                        <td><?php echo $data->message;?></td>
                                        <td><?php echo $data->ip_address;?></td>
                                        <td><?php echo date("d-M-Y (H:i:s)", strtotime($data->createon)); ?></td>
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
