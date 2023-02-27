
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
              <?php echo validation_errors(); ?>
              <?php print_r( $this->session->flashdata('message_name')); ?>
              <?php echo form_open_multipart('Admin/custommail');?>
                <div class="card-body container-fluid">
                    <div class="row">
                        <div class="col-6">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="country_id" id="country_id"  selectname="Select country" onchange="fillstate1(this.value);" required>
                                                    <option value='0'>Country</option>
                                                    <?php
                                                        foreach ($country as $data)
                                                        {
                                                            echo " <option value='$data->id'>$data->country_name</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <select class="form-control" name="state_id" id="state1" selectname="Select State" onchange="fillCity1(this.value);" required>
                                    <option value='0'>State</option>
                                </select>
                            </div>
                         </div>
                        <div class="col-6">    
                            <div class="input-group mb-3">
                                <select class="form-control" name="city_id" id="city1" selectname="Select City" required>
                                    <option value='0'>City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                           <div class="input-group mb-3">
                                <select class="form-control" name="category_id" id="category1"  selectname="Select Category" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="Subject">Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject"  placeholder="Subject">
                        </div>
                        <div class="form-group col-12">
                            <label for="msg">Message</label>
                            <textarea id="w3review"name="body" class="form-control" id="body" rows="4" cols="50"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="msg">File</label>
                            <input type="file" name="userfile" class="form-control" id="userfile" placeholder="userfile">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value='submit'>
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
      function fillstate1(id) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("state1").innerHTML = this.responseText;
      }
    };
    var url="<?php echo base_url();?>";
    xhttp.open("GET", url+"Getstate?q=" + id, true);
    xhttp.send();
  }
  function fillCity1(id) {
    var x = document.getElementById("city1");
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("city1").innerHTML = this.responseText;
      }
    };
    var url="<?php echo base_url();?>";
    xhttp.open("GET",url+"Getcity?q=" + id, true);
    xhttp.send();
  }
  function GetCategory() {
    xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         //document.getElementById("category").innerHTML = this.responseText;
         document.getElementById("category1").innerHTML = this.responseText;
       }
     };
     var url="<?php echo base_url();?>";
     xhttp.open("GET",url+"Getcategory", true);
     xhttp.send();
   }
   window.onload = GetCategory;
  </script>
  