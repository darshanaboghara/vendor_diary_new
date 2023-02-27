<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="dashboard-page-title">Review List
                            </h3>
                            <p>Check your Review List
                            </p>
                        </div>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url(); ?>Dashboard/Enquires_List">
                    <div class="dashboard-filter-row mb2">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="card card-summary">
                                    <div class="card-body">
                                        <div class="float-left">
                                            <div class="summary-count">
                                               <?php
                                                echo $this->session->rating ."/5";
                                               ?>
                                            </div>
                                            <p>Avrage Rating</p>
                                        </div>
                                        <div class="summary-icon"><i class="icon-021-love-1"></i></div>
                                    </div>
                                    <!--<div class="card-footer text-center"><a href="<?php echo base_url();?>Dashboard/Enquires_List/">View All</a></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="demo" class="card request-list-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#
                                </th>
                                <th>Review Date
                                </th>
                                <th>Name
                                </th>
                                <th>Message
                                </th>
                                <th>r_star
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($vreview == null) {
                                echo "<tr>
                                        <td class='requester-name'>No Records found </td>
                                        </tr>";
                            }
                            else
                            {
                                $c=0;
                                foreach ($vreview as $data)
                                 { $c=$c+1;
                                ?>
                                <tr>
                                    <td><?php echo  $c;?></td>
                                    <td><?php echo  date("d-M-Y", strtotime($data->r_date));?></td>
                                    <td><?php echo $data->r_name ?></td>
                                    <td><?php echo $data->r_message ?></td>
                                    <td><?php echo $data->r_star ?></td>
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