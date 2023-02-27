<html>
    <head>
        <title>404 Error Page</title>
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            body {
            background: #dedede;
            background-image: url("https://image.freepik.com/free-photo/textured-mulberry-paper_53876-88671.jpg");
        }
        .page-wrap {
            min-height: 100vh;
        }
        </style>
    </head>
    <body>
        <div class="page-wrap d-flex flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <span class="display-1 d-block"> <b> 404 </b></span>
                        <div class="mb-4 lead"><b>The page you are looking for was not found.</b></div>
                        <div class="mb-4 lead"><b><?php echo @$Message?></b></div>
                        <a href="<?php echo base_url();?>" class="btn btn-link"><b>Back to Home</b></a>
                        <!--<a href="<?php echo @$backlink?>" class="btn btn-link"><b>redirect Back</b></a>-->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<!------ Include the above in your HEAD tag ---------->

