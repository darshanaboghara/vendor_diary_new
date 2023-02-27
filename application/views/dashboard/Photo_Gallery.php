<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title ">Photo Gallery
                    </h3>
                    <p>Your Photo Gallery
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card">
                            <div class="card-header">Photo Gallery 
                            </div>
                            <div class="card-body">
                                <div class="gallery">
                                    <a target="_blank" href="img_5terre.jpg">
                                        <!-- <img src="<?php echo $vdata->image ?>" alt="Cinque Terre" width="600" height="400"> -->
                                        <img src="<?php echo base_url() .IMAGELINK. $vdata->image ?>" alt="Image 1" width="600" height="400">
                                    </a>
                                    <div class="desc">
                                        <?php print_r(@$e1['error']); ?>
                                        <form action="https://vendordiary.com/Dashboard/image/" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <input type='text' name='image' value='image' hidden>
                                        <?php echo "<input type='file' class='form-control' name='image' size='20' />"; ?>
                                        <?php echo "<input class='btn btn-sm' type='submit' name='submit' value='upload' /> "; ?>
                                        <?php echo "</form>" ?>
                                        <!-- <input id="input1" accept="image/*" type="file" @change="onFileChange" style="display: none" />
                                        <button id="btn1" class="btn btn-sm">hello</button> -->
                                    </div>
                                </div>

                                <div class="gallery">
                                    <a target="_blank" href="img_forest.jpg">
                                        <img src="<?php echo base_url() .IMAGELINK. $vdata->image_2 ?>" alt="Image 2" width="600" height="400">
                                    </a>
                                    <div class="desc">
                                        <?php print_r(@$e2['error']); ?>
                                         <form action="https://vendordiary.com/Dashboard/image/" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <input type='text' name='image' value='image_2' hidden>
                                        <?php echo "<input type='file' class='form-control' name='image_2' size='20' />"; ?>
                                        <?php echo "<input class='btn btn-sm' type='submit' name='submit' value='upload' /> "; ?>
                                        <?php echo "</form>" ?>
                                    </div>
                                </div>

                                <div class="gallery">
                                    <a target="_blank" href="img_lights.jpg">
                                        <img src="<?php echo base_url() .IMAGELINK. $vdata->image_3 ?>" alt="Image 3" width="600" height="400">
                                    </a>
                                    <div class="desc">
                                        <?php print_r(@$e3['error']); ?>
                                         <form action="https://vendordiary.com/Dashboard/image/" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <input type='text' name='image' value='image_3' hidden>
                                        <?php echo "<input type='file' class='form-control' name='image_3' size='20' />"; ?>
                                        <?php echo "<input class='btn btn-sm' type='submit' name='submit' value='upload' /> "; ?>
                                        <?php echo "</form>" ?>
                                    </div>
                                </div>

                                <div class="gallery">
                                    <a target="_blank" href="img_mountains.jpg">
                                        <img src="<?php echo base_url() .IMAGELINK. $vdata->image_4 ?>" alt="Image 4" width="600" height="400">
                                    </a>
                                    <div class="desc">
                                        <?php print_r(@$e4['error']); ?>
                                         <form action="https://vendordiary.com/Dashboard/image/" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <input type='text' name='image' value='image_4' hidden>
                                        <?php echo "<input type='file' class='form-control' name='image_4' size='20' />"; ?>
                                        <?php echo "<input class='btn btn-sm' type='submit' name='submit' value='upload' /> "; ?>
                                        <?php echo "</form>" ?>

                                    </div>
                                </div>
                                <div class="gallery">
                                    <a target="_blank" href="img_mountains.jpg">
                                        <img src="<?php echo base_url() .IMAGELINK. $vdata->image_5 ?>" alt="Image 5" width="600" height="400">
                                    </a>
                                    <div class="desc">
                                        <?php print_r(@$e5['error']); ?>
                                         <form action="https://vendordiary.com/Dashboard/image/" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <input type='text' name='image' value='image_5' hidden>
                                        <?php echo "<input type='file' class='form-control' name='image_5' size='20' />"; ?>
                                        <?php echo "<input class='btn btn-sm' type='submit' name='submit' value='upload' /> "; ?>
                                        <?php echo "</form>" ?>
                                    </div>

                                </div>
                                
		
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    div.gallery {
        margin: 5px;
        border: 1px solid #ccc;
        float: left;
        width: 270px;
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: 250px;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }
</style>

<script>
    <?php 
        if($e1['error'])
        {
            echo "alert('";
            print_r(@$e1['error']);
            echo "')";
        }
    ?>
</script>

<!-- <script>
    $(function() {
        var fileupload = $("#input1");
        var button = $("#btn1");
        button.click(function() {
            fileupload.click();
        });
        fileupload.change(function(e) {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            alert(fileName);
            var fr = new FileReader();
            var a = null;
            fr.readAsDataURL(e.target.files[0]);
            fr.onload = e => {
                console.info(e.target.result);
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.res)
                    }
                };
                xhttp.open("POST", "<?php echo base_url(); ?>Dashboard/photoupload", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("image=1&file='"+e.target.result+"'");
            };
        });
    });
</script> -->