<!DOCTYPE html>
<html lang="en" xml:lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="robots" content="index, follow">
        
        <!---->
        <?php 
            if(isset($vdata[0]))
            {?>
                <title><?echo $vdata[0]->business_name?> in <?php echo $this->OH->getcatnamebyid($vdata[0]->category_id);?>-<?php echo $site->website_title;?></title>
                <meta name="description" content="<?php echo $site->website_description;?>-<?echo $vdata[0]->description?>" />
                <meta name="keyword" content="<?php echo $site->website_keywords;?>,<?echo $vdata[0]->business_name?>,<?echo $vdata[0]->description?>">
            <?php
                         $this->load->helper('url');
                    
                    $currentURL = current_url();?>
                    
                    
                <meta property="og:title" content="<?echo $vdata[0]->business_name?> on <?=$currentURL."?vid=".$vdata[0]->id?>">
                <meta property="og:url" content="<?=$currentURL."?vid=".$vdata[0]->id?>">
                <meta property="og:description" content="<?echo $vdata[0]->business_name?>-<?echo $vdata[0]->description?>-<?php echo $site->website_description;?>">
                <meta property="og:image" content="<?php echo (file_exists('assets/images/' . $vdata[0]->image))? base_url() . 'assets/images/' . $vdata[0]->image : base_url().'assets/images/wedding-planner/demo.jpg';  ?>">
                
                <meta name="twitter:site" content="@devani_nimesh">
                <meta name="twitter:title" content="<?echo $vdata[0]->business_name?> on <?=$currentURL."?vid=".$vdata[0]->id?>">
                <meta name="twitter:description" content="<?echo $vdata[0]->business_name?>-<?echo $vdata[0]->description?>-<?php echo $site->website_description;?>">
                <meta name="twitter:image" content="<?php echo (file_exists('assets/images/' . $vdata[0]->image))? base_url() . 'assets/images/' . $vdata[0]->image : base_url().'assets/images/wedding-planner/demo.jpg';  ?>">
        
                    
             
            <?php }
            else
            {?>
                <title><?php echo $site->website_title;?></title>
                <meta name="description" content="<?php echo $site->website_description;?>" />
                <meta name="keyword" content="<?php echo $site->website_keywords;?>">
            
                <meta property="og:title" content="<?php echo $site->website_title;?>">
                <meta property="og:url" content="<?php echo base_url();?>">
                <meta property="og:description" content="<?php echo $site->website_description;?>">
                <meta property="og:image" content="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">
                
                <meta property="twitter:title" content="<?php echo $site->website_title;?>">
                <meta property="twitter:url" content="<?php echo base_url();?>">
                <meta property="twitter:description" content="<?php echo $site->website_description;?>">
                <meta property="twitter:image" content="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">
                
                <meta name="twitter:site" content="@devani_nimesh">
            <?php }
        ?>
        <meta name="twitter:card" content="summary_large_image">
        <meta property="og:type" content="article"/>
        <!---->
        
        <!--Css Load-->
        <link rel="stylesheet" type="text/css" href="<?= ASSETSURL?>css/css-bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= ASSETSURL?>css/css-plugins.css">
        <link rel="stylesheet" type="text/css" href="<?= ASSETSURL?>css/css-style.css">
        <style type="text/css">
            #freecssfooter{display:block;width:100%;padding:120px 0 20px;overflow:hidden;background-color:transparent;z-index:5000;text-align:center;}
            #freecssfooter div#fcssholder div{display:none;}
            #freecssfooter div#fcssholder div:first-child{display:block;}
            #freecssfooter div#fcssholder div:first-child a{float:none;margin:0 auto;}
            select {
                width: 100%;
                margin: 5px;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 50px !important;
            }
            .select2-container .select2-selection--single {
                height: 55px !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow b{
                top:100% !important;
            }
            .search_main {
            width: 58% !important;

        </style>
        <style>
            /* Extra large devices (large laptops and desktops, 1200px and up) */
            @media only screen and (min-width: 1200px) {
               #loginlink{
                   visibility: hidden;
                }
            }
            /*for ipad horizontaly*/
            @media (min-width: 1024px) {
                #loginlink{
                   visibility: hidden;
                }
            }
            
            /*for mobile horizontaly*/
            @media (min-width: 767px) {
                 #loginlink{
                   visibility: hidden;
                }
            }
            
            /*for mobile vertical*/
            @media (max-width: 479px) {
             #loginlink{
                   visibility: inherit;
                   
                }
                select {
                        width: 100%;
                        margin: 5px;
                    }
                .search_box {
                    margin-top: 130px;
                    }
            }
            img {
              -webkit-user-drag: none;
              -khtml-user-drag: none;
              -moz-user-drag: none;
              -o-user-drag: none;
              user-drag: none;
            }
        </style>
        <!--Css Load-->
        
        
        <!--Manifest-->
        <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
        <link rel="apple-touch-startup-image" />
        
        <link rel="apple-touch-startup-image" href="/favicons/apple-icon-180x180.png">
    
        <!--<link   rel="icon" type="image/x-icon" sizes="48x48" href="<?php echo base_url(); ?>favicons/<?php echo  $site->upload_favicon ?>">-->
        <link   rel="manifest" href="<?php echo base_url(); ?>favicons/manifest.json">
        <meta name="theme-color" media="(prefers-color-scheme: light)" content="white">
        <meta name="theme-color" media="(prefers-color-scheme: dark)"  content="black">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta name="referrer" content="origin">
    
    <!--End Menifest-->
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script  src="https://www.googletagmanager.com/gtag/js?id=<?php echo $site->google_analytics_code;?>"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', '<?php echo $site->google_analytics_code;?>');
        </script>

    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T82R7T8');</script>
    <!-- End Google Tag Manager -->
    
    <!--select2 start-->
        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script  src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--select2 end-->
    
    <!--Google Login-->
    <script  src="https://apis.google.com/js/platform.js?onload=onLoad" async ></script>
    <!--<meta name="google-signin-client_id" content="797061690576-9l8anl03tvgj7vi02a8jreav8tr6f3t6.apps.googleusercontent.com">-->
    <meta name="google-signin-client_id" content="172159539927-rsli4anlv0kjd9sfdr358hst7dnk01g7.apps.googleusercontent.com">
    <!--Google Login-->
    </head>
    <body>
        <div class="header_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <div class="logo"><a href="<?= base_url();?>"><img src="<?=base_url(); ?>assets/images/<?= $site->upload_logo;?>" alt="website template image"></a></div>
                    </div>
                    <div class="col-sm-3">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-item nav-link" href="<?= base_url();?>">Home</a>
                                    <a class="nav-item nav-link" href="<?= base_url();?>Contactus/aboutus2">About</a>
                                    <a class="nav-item nav-link" href="<?= base_url();?>Contactus/contact">Contact</a>
                                    <!--<a class="nav-item nav-link" href="<?= base_url();?>Customerlogin">Customer</a>-->
                                    <div id="loginlink">
                                        <?php
                                            if($this->session->googlelogin==TRUE)
                                            {
                                                
                                                echo '<a class="nav-item nav-link" href="' . base_url() . 'Customerdashboard">Dashboard</a>';
                                                echo '<a class="nav-item nav-link" id="googlelogout1" onclick="signOut();">Sign out</a>';
                                            }
                                            else
                                            {
                                                if ($this->session->logged_in == TRUE)
                                                {
                                                    echo '<a class="nav-item nav-link" href="' . base_url() . 'Dashboard">Dashboard</a>';
                                                    echo '<a class="nav-item nav-link"  href="' . base_url() . 'Dashboard/logout">Logout</a>';
                                                }
                                                else
                                                {
                                                    echo '<a class="nav-item nav-link" href="' . base_url() . 'Customerlogin">Customer</a>
                                                          <a class="nav-item nav-link" href="' . base_url() . 'Login">Vendor</a>';
                                              }
                                           }
                                          
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="search_main">
                            <!--<button class="submit_bt"><a  href="<?= base_url();?>Customerlogin">Customer</a></button>-->
                            <!--<button class="submit_bt"><a  href="<?= base_url();?>Login">Vendor</a></button>-->
                            <?php
                                if($this->session->googlelogin==TRUE)
                                {
                                    
                                    echo '<button class="submit_bt"><a  href="' . base_url() . 'Customerdashboard">Dashboard</a></button>';
                                    echo '<button class="submit_bt"><a id="googlelogout1" onclick="signOut();">Sign out</a></button>';
                                }
                                else
                                {
                                    if ($this->session->logged_in == TRUE)
                                    {
                                        echo '<button class="submit_bt"><a  href="' . base_url() . 'Dashboard">Dashboard</a></button>';
                                        echo '<button class="submit_bt"><a  href="' . base_url() . 'Dashboard/logout">Logout</a></button>';
                                    }
                                    else
                                    {
                                        echo '<button class="submit_bt"><a  href="' . base_url() . 'Customerlogin">Customer</a></button>
                                        <button class="submit_bt"><a  href="' . base_url() . 'Login">Vendor</a></button>';
                                  }
                               }
                              
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        var id_token = googleUser.getAuthResponse().id_token;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url()?>Login/googlelogin');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('idtoken=' + id_token);
        document.getElementById("googlelogin").style.display = "none";
        document.getElementById("googlelogout").style.display = "block";
        document.getElementById("googlelogin1").style.display = "none";
        document.getElementById("googlelogout1").style.display = "block";
        
        
}
function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
        //  location.reload();
    });
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo base_url()?>Customerdashboard/logout');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
  }
</script>