<!doctype html>
<html>


<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<meta name="robots" content="index, follow">
    <title><?php echo $site->web_frienly_name;?> Vendor Login</title>
    <meta name="description" content="<?php echo $site->website_description;?>" />
    <meta name="keyword" content="<?php echo $site->website_keywords;?>">
    
    <meta property="og:title" content="<?php echo $site->web_frienly_name;?>">
    <meta property="og:url" content="<?php echo base_url();?>">
    <meta property="og:description" content="<?php echo $site->website_description;?>">
    <meta property="og:image" content="<?php echo  base_url(); ?>assets/images/<?php echo $site->upload_logo;?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>favicons/<?php echo  $site->upload_favicon ?>">
  <!--<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>favicons/favicon-16x16.png">-->
  <link rel="manifest" href="<?php echo base_url(); ?>favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>favicons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <title></title>
  <meta name="description" content="" />
  <meta name="referrer" content="origin">
  <link href="<?php echo base_url(); ?>/assets/css/bootstrap.minddec.css?v=1556886975" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <!-- FontAwesome icon -->
  <link href="<?php echo base_url(); ?>/assets/fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet">
  <!-- Fontello icon -->
  <link href="<?php echo base_url(); ?>/assets/fonts/fontello/css/fontello.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/fonts/fontello/css/flaticon.css" rel="stylesheet">
  <!--jquery-ui  -->
  <link href="<?php echo base_url(); ?>/assets/css/jquery-ui9a20.css?v=1557983717" rel="stylesheet">
  <!--jquery-rateyo  -->
  <link href="<?php echo base_url(); ?>/assets/css/jquery.rateyoddec.css?v=1556886975" rel="stylesheet">
  <!-- Template magnific popup gallery -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/magnific-popupddec.css?v=1556886975">
  <!-- OwlCarosuel CSS -->
  <link href="<?php echo base_url(); ?>/assets/css/owl.carouselddec.css?v=1556886975" type="text/css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/css/owl.theme.defaultddec.css?v=1556886975" type="text/css" rel="stylesheet">
  <!-- Style CSS -->
  <link href="<?php echo base_url(); ?>/assets/css/style75ea.css?v=1558689406" rel="stylesheet">
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

  <script src="<?php echo base_url(); ?>/assets/js/jquery.minec25.js?v=1556886976"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #overlay {
          position: fixed;
          display: none;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: rgba(0,0,0,0.5);
          z-index: 2;
          cursor: pointer;
        }
        img{
             padding-left: 15px !important;
        }
    </style>
 <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <meta name="google-signin-client_id" content="797061690576-9l8anl03tvgj7vi02a8jreav8tr6f3t6.apps.googleusercontent.com">
<script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
      var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        var id_token = googleUser.getAuthResponse().id_token;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url()?>Login/googlelogin');
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href="<?php echo base_url();?>";
           }
        };
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('idtoken=' + id_token);
       
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>
  
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div id="overlay"></div>
  
  <div class="page-header-vendor vd-login">
  <div class="vd-form-outer">
    <div class="loginform">
      <div class="vd-form-inner">
      <div class="vendor-login" id="vendor-login">
        <div class="vendor-form-title" style="text-align: center;">
          <!--vendor-title -->
          <a class="backtohome" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>
            <p>Home</p>
          </a>
          <div class="vd-logo">
            <img src=" <?php echo base_url().'assets/images/'. $site->upload_logo;?>">
          </div>
          <h3 class="mb-2 vd-title">Welcome</h3>
          <p class="vd-subtitle">Expand your service business with <span class="vd-main">"<?php echo $site->web_frienly_name;?>"</span>
          <div id="message" style="color:red;"><?php echo $this->session->flashdata('message_name');?></div>
          <div id="message" style="color:green;"><?php echo $this->session->flashdata('Success');?></div>
          </p>
        </div>
        <!--/.vendor-title -->
        <!-- <form method="POST" action="Login/sendotp" name="login" id="login"> -->
        <form name="login" id="login" action="#">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
              <!-- Text input-->
              <div class="form-group">
                <label class="control-label sr-only" for="email">
                </label>
                <input id="email" type="email" name="email" placeholder="Email" class="form-control vd-frminput" data-valid="required"  tabIndex="1" autofocus autocomplete="off">
                <div id="error"></div>
              </div>
              
              <div class="form-group">
                <label class="control-label sr-only" for="password">
                </label>
                <input id="newpassword" type="password" name="password" placeholder="Password" class="form-control vd-frminput" data-valid="required"  tabIndex="1" autofocus autocomplete="off">
                <div id="errorpaassword"></div>
              </div>
              
              <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_KEY;?>"></div>
                  <div id="g-recaptcha-error"></div>
                </div>
                
                 
            </div>
            <!-- Text input-->
            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
            <div class="form-group service-form-group">
              <label class="control-label sr-only" for="passwordlogin">
              </label>
              <input id="passwordlogin" type="password" name="passwordlogin" placeholder="Password" class="form-control" data-valid="required" autocomplete="off">
            </div>
          </div> -->
            <!--buttons -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
              <button type="button" onclick="newlogin();" tabIndex="2" name="loginbutton" name="LOGIN" value="LOGIN" id="loginbutton" class="btn btn-default btn-sm btn-block vd-frmbtn"> Login</button>
              <p class="mt-2">
                <a href="javascript:void(0);" onclick="ForgotPassword();" class="wizard-form-small-text vd-text2"> Forgot your password?
                </a>
              </p>
            </div>
            <!--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">-->
                 <!--<a href="#" id="googlelogout" onclick="signOut();" style="display:none">Sign out</a>-->
            <!--   <center> <div id="my-signin2"></div></center>-->
            <!--</div>-->
            
          </div>
        </form>
        <!-- <form method="POST" action="Login/validateotp" name="otpform" id="otpform" style="display: none;"> -->
        <form name="otpform" id="otpform" style="display: none;">
          <div class="row">
            <input id="email1" type="email" name="email1" hidden>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 nopadding">
              <!-- Text input-->
              <div class="form-group">
                <label class="control-label sr-only" for="otp">
                </label>
                <input id="otp" type="number" minlength=6 maxlength=6 name="opt" placeholder="Enter otp" required class="form-control" data-valid="required" autocomplete="off">
                <div id="error1"></div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 nopadding">
              <!-- Text input-->
              <div class="form-group">
                <button type="button" onclick="sendotp();" tabIndex="10" name="loginbutton" name="LOGIN" value="LOGIN" id="loginbutton" class="btn btn-default btn-sm btn-block">OTP</button>
                <div id="error1"></div>
              </div>
            </div>
            <!--buttons -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
              <button type="button" onclick="validotp();" name="loginbutton" name="OTP" value="OTP" id="loginbutton" class="btn btn-default btn-sm btn-block"> Validate OTP & Login</button>
              <p class="mt-2">
                <a href="#" onclick="Home.ForgotPassword(event);" class="wizard-form-small-text"> Forgot your password?
                </a>
              </p>
            </div>
          </div>
        </form>
      </div>
      <div class="vendor-login" id="vendor-reset-password" style="display:none;">
        <div class="vendor-form-title" style="text-align: center;">
          <a class="backtohome" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>
            <p>Home</p>
          </a>
          <!--vendor-title -->
          <div>
            <img src="<?php echo base_url(); ?>/assets/images/logo-ico.png">
          </div>
          <h3 class="mb-2">Forgot Your Password?
          </h3>
          <p>Don't worry, it happens to the best of us.</p>
        </div>
        <!--/.vendor-title -->
        <form name="forgot-password" id="forgot-password">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
              <!-- Text input-->
              <div class="form-group">
                <label class="control-label sr-only" for="forgot_password">
                </label>
                <input id="forgot_password" type="text" name="forgot_password" placeholder="Email Address" class="form-control" data-valid="required" autocomplete="off">
                <div id="ferror"></div>
              </div>
            </div>
            <!--buttons -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 nopadding">
                <button type="button" onclick="passwordf();" tabIndex="4" name="loginbutton" name="LOGIN" value="LOGIN" id="loginbutton" class="btn btn-default btn-sm btn-block"> SUBMIT</button>
              <!--<button type="button" onclick="passwordf();" name="fpassword" id="fpassword" class="btn btn-default btn-sm btn-block" > SUBMIT </button>-->
              <p class="mt-2">
                <a href="javascript:void(0);" onclick="BackToLogin();" class="wizard-form-small-text"> Back to Login
                </a>
              </p>
            </div>
          </div>
        </form>
      </div>
      <div class="vendorsign-div">
        <p>Register as Vendor
          <a href="Registration" class="vd-btn2"> Signup Now</a>
        </p>
      </div>
      </div>
    </div>
  </div>
  </div>
  <script src="<?php echo base_url(); ?>/assets/js/main6b71.js?v=1562144959"></script>

  <script>
    $(document).on('keypress', 'input,select', function (e)
    {
        if (e.which == 13) 
        {
            e.preventDefault();
            var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
            console.log($next.length);
            if (!$next.length)
            {
                $next = $('[tabIndex=1]');
            }
            $next.focus();
        }
    });
    
    $("#email").keypress(function(event)
    {
        if (event.keyCode === 13)
        {
           sendotp();
        }
    });
  
   
    function newlogin()
    {
        document.getElementById("message").innerHTML="";
        document.getElementById("error").innerHTML="";
        document.getElementById("errorpaassword").innerHTML="";
        document.getElementById("g-recaptcha-error").innerHTML="";
        on();
        var response = grecaptcha.getResponse();
        if(response.length == 0)
        {
            off();
            document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">validate recaptcha</span>';
            return false;
        }
      
        var x = document.getElementById("newpassword");
        var z = document.getElementById("email");
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (!z.value.match(mailformat)) {
            off();
          document.getElementById("error").innerHTML = "<p class='label label-danger'>Enter Valid Email</p>";
          return;
        }
        if (x.value == "")
        {
            off();
            document.getElementById("errorpaassword").innerHTML = "<p class='label label-danger'>Enter Password</p>";
            return;
        }
        else
        {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
            //alert(this.responseText);
            // document.getElementById("error").remove();
                if (this.responseText == "Wrong Password") 
                {
                    off();
                  document.getElementById("message").innerHTML = "<p class='label label-danger'>" + this.responseText + " </p>";
                }
                else if(this.responseText=="Email Id Not Found")
                {
                    off();
                  document.getElementById("message").innerHTML = "<p class='label label-danger'>" + this.responseText + " </p>";
                }
                else if(this.responseText=="Login Success")
                {
                    off();
                    window.location.replace("Dashboard/My_Profile");
                }
          }
          else{
                document.getElementById("message").innerHTML = "<p> <img src='http://www.sudburycatholicschools.ca/wp-content/plugins/3d-flip-book/assets/images/dark-loader.gif' style='height: 50px;width: 50px;'> </p>";
              off();
          }
        }

        xhttp.open("GET", "Login/validateemailpwd?password=" + x.value + "&email=" + z.value, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("password=" + x.value + "&email=" + z.value);
      }
    }
    function on() {
      document.getElementById("overlay").style.display = "block";
    }
    function off() {
      document.getElementById("overlay").style.display = "none";
    }
    function passwordf()
    {
        on();
        var femail = document.getElementById("forgot_password");
       console.info(femail.value);
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (!femail.value.match(mailformat)) {
            off();
          document.getElementById("ferror").innerHTML = "<p class='label label-danger'>Enter Valid Email</p>";
          return;
        }
        else if(femail.value=="")
        {
            off();
          document.getElementById("ferror").innerHTML = "<p class='label label-danger'>Enter Email</p>";
          return;
        }
        else
        {
            console.info(femail.value);
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    off();
                    if(this.responseText=="Password Send Sucessfully")
                    {
                        alert("Your password send to you an email")
                        location.reload();
                    }
                    else
                    {
                        document.getElementById("ferror").innerHTML = "<p class='label label-danger'> "+this.responseText+" </p>";
                    }
                    
                }
            }
            var url="<?php echo base_url();?>";
            xhttp.open("GET", url+"Login/passwordforgot?email=" + femail.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("&email=" + femail.value);
        }
    }
    
    function ForgotPassword() {
        // alert("hello");
      document.getElementById("vendor-reset-password").style.removeProperty("display");
      document.getElementById("vendor-login").style.display="none";
    }
    function BackToLogin(){
        // alert("hello");
      document.getElementById("vendor-login").style.removeProperty("display");
      document.getElementById("vendor-reset-password").style.display="none";
    }
  </script>
  
    <style type="text/css">
    .lds-ellipsis {
      display: inline-block;
      position: relative;
      width: 64px;
      height: 16px;
    }

    .lds-ellipsis div {
      position: absolute;
      top: 6px;
      width: 11px;
      height: 11px;
      border-radius: 50%;
      background: #fff;
      animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }

    .lds-ellipsis div:nth-child(1) {
      left: 6px;
      animation: lds-ellipsis1 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(2) {
      left: 6px;
      animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(3) {
      left: 26px;
      animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(4) {
      left: 45px;
      animation: lds-ellipsis3 0.6s infinite;
    }

    @keyframes lds-ellipsis1 {
      0% {
        transform: scale(0);
      }

      100% {
        transform: scale(1);
      }
    }

    @keyframes lds-ellipsis3 {
      0% {
        transform: scale(1);
      }

      100% {
        transform: scale(0);
      }
    }

    @keyframes lds-ellipsis2 {
      0% {
        transform: translate(0, 0);
      }

      100% {
        transform: translate(19px, 0);
      }
    }
  </style>