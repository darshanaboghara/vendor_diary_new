<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-10 col-md-9 col-sm-12 col-12">
                <div class="dashboard-page-header">

                    <h3 class="dashboard-page-title">Hi, <?php echo $this->session->googlename;?></h3>
                    <p class="d-block">Here's what's happening with your wedding venue business today.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card card-summary">
                    <div class="card-body">
                        <div class="float-left">
                            <div class="summary-count">
                               <?php
                                $c=0;
                                 foreach($vq as $data)
                                 {
                                      if($data->status=="NEW")
                                      {
                                          $c=$c+1;
                                      }
                                 }
                                 echo $c;
                               ?>
                            </div>
                            <p>Latest Lead</p>
                        </div>
                        <div class="summary-icon"><i class="icon-021-love-1"></i></div>
                    </div>
                    <div class="card-footer text-center"><a href="<?php echo base_url();?>Customerdashboard/Enquires_List/">View All</a></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card card-summary">
                    <div class="card-body">
                        <div class="float-left">
                            <div class="summary-count">
                                <?php
                                $c=0;
                                 foreach($vq as $data)
                                 {
                                      if($data->status=="OLD" || $data->status=="SEND")
                                      {
                                          $c=$c+1;
                                      }
                                 }
                                 echo $c;
                               ?>
                            </div>
                            <p>Response</p>
                        </div>
                        <div class="summary-icon"><i class="icon-051-wedding-arch"></i></div>

                    </div>
                    <div class="card-footer text-center"><a href="<?php echo base_url();?>Customerdashboard/Enquires_List/">View All</a></div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card card-summary">
                    <div class="card-body">
                        <div class="float-left">
                            <div class="summary-count"><?php echo count($vq);?></div>
                            <p>Total Lead</p>
                        </div>
                        <div class="summary-icon"><i class="icon-051-wedding-arch"></i></div>

                    </div>
                    <div class="card-footer text-center"><a href="<?php echo base_url();?>Customerdashboard/Enquires_List/">View All</a></div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>