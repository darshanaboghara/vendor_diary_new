<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <h2 class="m-3">Vendors Count</h2>
        <div class="row">
            
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $this->OH->gettodayvendorscount() ?></h3>

                <p>New Vendor</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?php echo base_url()?>Admin/vendorlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3><?php  echo $this->OH->getlastweekvendorscount();   ?></h3>

                <p>Last Week Member(s)</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?php echo base_url()?>Admin/vendorlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php  echo $this->OH->getLastMonthVendorsCount();   ?></h3>

                <p>Last Month Member(s)</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?php echo base_url()?>Admin/vendorlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo count($this->OH->getallvendors());?></h3>

                <p>Total Member(s)</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?php echo base_url()?>Admin/vendorlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
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
        <!-- /.row -->
         <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendor List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Mobile Number</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($allvendor as $vendor)
                        {
                            ?>
                            <tr>
                                <td><?php echo $vendor->id;?></td>
                                <td><?php echo $vendor->planner_name;?></td>
                                <td><?php echo $vendor->mobile;?></td>
                                <td>
                                    <?php if( $vendor->status =="APPROVED")
                                    {
                                    ?>
                                    <span class="badge bg-success"><?php echo $vendor->status;?></span>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <span class="badge bg-danger"><?php echo $vendor->status;?></span>
                                    <?php
                                    }?>
                                </td>
                                <td>
                                    <?php if( $vendor->status =="APPROVED")
                                    {
                                    ?>
                                        <button type="button" class="btn btn-block btn-danger">UNAPPROVED</button>
                                    <?php
                                        
                                    }
                                    else
                                    {?>
                                        <button type="button" class="btn btn-block btn-primary">APPROVED</button>
                                    <?php
                                    }?>
                                </td>
                                
                                <td><span class="badge bg-danger">55%</span></td>
                            </tr>
                            <?php
                        }
                      ?>
                      
                    <!--<tr>-->
                    <!--  <td>1.</td>-->
                    <!--  <td>Update software</td>-->
                    <!--  <td>-->
                    <!--    <div class="progress progress-xs">-->
                    <!--      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td><span class="badge bg-danger">55%</span></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>2.</td>-->
                    <!--  <td>Clean database</td>-->
                    <!--  <td>-->
                    <!--    <div class="progress progress-xs">-->
                    <!--      <div class="progress-bar bg-warning" style="width: 70%"></div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td><span class="badge bg-warning">70%</span></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>3.</td>-->
                    <!--  <td>Cron job running</td>-->
                    <!--  <td>-->
                    <!--    <div class="progress progress-xs progress-striped active">-->
                    <!--      <div class="progress-bar bg-primary" style="width: 30%"></div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td><span class="badge bg-primary">30%</span></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>4.</td>-->
                    <!--  <td>Fix and squish bugs</td>-->
                    <!--  <td>-->
                    <!--    <div class="progress progress-xs progress-striped active">-->
                    <!--      <div class="progress-bar bg-success" style="width: 90%"></div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td><span class="badge bg-success">90%</span></td>-->
                    <!--</tr>-->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
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