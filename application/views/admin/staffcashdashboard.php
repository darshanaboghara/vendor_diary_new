<?php
    $c=0;
    $t=0;
    $a=0;
    $sdata=$this->SH->getstaffcash($staffid);
    
    foreach($sdata['staffcash'] as $totalcash)
    {
        $c=$c+$totalcash->amount;
    }
    foreach($sdata['staffcashtoadmin'] as $sendtoadmincash)
    {
        if($sendtoadmincash->status=="APPROVED")
        {
            $a=$a+$sendtoadmincash->amount;
        }
        $t=$t+$sendtoadmincash->amount;
    }
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>Admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Vendor Plan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3><?=$c?></h3>
                <p>Total Earn Cash</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-check-alt"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
           <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3><?= $a?></h3>
                <p>Transfer To admin</p>
              </div>
              <div class="icon">
                <i class="fas fa-random"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
           <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3><?= $t-$a?></h3>

                <p>Panding</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
           <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3><?= $c-$t?></h3>

                <p>Need To Transfer</p>
              </div>
              <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="display: inline;">vendor Plan List</h3>
                <h3 class="card-title" style="float: right;">
                    
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Plan Amount</th>
                      <th>Message</th>
                      <th>send time</th>
                      <th>response time</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($cashtoadmin as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->amount;?></td>
                                <td><?php echo $data->note;?></td>
                                <td><?php echo $data->send_time;?></td>
                                <td><?php echo $data->response_time;?></td>
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
                                   <?php if( $data->status =="UNAPPROVED")
                                    {
                                    ?>
                                    <a class="btn bg-success sm" href="<?= base_url()?>/Admin/acceptstaffcash?staffid=<?= $data->staff_id?>&cashid=<?=$data->id?>"></i>Accept</span>
                                    <?php
                                    }
                                    ?>
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


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
