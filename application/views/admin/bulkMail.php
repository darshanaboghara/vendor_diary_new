
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bulk Mail Message</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Send Mail <small>To All Active User</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Subject">Subject</label>
                        <input type="text" name="Subject" class="form-control" id="Subject"  placeholder="Subject">
                    </div>
                  
                    <div class="form-group">
                        <label for="msg">Message</label>
                        <input type="text" name="msg" class="form-control" id="msg" placeholder="Message">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="btn btn-primary" onclick="sendmail()">Submit</div>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Send Mail List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-responsive table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>sendDate</th>
                              <th>subject</th>
                              <th>message</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach($allmail as $data)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id;?></td>
                                        <td><?php echo $data->sendDate;?></td>
                                        <td><?php echo $data->subject;?></td>
                                        <td><?php echo $data->message;?></td>
                                        <td>
                                           
                                            <?php if( $data->status =="Send")
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
                                        
                                    
                                    </tr>
                                    <?php
                                }
                              ?>
                          </tbody>
                        </table>
                </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
      function sendmail() {
         let s=document.getElementById("Subject").value;
         let m=document.getElementById("msg").value;
         if(s=="" || m=="")
         {
             alert("Subject Or Message Can not be null");
             return 0;
         }
         else
         {
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
                xhttp.open("GET", "<?php echo base_url(); ?>CornJob/mailtoallvendor?Subject=" + s+"&msg="+m, true);
                xhttp.send();
                 
                }
            }
         }
         
  </script>
  