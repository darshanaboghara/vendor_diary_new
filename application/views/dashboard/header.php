<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $site->google_analytics_code;?>"></script>
    <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $site->google_analytics_code;?>');
</script>
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo  base_url(); ?>favicons/<?php echo $site->upload_favicon;?>">
    <!--<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>favicons/favicon-16x16.png">-->
    <link rel="manifest" href="<?php echo base_url(); ?>favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><?php echo $site->website_title?>-Vednor Dashboard</title>
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
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.minec25.js?v=1556886976"></script>-->
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
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.minec25.js?v=1556886976"></script>-->
    <script type="<?php echo base_url(); ?>text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cookie.minaa98.js?v=1557750905"></script>
    <link href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet">
    
    
    <!--paypal-->
    <!--<script src="https://www.paypal.com/sdk/js?client-id=AV5eYjjaUhp9T_E9h3vqtvRH_n-Zgu91F4ppDT1zXT2nrETRGn2wZCMx0ma6Pb-U1VjKo8pHKngwK-NV&vault=true&intent=subscription"></script>-->
    <!--<script src="https://www.paypal.com/sdk/js?client-id=AV5eYjjaUhp9T_E9h3vqtvRH_n-Zgu91F4ppDT1zXT2nrETRGn2wZCMx0ma6Pb-U1VjKo8pHKngwK-NV&vault=true&currency=AUD"> </script>-->
        <script src="https://www.paypal.com/sdk/js?client-id=AYsunRZMiHzxOGDeqZ0SkyFztZae7ozmGwet_EV14k_dj_YVjZtEtWSwWgMojJemZW5GOSiDuZf_eENi"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <style>
        @media (max-width: 767px) { 
    .offcanvas-collapse{
        display:none;
    }
}
    </style>
    
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
                        </a><a href="<?php echo base_url();?>Dashboard">
                            <img src="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>" alt="Not avilable" style="max-width: 14% !important;">
                        </a>
                        <?php  
                    if($vdata->plan_status=="Paid")
                    {
                    ?>
                        <img src='https://cashu.b-cdn.net/images/global/externalImages/en/registration/complated.png' alt='Not avilable' style="height: 23px;">Prime Account with <b> <?php echo $vdata->plan_name?> </b> plan
                    <? }
                    ?>
                    </div>
                    
                    
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <nav class="navbar navbar-expand-lg float-right db-nav-list">
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown dropleft user-vendor ">
                                    <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>Dashboard/My_Profile/" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-icon"> <?php echo substr($vdata->last_name,0,1);?> </span><span class="user-vendor-name"><?php echo $vdata->last_name;?> <i class="fa fa-angle-down"></i> </span></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/">Dashboard
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/showVendorPlan">Vendor Plan
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/Enquires_List/"> Enquires List
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/review/"> Account Review
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/My_Profile/">My Profile
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/photo_Gallery/">Photo Gallery
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/passwordchange/">Password Change
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/logout/">Log Out
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
                    <img src="<?Php echo base_url().IMAGELINK. $vdata->image ?>"  style="width: inherit;"/>
                </div>
                <div class="vendor-user-name-cont">
                    <h3 class="vendor-profile-name"><?php echo $vdata->business_name ?></h3>
                    <a href="<?php echo base_url();?>Dashboard/My_Profile/" class="edit-link">edit profile</a>
                </div>
            </div>
            <div class="dashboard-nav">
                <ul class="list-unstyled">
                    <li>
                    <!-- <li  class="active"> -->
                        <a href="<?php echo base_url();?>Dashboard/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-compass">
                                </i>
                            </span>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Dashboard/showVendorPlan/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-list-alt"></i>
                            </span>Plan Status
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Dashboard/Enquires_List/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-list-alt">
                                </i>
                            </span>Enquires List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Dashboard/review/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-list-alt">
                                </i>
                            </span>Account Review
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Dashboard/photo_Gallery/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-file-image"></i>
                            </span>Photo Gallery
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Dashboard/My_Profile/"> 
                            <span class="dash-nav-icon">
                                <i class="fas fa-user-circle">
                                </i>
                            </span>My Profile
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Dashboard/passwordchange/"> 
                            <span class="dash-nav-icon">
                                <i class="fas fa-user-circle">
                                </i>
                            </span>Password change
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Dashboard/logout/">
                            <span class="dash-nav-icon">
                                <i class="fas fa-sign-out-alt">
                                </i>
                            </span>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>