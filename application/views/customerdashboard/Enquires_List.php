<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="dashboard-page-title">Enquires List
                            </h3>
                            <p>Check your Enquires List
                            </p>
                        </div>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url(); ?>Customerdashboard/Enquires_List">
                    <div class="dashboard-filter-row mb2">
                        <div class="row">
                            <div class="col-xl-3 nopadding">
                                <div>
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="weddingdate">From Date
                                        </label>
                                        <input id="weddingdate" name="weddingdate" type="date" placeholder="From Date" class="form-control weddingdate hasDatepicker" value="" required="" autocomplete="off">
                                        <!-- <div class="venue-form-calendar">
                                            <i class="far fa-calendar-alt">
                                            </i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 nopadding">
                                <div>
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="weddingenddate">To Date
                                        </label>
                                        <input id="weddingenddate" name="weddingenddate" type="date" placeholder="To Date" class="form-control weddingenddate hasDatepicker" value="" required="" autocomplete="off">
                                        <!-- <div class="venue-form-calendar">
                                            <i class="far fa-calendar-alt">
                                            </i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <input class="btn btn-default" type="submit" value="Search" name="Search"></button>
                                <!-- <button class="btn btn-default" onclick="getbydate(document.getElementById('weddingdate').value,document.getElementById('weddingenddate').value)">Search</button> -->
                            </div>
                        </div>
                    </div>
                </form>
                <div  class="card request-list-table table-responsive">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Inquiry Date</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($vq == null) {
                                echo "<tr>
                                        <td class='requester-name'>No Records found </td>
                                        </tr>";
                            }
                            else
                            {
                                
                                foreach ($vq as $data)
                                 {
                                ?>
                                <tr>
                                    <!--<td><?php echo $data->planner_name?></td>-->
                                    <td><?php $r=rand(1,40);?><img loading="lazy" src='<?php echo (file_exists(IMAGELINK . $data->image))? base_url() . IMAGELINK . $data->image : base_url()."assets/images/wedding-planner/$r.jpeg";  ?>'  alt="Vendor Image Not Found" class="img-fluid"></td>
                                    <td>
                                    
                                    <a id="img<?php echo $data->id ?>"  href="<?php echo base_url() . 'Vendor_details/'; if($data->planner_name){ echo $data->planner_name;}else
                                    { echo $data->business_name;
                                    }?>" target="_blank"><?php echo $data->planner_name?></a></td>

                                    <td><?php echo $data->qdate ?></td>

                                    <td><?php echo $data->email ?></td>

                                    <td><?php echo $data->mobile ?></td>

                                    <td <?php echo "id=status" . $data->id; ?>><?php echo $data->status ?></td>

                                    <td><?php echo $data->Comment ?></td>

                                    <td>
                                        <?php
                                        if ($data->status == "NEW") {
                                            echo "<p style='color:red'>Not Seen by Vendor</p>";
                                        }
                                        else
                                        {
                                            echo "<b style='color:green'>".$data->response."</b>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function callclient($cid) {
        // alert($cid);

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("actionbtn" + $cid).remove();
                document.getElementById("status" + $cid).innerHTML = "OLD";
            }
        };
        xhttp.open("GET", "<?php echo base_url(); ?>Dashboard/updatequire?qid=" + $cid, true);
        xhttp.send();
    }

    // function getbydate($to, $from) {
    //     xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             document.getElementById("demo").innerHTML = this.responseText;
    //         }
    //     };
    //     xhttp.open("GET", "<?php echo base_url(); ?>Dashboard/getquerybydate?to='" + $to + "'&from='" + $from+"'", true);
    //     xhttp.send();
    // }
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
         $("#example").DataTable();
</script>