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
                <form method="post" action="<?php echo base_url(); ?>Dashboard/Enquires_List">
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
                            <div class="col-xl-2">
                                <input class="btn btn-default" type="submit" value="Search" name="Search"></button>
                                <!-- <button class="btn btn-default" onclick="getbydate(document.getElementById('weddingdate').value,document.getElementById('weddingenddate').value)">Search</button> -->
                            </div>
                            <div class="col-xl-1">
                                <a class="btn btn-default" href="<?php echo base_url();?>Dashboard/Enquires_List?status=NEW">New</a>
                            </div>
                            <div class="col-xl-1">
                                <a class="btn btn-default" href="<?php echo base_url();?>Dashboard/Enquires_List?status=OLD">Old</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="demo" class="card request-list-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name
                                </th>
                                <th>Inquiry Date
                                </th>
                                <th>Email
                                </th>
                                <th>Phone
                                </th>
                                <th>Status
                                </th>
                                <th>Message
                                </th>
                                <th>Action
                                </th>
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
                                    <td><?php echo $data->Name ?></td>

                                    <td><?php //echo $data->qdate;
                                    
                                        echo  date("d-M-Y", strtotime($data->qdate));  
                                        //echo $newDate; 
                                    ?></td>

                                    <td><?php echo $data->email ?></td>

                                    <td><?php echo $data->Phone ?></td>

                                    <td <?php echo "id=status" . $data->id; ?>><?php echo $data->status ?></td>

                                    <td><?php echo $data->Comment ?></td>

                                    <td>
                                        <?php
                                        if ($data->status == "NEW") {
                                            // echo "<button id='actionbtn" . $data->id . "' onclick='callclient(" . $data->id . ")' class='btn btn-sm' > call</button>";
                                            ?>
                                                <a href="#EnquiryPopUp" style="color:<?php echo $site->colour_name;?>" onclick="EnquiryPopUp('<?php echo  $data->id  ?>','<?php echo $data->email ?>');" class="btn-default-wishlist shake-little" id="app-emp-phone-txt">Response</a>
                                    
                                            <?php 
                                        }
                                        else
                                        {
                                            echo $data->response;
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


<!-- Popup Inquiry form -->
  <div id="EnquiryPopUp" class="enquiry-container overlay mt-4">
    <div class="enquiry-form">
      <a class="close" href="#">&times;
      </a>
      <!--<div class="content">-->
       <!---->
      <!--</div>-->
      <div class="main-form">
        <!-- /.form-heading-title -->
        <!-- register-form -->
        <form method="GET" action="<?php echo base_url(); ?>Dashboard/updatequire" name="send-enquiry" id="send-enquiry">
          <!-- form -->
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <!-- form-heading-title -->
              <!--<h3 id="quote-text" style="color:<?php echo $site->colour_name;?>;"></h3>-->
              <h3>Response</h3>
              <p id="quote-shorttext">Fill this form and send response to Customer</p>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <input id="page_source" name="page_source" type="hidden" value="vender-listing" />
              <input id="EnquireId" name="EnquireId" type="hidden" value="" />
              <input id="EnquireEmailId" name="EnquireEmailId" type="hidden" value="" />
              <input id="service_type" name="service_type" type="hidden" value="" />
              <!-- Text input-->
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <!-- Text input-->
                    <div class="form-group service-form-group">
                        <label class="control-label sr-only" for="comment">
                        </label>
                        <textarea id="comment" required type="comment" name="comment" placeholder="Comment" class="form-control" value="" data-valid="required" ></textarea>
                        <!--<input id="comment" required type="comment" name="comment" placeholder="Comment" class="form-control" value="" maxlength="10" data-valid="required" />-->
                    </div>
            </div>
            <!-- Button -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 " style="margin-top: 6rem!important;">
              <input type="submit" name="singlebutton" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>;border-color:<?php echo $site->colour_name;?>;" class="btn btn-default btn-sm" name="Send" value="Send" id="SendEnquiry">
            </div>
          </div>
        </form>
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
    function EnquiryPopUp(id, eid, pn) {
        //alert(id);
      var x = document.getElementById("EnquireId");
      x.setAttribute("value", id);
      var y = document.getElementById("EnquireEmailId");
      y.setAttribute("value", eid);
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

<style>
    
    .enquiry-form .main-form {
        width: 100% !important;
        float: left !important;
        padding: 20px !important;
        min-height: 0% !important;
    }
    
</style>