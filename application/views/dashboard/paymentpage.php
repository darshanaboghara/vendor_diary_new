<html>
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $site->web_frienly_name;?> Payment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo  base_url(); ?>favicons/<?php echo $site->upload_favicon;?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" />    

    <!-- jQuery is used only for this example; it isn't required to use Stripe -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" />

    <!-- Stripe JavaScript library -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>    
    
    <script type="text/javascript">
        //set your publishable key
        Stripe.setPublishableKey('<?php echo SPK;?>');
        
        //callback to handle the response from stripe
        function stripeResponseHandler(status, response) {
            if (response.error) {
                //enable the submit button
                $('#payBtn').removeAttr("disabled");
                //display the errors on the form
                // $('#payment-errors').attr('hidden', 'false');
                $('#payment-errors').addClass('alert alert-danger');
                $("#payment-errors").html(response.error.message);
            } else {
                var form$ = $("#paymentFrm");
                //get token id
                var token = response['id'];
                //insert the token into the form
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                //submit form to the server
                form$.get(0).submit();
            }
        }
        $(document).ready(function() {
            //on form submit
            $("#paymentFrm").submit(function(event) {
                //disable the submit button to prevent repeated clicks
                $('#payBtn').attr("disabled", "disabled");
                
                //create single-use token to charge the user
                Stripe.createToken({
                    number: $('#card_num').val(),
                    cvc: $('#card-cvc').val(),
                    exp_month: $('#card-expiry-month').val(),
                    exp_year: $('#card-expiry-year').val()
                }, stripeResponseHandler);
                
                //submit from callback
                return false;
            });
        });
    </script>
    
    <script src="https://www.paypal.com/sdk/js?client-id=<?= $pymts[0]->key;?>&currency=AUD"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
    </script>
	<style>
            /*@import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");*/
            
            body {
                background-color: #f5eee7;
                font-family: "Poppins", sans-serif;
                font-weight: 300
            }
            
            .container {
                height: 100vh
            }
            
            .card {
                border: none
            }
            
            .card-header {
                padding: .5rem 1rem;
                margin-bottom: 0;
                background-color: rgba(0, 0, 0, .03);
                border-bottom: none
            }
            
            .btn-light:focus {
                color: #212529;
                background-color: #e2e6ea;
                border-color: #dae0e5;
                box-shadow: 0 0 0 0.2rem rgba(216, 217, 219, .5)
            }
            
            .form-control {
                height: 50px;
                border: 2px solid #eee;
                border-radius: 6px;
                font-size: 14px
            }
            
            .form-control:focus {
                color: #495057;
                background-color: #fff;
                border-color: #039be5;
                outline: 0;
                box-shadow: none
            }
            
            .input {
                position: relative
            }
            
            .input i {
                position: absolute;
                top: 16px;
                left: 11px;
                color: #989898
            }
            
            .input input {
                text-indent: 25px
            }
            
            .card-text {
                font-size: 13px;
                margin-left: 6px
            }
            
            .certificate-text {
                font-size: 12px
            }
            
            .billing {
                font-size: 11px
            }
            
            .super-price {
                top: 0px;
                font-size: 22px
            }
            
            .super-month {
                font-size: 11px
            }
            
            .line {
                color: #bfbdbd
            }
            
            .free-button {
                background: #1565c0;
                height: 52px;
                font-size: 15px;
                border-radius: 8px
            }
            
            .payment-card-body {
                flex: 1 1 auto;
                padding: 24px 1rem !important
            }
        </style>
</head>


        
    <body>
        <div class="container d-flex justify-content-center mt-5 mb-5">
            <div class="row g-3">
            <div class="col-md-6"> <span>Payment Method</span>
                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingTwo">
                                <h2 class="mb-0"> <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex align-items-center justify-content-between"> <span>Pay with Paypal</span> <img src="https://i.imgur.com/7kQEsHU.png" width="30"> </div>
                                    </button>
                                    <div class="col-md-12">
                                        <div id="paypal-button-container"></div>
                                     </div>
                                     
                                        <script>
                                              paypal.Buttons({
                                                createOrder: function(data, actions) {
                                                  // This function sets up the details of the transaction, including the amount and line item details.
                                                  return actions.order.create({
                                                    purchase_units: [{
                                                      amount: {
                                                        value: '<?php echo $this->session->data['plandata']->plan_amount;?>'
                                                      }
                                                    }]
                                                  });
                                                },
                                                onApprove: function(data, actions) {
                                                  // This function captures the funds from the transaction.
                                                   xhttp = new XMLHttpRequest();
                                                     xhttp.onreadystatechange = function() {
                                                      if (this.status == 302) {
                                                    	window.location('<?php echo base_url();?>Dashboard');
                                                      }
                                                     };
                                                      var url="<?php echo base_url();?>";
                                                     xhttp.open("GET", url+"Payment/acceptPayment", true);
                                                    xhttp.send();
                                                  return actions.order.capture().then(function(details) {
                                                    // This function shows a transaction success message to your buyer.
                                                    alert('Transaction completed by ' + details.payer.name.given_name);
                                                    //window.location('<?php echo base_url();?>Dashboard/showVendorPlan');
                                                    window.location.replace('<?php echo base_url();?>Dashboard/showVendorPlan');
                                                    
                                                  });
                                                },
                                                onCancel: function (data) {
                                                // Show a cancel page, or return to cart
                                              }
                                              }).render('#paypal-button-container');
                                              //This function displays Smart Payment Buttons on your web page.
                                              
                                            </script>
                                      <!--Paypal Button End-->
                                      
                                      
                                    </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body"> <input type="text" class="form-control" placeholder="Paypal email">
                               
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-0">
                                <h2 class="mb-0"> <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center justify-content-between"> <span>Pay with Stripe</span>
                                            <div class="icons"> <img src="https://i.imgur.com/2ISgYja.png" width="30"> <img src="https://i.imgur.com/W1vtnOV.png" width="30"> <img src="https://i.imgur.com/35tC99g.png" width="30"> <img src="https://i.imgur.com/2ISgYja.png" width="30"> </div>
                                        </div>
                                    </button> </h2>
                            </div>
                            <form method="post" id="paymentFrm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Payment/check">
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    
                                    <div class="card-body payment-card-body"> 
                                        <div class="input"> 
                                        <div class="form-group">
                                            <span class="font-weight-normal card-text">Full Name</span>
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>" required>
                                            </div>  
                    
                                            <div class="form-group">
                                                <span class="font-weight-normal card-text">Email</span>
                                                <input type="email" name="email" class="form-control" placeholder="email@you.com" value="<?php echo set_value('email'); ?>" required />
                                            </div> </div><span class="font-weight-normal card-text">Card Number</span>
                                        <div class="input"> <i class="fa fa-credit-card"></i> <input type="number" name="card_num" id="card_num" class="form-control" placeholder="Card Number" autocomplete="off" value="<?php echo set_value('card_num'); ?>" required placeholder="0000 0000 0000 0000"> </div>
                                        <div class="row mt-3 mb-3">
                                            <div class="col-md-3"> <span class="font-weight-normal card-text">Expiry Month</span>
                                                <div class="input"> <i class="fa fa-calendar"></i> <input type="text" name="exp_month" id="card-expiry-month" class="form-control" placeholder="MM"> </div>
                                            </div>
                                            <div class="col-md-3"> <span class="font-weight-normal card-text">Expiry Year</span>
                                                <div class="input"> <i class="fa fa-calendar"></i> <input type="text" name="exp_year" id="card-expiry-year"  class="form-control" placeholder="YYYY"> </div>
                                            </div>
                                            <div class="col-md-6"> <span class="font-weight-normal card-text">CVC/CVV</span>
                                                <div class="input"> <i class="fa fa-lock"></i> <input type="text" name="cvc" id="card-cvc" class="form-control" placeholder="000"> </div>
                                            </div>
                                            
                                        </div><div class="p-6"> <button type="submit"  id="payBtn" class="btn btn-primary btn-block free-button">Pay</button></div> <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
                                    </div>
                                </div>
                            </form>
                           
                           
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"> <span>Summary</span>
                <div class="card">
                    <div class="d-flex justify-content-between p-3">
                        <div class="d-flex flex-column"> <span><b>Plan Name:</b><?php echo $this->session->data['plandata']->rates_name;?> <i class="fa fa-caret-down"></i></span> <a href="#" class="billing"> with annual billing</a> </div>
                        <div class="mt-1"> <sup class="super-price"><?php
                            if($this->session->data['plandata']->plan_amount_type=="INR")
                            {
                                echo "₹";
                            }
                            else if($this->session->data['plandata']->plan_amount_type=="AUD")
                            {
                                echo "$";
                            }
                            else
                            {
                                echo "$";
                            }
                        ?>
        				<?php echo $this->session->data['plandata']->plan_amount;?>(<?php echo $this->session->data['plandata']->plan_amount_type;?>)</sup> <span class="super-month">/Year</span> </div>
                    </div>
                    <hr class="mt-0 line">
                    <div class="p-3">
                        <!--<div class="d-flex justify-content-between mb-2"> <span>Refferal Bonouses</span> <span>-$2.00</span> </div>-->
                        <!--<div class="d-flex justify-content-between"> <span>Vat <i class="fa fa-clock-o"></i></span> <span>-20%</span> </div>-->
                    </div>
                    <hr class="mt-0 line">
                    <div class="p-3 d-flex justify-content-between">
                        <div class="d-flex flex-column"> <span>Today you pay(<?php echo $this->session->data['plandata']->plan_amount_type;?> Dollars)</span> <small></small> </div> <span><?php
                            if($this->session->data['plandata']->plan_amount_type=="INR")
                            {
                                echo "₹";
                            }
                            else if($this->session->data['plandata']->plan_amount_type=="AUD")
                            {
                                echo "$";
                            }
                            else
                            {
                                echo "$";
                            }
                        ?>
        				<?php echo $this->session->data['plandata']->plan_amount;?>(<?php echo $this->session->data['plandata']->plan_amount_type;?>)</span>
                    </div>
                    <div class="p-3">
                        Pay with Stripe Button
                         <!--<button class="btn btn-primary btn-block free-button">Try it free for 30 days</button>-->
                        <form action="<?php echo base_url(); ?>Payment/check" method="POST">
    													<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    													data-key="<?php echo $pymts[1]->key;?>"
    													data-amount="<?php echo $this->session->Total*100?>"
    													data-name="<?php echo $site->web_frienly_name;?>"
    													data-description="Plan Name:<?php echo $this->session->data['plandata']->rates_name;?> $ <?php echo $this->session->data['plandata']->plan_amount;?>(AUD)"
    													data-image="<?php echo  base_url(); ?>favicons/<?php echo $site->upload_favicon;?>"
    													data-currency="aud"
    													></script>
						</form>
                        <!--<div class="text-center"> <a href="#">Have a promo code?</a> </div>-->
                    </div>
                </div>
            </div>
    </div>
        </div>
    </body>
</html>

