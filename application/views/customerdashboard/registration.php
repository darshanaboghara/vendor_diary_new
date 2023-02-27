<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <script>
function submitUserForm() {
    var response = grecaptcha.getResponse();
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        alert("Validate Captcha");
        return false;
    }
    return true;
}
 
function verifyCaptcha() {
    document.getElementById('g-recaptcha-error').innerHTML = '';
}
</script>
<!--Goole Ad Off-->
<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089" crossorigin="anonymous"></script>-->
</head>
<body class="hold-transition register-page">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    
<div class="register-box">
  <div class="register-logo">
    <a><b>Register a new Customer</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a New Membership</p>
        <?php echo validation_errors("<div class='alert alert-danger alert-dismissible'>","</div>"); ?>
      <form action="" method="post" onsubmit="return submitUserForm();">
          
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" autocomplate="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-key"></i></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="cpassword"  placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-key"></i></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
                  <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_KEY;?>"></div>
                  <div id="g-recaptcha-error"></div>
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<div class="social-auth-links text-center">-->
      <!--  <p>- OR -</p>-->
      <!--  <a href="#" class="btn btn-block btn-primary">-->
      <!--    <i class="fab fa-facebook mr-2"></i>-->
      <!--    Sign up using Facebook-->
      <!--  </a>-->
      <!--  <a href="#" class="btn btn-block btn-danger">-->
      <!--    <i class="fab fa-google-plus mr-2"></i>-->
      <!--    Sign up using Google+-->
      <!--  </a>-->
      <!--</div>-->
      
      <!--Goole Ad Off-->
      
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-8898782763527089"-->
<!--     data-ad-slot="5983426633"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
      <a href="<?php echo base_url();?>Customerlogin" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script>
    function fillstate(id) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("state").innerHTML = this.responseText;
      }
    };
    var url="<?php echo base_url();?>";
    xhttp.open("GET", url+"Getstate?q=" + id, true);
    xhttp.send();
  }
  function fillCity(id) {
    var x = document.getElementById("city");
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("city").innerHTML = this.responseText;
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
         document.getElementById("category").innerHTML = this.responseText;
       }
     };
     var url="<?php echo base_url();?>";
     xhttp.open("GET",url+"Getcategory", true);
     xhttp.send();
   }
   window.onload = GetCategory;
   
    function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();
  let address1 = "";
  let postcode = "";

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  // place.address_components are google.maps.GeocoderAddressComponent objects
  // which are documented at http://goo.gle/3l5i5Mr
  for (const component of place.address_components) {
    const componentType = component.types[0];

    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }

      case "route": {
        address1 += component.short_name;
        break;
      }

      case "postal_code": {
        postcode = `${component.long_name}${postcode}`;
        break;
      }

      case "postal_code_suffix": {
        postcode = `${postcode}-${component.long_name}`;
        break;
      }
      case "locality":
        document.querySelector("#locality").value = component.long_name;
        break;

      case "administrative_area_level_1": {
        document.querySelector("#state").value = component.short_name;
        break;
      }
      case "country":
        document.querySelector("#country").value = component.long_name;
        break;
    }
  }
  address1Field.value = address1;
  postalField.value = postcode;
  // After filling the form with address components from the Autocomplete
  // prediction, set cursor focus on the second address line to encourage
  // entry of subpremise information such as apartment, unit, or floor number.
  address2Field.focus();
}
</script>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>

<!--Goole Ad Off-->
<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089" crossorigin="anonymous"></script>-->

<!-- Home page -->

<!--Goole Ad Off-->

<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-8898782763527089"-->
<!--     data-ad-slot="5983426633"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</html>
