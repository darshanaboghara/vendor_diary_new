<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900italic,900);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
body{background: linear-gradient( 180deg, #e5efff 0%, rgba(229, 239, 255, 0.262661) 83.7%, #f7f9fc 100% )}

#generic_price_table{
  /*background-color: #fffff5;*/
  
}

/*PRICE COLOR CODE START*/
#generic_price_table .generic_content{
  background-color: #ffffff;
}

#generic_price_table .generic_content .generic_head_price{
  background-color: #f6f6f6;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
  border-color: #e4e4e4 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #e4e4e4;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
  color: #525252;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
    color: #414141;
}

#generic_price_table .generic_content .generic_feature_list ul li{  
  color: #a7a7a7;
}

#generic_price_table .generic_content .generic_feature_list ul li span{
  color: #414141;
}
#generic_price_table .generic_content .generic_feature_list ul li:hover{
  background-color: #E4E4E4;
  border-left: 5px solid #2ECC71;
}

#generic_price_table .generic_content .generic_price_btn a{
  border: 1px solid #2ECC71; 
    color: #2ECC71;
} 

#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg{
  border-color: #2ECC71 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #2ECC71;
  color: #fff;
}

#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head span,
#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head span{
  color: #fff;
}

#generic_price_table .generic_content:hover .generic_price_btn a,
#generic_price_table .generic_content.active .generic_price_btn a{
  background-color: #2ECC71;
  color: #fff;
} 
#generic_price_table{
  margin: 50px 0 50px 0;
    font-family: 'Raleway', sans-serif;
}
.row .table{
    padding: 28px 0;
}

/*PRICE BODY CODE START*/

#generic_price_table .generic_content{
  overflow: hidden;
  position: relative;
  text-align: center;
}

#generic_price_table .generic_content .generic_head_price {
  margin: 0 0 20px 0;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content{
  margin: 0 0 50px 0;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
    border-style: solid;
    border-width: 90px 1411px 23px 399px;
  position: absolute;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head{
  padding-top: 40px;
  position: relative;
  z-index: 1;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
    font-family: "Raleway",sans-serif;
    font-size: 28px;
    font-weight: 400;
    letter-spacing: 2px;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag{
  padding: 0 0 20px;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price{
  display: block;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 28px;
    font-weight: 400;
    vertical-align: middle;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
    font-family: "Lato",sans-serif;
    font-size: 60px;
    font-weight: 300;
    letter-spacing: -2px;
    line-height: 60px;
    padding: 0;
    vertical-align: middle;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 24px;
    font-weight: 400;
    vertical-align: bottom;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
    font-family: "Lato",sans-serif;
    font-size: 18px;
    font-weight: 400;
    letter-spacing: 3px;
    vertical-align: bottom;
}

#generic_price_table .generic_content .generic_feature_list ul{
  list-style: none;
  padding: 0;
  margin: 0;
}

#generic_price_table .generic_content .generic_feature_list ul li{
  font-family: "Lato",sans-serif;
  /*font-size: 18px;*/
  padding: 8px 0;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table .generic_content .generic_feature_list ul li:hover{
  transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  -ms-transition: all 0.3s ease-in-out 0s;
  -o-transition: all 0.3s ease-in-out 0s;
  -webkit-transition: all 0.3s ease-in-out 0s;

}
#generic_price_table .generic_content .generic_feature_list ul li .fa{
  padding: 0 10px;
}
#generic_price_table .generic_content .generic_price_btn{
  margin: 20px 0 32px;
}

#generic_price_table .generic_content .generic_price_btn a{
    border-radius: 50px;
  -moz-border-radius: 50px;
  -ms-border-radius: 50px;
  -o-border-radius: 50px;
  -webkit-border-radius: 50px;
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 18px;
    outline: medium none;
    padding: 12px 30px;
    text-decoration: none;
    text-transform: uppercase;
}

#generic_price_table .generic_content,
#generic_price_table .generic_content:hover,
#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content .generic_head_price .generic_head_content .head h2,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head h2,
#generic_price_table .generic_content .price,
#generic_price_table .generic_content:hover .price,
#generic_price_table .generic_content .generic_price_btn a,
#generic_price_table .generic_content:hover .generic_price_btn a{
  transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  -ms-transition: all 0.3s ease-in-out 0s;
  -o-transition: all 0.3s ease-in-out 0s;
  -webkit-transition: all 0.3s ease-in-out 0s;
} 
@media (max-width: 320px) { 
}

@media (max-width: 767px) {
  #generic_price_table .generic_content{
    margin-bottom:75px;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  #generic_price_table .col-md-3{
    float:left;
    width:50%;
  }
  
  #generic_price_table .col-md-4{
    float:left;
    width:50%;
  }
  
  #generic_price_table .generic_content{
    margin-bottom:75px;
  }
}
@media (min-width: 991px) and (max-width: 1980px) {
  #generic_price_table .col-md-3{
    float:left;
    width:25%;
  }
  
  #generic_price_table .col-md-4{
    float:left;
    width:33%;
  }
  
  #generic_price_table .generic_content{
    margin-bottom:75px;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
}
@media (min-width: 1200px) {
}
#generic_price_table_home{
   font-family: 'Raleway', sans-serif;
}

.text-center h1,
.text-center h1 a{
  color: #7885CB;
  font-size: 30px;
  font-weight: 300;
  text-decoration: none;
}
.demo-pic{
  margin: 0 auto;
}
.demo-pic:hover{
  opacity: 0.7;
}

#generic_price_table_home ul{
  margin: 0 auto;
  padding: 0;
  list-style: none;
  display: table;
}
#generic_price_table_home li{
  float: left;
}
#generic_price_table_home li + li{
  margin-left: 10px;
  padding-bottom: 10px;
}
#generic_price_table_home li a{
  display: block;
  width: 50px;
  height: 50px;
  font-size: 0px;
}
#generic_price_table_home .blue{
  background: #3498DB;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .emerald{
  background: #2ECC71;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .grey{
  background: #7F8C8D;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .midnight{
  background: #34495E;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .orange{
  background: #E67E22;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .purple{
  background: #9B59B6;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .red{
  background: #E74C3C;
  transition:all 0.3s ease-in-out 0s;
}
#generic_price_table_home .turquoise{
  background: #1ABC9C;
  transition: all 0.3s ease-in-out 0s;
}

#generic_price_table_home .blue:hover,
#generic_price_table_home .emerald:hover,
#generic_price_table_home .grey:hover,
#generic_price_table_home .midnight:hover,
#generic_price_table_home .orange:hover,
#generic_price_table_home .purple:hover,
#generic_price_table_home .red:hover,
#generic_price_table_home .turquoise:hover{
  border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .divider{
  border-bottom: 1px solid #ddd;
  margin-bottom: 20px;
  padding: 20px;
}
#generic_price_table_home .divider span{
  width: 100%;
  display: table;
  height: 2px;
  background: #ddd;
  margin: 50px auto;
  line-height: 2px;
}
#generic_price_table_home .itemname{
  text-align: center;
  font-size: 50px ;
  padding: 50px 0 20px ;
  border-bottom: 1px solid #ddd;
  margin-bottom: 40px;
  text-decoration: none;
    font-weight: 300;
}
#generic_price_table_home .itemnametext{
    text-align: center;
    font-size: 20px;
    padding-top: 5px;
    text-transform: uppercase;
    display: inline-block;
}
#generic_price_table_home .footer{
  padding:40px 0;
}

.price-heading{
    text-align: center;
}
.price-heading h1{
  color: #666;
  margin: 0;
  padding: 0 0 50px 0;
}
.demo-button {
    background-color: #333333;
    color: #ffffff;
    display: table;
    font-size: 20px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    margin-bottom: 50px;
    outline-color: -moz-use-text-color;
    outline-style: none;
    outline-width: medium ;
    padding: 10px;
    text-align: center;
    text-transform: uppercase;
}
.bottom_btn{
  background-color: #333333;
    color: #ffffff;
    display: table;
    font-size: 28px;
    margin: 60px auto 20px;
    padding: 10px 25px;
    text-align: center;
    text-transform: uppercase;
}
.demo-button:hover{
  background-color: #666;
  color: #FFF;
  text-decoration:none;
  
}
.bottom_btn:hover{
  background-color: #666;
  color: #FFF;
  text-decoration:none;
}
</style>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"
     crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
         $this->db->select('*');
                    $this->db->where('is_deleted', 'No');
                    $this->db->where('status', 'APPROVED');
                    $this->db->from('vendor_membership_plan');
                    $query = $this->db->get();
                    $vplan= $query->result();
        ?>
        <div class="container-fluid justify-content-center mt-5">
            <div class="row mb-5">
                <div class="col text-center px-5">
                    <h5 font-weight-light >Find over 1000000+ Customer for your service needs at vendordiary.com – 100% trusted and real Customer.</h5>
                </div>
            </div>
            <div class="row d-flex ">
                <?php foreach($vplan as $data)
                
                    { ?>
                
                <div class="col-lg-3  text-center">
                    <div class="card bg-white text-center rounded">
                          <div class="card-body border-0">
                            <h1 class="card-title"><?= @$data->rates_name; ?></h1>
                            <hr>
                            <h2 class="card-text b">$<?php echo $data->plan_amount; ?></h2>
                            <h3 class="mb-2"></h3>
                            <a href="<?= base_url();?>Dashboard/showVendorPlan" class="btn w-100 btn-primary">Buy now</a>
                          </div>
                        </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"
     crossorigin="anonymous"></script>
<!-- Home page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8898782763527089"
     data-ad-slot="5983426633"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
        <div id="generic_price_table">   
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!--PRICE HEADING START-->
                            <div class="price-heading clearfix">
                                <h1>Vendor Plan Pricing</h1>
                            </div>
                            <!--//PRICE HEADING END-->
                        </div>
                    </div>
                </div>
                <div class="container">
                
                <!--BLOCK ROW START-->
                <div class="row">
                    
                    <?php
                   
                    
                    foreach ($vplan as $key=>$data)
                        {
                    ?>
                    <div class="col-md-3">
                    
                      <!--PRICE CONTENT START-->
                        <div class="generic_content clearfix">
                            
                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">
                            
                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">
                                
                                  <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span><?php echo $data->rates_name; ?></span>
                                    </div>
                                    <!--//HEAD END-->
                                    
                                </div>
                                <!--//HEAD CONTENT END-->
                                
                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">  
                                    <span class="price">
                                        <span class="sign">
                                        <?php
                                            if($data->plan_amount_type=="INR")
                                            {
                                                echo "₹";
                                            }
                                            else if($data->plan_amount_type=="AUD")
                                            {
                                                echo "$";
                                            }
                                            else
                                            {
                                                echo "$";
                                            }
                                        ?>
                                            
                                            
                                        </span>
                                        <span class="currency"><?php echo $data->plan_amount; ?></span>
                                        <span class="month">/YEAR</span>
                                    </span>
                                </div>
                                <!--//PRICE END-->
                                
                            </div>                            
                            <!--//HEAD PRICE DETAIL END-->
                            
                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                              <ul>
                                    <!--<li><i class="fas fa-user-friends"></i><span><?php echo $data->lead; ?></span> Lead</li>-->
                                    <!--<li><span><?php echo $data->plan_duration; ?></span> Day</li>-->
                                    <!--<li><span><?php echo $data->top_featured_in_pages; ?></span> Page</li>-->
                                <!--     <?php if($data->plan_amount<=0)
                                        {?>
                                           <li><span>Limited</span> </li>
                                        <?php }else
                                        { ?>
                                       <li><span>24x7 </span> Support</li>
                                    <li><span>Boost your Listing </span> </li>
                                    <li><span>Verified Badge </span> </li>
                                      <?php }?>-->
                                   <?
                                  /*  foreach($data as $key=>$value )
                                    {
                                        if($key!="id" && $key!="status" && $key!="is_deleted" && $key!="created_on" && $key!="rates_name")
                                        {
                                           
                                            echo '<li><span>'. str_replace("_"," ",$key).':<b>'.$value.'</b></span></li>';
                                        }
                                    }*/
                                    foreach(explode('@',$data->plan_details,) as $value )
                                    {
                                            echo '<li><span>'.$value.'</span></li>';
                                    }
                                   ?>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->
                            
                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix" style="cursor: pointer;">
                                <?php if($data->plan_amount<=0)
                                {?>
                                    <a  id="checkout-button" >Free</a>
                                <?php }else
                                { ?>
                              <a  id="checkout-button" href="<?= base_url();?>Dashboard/showVendorPlan">Buy</a>
                              <?php }?>
                            </div>
                            <!--//BUTTON END-->
                            
                        </div>
                        <!--//PRICE CONTENT END-->
                            
                    </div>
                    <?php }?>
                </div>  
                <!--//BLOCK ROW END-->
                
                </div>
            </section>             
  <!--<footer>-->
  <!--    <a class="bottom_btn" href="#">&copy; MrSahar</a>-->
  <!--  </footer>-->
</div>

        <div class="container  justify-content-center mt-2">
            <div class="row mb-5">
                <div class="col text-center ">
                    <h5 class="font-weight-light px-5">For any queries, reach out to us at <a href="mailto:<?= @$site->contact_email?>"><?= @$site->contact_email?></a>, available from <br>Mon-Fri,9:30 AM to 6:30 PM.</h4>
                </div>
            </div>
           
        </div>
    </body>
</html>
