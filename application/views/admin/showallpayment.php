
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Site Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Site Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
          <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="true">All Payments</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">Staff</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill" href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Vendor</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-five-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                        <table id="example" class="table table-bordered table-responsive table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Email</th>
                              <th>Plan name</th>
                              <th>Amount</th>
                              <th>Date</th>
                             <!-- <th>Delete</th>-->
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($allPayments as $data)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->ad_id;?></td>
                                        <td><?php echo $data->email;?></td>
                                        <td><?php echo $data->plan_name;?></td>
                                        <td>$<?php echo $data->grand_total;?></td>
                                        <td><?php echo $data->plan_activated;?></td>
                                       <!-- <td>
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
                                                <button type="button" class="btn btn-block btn-secondary" onclick="updateAreaStatus('<?php echo $data->id?>', '<?php echo $data->status;?>','country_master')">UNAPPROVED</button>
                                            <?php
                                                
                                            }
                                            else
                                            {?>
                                                <button type="button" class="btn btn-block btn-success" onclick="updateAreaStatus('<?php echo $data->id?>', '<?php echo $data->status;?>','country_master')">APPROVED</button>
                                            <?php
                                            }?>
                                        </td>
                                         
                                         <td>
                                            <button type="button" class="btn btn-block btn-danger" onclick="deleteArea('<?php echo $data->id?>','country_master')">Delete</button>
                                        </td>-->
                                    
                                    </tr>
                                    <?php
                                }
                              ?>
                          </tbody>
                        </table>
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    
                     <table id="example2" class="table table-bordered table-responsive table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Email</th>
                              <th>Plan name</th>
                              <th>Amount</th>
                              <th>Staff Id</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($allPayments as $data)
                                {
                                    
                                    $a = $data->transaction_id;
                                    $search = 'By_Staff_ID_';
                                    if(preg_match("/{$search}/i", $a)) {
                                        $staff_id= trim($data->transaction_id,"By_Staff_ID_");
                                   
                                    ?>
                                    <tr>
                                        <td><?php echo $data->ad_id;?></td>
                                        <td><?php echo $data->email;?></td>
                                        <td><?php echo $data->plan_name;?></td>
                                        <td>$<?php echo $data->grand_total;?></td>
                                        <td><?=  @$staff_id;?></td>
                                        <td><?php echo $data->plan_activated;?></td>
                                      
                                    
                                    </tr>
                                    <?php
                                    }
                                }
                              ?>
                          </tbody>
                        </table>
                      
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                    
                   <table id="example3" class="table table-bordered table-responsive table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Email</th>
                              <th>Plan name</th>
                              <th>Amount</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($allPayments as $data)
                                {
                                    
                                    $a = $data->transaction_id;
                                    $search = 'By_Staff_ID_';
                                    if(!preg_match("/{$search}/i", $a)) {
                                        $staff_id= trim($data->transaction_id,"By_Staff_ID_");
                                   
                                    ?>
                                    <tr>
                                        <td><?=$data->ad_id;?></td>
                                        <td><?= $data->email;?></td>
                                        <td><?= $data->plan_name;?></td>
                                        <td>$<?= $data->grand_total;?></td>
                                       <td><?php echo $data->plan_activated;?></td>
                                    
                                    </tr>
                                    <?php
                                    }
                                }
                              ?>
                          </tbody>
                        </table>
                    
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
      function updateAreaStatus($aid,$status,$table) {
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
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/updateAreaStatus?vid=" + $aid+"&status="+$status+"&table="+$table, true);
            xhttp.send();
             
            }
        }
        function deleteArea($aid,$table) {
         //alert($vid+$status);
         if(confirm("Do you want to Delete?")) 
         {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                   location.reload();
                }
            };
            xhttp.open("GET", "<?php echo base_url(); ?>Admin/deleteArea?vid=" + $aid+"&table="+$table, true);
            xhttp.send();
             
            }
        }
  </script>