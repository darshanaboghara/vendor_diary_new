<!doctype html>
<html lang="en" xml:lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="robots" content="index, follow">
    <script src="https://richinfo.co/richpartners/push/js/rp-cl-ob.js?pubid=836306&siteid=312569&niche=33"></script>
    <link rel="canonical" href="<?= base_url();?>">
    <?php 
    if(isset($vdata[0]))
    {?>
        <title><?echo $vdata[0]->business_name?> in <?php echo $this->OH->getcatnamebyid($vdata[0]->category_id);?>-<?php echo $site->website_title;?></title>
        <meta name="description" content="<?php echo $site->website_description;?>-<?echo $vdata[0]->description?>" />
        <meta name="keyword" content="<?php echo $site->website_keywords;?>,vendordiary,<?echo $vdata[0]->business_name?>,<?echo $vdata[0]->description?>">
    <?php
                 $this->load->helper('url');
            
            $currentURL = current_url();?>
            
            
        <meta property="og:title" content="<?echo $vdata[0]->business_name?> on <?=$currentURL."?vid=".$vdata[0]->id?>">
        <meta property="og:url" content="<?=$currentURL."?vid=".$vdata[0]->id?>">
        <meta property="og:description" content="<?echo $vdata[0]->business_name?>-<?echo $vdata[0]->description?>-<?php echo $site->website_description;?>">
        <meta property="og:image" content="<?php echo (file_exists('assets/images/' . $vdata[0]->image))? base_url() . 'assets/images/' . $vdata[0]->image : base_url().'assets/images/wedding-planner/demo.jpg';  ?>">
        
        <meta name="twitter:site" content="@vendordiary">
        <meta name="twitter:title" content="<?echo $vdata[0]->business_name?> on <?=$currentURL."?vid=".$vdata[0]->id?>">
        <meta name="twitter:description" content="<?echo $vdata[0]->business_name?>-<?echo $vdata[0]->description?>-<?php echo $site->website_description;?>">
        <meta name="twitter:image" content="<?php echo (file_exists('assets/images/' . $vdata[0]->image))? base_url() . 'assets/images/' . $vdata[0]->image : base_url().'assets/images/wedding-planner/demo.jpg';  ?>">

            
     
    <?php }
    else
    {?>
        <title><?php echo $site->website_title;?></title>
        <meta name="description" content="<?php echo $site->website_description;?>" />
        <meta name="keyword" content="vendordiary,<?php echo $site->website_keywords;?>">
    
        <meta property="og:title" content="<?php echo $site->website_title;?>">
        <meta property="og:url" content="<?php echo base_url();?>">
        <meta property="og:description" content="<?php echo $site->website_description;?>">
        <meta property="og:image" content="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">
        
        <meta property="twitter:title" content="<?php echo $site->website_title;?>">
        <meta property="twitter:url" content="<?php echo base_url();?>">
        <meta property="twitter:description" content="<?php echo $site->website_description;?>">
        <meta property="twitter:image" content="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">
        
        <meta name="twitter:site" content="@vendordiary ">
        
         <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "Vendor Diary",
          "url": "https://vendordiary.com/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://vendordiary.com/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
        </script>
    <?php }
    ?>
    <link rel="apple-touch-icon" href="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:type" content="article"/>
    <!-- Google Ads -->
    <!--<script data-ad-client="ca-pub-8898782763527089" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
    
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
    
    <!-- Media.net -->
    <!--<script type="text/javascript">-->
    <!--    window._mNHandle = window._mNHandle || {};-->
    <!--    window._mNHandle.queue = window._mNHandle.queue || [];-->
    <!--    medianet_versionId = "3121199";-->
    <!--</script>-->
    <!--<script src="https://contextual.media.net/dmedianet.js?cid=8CUL741AV" async="async"></script>-->
    <!-- End Media.netr -->
    
    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<!--select2 start-->
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script  src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--select2 end-->
    <link  href="<?php echo base_url(); ?>assets/css/bootstrap.minddec.css?v=1558689406" rel="stylesheet">
    <link defer  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link defer   href="<?php echo base_url(); ?>assets/css/jquery-ui9a20.css?v=1558689406" rel="stylesheet">
    
    <link defer   href="<?php echo base_url(); ?>assets/css/jquery.rateyoddec.css?v=1558689406" rel="stylesheet">
    
    <link  defer href="<?php echo base_url(); ?>assets/css/owl.carouselddec.css " type="text/css" rel="stylesheet">
    <link  defer href="<?php echo base_url(); ?>assets/css/owl.theme.defaultddec.css " type="text/css" rel="stylesheet">
    <link   href="<?php echo base_url(); ?>assets/css/style75ea.css?v=1558689406" rel="stylesheet">
    
    <!--Manifest-->
    <!--<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">-->
    <!--<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">-->
    <!--<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">-->
    <!--<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">-->
    <!--<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">-->
    <!--<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">-->
    <!--<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">-->
    <!--<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">-->
    <!--<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">-->
    <!--<link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">-->
    <!--<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">-->
    <!--<link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">-->
    <!--<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">-->
    <!--<link rel="apple-touch-startup-image" />-->
    
    <!--<link rel="apple-touch-startup-image" href="/favicons/apple-icon-180x180.png">-->

    <link   rel="icon" type="image/x-icon" sizes="48x48" href="<?php echo base_url(); ?>favicons/<?php echo  $site->upload_favicon ?>">
    <link   rel="manifest" href="<?php echo base_url(); ?>favicons/manifest.json">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="white">
    <meta name="theme-color" media="(prefers-color-scheme: dark)"  content="black">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="referrer" content="origin">
    
    <!--End Menifest-->
    <link   href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link   href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.css?v=1558689406" rel="stylesheet">
    <!-- Fontello icon -->
    <link   href="<?php echo base_url(); ?>assets/fonts/fontello/css/fontello.css?v=1558689406" rel="stylesheet">
    <link    href="<?php echo base_url(); ?>assets/fonts/fontello/css/flaticon.css?v=1558689406" rel="stylesheet">
    <!--jquery-ui  -->
    <link   href="<?php echo base_url(); ?>assets/css/jquery-ui9a20.css?v=1558689406" rel="stylesheet">
    <!--jquery-rateyo  -->
    <link   href="<?php echo base_url(); ?>assets/css/jquery.rateyoddec.css " rel="stylesheet">
    <!-- Template magnific popup gallery -->
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/magnific-popupddec.css">-->
    <!-- OwlCarosuel CSS -->
    <link   href="<?php echo base_url(); ?>assets/css/owl.carouselddec.css?v=1558689406" type="text/css" rel="stylesheet">
    <link   href="<?php echo base_url(); ?>assets/css/owl.theme.defaultddec.css?v=1558689406" type="text/css" rel="stylesheet">

 
    <script  src="<?php echo base_url(); ?>assets/js/owl.carousel.minec25.js?v=1558689406"></script>
    <!-- nice select -->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.minec25.js?v=1556886976"></script>-->
    <script  src="<?php echo base_url(); ?>assets/js/custom-script9a20.js?v=1558689406"></script>
    <!-- popup gallery -->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.minec25.js?v=1556886976"></script>-->
    <script async  src="<?php echo base_url(); ?>assets/js/jquery-uif2db.js?v=1558689406"></script>
    <script  src="<?php echo base_url(); ?>assets/js/return-to-topf2db.js?v=1558689406"></script>
    <script  type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cookie.minaa98.js?v=1558689406"></script>
    <script  src="https://apis.google.com/js/platform.js?onload=onLoad" async ></script>
    <!--<meta name="google-signin-client_id" content="797061690576-9l8anl03tvgj7vi02a8jreav8tr6f3t6.apps.googleusercontent.com">-->
    <meta name="google-signin-client_id" content="172159539927-rsli4anlv0kjd9sfdr358hst7dnk01g7.apps.googleusercontent.com">
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.minec25.js?v=1558689406"></script>-->
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



<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

</head>

<!--<body oncontextmenu="return false;">-->
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T82R7T8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <noscript>
    <div class="noscript colrw boxshadow">You have not enabled Javascript on your browser, please enable it to use the website</div>
  </noscript>
  <!--Header Start-->
  <!-- Sidebar Holder -->
  <div id="sidebar" class="mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" style="overflow: visible;">
    <div id="dismiss" class="dismiss">
      <i class="fa fa-arrow-left">
      </i>
    </div>
    <div class="mobile-nav">
      <h2><?php echo  $site->web_frienly_name; ?>
      </h2>
      <ul class="list list--bleed border-top">
        <li>
           <?php
              if ($this->session->logged_in == TRUE) {
                echo '<a style="color: #000000;" href="' . base_url() . 'Dashboard" class=""> Dashboard</a>';
              } 
              else
              {
                echo '<a style="color: #000000;" href="' . base_url() . 'Login" class=""> Signin / Signup</a>';
              }
              ?>
        </li>
       
        <li>
          <a class="" style="color: #000000;" href="<?php echo base_url()?>blog">Blog</a>
        </li>
        <li>
          <a class="" style="color: #000000;" href="<?php echo base_url()?>Contactus">Contact Us</a>
        </li>
        <li>
            <?php
              if($this->session->googlelogin==TRUE)
              {
                //   echo '<p><a  id="googlelogout1" onclick="signOut();" style="display:none">Sign out</a></p>';
               
                echo '<a href="' . base_url() . 'Customerdashboard/" style="padding-right: 15px;">Dashboard</a>';
                echo '<a href=""  id="googlelogout1" onclick="signOut();" >Sign out</a>';
                
              }
              else
              {
                if ($this->session->logged_in == TRUE)
                {
                    echo '<a href="' . base_url() . 'Dashboard" class="text-white"> Dashboard</a>';
                 } else
                 {
                    echo ' <a href="' . base_url() . 'Login" class="text-white" style="color:black !important">Vendor Login</a>
                           <a href="' . base_url() . 'Customerlogin/" class="text-white" style="color:black !important"> Customer Login</a>
                           ';
                  }
              }
              
              ?>
          <!--<a href="#" id="googlelogout" onclick="signOut();" style="display:none">Sign out</a>-->
          <!--  <a id="googlelogin"><div class="g-signin2" data-onsuccess="onSignIn" style="display:block"></div></a>-->
        </li>
      </ul>
    </div>
  </div>
  <div class="overlay2">
  </div>
  <!-- /.Sidebar Holder -->
  <!-- header -->
  <div class="header-transparent">
    <!-- top header -->
    <div class="header-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-sm-6 col-6 d-none d-xl-block d-lg-block d-md-block">
            <div class="header-text">
              <p class="wlecome-text">Call : <a href="tel:<?php echo  $site->contact_no;?>"><?php echo  $site->contact_no ?></a> |
                <a href="mailto:<?php echo  $site->contact_email ?>" class="text-white"><?php echo  $site->contact_email ?> </a>
              </p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-sm-12 col-12">
            <div class="header-text text-right">
              <?php
              if($this->session->googlelogin==TRUE)
              {
                //   echo '<p><a  id="googlelogout1" onclick="signOut();" style="display:none">Sign out</a></p>';
                echo "<p>";
                echo '<a href="' . base_url() . 'Customerdashboard/" style="padding-right: 15px;">Dashboard</a>';
                echo '<a href=""  id="googlelogout1" onclick="signOut();" >Sign out</a>';
                echo "</p>";
              }
              else
              {
                if ($this->session->logged_in == TRUE)
                {
                    echo '<p>Go to <a href="' . base_url() . 'Dashboard" class="text-white"> Dashboard</a>';
                    echo '&nbsp <a href="' . base_url() . 'Dashboard/logout" >Logout</a></p>';
                  } else {
                    echo '<p>Are You Vendor? <a href="' . base_url() . 'Login" class="text-white" style="padding-right: 15px;"> Signin / Signup</a>
                           Are You Coutomer? <a href="' . base_url() . 'Customerlogin/" class="text-white"> Signin / Signup</a>
                           </p>';
                  }
              }
              
              ?>
           
               <!--<a  id="googlelogout1" onclick="signOut();" style="display:none">Sign out</a>-->
               <!--<a  id="googlelogin1"><div class="g-signin2" data-onsuccess="onSignIn"></div></a>-->
               
                

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.top header -->
    <!-- navigation start -->
    <div class="container-fluid" style="background-color: #ffffff;">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <nav class="navbar navbar-expand-lg navbar-transparent">
            <a class="navbar-brand" href="<?php echo base_url() ?>">
              <img class="lazyload" loading="lazy" src="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>" alt="Site Logo" style='height: 68px;'>
              <!--<p style="color: black;"> <?php echo  $site->web_frienly_name; ?></p>-->
            </a>
            <button type="button" class="navbar-toggle collapsed navbar-left" id="sidebarCollapse1">
              <span class="icon-bar top-bar mt-0">
              </span>
              <span class="icon-bar middle-bar">
              </span>
              <span class="icon-bar bottom-bar">
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-classic">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <!--<li class="nav-item">-->
                <!--  <script async src="https://cse.google.com/cse.js?cx=e6f779a22650a58fd"></script>-->
                <!--    <div class="gcse-search"></div>-->
                <!--</li>-->
                <li class="nav-item">
                  <a class="nav-link" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>" href="<?php echo base_url(); ?>"> Home
                  </a>
                </li>
                <li class="nav-item dropdown mega-dropdown">
                  <a class="nav-link dropdown-toggle" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>" href="#" id="menu-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Vendor
                  </a>
                  <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="menu-6">
                    <li class="row">
                      <ul class="col">
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/137/0'?>">
                            <span class="isvg loaded">
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <g id="surface1">
                                  <path class="cls-1" d="M402.8,392.2l-78.9-96l13.7-13.7c8.9-8.9,13.8-20.7,13.8-33.3s-4.9-24.4-13.8-33.3c0,0,0,0,0,0l-58.6-58.6
                                                           c-11.4-11.4-29.1-21.3-47.1-27.1c13-13.8,21-32.4,21-52.9c0-42.6-34.6-77.2-77.2-77.2c-42.6,0-77.2,34.6-77.2,77.2
                                                           c0,20.4,8,39.1,21,52.9c-18,5.9-35.7,15.7-47.1,27.1l-58.6,58.6C4.9,224.7,0,236.5,0,249.1s4.9,24.4,13.8,33.3l32.1,32.1
                                                           c8.9,8.9,20.7,13.8,33.3,13.8c6,0,11.7-1.1,17.1-3.2v139.7c0,26,21.1,47.1,47.1,47.1c12.4,0,23.7-4.8,32.1-12.7
                                                           c8.4,7.9,19.7,12.7,32.1,12.7c26,0,47.1-21.1,47.1-47.1v-17.1h121.6c16.6,0,29.1-6.5,34.4-17.7C416.3,418.8,413.3,405,402.8,392.2z
                                                           M175.7,30c26,0,47.2,21.2,47.2,47.2c0,26-21.2,47.2-47.2,47.2c-26,0-47.2-21.2-47.2-47.2C128.5,51.2,149.6,30,175.7,30z
                                                           M91.4,293.4c-3.2,3.2-7.5,5-12.1,5s-8.9-1.8-12.1-5L35,261.2c-3.2-3.2-5-7.5-5-12.1c0-4.6,1.8-8.9,5-12.1l58.6-58.6
                                                           c12.8-12.8,39.9-24,58-24h48.2c18.1,0,45.2,11.2,58,24l58.6,58.6c0,0,0,0,0,0c3.2,3.2,5,7.5,5,12.1s-1.8,8.9-5,12.1l-32.1,32.1
                                                           c-6.7,6.7-17.5,6.7-24.2,0c-3.2-3.2-5-7.5-5-12v-0.2c0-4.5,1.8-8.8,5-12l9.4-9.4c2.8-2.8,4.4-6.6,4.4-10.6c0-4-1.6-7.8-4.4-10.6
                                                           l-18.8-18.8c-4.3-4.3-10.7-5.6-16.3-3.3c-5.6,2.3-9.3,7.8-9.3,13.9v50.8c0,0,0,0.1,0,0.1c0,0.1,0,0.1,0,0.1v7.8h-98.5v-7.8
                                                           c0-0.1,0-0.1,0-0.2s0-0.1,0-0.2v-50.8c0-6.1-3.7-11.5-9.3-13.9c-5.6-2.3-12.1-1-16.3,3.3L82,238.5c-2.8,2.8-4.4,6.6-4.4,10.6
                                                           c0,4,1.6,7.8,4.4,10.6l9.4,9.4c3.2,3.2,5,7.5,5,12v0.2C96.4,285.9,94.6,290.2,91.4,293.4z M224.9,464.9c0,9.4-7.7,17.1-17.1,17.1
                                                           c-9.4,0-17.1-7.7-17.1-17.1v-96.4c0-8.3-6.7-15-15-15c-8.3,0-15,6.7-15,15v96.4c0,9.4-7.7,17.1-17.1,17.1
                                                           c-9.4,0-17.1-7.7-17.1-17.1V319.2h98.5V464.9z M376.5,417.7H254.9v-92.6c15.7,6.1,34,3.5,47.5-7.9l77.2,93.9
                                                           c2.1,2.6,3.1,4.5,3.6,5.7C382,417.3,379.9,417.7,376.5,417.7z" />
                                </g>
                                <g>
                                  <g>
                                    <path class="cls-1" d="M400.2,49.9c-12.9,0-25.2,4.5-34.8,12.8c-9.6-8.3-21.9-12.8-34.8-12.8c-29.6,0-53.6,24.1-53.6,53.6
                                                             c0,61.3,81.6,93.9,85.1,95.3c1.1,0.5,2.3,0.6,3.4,0.6s2.4-0.2,3.4-0.6c0.9-0.4,21.1-8.4,41.7-23.6c28.4-21,43.4-45.9,43.4-71.6
                                                             C453.8,74,429.8,49.9,400.2,49.9z M365.3,179.7c-6.3-2.8-20.1-9.5-33.9-19.7c-23.6-17.6-35.6-36.5-35.6-56.4
                                                             c0-19.1,15.6-34.7,34.7-34.7c10.8,0,20.7,4.9,27.4,13.4c1.8,2.3,4.6,3.6,7.4,3.6s5.7-1.4,7.4-3.6c6.6-8.5,16.6-13.4,27.4-13.4
                                                             c19.1,0,34.7,15.5,34.7,34.7C434.8,145.8,379.8,173.2,365.3,179.7z" />
                                  </g>
                                </g>
                              </svg>
                            </span> <?php echo $this->OH->getcatnamebyid(137)?>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/154/0'?>">
                            <span class="isvg loaded">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <g>
                                  <path class="cls-1" d="M234.202,295.589c-3.905-3.905-10.235-3.905-14.141,0c-10.436,10.437-27.415,10.435-37.851,0
                                                           c-3.906-3.905-10.236-3.905-14.143,0c-3.905,3.905-3.905,10.237,0,14.143c9.117,9.117,21.093,13.675,33.068,13.675
                                                           c11.975,0,23.95-4.558,33.067-13.675C238.107,305.827,238.107,299.495,234.202,295.589z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M386.877,295.589c-3.906-3.905-10.236-3.905-14.143,0c-10.435,10.435-27.414,10.436-37.851,0
                                                           c-3.906-3.905-10.236-3.905-14.143,0c-3.905,3.905-3.905,10.237,0,14.143c9.117,9.117,21.093,13.675,33.067,13.675
                                                           c11.977,0,23.952-4.558,33.07-13.675C390.782,305.827,390.782,299.495,386.877,295.589z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M353.868,146.545c-3.688-4.112-10.012-4.452-14.121-0.765l-0.138,0.124c-4.111,3.688-4.454,10.01-0.766,14.121
                                                           c1.975,2.202,4.705,3.322,7.446,3.322c2.379,0,4.766-0.844,6.675-2.557l0.138-0.124
                                                           C357.213,156.978,357.556,150.656,353.868,146.545z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M336.355,402.839c-0.378-4.413-3.155-8.151-7.264-9.793c-0.055-0.022-0.11-0.044-0.165-0.065
                                                           c-5.047-1.945-9.536-5.176-12.981-9.345c-5.409-6.547-13.382-10.302-21.876-10.302c-5.97,0-11.798,1.916-16.597,5.366
                                                           c-4.8-3.451-10.627-5.366-16.597-5.366c-8.494,0-16.467,3.755-21.875,10.301c-3.446,4.17-7.936,7.402-12.983,9.345
                                                           c-0.042,0.017-0.092,0.036-0.14,0.056c-4.122,1.636-6.91,5.381-7.289,9.803c-0.384,4.487,1.785,8.711,5.662,11.026
                                                           c1.524,0.909,4.136,3.676,6.662,6.352c8.96,9.494,22.493,23.835,46.496,23.871c0.013,0,0.025,0,0.037,0c0.018,0,0.035,0,0.053,0
                                                           c0.012,0,0.024,0,0.037,0c24.003-0.035,37.536-14.376,46.496-23.871c2.526-2.676,5.138-5.443,6.663-6.353
                                                           C334.57,411.551,336.739,407.326,336.355,402.839z M309.487,406.488c-7.78,8.244-16.598,17.587-32.015,17.598
                                                           c-15.417-0.01-24.234-9.354-32.015-17.598c-0.301-0.318-0.6-0.635-0.896-0.949c3.66-2.604,6.981-5.685,9.858-9.166
                                                           c1.596-1.932,3.948-3.04,6.456-3.04c2.277,0,4.484,0.944,6.058,2.592l3.307,3.462c1.887,1.976,4.5,3.094,7.232,3.094
                                                           s5.346-1.118,7.232-3.094l3.308-3.464c1.572-1.646,3.779-2.591,6.058-2.591c2.507,0,4.859,1.108,6.456,3.041
                                                           c2.876,3.48,6.198,6.561,9.857,9.165C310.086,405.854,309.788,406.17,309.487,406.488z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M490.482,286.667c-0.04-22.334-17.115-40.763-38.883-42.967V228c0-58.413-28.934-110.194-73.221-141.768
                                                           C370.728,36.76,328.183,0,277.599,0c-50.583,0-93.129,36.76-100.78,86.233c-44.287,31.574-73.22,83.355-73.22,141.767v15.681
                                                           c-21.888,2.086-39.096,20.565-39.137,42.986l-0.046,25.33c-0.021,11.572,4.47,22.455,12.646,30.645
                                                           c8.175,8.19,19.05,12.7,30.621,12.7c5.522,0,10-4.477,10-10s-4.478-10-10-10c-6.223,0-12.07-2.425-16.467-6.83
                                                           c-4.396-4.404-6.812-10.257-6.8-16.479l0.046-25.33c0.021-11.396,8.292-20.894,19.137-22.849v44.191c0,5.523,4.478,10,10,10
                                                           c5.522,0,10-4.477,10-10v-28.581l4.316-0.977c56.931-12.885,111.762-36.15,160.805-68.007
                                                           c33.711,43.927,85.976,69.881,141.729,69.881h1.15v11.812c0,94.104-63.252,175.81-154.109,199.508
                                                           c-41.662-10.913-78.233-34.109-105.889-67.196c-3.543-4.239-9.85-4.801-14.086-1.26c-4.237,3.542-4.802,9.849-1.26,14.086
                                                           c30.924,36.997,72.008,62.721,118.809,74.392c0.795,0.198,1.607,0.297,2.42,0.297c0.81,0,1.62-0.099,2.411-0.295l0.166-0.042
                                                           c79.822-19.877,140.608-80.426,162.593-156.322h4.607c11.571,0,22.446-4.51,30.621-12.7c8.176-8.19,12.666-19.073,12.646-30.645
                                                           L490.482,286.667z M277.599,20c34.348,0,64.073,21.084,76.189,51.592C330.765,60.332,304.909,54,277.599,54
                                                           s-53.166,6.332-76.189,17.593C213.526,41.084,243.251,20,277.599,20z M431.6,256v4.36h-1.151
                                                           c-49.121,0-95.2-22.678-125.158-61.128c6.923-4.909,13.722-9.987,20.372-15.245c4.332-3.425,5.067-9.714,1.643-14.046
                                                           c-3.426-4.332-9.714-5.067-14.047-1.642c-55.31,43.731-120.891,75.079-189.659,90.658V256v-28c0-84.916,69.084-154,154-154
                                                           s154,69.084,154,154V256z M463.728,328.512c-4.344,4.352-10.106,6.767-16.246,6.824c2.706-14.015,4.117-28.451,4.117-43.164
                                                           v-28.273c10.72,2.056,18.862,11.497,18.883,22.804l0.046,25.33C470.54,318.255,468.125,324.108,463.728,328.512z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M185.912,334.616c-2.939-2.939-7.394-3.754-11.185-2.043l-49.237,22.22c0.004,0.008,0.007,0.015,0.012,0.023
                                                           c-1.083,0.488-2.098,1.149-2.97,2.02l-98.131,98.131c-3.905,3.905-3.905,10.237,0,14.143c3.906,3.905,10.236,3.905,14.143,0
                                                           l86.247-86.248c1.556,2.603,3.444,5.031,5.645,7.23c2.2,2.2,4.628,4.089,7.231,5.645l-75.229,75.229
                                                           c-3.905,3.905-3.905,10.237,0,14.142c1.953,1.953,4.512,2.929,7.071,2.929c2.559,0,5.118-0.977,7.071-2.929l87.111-87.112
                                                           c0.872-0.871,1.532-1.885,2.02-2.967c0.009,0.003,0.016,0.005,0.025,0.009l22.22-49.237
                                                           C189.666,342.01,188.852,337.557,185.912,334.616z M150.65,379.844c-2.251-0.839-4.323-2.143-6.073-3.893
                                                           c-1.75-1.751-3.053-3.822-3.893-6.073l18.162-8.196L150.65,379.844z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M52.612,494.93c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.069,2.93c-1.86,1.86-2.931,4.44-2.931,7.07
                                                           s1.07,5.21,2.931,7.07c1.859,1.86,4.439,2.93,7.069,2.93c2.631,0,5.21-1.07,7.07-2.93c1.87-1.86,2.93-4.44,2.93-7.07
                                                           S54.482,496.79,52.612,494.93z" />
                                </g>
                              </svg>
                            </span> 
                            <?php echo $this->OH->getcatnamebyid(154)?>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/148/0'?>">
                            <span class="isvg loaded">
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <g>
                                  <path class="cls-1" d="M364.888,237.791c-2.261-3.472-6.908-4.452-10.378-2.191c-3.471,2.261-4.451,6.907-2.19,10.377
                                                           c6.27,9.625,9.583,20.822,9.583,32.381c0,21.717-12.322,47.828-34.695,73.523c-20.057,23.034-45.842,43.126-71.207,55.556
                                                           c-6.146-3.016-12.413-6.54-18.672-10.5c-3.501-2.216-8.133-1.173-10.348,2.327c-2.215,3.5-1.173,8.133,2.327,10.348
                                                           c7.878,4.985,15.794,9.338,23.527,12.938c1.003,0.467,2.084,0.7,3.165,0.7c1.081,0,2.162-0.233,3.165-0.7
                                                           c28.21-13.13,57.134-35.297,79.356-60.818c24.751-28.426,38.382-58.035,38.382-83.373
                                                           C376.903,263.885,372.748,249.857,364.888,237.791z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M337.195,212.555c-10.497-5.514-22.346-8.429-34.267-8.429c-17.312,0-33.725,5.935-46.925,16.843
                                                           c-13.2-10.908-29.613-16.843-46.925-16.843c-40.792,0-73.978,33.301-73.978,74.233c0,34.511,24.94,76.044,66.714,111.101
                                                           c1.405,1.179,3.116,1.755,4.817,1.755c2.14,0,4.266-0.912,5.749-2.679c2.66-3.174,2.246-7.905-0.926-10.567
                                                           c-37.846-31.76-61.356-69.928-61.356-99.61c0-32.662,26.457-59.233,58.978-59.233c15.707,0,30.488,6.135,41.621,17.273
                                                           c1.407,1.407,3.315,2.198,5.305,2.198s3.898-0.791,5.305-2.198c11.133-11.139,25.914-17.273,41.621-17.273
                                                           c9.636,0,18.818,2.257,27.292,6.708c3.667,1.927,8.201,0.515,10.127-3.152S340.862,214.481,337.195,212.555z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M508.859,196.647l-248.5-177.5c-2.608-1.863-6.11-1.863-8.719,0l-103.516,73.94V59.375h1.375c4.142,0,7.5-3.358,7.5-7.5
                                                           c0-4.142-3.358-7.5-7.5-7.5H69.625c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5H71v88.801L3.141,196.647
                                                           C1.17,198.055,0,200.328,0,202.75v44.375c0,2.81,1.57,5.383,4.068,6.669c2.498,1.285,5.504,1.067,7.791-0.566l14.766-10.547V390.5
                                                           H25.25c-4.142,0-7.5,3.358-7.5,7.5v88.75c0,4.142,3.358,7.5,7.5,7.5h461.5c4.142,0,7.5-3.358,7.5-7.5V398
                                                           c0-4.142-3.358-7.5-7.5-7.5h-1.375V242.681l14.766,10.547c1.296,0.926,2.824,1.397,4.36,1.397c1.173,0,2.35-0.274,3.431-0.831
                                                           c2.498-1.286,4.068-3.859,4.068-6.669V202.75C512,200.328,510.83,198.055,508.859,196.647z M86,59.375h47.125v44.426L86,137.462
                                                           V59.375z M497,232.551l-41.412-29.58c-3.37-2.407-8.055-1.626-10.462,1.744c-2.408,3.37-1.627,8.055,1.744,10.462l23.506,16.79
                                                           V390.5H344.75c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h134.5v73.75H32.75V405.5h134.5c4.142,0,7.5-3.358,7.5-7.5
                                                           c0-4.142-3.358-7.5-7.5-7.5H41.625V231.967L256,78.842l164.235,117.311c3.371,2.408,8.055,1.627,10.462-1.743
                                                           c2.408-3.371,1.627-8.055-1.744-10.463L260.359,63.522c-2.608-1.863-6.11-1.863-8.719,0L15,232.551V206.61L256,34.467L497,206.61
                                                           V232.551z" />
                                </g>
                              </svg>
                            </span> <?php echo $this->OH->getcatnamebyid(148)?>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/158/0'?>">
                            <span class="isvg loaded">
                              <svg xmlns="http://www.w3.org/2000/svg" width="62" height="50" viewBox="0 0 62 50">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <path class="cls-1" d="M1166,831.293v27.182a7.547,7.547,0,0,0,7.57,7.518h46.86a7.547,7.547,0,0,0,7.57-7.518V831.293a7.183,7.183,0,0,0-7.2-7.153h-10.07l-0.24-1.044a9.189,9.189,0,0,0-9.01-7.1h-8.97a9.206,9.206,0,0,0-9.01,7.1l-0.24,1.044H1173.2A7.191,7.191,0,0,0,1166,831.293Zm18.5-4.073a1.532,1.532,0,0,0,1.5-1.194l0.52-2.238a6.121,6.121,0,0,1,5.99-4.715h8.97a6.1,6.1,0,0,1,5.98,4.715l0.52,2.238a1.564,1.564,0,0,0,1.51,1.194h11.3a4.089,4.089,0,0,1,4.1,4.073v27.182a4.453,4.453,0,0,1-4.47,4.438h-46.85a4.453,4.453,0,0,1-4.47-4.438V831.293a4.083,4.083,0,0,1,4.1-4.073h11.3Zm-8.01,4.513a2.062,2.062,0,1,1-2.08,2.062A2.062,2.062,0,0,1,1176.49,831.733ZM1197,858.085a12.937,12.937,0,1,0-13.02-12.937A13,13,0,0,0,1197,858.085Zm0-22.794a9.857,9.857,0,1,1-9.92,9.857A9.9,9.9,0,0,1,1197,835.291Z" transform="translate(-1166 -816)">
                                </path>
                              </svg>
                            </span> Photographers
                          </a>
                        </li>
                      </ul>
                      <ul class="col">
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/175/0'?>">
                            <span class="isvg loaded">
                              <svg height="496pt" viewBox="-48 0 496 496" width="496pt" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <path class="cls-1" d="m372.222656 112c-10.582031 0-20.109375 5.878906-24.847656 15.351562l-47.789062 95.59375c-.800782 1.582032-3.585938.917969-3.585938-.832031l.023438-5.648437 23.640624-157.648438c.222657-1.464844.335938-2.953125.335938-5.113281 0-16.375-13.34375-29.703125-30.257812-29.703125-14.199219 0-26.207032 10.167969-28.550782 24.191406l-27.871094 167.257813c-.128906.6875-1.320312.582031-1.320312-.113281v-183.335938c0-17.648438-14.351562-32-32-32s-32 14.351562-32 32v183.335938c0 .710937-1.199219.800781-1.304688.167968l-27.792968-166.769531c-2.390625-14.335937-14.734375-24.734375-29.839844-24.734375-7.765625 0-15.070312 3.023438-20.550781 8.511719-5.496094 5.496093-8.511719 12.800781-8.503907 20.550781v1.464844c0 1.335937.089844 2.679687.265626 4l23.726562 174.183594v4.863281c0 2.152343-3.230469 3.144531-4.441406 1.347656l-37.429688-56.144531c-6.167968-9.257813-16.488281-14.777344-27.617187-14.777344h-1.328125c-18.296875 0-33.183594 14.886719-33.183594 33.183594 0 5.863281 1.558594 11.648437 4.511719 16.726562l107.488281 184.257813v93.832031h192v-93.574219l17.71875-26.578125c9.015625-13.519531 16.007812-28.253906 20.792969-43.785156l56.265625-182.863281c.808594-2.664063 1.222656-5.40625 1.222656-8.175781v-1.246094c0-15.3125-12.464844-27.777344-27.777344-27.777344zm0 16c6.496094 0 11.777344 5.28125 11.777344 11.777344v1.246094c0 1.167968-.175781 2.34375-.519531 3.472656l-4.023438 13.070312-24.417969-9.765625 6.648438-13.289062c2.007812-4.015625 6.046875-6.511719 10.535156-6.511719zm-99.964844-48.878906 14.566407 9.710937 12.800781-4.273437-3.402344 22.664062-13.320312 4.082032-14.527344-8.90625zm17.988282-39.121094c7.585937 0 13.753906 6.152344 13.753906 14.382812 0 .671876-.046875 1.328126-.160156 2.023438l-1.558594 10.402344-13.105469 4.367187-14.039062-9.359375 1.832031-10.984375c1.046875-6.28125 6.421875-10.832031 13.277344-10.832031zm-74.246094 136h-32v-40h32zm0-56h-32v-16h32zm-16-104c8.824219 0 16 7.175781 16 16v56h-32v-56c0-8.824219 7.175781-16 16-16zm-97 90.761719 19.167969 6.390625 9.648437-9.65625 3.625 21.742187-9.601562 9.59375-19.910156-6.632812zm-7-53.699219c0-3.488281 1.351562-6.765625 3.824219-9.230469 2.472656-2.464843 5.742187-3.832031 9.726562-3.832031 6.769531 0 12.472657 4.785156 13.570313 11.359375l5.453125 32.746094-10.742188 10.734375-17.246093-5.742188-4.464844-32.730468c-.082032-.605469-.121094-1.214844-.121094-1.839844zm-80 148.121094c0-9.472656 7.710938-17.183594 17.183594-17.183594h1.328125c5.761719 0 11.113281 2.855469 14.304687 7.65625l21.566406 32.34375-10.664062 16h-23.789062l-17.585938-30.144531c-1.527344-2.632813-2.34375-5.632813-2.34375-8.671875zm76.457031 135.726562-7.890625-13.519531 10.089844 2.53125zm-24.449219-41.917968-6.65625-11.40625 8.945313 2.238281zm59.992188 185.007812v-76.6875l8-8v36.6875h16v-52.6875l16-16v36.6875h16v-52.6875l16-16v44.6875h16v-44.6875l16 16v52.6875h16v-36.6875l16 16v52.6875h16v-36.6875l8 8v76.6875zm60.6875-160-2.289062 2.289062c-1.519532-3.183593-2.398438-6.65625-2.398438-10.289062 0-13.230469 10.769531-24 24-24s24 10.769531 24 24c0 3.632812-.878906 7.105469-2.398438 10.289062l-2.289062-2.289062c-10.3125-10.3125-28.3125-10.3125-38.625 0zm58.71875-13.832031.1875.183593 2.308594-2.3125c9.105468.105469 18.050781 2.914063 25.5625 7.960938-7.65625 5.152344-16.800782 8-26.089844 8h-2.183594c.527344-2.609375.808594-5.28125.808594-8 0-2-.304688-3.910156-.59375-5.832031zm-4.148438-18.167969h-3.257812v.246094c-2.335938-3.140625-5.105469-5.910156-8.246094-8.246094h.246094v-3.265625c6.632812-6.46875 14.824219-10.773437 23.742188-12.476563-1.703126 8.925782-6.007813 17.117188-12.484376 23.742188zm-29.425781-15.40625c-1.921875-.289062-3.832031-.59375-5.832031-.59375s-3.910156.304688-5.832031.59375l.183593-.1875-2.3125-2.308594c.105469-9.105468 2.914063-18.050781 7.960938-25.5625 5.046875 7.511719 7.855469 16.449219 7.960938 25.554688l-2.3125 2.308594zm-29.585937 7.40625c-3.140625 2.335938-5.910156 5.105469-8.246094 8.246094v-.246094h-3.265625c-6.46875-6.632812-10.773437-14.824219-12.476563-23.742188 8.917969 1.703126 17.117188 6.007813 23.742188 12.484376v3.257812zm-18.148438 24.039062 2.308594 2.3125.1875-.183593c-.289062 1.921875-.59375 3.832031-.59375 5.832031 0 2.71875.28125 5.390625.808594 8h-2.183594c-9.289062 0-18.433594-2.847656-26.089844-8 7.511719-5.046875 16.457032-7.855469 25.5625-7.960938zm128.664063 83.402344-51.449219-51.441406h6.0625c16.488281 0 32.625-6.6875 44.28125-18.34375l5.65625-5.65625-5.65625-5.65625c-8.519531-8.519531-19.457031-14.351562-31.152344-16.886719 6.527344-10.050781 10.0625-21.761719 10.0625-34.023437v-8h-8c-12.261718 0-23.972656 3.535156-34.023437 10.0625-2.535157-11.695313-8.367188-22.625-16.886719-31.152344l-5.65625-5.65625-5.65625 5.65625c-8.519531 8.519531-14.351562 19.449219-16.886719 31.152344-10.050781-6.527344-21.761719-10.0625-34.023437-10.0625h-8v8c0 12.261718 3.535156 23.972656 10.0625 34.023437-11.695313 2.535157-22.625 8.367188-31.152344 16.886719l-5.65625 5.65625 5.65625 5.65625c11.65625 11.65625 27.800781 18.34375 44.28125 18.34375h6.0625l-51.007812 51.007812-17.070313-29.265624 8.734375-43.652344-31.648438-7.90625 8.007813-32-39.613281-9.894532-4.832032-8.289062h23.023438l11.71875-17.585938 6.246094 9.371094c3.425781 5.144532 9.152344 8.214844 15.328125 8.214844 10.160156 0 18.425781-8.265625 18.425781-18.425781v-4.863281c0-.832032-.054688-1.648438-.167969-2.496094l-11.503906-84.34375 21.832031 7.28125 8.503906-8.511719 12.246094 73.480469c1.335938 8.046875 8.25 13.878906 16.425782 13.878906 9.183593 0 16.664062-7.480469 16.664062-16.664062v-23.335938h32v23.335938c0 9.183593 7.480469 16.664062 16.664062 16.664062 8.175782 0 15.089844-5.847656 16.433594-13.921875l16.4375-98.664063 15.152344 9.289063 12.914062-3.949219-13.402343 89.375c-.128907.863282-.199219 1.734375-.199219 2.605469v5.378906c0 9.863281 8.023438 17.886719 17.886719 17.886719 6.816406 0 12.9375-3.792969 15.992187-9.878906l33.976563-67.953125 26.871093 10.753906-21.375 69.460937-36.09375 18.050782 16 32-32 16 18.78125 37.558594c-3.335937 7.273437-7.183593 14.296874-11.640624 20.984374zm27.972656-71.867187 9.578125-4.78125-4.558594 14.816406zm16-48 8.121094-4.054688-3.863281 12.570313zm0 0" />
                                <path class="cls-1" d="m200 392h16v16h-16zm0 0" />
                                <path class="cls-1" d="m168 416h16v16h-16zm0 0" />
                                <path class="cls-1" d="m136 448h16v16h-16zm0 0" />
                                <path class="cls-1" d="m232 416h16v16h-16zm0 0" />
                                <path class="cls-1" d="m264 448h16v16h-16zm0 0" />
                                <path class="cls-1" d="m192 144h16v16h-16zm0 0" />
                                <path class="cls-1" d="m344 184h16v16h-16zm0 0" />
                              </svg>
                            </span> Wedding Gifts
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/160/0'?>">
                            <span class="isvg loaded">
                              <svg viewBox="0 -1 511.99871 511" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <path class="cls-1" d="m380.589844 204.039062 30.082031-1.90625c.050781-.003906.105469-.007812.160156-.011718 21.4375-1.808594 40.679688-13.039063 52.796875-30.820313l23.78125-34.890625c20.699219-30.375 28.71875-67.0625 22.574219-103.300781-1.207031-7.117187-4.847656-13.675781-10.246094-18.460937-5.402343-4.789063-12.347656-7.617188-19.558593-7.960938-36.726563-1.757812-72.175782 10.605469-99.847657 34.796875l-31.789062 27.792969c-16.199219 14.160156-25.042969 34.609375-24.269531 56.113281.003906.050781.003906.105469.007812.160156l1.714844 30.089844c.667968 11.730469-3.632813 23.304687-11.777344 31.734375l-248.351562 255.132812c-6.648438 6.933594-10.082032 16.445313-9.664063 26.785157.460937 11.382812 5.683594 22.5625 13.972656 29.910156 7.488281 6.636719 17.78125 10.417969 28.070313 10.417969 1.101562 0 2.203125-.042969 3.300781-.132813 10.316406-.824219 19.351563-5.371093 25.46875-12.847656l223.464844-277.085937c7.410156-9.117188 18.386719-14.773438 30.109375-15.515626zm-42.039063 5.859376-223.445312 277.0625c-3.414063 4.171874-8.664063 6.742187-14.78125 7.230468-7.277344.582032-14.738281-1.839844-19.964844-6.472656-5.226563-4.636719-8.523437-11.753906-8.816406-19.046875-.25-6.128906 1.667969-11.648437 5.363281-15.5l248.332031-255.113281c11.132813-11.519532 16.992188-27.296875 16.085938-43.289063l-1.714844-30.011719c-.582031-16.832031 6.351563-32.835937 19.035156-43.925781l31.789063-27.792969c24.671875-21.566406 56.289062-32.578124 89.015625-31.023437 3.726562.179687 7.3125 1.640625 10.105469 4.117187 2.792968 2.472657 4.671874 5.863282 5.296874 9.539063 5.476563 32.308594-1.671874 65.011719-20.125 92.089844l-23.78125 34.894531c-9.488281 13.921875-24.546874 22.722656-41.328124 24.164062l-30 1.898438c-15.984376 1.015625-30.945313 8.726562-41.066407 21.179688zm0 0" />
                                <path class="cls-1" d="m497.820312 440.570312-166.519531-151.667968c-3.132812-2.855469-7.984375-2.628906-10.84375.503906-2.851562 3.132812-2.625 7.988281.507813 10.84375l166.476562 151.632812c3.960938 3.660157 6.207032 9.054688 6.328125 15.1875.144531 7.296876-2.71875 14.597657-7.660156 19.539063-4.9375 4.9375-12.226563 7.808594-19.539063 7.660156-6.132812-.121093-11.527343-2.367187-15.148437-6.285156l-148.382813-162.90625c-2.855468-3.136719-7.710937-3.359375-10.84375-.507813-3.132812 2.855469-3.359374 7.710938-.503906 10.84375l148.417969 162.945313c6.523437 7.054687 15.8125 11.054687 26.160156 11.257813.269531.003906.535157.007812.804688.007812 11.121093 0 22.242187-4.511719 29.886719-12.160156 7.835937-7.835938 12.378906-19.308594 12.152343-30.695313-.203125-10.347656-4.199219-19.636719-11.292969-26.199219zm0 0" />
                                <path class="cls-1" d="m92.609375 202.585938c12.703125 11.703124 29.207031 18.375 46.472656 18.789062.054688.003906.109375.003906.160157.003906l30.140624.09375c11.75.035156 23.042969 5.023438 30.96875 13.660156l13.277344 14.574219c1.515625 1.664063 3.589844 2.507813 5.675782 2.507813 1.84375 0 3.695312-.660156 5.164062-2 3.136719-2.855469 3.363281-7.710938.507812-10.84375l-13.296874-14.59375c-10.828126-11.804688-26.226563-18.601563-42.246094-18.65625l-30.058594-.09375c-13.355469-.339844-26.125-5.453125-36.019531-14.410156l-87.347657-103.835938c-.890624-1.0625-.824218-2.601562.15625-3.582031.671876-.675781 1.460938-.773438 1.871094-.773438s1.199219.097657 1.875.773438l79.507813 79.511719c7.859375 7.859374 20.648437 7.859374 28.507812-.003907l9.34375-9.339843v-.003907l16.589844-16.589843s.003906 0 .003906-.003907c0 0 .003907-.003906.003907-.003906l9.339843-9.339844c7.859375-7.859375 7.859375-20.648437 0-28.507812l-79.507812-79.507813c-1.03125-1.03125-1.03125-2.714844 0-3.746094.980469-.980468 2.519531-1.046874 3.582031-.15625l103.835938 87.351563c8.960937 9.890625 14.074218 22.664063 14.414062 36.015625l.089844 30.0625c.054687 16.015625 6.855468 31.414062 18.675781 42.265625l14.226563 12.957031c3.136718 2.855469 7.988281 2.628906 10.84375-.503906 2.851562-3.136719 2.625-7.988281-.507813-10.84375l-14.203125-12.9375c-8.660156-7.945312-13.644531-19.242188-13.683594-30.988281l-.09375-30.140625c0-.054688 0-.109375-.003906-.164063-.414062-17.265625-7.085938-33.769531-18.789062-46.472656-.21875-.238281-.453126-.464844-.703126-.675781l-104.222656-87.671875c-7.203125-6.0625-17.65625-5.609375-24.3125 1.046875-7.019531 7.019531-7.019531 18.4375 0 25.453125l79.507813 79.511719c1.875 1.875 1.875 4.925781 0 6.800781l-3.917969 3.914062-88.613281-88.609375c-2.996094-3-7.855469-3-10.851563 0-2.996094 2.996094-2.996094 7.855469 0 10.851563l88.613282 88.613281-5.742188 5.738281-88.613281-88.609375c-2.996094-2.996094-7.855469-2.996094-10.851563 0-3 2.996094-3 7.855469 0 10.851563l88.609375 88.613281-3.914062 3.917969c-1.875 1.875-4.925781 1.875-6.800781 0l-79.511719-79.507813c-3.398438-3.398437-7.917969-5.273437-12.726563-5.273437s-9.328125 1.875-12.726562 5.273437c-6.65625 6.65625-7.105469 17.109375-1.046875 24.316406l87.675781 104.21875c.207031.25.433594.484376.671875.703126zm0 0" />
                              </svg>
                            </span> Caterers
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/147/0'?>">
                            <span class="isvg loaded">
                              <svg viewBox="0 -1 480 480" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <path class="cls-1" d="m78.878906 87.941406c1.472656 1.503906 3.496094 2.34375 5.601563 2.320313 1.066406.023437 2.128906-.164063 3.121093-.558594 1.921876-.855469 3.460938-2.394531 4.320313-4.320313.390625-.992187.582031-2.050781.558594-3.121093.019531-2.101563-.816407-4.125-2.320313-5.597657-.730468-.746093-1.601562-1.34375-2.558594-1.761718-1.480468-.550782-3.078124-.71875-4.640624-.480469-.480469.160156-1.039063.320313-1.519532.480469-.480468.160156-.960937.480468-1.363281.722656-.847656.632812-1.601563 1.390625-2.238281 2.238281-.238282.398438-.480469.878907-.71875 1.359375-.242188.480469-.320313 1.039063-.480469 1.519532-.066406.503906-.09375 1.011718-.082031 1.519531-.023438 1.070312.167968 2.128906.5625 3.121093.414062.960938 1.011718 1.828126 1.757812 2.558594zm0 0" />
                                <path class="cls-1" d="m61.921875 93.625c-2.351563 2.25-3.054687 5.730469-1.761719 8.71875.386719.972656.988282 1.847656 1.761719 2.558594 1.484375 1.542968 3.535156 2.410156 5.679687 2.402344 1.042969-.019532 2.074219-.238282 3.039063-.640626.972656-.386718 1.847656-.988281 2.558594-1.761718.746093-.730469 1.34375-1.601563 1.761719-2.558594 1.167968-3 .480468-6.40625-1.761719-8.71875-3.160157-3.003906-8.117188-3.003906-11.277344 0zm0 0" />
                                <path class="cls-1" d="m56.238281 110.582031c-1.476562-1.527343-3.511719-2.390625-5.636719-2.390625-2.128906 0-4.164062.863282-5.640624 2.390625-.792969.726563-1.394532 1.632813-1.761719 2.640625-.410157.960938-.625 1.996094-.640625 3.039063.023437 2.136719.886718 4.175781 2.402344 5.679687 1.507812 1.453125 3.507812 2.28125 5.597656 2.320313 2.121094-.015625 4.15625-.84375 5.679687-2.320313 1.492188-1.511718 2.328125-3.554687 2.320313-5.679687.015625-1.039063-.171875-2.070313-.558594-3.039063-.394531-.992187-.996094-1.890625-1.761719-2.640625zm0 0" />
                                <path class="cls-1" d="m84.480469 124.261719c1.070312-.011719 2.128906-.226563 3.121093-.636719.953126-.390625 1.824219-.960938 2.558594-1.683594 1.492188-1.511718 2.324219-3.554687 2.320313-5.679687.015625-1.039063-.175781-2.070313-.558594-3.039063-.398437-.992187-.996094-1.890625-1.761719-2.640625-1.480468-1.527343-3.515625-2.390625-5.640625-2.390625s-4.160156.863282-5.640625 2.390625c-.765625.75-1.363281 1.648438-1.757812 2.640625-.410156.960938-.628906 1.996094-.640625 3.039063.03125 4.40625 3.59375 7.972656 8 8zm0 0" />
                                <path class="cls-1" d="m73.199219 127.542969c-3.175781-2.960938-8.101563-2.960938-11.277344 0-.792969.726562-1.394531 1.632812-1.761719 2.640625-.410156.960937-.628906 1.996094-.640625 3.039062-.019531 3.25 1.929688 6.1875 4.933594 7.4375 3 1.246094 6.457031.550782 8.746094-1.757812 1.492187-1.511719 2.328125-3.554688 2.320312-5.679688.015625-1.039062-.175781-2.074218-.558593-3.039062-.394532-.992188-.996094-1.894532-1.761719-2.640625zm0 0" />
                                <path class="cls-1" d="m101.519531 73.304688c1.039063.015624 2.074219-.175782 3.039063-.5625.960937-.414063 1.828125-1.011719 2.5625-1.757813.769531-.710937 1.371094-1.585937 1.757812-2.5625.402344-.960937.621094-1.992187.640625-3.039063.007813-2.140624-.859375-4.191406-2.398437-5.679687-.710938-.769531-1.585938-1.371094-2.5625-1.761719-2.996094-1.183594-6.414063-.496094-8.71875 1.761719-1.519532 1.496094-2.355469 3.550781-2.320313 5.679687 0 2.113282.847657 4.140626 2.347657 5.628907 1.503906 1.488281 3.539062 2.3125 5.652343 2.292969zm0 0" />
                                <path class="cls-1" d="m115.441406 55.785156c.964844.382813 2 .574219 3.039063.558594 2.125.003906 4.167969-.828125 5.679687-2.320312 1.472656-1.527344 2.304688-3.558594 2.320313-5.679688-.042969-2.09375-.871094-4.09375-2.320313-5.601562-2.3125-2.242188-5.71875-2.929688-8.71875-1.757813-1.011718.363281-1.914062.96875-2.640625 1.757813-.746093.734374-1.34375 1.601562-1.761719 2.5625-.382812.964843-.574218 2-.558593 3.039062-.039063 2.128906.800781 4.183594 2.320312 5.679688.746094.765624 1.644531 1.363281 2.640625 1.761718zm0 0" />
                                <path class="cls-1" d="m56.238281 42.664062c-2.316406-2.238281-5.734375-2.894531-8.71875-1.679687-2.007812.726563-3.59375 2.308594-4.320312 4.320313-.410157.960937-.625 1.992187-.640625 3.039062.015625 2.121094.847656 4.152344 2.320312 5.679688.796875.703124 1.683594 1.296874 2.640625 1.761718.96875.382813 2 .574219 3.039063.558594.539062.027344 1.078125-.027344 1.601562-.160156.488282-.097656.972656-.230469 1.441406-.398438.496094-.238281.976563-.503906 1.4375-.800781.421876-.296875.820313-.617187 1.199219-.960937.347657-.378907.667969-.78125.960938-1.199219.296875-.464844.566406-.945313.800781-1.441407.171875-.46875.304688-.949218.398438-1.441406.132812-.519531.1875-1.058594.160156-1.597656.015625-1.039062-.171875-2.074219-.558594-3.039062-.464844-.957032-1.054688-1.84375-1.761719-2.640626zm0 0" />
                                <path class="cls-1" d="m73.199219 25.703125-1.199219-.960937c-.878906-.570313-1.855469-.976563-2.878906-1.199219-1.558594-.324219-3.179688-.15625-4.640625.480469-.957031.386718-1.824219.957031-2.558594 1.679687-1.5 1.515625-2.359375 3.550781-2.402344 5.679687.015625.535157.066407 1.070313.160157 1.601563l.480468 1.4375c.207032.496094.449219.976563.71875 1.441406.324219.417969.671875.820313 1.042969 1.199219.734375.722656 1.601563 1.292969 2.558594 1.679688.949219.449218 1.988281.667968 3.039062.640624.535157-.011718 1.070313-.066406 1.601563-.160156 1.023437-.222656 2-.628906 2.878906-1.199218.417969-.296876.820312-.617188 1.199219-.960938.367187-.359375.691406-.761719.960937-1.199219.296875-.460937.5625-.945312.800782-1.441406.167968-.46875.304687-.949219.398437-1.4375.132813-.523437.1875-1.0625.160156-1.601563.015625-1.039062-.175781-2.074218-.558593-3.039062-.4375-.972656-1.03125-1.863281-1.761719-2.640625zm0 0" />
                                <path class="cls-1" d="m39.28125 59.703125c-.382812-.367187-.78125-.714844-1.203125-1.039063-.460937-.273437-.941406-.511718-1.4375-.722656l-1.441406-.476562c-1.558594-.328125-3.179688-.160156-4.640625.476562-.988282.40625-1.886719 1.003906-2.636719 1.761719-1.453125 1.507813-2.28125 3.507813-2.320313 5.601563.011719.535156.066407 1.070312.160157 1.597656.222656 1.027344.628906 2 1.199219 2.882812l.960937 1.199219c.773437.730469 1.664063 1.324219 2.636719 1.757813.96875.386718 2 .578124 3.042968.5625.535157.023437 1.074219-.027344 1.597657-.160157.492187-.097656.972656-.230469 1.441406-.402343.496094-.234376.976563-.5 1.4375-.800782.441406-.269531.84375-.589844 1.203125-.957031.34375-.382813.664062-.78125.957031-1.199219.574219-.882812.980469-1.855468 1.203125-2.882812.089844-.527344.144532-1.0625.160156-1.597656.027344-1.050782-.191406-2.09375-.640624-3.042969-.390626-.953125-.960938-1.824219-1.679688-2.558594zm0 0" />
                                <path class="cls-1" d="m73.199219 59.703125c-.378907-.367187-.78125-.714844-1.199219-1.039063-.4375-.273437-.890625-.511718-1.359375-.722656-.480469-.15625-1.039063-.316406-1.519531-.476562-1.558594-.324219-3.179688-.15625-4.640625.476562-1.925781.859375-3.464844 2.398438-4.320313 4.320313-.410156.964843-.628906 1.996093-.640625 3.042969.015625.535156.066407 1.070312.160157 1.597656.160156.480468.320312 1.039062.480468 1.519531.207032.472656.449219.925781.71875 1.363281.324219.417969.671875.816406 1.042969 1.199219.730469.746094 1.597656 1.34375 2.558594 1.757813.964843.386718 2 .578124 3.039062.5625.539063.023437 1.078125-.027344 1.601563-.160157.515625-.097656 1.023437-.230469 1.519531-.402343.46875-.234376.925781-.503907 1.359375-.800782.871094-.550781 1.609375-1.285156 2.160156-2.15625.296875-.4375.5625-.890625.800782-1.363281.167968-.496094.304687-1.003906.398437-1.519531.132813-.523438.1875-1.0625.160156-1.597656.015625-1.042969-.175781-2.074219-.558593-3.042969-.417969-.957031-1.015626-1.828125-1.761719-2.558594zm0 0" />
                                <path class="cls-1" d="m77.121094 51.464844c.238281.476562.480468.878906.71875 1.359375.324218.417969.671875.820312 1.039062 1.199219.34375.386718.75.710937 1.199219.960937.425781.3125.882813.582031 1.363281.800781.496094.167969 1.003906.300782 1.519532.398438.496093.132812 1.007812.1875 1.519531.160156 2.128906.019531 4.175781-.816406 5.679687-2.320312 1.519532-1.496094 2.355469-3.550782 2.320313-5.679688.027343-.511719-.027344-1.023438-.160157-1.519531-.085937-.519531-.21875-1.027344-.398437-1.519531-.4375-.972657-1.03125-1.867188-1.761719-2.640626-.734375-.722656-1.605468-1.292968-2.558594-1.679687-1.460937-.632813-3.082031-.800781-4.640624-.480469-.527344.085938-1.039063.246094-1.519532.480469-.492187.15625-.953125.402344-1.363281.71875-.398437.320313-.878906.640625-1.199219.960937-1.492187 1.511719-2.324218 3.554688-2.320312 5.679688-.011719.535156.015625 1.070312.082031 1.597656.160156.480469.320313 1.042969.480469 1.523438zm0 0" />
                                <path class="cls-1" d="m95.839844 37.0625c.34375.386719.75.710938 1.199218.960938.4375.296874.890626.5625 1.359376.800781.496093.167969 1.003906.304687 1.523437.398437.519531.132813 1.058594.1875 1.597656.160156 2.105469.019532 4.128907-.816406 5.601563-2.320312.789062-.726562 1.394531-1.628906 1.757812-2.640625.410156-.960937.628906-1.992187.640625-3.039063-.023437-2.132812-.886719-4.175781-2.398437-5.679687-.738282-.722656-1.605469-1.292969-2.5625-1.679687-1.457032-.640626-3.078125-.808594-4.636719-.480469-1.027344.222656-2.003906.628906-2.882813 1.199219-.398437.320312-.878906.640624-1.199218.960937-1.492188 1.511719-2.324219 3.554687-2.320313 5.679687-.015625 1.039063.175781 2.074219.558594 3.039063.398437.996094.996094 1.894531 1.761719 2.640625zm0 0" />
                                <path class="cls-1" d="m58 79.222656c-.21875-.480468-.488281-.933594-.800781-1.359375-.25-.453125-.574219-.859375-.960938-1.199219-.378906-.371093-.777343-.71875-1.199219-1.039062-.480468-.242188-.878906-.480469-1.359374-.722656-.480469-.238282-1.039063-.320313-1.519532-.480469-2.644531-.457031-5.347656.375-7.28125 2.242187-.320312.320313-.640625.800782-.957031 1.199219-.320313.40625-.5625.867188-.722656 1.359375-.230469.480469-.390625.992188-.480469 1.519532-.089844.503906-.144531 1.011718-.160156 1.519531.003906 1.074219.222656 2.132812.640625 3.121093.386719.957032.960937 1.824219 1.679687 2.558594.777344.730469 1.667969 1.328125 2.640625 1.761719.492188.179687 1.003907.3125 1.519531.398437.496094.132813 1.007813.1875 1.519532.160157 2.132812.039062 4.1875-.800781 5.679687-2.320313 1.507813-1.503906 2.34375-3.550781 2.320313-5.679687.027344-.511719-.027344-1.023438-.160156-1.519531-.09375-.515626-.226563-1.023438-.398438-1.519532zm0 0" />
                                <path class="cls-1" d="m41.039062 96.183594c-.234374-.46875-.503906-.925782-.800781-1.359375-.246093-.453125-.570312-.859375-.957031-1.199219-.75-.765625-1.648438-1.367188-2.640625-1.761719-3-1.1875-6.417969-.496093-8.71875 1.761719-.320313.316406-.640625.796875-.960937 1.199219-.570313.878906-.976563 1.855469-1.199219 2.878906-.09375.527344-.148438 1.0625-.160157 1.601563.039063 2.089843.867188 4.089843 2.320313 5.597656 1.503906 1.515625 3.542969 2.378906 5.679687 2.402344 1.042969-.015626 2.078126-.230469 3.039063-.640626 1.007813-.367187 1.914063-.96875 2.640625-1.761718 1.5-1.472656 2.339844-3.496094 2.320312-5.597656.023438-.539063-.027343-1.078126-.160156-1.601563-.097656-.515625-.230468-1.023437-.402344-1.519531zm0 0" />
                                <path class="cls-1" d="m101.519531 107.304688c1.046875-.015626 2.078125-.230469 3.039063-.640626 1.925781-.859374 3.464844-2.398437 4.320312-4.320312.410156-.960938.628906-1.996094.640625-3.039062.007813-2.144532-.859375-4.195313-2.398437-5.679688-1.890625-1.875-4.589844-2.683594-7.199219-2.160156-.519531.09375-1.027344.226562-1.523437.398437-.476563.238281-.878907.480469-1.359376.71875-.847656.636719-1.601562 1.390625-2.238281 2.242188-.242187.480469-.480469.878906-.722656 1.359375-.167969.496094-.300781 1.003906-.398437 1.519531-.132813.523437-.1875 1.0625-.160157 1.601563-.019531 2.101562.816407 4.125 2.320313 5.597656 1.488281 1.542968 3.539062 2.410156 5.679687 2.402344zm0 0" />
                                <path class="cls-1" d="m112.800781 87.941406c.746094.765625 1.644531 1.367188 2.640625 1.761719.964844.386719 2 .574219 3.039063.558594 2.125.007812 4.167969-.824219 5.679687-2.320313.722656-.734375 1.292969-1.601562 1.679688-2.558594.410156-.988281.628906-2.046874.640625-3.121093-.015625-2.09375-.847657-4.105469-2.320313-5.597657-2.3125-2.246093-5.71875-2.933593-8.71875-1.761718-.996094.394531-1.894531.996094-2.640625 1.761718-1.503906 1.472657-2.339843 3.496094-2.320312 5.597657-.023438 1.070312.167969 2.128906.558593 3.121093.417969.960938 1.015626 1.828126 1.761719 2.558594zm0 0" />
                                <path class="cls-1" d="m132.398438 72.742188c.96875.386718 2 .578124 3.042968.5625 3.214844-.015626 6.109375-1.953126 7.347656-4.917969 1.238282-2.96875.582032-6.386719-1.667968-8.683594-2.3125-2.242187-5.71875-2.929687-8.722656-1.761719-1.007813.367188-1.914063.972656-2.636719 1.761719-3.101563 3.121094-3.101563 8.160156 0 11.28125.746093.765625 1.644531 1.363281 2.636719 1.757813zm0 0" />
                                <path class="cls-1" d="m474.910156 461.976562-36.652344-18.144531c-13.671874-6.703125-22.316406-20.625-22.257812-35.847656v-6.335937c-.019531-20.109376-10.789062-38.671876-28.238281-48.664063l-43.242188-24.6875c3.324219-8.804687 1.199219-18.738281-5.441406-25.410156l-5.832031-5.832031c7.433594-9.148438 7.09375-22.347657-.796875-31.101563l-135.074219-149.425781 11.59375-11.59375c1.5-1.5 2.34375-3.535156 2.34375-5.660156 0-2.121094-.84375-4.15625-2.34375-5.65625l-22.625-22.625c-1.5-1.5-3.535156-2.34375-5.65625-2.34375-1.546875.042968-3.050781.546874-4.3125 1.445312-8.945312-43.050781-48.296875-72.890625-92.164062-69.886719-43.867188 3-78.789063 37.917969-81.789063 81.789063-3 43.867187 26.839844 83.21875 69.890625 92.164062-.898438 1.261719-1.402344 2.761719-1.449219 4.3125 0 2.121094.84375 4.15625 2.34375 5.65625l22.625 22.621094c1.5 1.503906 3.535157 2.347656 5.660157 2.347656s4.160156-.84375 5.660156-2.347656l11.582031-11.589844 149.464844 135.09375c8.722656 7.964844 21.976562 8.308594 31.097656.800782l5.839844 5.839843c7.601562 7.65625 19.410156 9.226563 28.75 3.824219l45.945312 26.234375c12.445313 7.121094 20.136719 20.351563 20.167969 34.695313v6.335937c-.078125 21.324219 12.042969 40.816406 31.199219 50.183594l36.65625 18.144531c1.101562.535156 2.3125.808594 3.535156.796875 3.746094.035156 7.011719-2.527344 7.863281-6.171875.855469-3.644531-.933594-7.394531-4.300781-9.027344zm-435.644531-424.929687c20.074219-20.078125 50.078125-26.480469 76.601563-16.347656 26.523437 10.128906 44.617187 34.902343 46.195312 63.253906l-4 4c2.691406-2.699219 3.105469-6.917969.988281-10.089844-2.113281-3.167969-6.167969-4.40625-9.691406-2.960937-.972656.4375-1.863281 1.03125-2.640625 1.761718-1.46875 1.492188-2.300781 3.503907-2.320312 5.597657.011718.539062.066406 1.074219.160156 1.601562.089844.527344.25 1.039063.480468 1.519531.160157.492188.402344.953126.722657 1.359376.277343.429687.601562.832031.957031 1.199218 1.515625 1.5 3.550781 2.359375 5.679688 2.402344 2.128906-.03125 4.15625-.894531 5.65625-2.402344l-16.925782 16.929688c1.46875-1.496094 2.296875-3.503906 2.3125-5.601563-.019531-1.070312-.238281-2.125-.640625-3.117187-.386719-.957032-.960937-1.824219-1.679687-2.5625-2.3125-2.242188-5.71875-2.929688-8.722656-1.757813-.992188.394531-1.890626.996094-2.636719 1.757813-.722657.738281-1.292969 1.605468-1.683594 2.5625-.402344.992187-.617187 2.046875-.636719 3.117187.015625 2.097657.847656 4.105469 2.320313 5.601563.722656.789062 1.628906 1.394531 2.636719 1.761718.964843.410157 1.996093.625 3.042968.636719 2.128906-.027343 4.160156-.886719 5.664063-2.398437l-16.800781 16.800781c1.347656-1.488281 2.117187-3.414063 2.160156-5.425781-.011719-1.042969-.230469-2.078125-.640625-3.039063-.367188-.988281-.941407-1.886719-1.679688-2.640625-.796875-.703125-1.683593-1.296875-2.640625-1.757812-1.949218-.800782-4.132812-.800782-6.078125 0-1.996093.820312-3.582031 2.402344-4.402343 4.398437-.746094 1.957031-.746094 4.121094 0 6.082031.464843.953126 1.054687 1.84375 1.761718 2.636719.75.742188 1.648438 1.3125 2.640625 1.679688.960938.410156 1.992188.628906 3.039063.640625 2.007812-.042969 3.933594-.808594 5.421875-2.160156l-16.796875 16.800781c1.507812-1.5 2.371094-3.535157 2.398437-5.664063-.011719-1.042968-.230469-2.078125-.640625-3.039062-.367187-1.007813-.96875-1.914063-1.757812-2.640625-3.144532-3.050781-8.140625-3.050781-11.28125 0-.765625.746093-1.363282 1.648437-1.761719 2.640625-.382813.964844-.574219 2-.558594 3.039062-.007812 2.125.828125 4.167969 2.320313 5.679688.734375.722656 1.605468 1.292968 2.558594 1.679687.992187.40625 2.050781.621094 3.121093.640625 2.097657-.011718 4.105469-.839844 5.601563-2.3125l-16.929688 16.929688c1.507813-1.5 2.367188-3.53125 2.398438-5.65625-.039063-2.132813-.898438-4.164063-2.398438-5.679688-.367187-.359375-.769531-.679687-1.199218-.960937-.410157-.316407-.871094-.558594-1.359376-.71875-.484374-.234375-.996093-.394531-1.523437-.480469-2.605469-.488281-5.289063.316406-7.199219 2.160156-.730468.773438-1.324218 1.667969-1.757812 2.640625-.410156.960938-.628906 1.992188-.640625 3.039063-.015625 3.242187 1.925781 6.171875 4.917969 7.421875 2.996093 1.246093 6.445312.566406 8.738281-1.726563l-4 4c-28.359375-1.582031-53.136719-19.683594-63.261719-46.21875s-3.707031-56.542968 16.390625-76.613281zm62.230469 152.738281-11.320313-11.3125 90.511719-90.511718 11.3125 11.316406-11.3125 11.304687zm177.433594 128.597656-148.867188-134.550781 56-56 134.539062 148.878907c2.855469 3.164062 2.734376 8.011718-.28125 11.023437l-30.398437 30.402344c-3.019531 2.984375-7.84375 3.09375-10.992187.246093zm37.519531 7.199219-5.65625-5.65625 11.320312-11.320312 5.648438 5.65625c3.125 3.125 3.125 8.191406.003906 11.316406-3.125 3.128906-8.191406 3.128906-11.316406.003906zm0 0" />
                                <path class="cls-1" d="m476.671875 31.296875c-2.082031-1.503906-4.761719-1.914063-7.199219-1.105469l-96 32c-3.269531 1.089844-5.472656 4.148438-5.472656 7.59375v68.445313c-4.84375-2.878907-10.367188-4.414063-16-4.445313-17.671875 0-32 14.324219-32 32 0 17.671875 14.328125 32 32 32s32-14.328125 32-32v-90.234375l80-26.671875v57.351563c-4.84375-2.878907-10.367188-4.414063-16-4.445313-17.671875 0-32 14.324219-32 32 0 17.671875 14.328125 32 32 32s32-14.328125 32-32v-96c0-2.574218-1.242188-4.988281-3.328125-6.488281zm-124.671875 150.488281c-8.835938 0-16-7.164062-16-16 0-8.839844 7.164062-16 16-16s16 7.160156 16 16c0 8.835938-7.164062 16-16 16zm96-32c-8.835938 0-16-7.164062-16-16 0-8.839844 7.164062-16 16-16s16 7.160156 16 16c0 8.835938-7.164062 16-16 16zm0 0" />
                                <path class="cls-1" d="m165.800781 294.09375-112 32c-3.433593.984375-5.800781 4.121094-5.800781 7.691406v84.445313c-4.84375-2.878907-10.367188-4.414063-16-4.445313-17.671875 0-32 14.324219-32 32 0 17.671875 14.328125 32 32 32s32-14.328125 32-32v-73.953125l96-27.25v41.648438c-4.84375-2.878907-10.367188-4.414063-16-4.445313-17.671875 0-32 14.324219-32 32 0 17.671875 14.328125 32 32 32s32-14.328125 32-32v-112c0-2.511718-1.179688-4.875-3.183594-6.386718-2.003906-1.511719-4.601562-1.992188-7.015625-1.304688zm-133.800781 167.691406c-8.835938 0-16-7.164062-16-16 0-8.839844 7.164062-16 16-16s16 7.160156 16 16c0 8.835938-7.164062 16-16 16zm32-106.585937v-15.382813l96-27.425781v15.570313zm80 74.585937c-8.835938 0-16-7.164062-16-16 0-8.839844 7.164062-16 16-16s16 7.160156 16 16c0 8.835938-7.164062 16-16 16zm0 0" />
                              </svg>
                            </span> Music & Entertainment
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/148/0'?>">
                            <span class="isvg loaded">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <g>
                                  <path class="cls-1" d="M62,38h-1V17c0-1.654-1.346-3-3-3H43.964C43.987,13.754,44,13.505,44,13.255c0-3.829-2.876-7.009-6.549-7.241   C35.413,5.884,33.412,6.667,32,8.105c-1.411-1.437-3.4-2.226-5.451-2.091C22.876,6.246,20,9.426,20,13.255   c0,0.25,0.013,0.499,0.036,0.745H6c-1.654,0-3,1.346-3,3v21H2c-0.553,0-1,0.447-1,1v14v4c0,0.553,0.447,1,1,1h10   c0.553,0,1-0.447,1-1v-3h38v3c0,0.553,0.447,1,1,1h10c0.553,0,1-0.447,1-1v-4V39C63,38.447,62.553,38,62,38z M12,52H3v-8h58v8h-9   H12z M58,16c0.552,0,1,0.449,1,1v5h-1c-0.911,0-1.769,0.355-2.414,1L55,23.585c-0.535,0.535-1.465,0.535-2,0L52.414,23   c-1.291-1.289-3.537-1.29-4.828,0L47,23.585c-0.535,0.535-1.465,0.535-2,0L44.414,23c-1.291-1.289-3.537-1.29-4.828,0L39,23.585   C38.732,23.853,38.378,24,38,24h-1.586l5.352-5.352c0.765-0.765,1.342-1.667,1.72-2.648H58z M26.674,8.01   C26.784,8.003,26.894,8,27.003,8c1.684,0,3.223,0.821,4.164,2.239c0.371,0.558,1.295,0.558,1.666,0   c1.003-1.51,2.688-2.339,4.493-2.229C39.947,8.176,42,10.479,42,13.255c0,1.503-0.585,2.916-1.648,3.979L32,25.586l-8.352-8.352   C22.585,16.171,22,14.758,22,13.255C22,10.479,24.053,8.176,26.674,8.01z M6,16h14.514c0.378,0.981,0.955,1.883,1.72,2.648   L27.586,24H26c-0.378,0-0.732-0.147-1-0.414L24.414,23c-1.291-1.289-3.537-1.29-4.828,0L19,23.585c-0.535,0.535-1.465,0.535-2,0   L16.414,23c-1.291-1.289-3.537-1.29-4.828,0L11,23.585c-0.535,0.535-1.465,0.535-2,0L8.414,23C7.769,22.355,6.911,22,6,22H5v-5   C5,16.449,5.448,16,6,16z M5,24h1c0.378,0,0.732,0.147,1,0.414L7.586,25c1.291,1.289,3.537,1.29,4.828,0L13,24.415   c0.535-0.535,1.465-0.535,2,0L15.586,25c1.291,1.289,3.537,1.29,4.828,0L21,24.415c0.535-0.535,1.465-0.535,2,0L23.586,25   c0.646,0.645,1.503,1,2.414,1h3.586l1.707,1.707C31.48,27.895,31.734,28,32,28s0.52-0.105,0.707-0.293L34.414,26H38   c0.911,0,1.769-0.355,2.414-1L41,24.415c0.535-0.535,1.465-0.535,2,0L43.586,25c1.291,1.289,3.537,1.29,4.828,0L49,24.415   c0.535-0.535,1.465-0.535,2,0L51.586,25c0.646,0.645,1.503,1,2.414,1s1.769-0.355,2.414-1L57,24.415C57.268,24.147,57.622,24,58,24   h1v14h-6v-3c0-0.553-0.447-1-1-1H36c-0.553,0-1,0.447-1,1v3h-6v-3c0-0.553-0.447-1-1-1H12c-0.553,0-1,0.447-1,1v3H5V24z M51,38H37   v-2h14V38z M27,38H13v-2h14V38z M4,40h8h16h8h16h8h1v2H3v-2H4z M11,56H3v-2h8V56z M61,56h-8v-2h8V56z" />
                                  <path class="cls-1" d="M40,13c0-1.654-1.346-3-3-3v2c0.552,0,1,0.449,1,1s-0.448,1-1,1v2C38.654,16,40,14.654,40,13z" />
                                </g>
                              </svg>
                            </span> Hotel Accommodation
                          </a>
                        </li>
                      </ul>
                      <!--<ul class="col">
                        <li>
                          <a class="dropdown-item" href="<?php echo base_url().'GetVendor/vendorbycategory/137/0'?>">
                            <span class="isvg loaded">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 472.427 472.427" style="enable-background:new 0 0 472.427 472.427;" xml:space="preserve">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <g>
                                  <path class="cls-1" d="M238.894,42.723c-13.255,0-24,10.745-24,24c0,13.255,10.745,24,24,24v-16c-4.418,0-8-3.582-8-8c0-4.418,3.582-8,8-8
                                                           s8,3.582,8,8h16C262.894,53.468,252.148,42.723,238.894,42.723z" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M352.214,56.427h-48.056c0.013-3.277-0.489-6.535-1.488-9.656c-3.623-11.285-13.377-19.507-25.112-21.168l-7.848-1.136
                                                           l-3.52-7.12c-7.597-15.402-26.242-21.729-41.644-14.132c-6.138,3.027-11.105,7.995-14.132,14.132l-3.512,7.12l-7.856,1.136
                                                           c-11.732,1.664-21.482,9.885-25.104,21.168c-1.001,3.12-1.506,6.379-1.496,9.656h-52.232c-48.577,0.057-87.943,39.423-88,88v320
                                                           c0,4.418,3.582,8,8,8h29.8c39.765,0.001,72.001-32.234,72.002-71.998c0-8.099-1.366-16.141-4.042-23.786l-25.76-73.592v-37.6
                                                           c57.236-24.447,98.269-76.128,109.104-137.416c3.478-0.502,6.848-1.584,9.968-3.2l7.024-3.696l7.024,3.696
                                                           c1.79,0.92,3.665,1.662,5.6,2.216c10.554,61.702,51.71,113.827,109.28,138.408v37.6l-25.76,73.6
                                                           c-13.127,37.535,6.66,78.605,44.196,91.732c7.638,2.671,15.672,4.036,23.764,4.036h29.8c4.418,0,8-3.582,8-8v-320
                                                           C440.156,95.85,400.791,56.485,352.214,56.427z M48.214,280.059c16.314-0.704,32.458-3.599,48-8.608v24.976h-48V280.059z
                                                           M122.862,381.931c6.113,17.117,3.431,36.144-7.176,50.904c-10.43,14.882-27.499,23.699-45.672,23.592h-21.8v-144h16v88h16v-88
                                                           h18.328L122.862,381.931z M111.614,248.219c30.708-26.229,48.455-64.543,48.6-104.928v-6.864h-16v6.864
                                                           c-0.232,48.956-29.441,93.126-74.4,112.504c27.203-30.733,42.276-70.325,42.4-111.368v-40h-16v40
                                                           c-0.109,41.957-17.466,82.023-48,110.8v-110.8c0.044-39.746,32.254-71.956,72-72h56.696c1.364,2.274,3.012,4.366,4.904,6.224
                                                           l5.688,5.544l-1.336,7.824c-2.616,14.523,5.476,28.852,19.264,34.112C195.715,179.592,160.771,225.067,111.614,248.219z
                                                           M252.774,110.683l-10.736-5.648c-1.15-0.605-2.429-0.921-3.728-0.92c-1.298,0-2.577,0.313-3.728,0.912l-10.744,5.656
                                                           c-7.377,3.885-16.506,1.055-20.392-6.321c-1.551-2.945-2.085-6.319-1.52-9.599l2.048-12c0.446-2.594-0.413-5.241-2.296-7.08
                                                           l-8.664-8.48c-4.191-3.969-5.695-10.009-3.856-15.48c1.716-5.508,6.473-9.519,12.192-10.28l12-1.744
                                                           c2.604-0.383,4.854-2.022,6.016-4.384l5.392-10.888c3.692-7.48,12.749-10.551,20.229-6.859c2.978,1.47,5.389,3.881,6.859,6.859
                                                           l5.376,10.888c1.163,2.364,3.417,4.004,6.024,4.384l12,1.744c8.255,1.202,13.972,8.869,12.769,17.123
                                                           c-0.478,3.284-2.025,6.32-4.401,8.637l-8.68,8.472c-1.886,1.84-2.745,4.491-2.296,7.088l2.056,12
                                                           c1.41,8.222-4.111,16.03-12.333,17.44C259.085,112.765,255.715,112.231,252.774,110.683z M424.214,456.427h-21.8
                                                           c-30.928-0.005-55.996-25.081-55.991-56.009c0.001-6.295,1.064-12.545,3.143-18.487l24.32-69.504h18.328v88h16v-88h16V456.427z
                                                           M424.214,296.427h-48v-24.976c15.542,5.009,31.686,7.904,48,8.608V296.427z M424.214,255.227
                                                           c-30.534-28.777-47.891-68.843-48-110.8v-40h-16v40c0.127,41.045,15.2,80.638,42.4,111.376
                                                           c-44.952-19.391-74.157-63.557-74.4-112.512v-6.864h-16v6.864c0.145,40.385,17.892,78.699,48.6,104.928
                                                           c-48.746-22.953-83.546-67.867-93.6-120.8c15.842-3.874,25.98-19.354,23.2-35.424l-1.344-7.824l5.688-5.544
                                                           c1.904-1.849,3.566-3.932,4.944-6.2h52.512c39.746,0.044,71.956,32.254,72,72V255.227z" />
                                </g>
                                <g>
                                  <rect class="cls-1" x="0.214" y="280.427" />
                                </g>
                                <g>
                                  <rect class="cls-1" x="0.214" y="248.427" />
                                </g>
                                <g>
                                  <path class="cls-1" d="M352.214,24.427h-16v16h16c57.41,0.066,103.934,46.59,104,104v56h16v-56C472.139,78.184,418.457,24.502,352.214,24.427z" />
                                </g>
                                <g>
                                  <rect class="cls-1" x="456.214" y="216.427" />
                                </g>
                              </svg>
                            </span> Decorators
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url().'GetVendor/vendorbycategory/173/0'?>" class="dropdown-item">
                            <span class="isvg loaded">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.087 511.087">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #4a4a4a;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <path class="cls-1" d="M501.6,384.702h-27.223l-43.558-41.869l63.82-55.88c9.007-7.886,12.265-20.906,7.975-32.101  c-4.305-11.237-15.411-18.716-27.418-18.589c-6.851,0.073-13.517,2.655-18.667,7.166L344.122,341.85h-72.988V151.339h40.91  c9.976,0,18.926-5.94,22.8-15.134l5.798-13.757l3.806,11.765c3.314,10.243,12.774,17.126,23.54,17.126h86.129  c13.643,0,24.741-11.099,24.741-24.741v-25.635c0.008-3.002-1.854-5.796-4.624-6.948l-109.74-46.031  c-3.819-1.601-8.215,0.193-9.817,4.015c-1.603,3.82,0.195,8.216,4.015,9.817l75.396,31.625h-89.404l-64.059-64.369l50.278,21.089  c3.82,1.602,8.216-0.194,9.817-4.015c1.602-3.82-0.195-8.216-4.015-9.817L251.469,0.577c-1.845-0.769-3.957-0.769-5.802,0  L22.906,94.014c-2.772,1.152-4.634,3.947-4.626,6.949v25.635c0,13.643,11.099,24.741,24.741,24.741h86.128  c10.766,0,20.227-6.883,23.541-17.126l3.806-11.765l5.797,13.757c3.874,9.193,12.823,15.134,22.8,15.134h40.911V341.85H120.676  c-4.142,0-7.5,3.357-7.5,7.5c0,4.143,3.358,7.5,7.5,7.5h226.265c1.817,0,3.573-0.66,4.94-1.857l114.53-100.28  c4.397-3.851,10.937-4.536,16.029-1.652c5.063,2.868,7.837,8.737,6.873,14.466c-0.529,3.147-2.155,6.039-4.555,8.141l-69.877,61.183  c-0.001,0.001-0.001,0.001-0.002,0.002l-50.709,44.4c-2.541,2.225-5.799,3.449-9.174,3.449H35.502  c-7.679,0-13.926-6.247-13.926-13.926c0-7.679,6.247-13.926,13.926-13.926h55.173c4.142,0,7.5-3.357,7.5-7.5  c0-4.143-3.358-7.5-7.5-7.5H35.502c-15.95,0-28.926,12.976-28.926,28.926c0,5.046,1.302,9.792,3.582,13.926H9.487  c-4.142,0-7.5,3.357-7.5,7.5v45.193c0,4.143,3.358,7.5,7.5,7.5h32.414l-20.163,31.539c-6.702,10.483-3.626,24.464,6.856,31.165  c10.378,6.637,24.546,3.502,31.166-6.856l35.703-55.848H298.79c4.143,0,7.5-3.357,7.5-7.5c0-4.143-3.357-7.5-7.5-7.5H16.987v-30.193  H494.1v30.193H328.79c-4.143,0-7.5,3.357-7.5,7.5c0,4.143,3.357,7.5,7.5,7.5h86.83l35.705,55.848  c6.622,10.358,20.787,13.493,31.166,6.857c5.078-3.247,8.588-8.276,9.883-14.163c1.295-5.887,0.22-11.926-3.026-17.004  l-20.162-31.538H501.6c4.143,0,7.5-3.357,7.5-7.5v-45.193C509.1,388.059,505.743,384.702,501.6,384.702z M463.857,108.441v18.157  c0,5.371-4.37,9.741-9.741,9.741h-86.129c-4.239,0-7.964-2.71-9.269-6.743l-6.844-21.155H463.857z M248.568,18.125l74.953,75.316  H173.616L248.568,18.125z M138.419,129.596c-1.305,4.033-5.03,6.743-9.269,6.743H43.021c-5.371,0-9.741-4.37-9.741-9.741v-18.157  h111.982L138.419,129.596z M63.05,93.441l153.462-64.369l-64.058,64.369H63.05z M176.116,130.381l-9.246-21.94h163.396  l-9.245,21.939c-1.525,3.62-5.05,5.959-8.978,5.959h-126.95C181.165,136.339,177.641,134,176.116,130.381z M241.004,151.339h15.129  V341.85h-15.129V151.339z M47.123,492.664c-1.397,2.186-3.785,3.491-6.388,3.491c-1.436,0-2.839-0.412-4.06-1.193  c-1.703-1.088-2.879-2.774-3.313-4.748c-0.434-1.973-0.074-3.997,1.014-5.699l25.329-39.619h17.957L47.123,492.664z M419.491,352.75  l33.24,31.951H383L419.491,352.75z M476.709,484.513c1.089,1.703,1.449,3.728,1.016,5.701c-0.435,1.973-1.611,3.659-3.314,4.748  c-1.22,0.78-2.623,1.192-4.059,1.192c-2.603,0-4.99-1.305-6.388-3.491l-30.539-47.769h17.956L476.709,484.513z" />
                              </svg>
                            </span> Honeymoon Packages
                          </a>
                        </li>
                      </ul>-->
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>" href="<?php echo base_url() ?>blog">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="background:<?php echo $site->colour_name;?>; color:<?php echo $site->font_color;?>" href="<?php echo base_url() ?>Contactus"> Contact us
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- navigation close -->
  </div>
  <br>
  <br>
  <br>
  <br>
  

  
  <div id="157618747">
    <script type="text/javascript">
        try {
            window._mNHandle.queue.push(function (){
                window._mNDetails.loadTag("157618747", "970x90", "157618747");
            });
        }
        catch (error) {}
    </script>
</div>
  <!-- Go To Top-->
  <button class="scrollToTopBtn"><i class="fas fa-arrow-up"></i>️</button>

  <!-- page-header -->
  <!--Header End-->
  <style>
      .dropdown-item:focus, .dropdown-item:hover
      {
          color:<?php echo $site->colour_name;?>;
      }
      .dropdown-item:hover svg
      {
          color:<?php echo $site->colour_name;?>;
      }
      .btn
      {
          background:<?php echo $site->colour_name;?>; 
          color:<?php echo $site->font_color;?>;
          border-color:<?php echo $site->colour_name;?>;
      }
      .btn:hover
      {
          color:<?php echo $site->colour_name;?>;
          background:<?php echo $site->font_color;?>; 
          border-color:<?php echo $site->font_color;?>;
      }
      
/*for mobile vertical*/
@media (max-width: 479px) {
	.search-head-title
	{
	    padding-top: 140px !important;
	}
	.slide 
	{
        top: -17px !important;
	}
	.space-midsmall 
	{
        padding-top: 330px !important;
    }
    .header-top
    {
        visibility: hidden !important;
        height: 0px !important;
        min-height: 0px !important;
    }
    body{
        padding: 0px 0px 0px !important;
    }
    .navbar-brand img {
    margin-left: 45px;
    }
}
  </style>
  <script>
    $(".navbar-toggle").on('click', function(event){
        $(".mCustomScrollbar").addClass("active");
    });
    $(".fa-arrow-left").on('click', function(event){
        $(".mCustomScrollbar").removeClass("active");
    });
    $(document).ready(function (event) {
        $('.dismiss, .overlay2').on('click', function (event) {
    		$('#sidebar').removeClass('active');
    		$('.overlay2').fadeOut();
    		$('body').css({
    			"overflow": "scroll",
    			"padding-right": "0px"
    		});
    	});
    	$('#sidebarCollapse').on('click', function (event) {
    		$('#sidebar').addClass('active');
    		$('.overlay2').fadeIn();
    		$('.collapse.in').toggleClass('in');
    		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
    	});
    	$('#sidebarCollapse1').on('click', function (event) {
    		$('#sidebar').addClass('active');
    		$('.overlay2').fadeIn();
    		$('.collapse.in').toggleClass('in');
    		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
    		$('body').css({
    			"overflow": "hidden",
    			"padding-right": "0px"
    		});
    	});
    });
   $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
  <script>
      <!-- ====== SCROLL TO TOP SCRIPT ====== -->
        var scrollToTopBtn = document.querySelector(".scrollToTopBtn")
        var rootElement = document.documentElement
        
        function handleScroll() {
          // Do something on scroll - 0.15 is the percentage the page has to scroll before the button appears
          // This can be changed - experiment
          var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight
          if ((rootElement.scrollTop / scrollTotal ) > 0.15) {
            // Show button
            scrollToTopBtn.classList.add("showBtn")
          } else {
            // Hide button
            scrollToTopBtn.classList.remove("showBtn")
          }
        }
        
        function scrollToTop() {
          // Scroll to top logic
          rootElement.scrollTo({
            top: 0,
            behavior: "smooth"
          })
        }
        scrollToTopBtn.addEventListener("click", scrollToTop)
        document.addEventListener("scroll", handleScroll)
  </script>
  <style>
      /*-------------
 	General
-------------*/
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	 /*background: linear-gradient(45deg, #f90, #f09) !important;*/
}

html{
	scroll-behavior: smooth !important;
	font: normal 16pt sans-serif;
	color: #555;
}


/*--------------------
 Back to Top Button
---------------------*/
.scrollToTopBtn {
  background-color: <?php echo $site->colour_name;?>;
  border: none;
  border-radius: 50%;
  color: white;
  cursor: pointer;
  font-size: 30px;
  line-height: 48px;
  width: 48px;
	  /* place it at the bottom right corner */
  position: fixed;
  bottom: 80px;
  right: 22px;
	  /* keep it at the top of everything else */
  z-index: 100;
	  /* hide with opacity */
  opacity: 0;
	  /* also add a translate effect */
  transform: translateY(100px);
	  /* and a transition */
  transition: all .5s ease
}
    
.showBtn {
  opacity: 1;
  transform: translateY(0)
}

@media screen and (max-width: 800px) {
	.hero h1{
		margin-top: 100px;
		margin-bottom: 80px;
	}
	.header-down-arrow {
		display: none;
	}
	html,body{
    overflow-x: hidden;
}
}


  </style>