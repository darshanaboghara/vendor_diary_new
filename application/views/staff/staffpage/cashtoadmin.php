
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
                <h3>$ <?=$staff[0]->total_amount?></h3>
                <p>Total Earn Cash</p>
              </div>
              <div class="icon">
                <i class="fas fa-question"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
           <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3>$ <?=$staff[0]->Transfer_to_admin?></h3>
                <p>Transfer To admin</p>
              </div>
              <div class="icon">
                <i class="fas fa-question"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
           <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <h3>$ <?=$staff[0]->collect_amount?></h3>

                <p>Need To Transfer</p>
              </div>
              <div class="icon">
                <i class="fas fa-question"></i>
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
               <!-- <h3 class="card-title" style="float: right;">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">Transfer to Admin</button>
                </h3>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach($cashtoadmin as $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo $data->id;?></td>
                                <td><?php echo $data->amouth;?></td>
                                <td><?php echo $data->date;?></td>
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
