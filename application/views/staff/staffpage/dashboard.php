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
        <?php
        if($this->session->flashdata('erorr')!== null)
        {
    ?>
    <div class="container-fluid">
        <div class="row">
              <div class="col-md-12">
                
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        <?php echo @$this->session->flashdata('erorr');?>
                    </div>
                    
                  
              </div>
              <!-- /.col -->
        </div>
    </div>
    <?php } ?>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  