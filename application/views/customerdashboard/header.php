<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">-->
    <!--<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>favicons/apple-icon-60x60.png">-->
    <!--<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>favicons/apple-icon-72x72.png">-->
    <!--<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>favicons/apple-icon-76x76.png">-->
    <!--<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>favicons/apple-icon-114x114.png">-->
    <!--<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>favicons/apple-icon-120x120.png">-->
    <!--<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>favicons/apple-icon-144x144.png">-->
    <!--<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>favicons/apple-icon-152x152.png">-->
    <!--<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>favicons/apple-icon-180x180.png">-->
    <!--<link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>favicons/android-icon-192x192.png">-->
    <!--<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>favicons/favicon-32x32.png">-->
    <!--<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>favicons/favicon-96x96.png">-->
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo  base_url(); ?>favicons/<?php echo $site->upload_favicon;?>">
    <!--<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>favicons/favicon-16x16.png">-->
    <link rel="manifest" href="<?php echo base_url(); ?>favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><?php echo $site->website_title?></title>
    <meta name="description" content="<?php echo $site->website_description?>" />
    <meta name="referrer" content="origin">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.minddec.css?v=1556886975" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="<?php echo base_url(); ?>assets/fonts/fontello/css/fontello.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/fonts/fontello/css/flaticon.css" rel="stylesheet">
    <!--jquery-ui  -->
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui9a20.css?v=1557983717" rel="stylesheet">
    <!--jquery-rateyo  -->
    <link href="<?php echo base_url(); ?>assets/css/jquery.rateyoddec.css?v=1556886975" rel="stylesheet">
    <!-- Template magnific popup gallery -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/magnific-popupddec.css?v=1556886975">
    <!-- OwlCarosuel CSS -->
    <link href="<?php echo base_url(); ?>assets/css/owl.carouselddec.css?v=1556886975" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.theme.defaultddec.css?v=1556886975" type="text/css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style75ea.css?v=1558689406" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/jquery.minec25.js?v=1556886976"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.minec25.js?v=1556886976"></script>
    <!-- owl-carousel js -->
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.minec25.js?v=1556886976"></script>
    <!-- nice select -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.minec25.js?v=1556886976"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom-script9a20.js?v=1557983717"></script>
    <!-- popup gallery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.minec25.js?v=1556886976"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-uif2db.js?v=1557997325"></script>
    <script src="<?php echo base_url(); ?>assets/js/return-to-topf2db.js?v=1557997325"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.minec25.js?v=1556886976"></script>
    <script src="<?php echo base_url(); ?>assets/js/main6b71.js"></script>
    
    
    <!--<link href="<?php echo base_url(); ?>assets/css/bootstrap.minddec.css?v=1556886975" rel="stylesheet">-->
    <!-- Google Fonts -->
    <!--<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">-->
    <!-- FontAwesome icon -->
    <!--<link href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet">-->
    <!-- Fontello icon -->
    <!--<link href="<?php echo base_url(); ?>assets/fonts/fontello/css/fontello.css" rel="stylesheet">-->
    <!--jquery-ui  -->
    <!--<link href="<?php echo base_url(); ?>assets/css/jquery-ui9a20.css?v=1557983717" rel="stylesheet">-->
    <!--jquery-rateyo  -->
    <!--<link href="<?php echo base_url(); ?>assets/css/jquery.rateyoddec.css?v=1556886975" rel="stylesheet">-->
    <!-- Template magnific popup gallery -->
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/magnific-popupddec.css?v=1556886975">-->
    <!-- OwlCarosuel CSS -->
    <!--<link href="<?php echo base_url(); ?>assets/css/owl.carouselddec.css?v=1556886975" type="text/css" rel="stylesheet">-->
    <!--<link href="<?php echo base_url(); ?>assets/css/owl.theme.defaultddec.css?v=1556886975" type="text/css" rel="stylesheet">-->
    <!-- Style CSS -->
    <!--<link href="<?php echo base_url(); ?>assets/css/style75ea.css?v=1558689406" rel="stylesheet">-->
    <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.minec25.js?v=1556886976"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/js/bootstrap.minec25.js?v=1556886976"></script>-->
    <!-- owl-carousel js -->
    <!--<script src="<?php echo base_url(); ?>assets/js/owl.carousel.minec25.js?v=1556886976"></script>-->
    <!-- nice select -->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.minec25.js?v=1556886976"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/js/custom-script9a20.js?v=1557983717"></script>-->
    <!-- popup gallery -->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.minec25.js?v=1556886976"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery-uif2db.js?v=1557997325"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/js/return-to-topf2db.js?v=1557997325"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.minec25.js?v=1556886976"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/js/main6b71.js?v=1562144959"></script>-->
    <script src="<?php echo  base_url(); ?>assets/js/jquery.minec25.js?v=1556886976"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.minec25.js?v=1556886976"></script>
    <script type="<?php echo base_url(); ?>text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cookie.minaa98.js?v=1557750905"></script>
    <link href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet">
    
    
    <!--paypal-->
    <!--<script src="https://www.paypal.com/sdk/js?client-id=AV5eYjjaUhp9T_E9h3vqtvRH_n-Zgu91F4ppDT1zXT2nrETRGn2wZCMx0ma6Pb-U1VjKo8pHKngwK-NV&vault=true&intent=subscription"></script>-->
    <!--<script src="https://www.paypal.com/sdk/js?client-id=AV5eYjjaUhp9T_E9h3vqtvRH_n-Zgu91F4ppDT1zXT2nrETRGn2wZCMx0ma6Pb-U1VjKo8pHKngwK-NV&vault=true&currency=AUD"> </script>-->
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        @media (max-width: 767px) { 
    .offcanvas-collapse{
        display:none;
    }
}
.vendor-user-img {
    padding-top: 32px !important;
    height: 128px !important;
    padding-left: 85px !important;
}
.navbar-nav .dropdown-menu {
    position: absolute !important;
}
    </style>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
  <meta name="google-signin-client_id" content="<?php echo GOOGLE_AUTH_CID;?>">
<script>
    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
    
    function signOut() {
       
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
            var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
             //location.reload();
        });
        location.reload();
       }
     };
        xhr.open('POST', '<?php echo base_url()?>Signout/logout');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send();
      }
</script>
</head>


<body>
    
    <noscript>
        <div class="noscript colrw boxshadow">You have not enabled Javascript on your browser, please enable it to use the website</div>
    </noscript>
    <div class="dashboard-header">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12 col-sm-12 col-12 d-none d-xl-block d-lg-block d-md-block">
                        <div class="header-text text-right">
                            <p class="wlecome-text">Call : <?php echo $site->contact_no?> | <a href="mailto:<?php echo $site->contact_email?>" class="text-black"><?php echo $site->contact_email?> </a></p>
                        </div><a href="<?php echo $site->contact_email?>" class="text">
                        </a>
                    </div><a href="<?php echo $site->contact_email?>" class="text">

                    </a>
                </div><a href="<?php echo $site->contact_email?>" class="text">
                </a>
            </div><a href="<?php echo $site->contact_email?>" class="text-">
            </a>
        </div><a href="<?php echo $site->contact_email?>" class="text">
        </a>
        <div class="container-fluid"><a href="<?php echo $site->contact_email?>" class="text">
            </a>
            <div class="row"><a href="<?php echo $site->contact_email?>" class="text">
                </a>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-6 col-6"><a href="<?php echo $site->contact_email?>" class="text">
                    </a>
                    <div class="header-logo"><a href="<?php echo $site->contact_email?>" class="text-">
                        </a><a href="<?php echo base_url();?>">
                            <img src="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>" alt="Not avilable" style="max-width: 14% !important;">
                            
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <nav class="navbar navbar-expand-lg float-right db-nav-list">
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown dropleft user-vendor ">
                                    <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>Customerdashboard/My_Profile/" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-icon"> <?php echo substr($this->session->googlename,0,1);?> </span><span class="user-vendor-name"><?php echo $this->session->googlename;?> <i class="fa fa-angle-down"></i> </span></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="<?php echo base_url();?>Customerdashboard/">Dashboard
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Customerdashboard/Enquires_List/"> Enquires List
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Customerdashboard/My_Profile/">My Profile
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Customerdashboard/passwordchange/">Password change
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="signOut();">Log Out
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="navbar-expand-lg">-->
    <!--    <button class="navbar-toggler" type="button" data-toggle="offcanvas">-->
    <!--        <span id="icon-toggle" class="fa fa-bars">-->
    <!--        </span>-->
    <!--    </button>-->
    <!--</div>-->
    <div class="dashboard-wrapper">
        <div class="dashboard-sidebar offcanvas-collapse">
            <div class="vendor-user-profile">
                <div class="vendor-user-img">
                    <img src="<?php echo $this->OH->getimagelink()?>" />
                </div>
                <div class="vendor-user-name-cont">
                    <h3 class="vendor-profile-name"><?php echo $this->session->googlename;?></h3>
                    <a href="<?php echo base_url();?>Customerdashboard/My_Profile/" class="edit-link">edit profile</a>
                </div>
            </div>
            <div class="dashboard-nav">
                <ul class="list-unstyled">
                    <li>
                    <!-- <li  class="active"> -->
                        <a href="<?php echo base_url();?>Customerdashboard/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-compass">
                                </i>
                            </span>Dashboard
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url();?>Customerdashboard/Enquires_List/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-list-alt">
                                </i>
                            </span>Enquires List
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url();?>Customerdashboard/My_Profile/"> 
                            <span class="dash-nav-icon">
                                <i class="fas fa-user-circle">
                                </i>
                            </span>My Profile
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Customerdashboard/passwordchange/"> 
                            <span class="dash-nav-icon">
                                <i class="fas fa-user-circle">
                                </i>
                            </span>Password change
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="signOut();">
                            <span class="dash-nav-icon">
                                <i class="fas fa-sign-out-alt">
                                </i>
                            </span>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>