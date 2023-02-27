        <div class="layout_padding banner_section" style="background-image: url(https://vendordiary.com/assets/homepage/v1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="banner_taital">Wedding Made Easy.Hire the Best Wedding Team.</h1>
                        <p class="browse_text">Choose from over 10000+ vendors across Indias</p>
                        <!--<div class="banner_bt">-->
                        <!--    <button class="read_bt">Read More</button>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="search_box">
                <div class="row">
                    <form class="form-row" method="POST" action="<?= base_url();?>GetVendor" >
                    <div class="col-sm-2">
                        <div class="form-group">
                            <!--<input type="text" class="email_boton" placeholder="Search for" name="Email">-->
                            <select class="wide" name="country_id" id="country_name" onchange="fillstate(this.value);">
                             <option value="0">Country</option>
                             <?php
                              foreach ($country as $data) {
                                echo " <option value=$data->id>$data->country_name</option>";
                              } ?>
                           </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <!--<input type="text" class="email_boton" placeholder="Loction in" name="Email">-->
                            <select class="wide" name="state_id" id="state" onchange="fillCity(this.value);">
                                <option value="0">State</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <!--<input type="text" class="email_boton" placeholder="category" name="Email">-->
                            <select class="wide" name="city_id" id="city">
                                <option value="0">City</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                           <select class="wide" name="category_id" id="category">
                                <option value="0">Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<button class="search_bt">Search</button>-->
                             <input class="search_bt" type="submit" name="Search" value="Search">
                        </div>
                    </div>
                    <div class="fashion_menu">
                        <ul>
                            <!--<li class="active"><a href="https://www.free-css.com/free-css-templates">Auto Mobile</a></li>-->
                            <li><a href="<?= base_url().'GetVendor/vendorbycategory/154/0'?>"><?= @$this->OH->getcatnamebyid(154)?></a></li>
                            <li><a href="<?= base_url().'GetVendor/vendorbycategory/157/0'?>"><?= @$this->OH->getcatnamebyid(157)?></a></li>
                            <li><a href="<?= base_url().'GetVendor/vendorbycategory/158/0'?>"><?= @$this->OH->getcatnamebyid(158)?></a></li>
                            <li><a href="<?= base_url().'GetVendor/vendorbycategory/173/0'?>"><?= @$this->OH->getcatnamebyid(173)?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class=" layout_padding promoted_sectipon">-->
        <!--    <div class="container">-->
        <!--        <h1 class="promoted_text">PROMOTED <span style="border-bottom:5px solid #4bc714;">ADS</span></h1>-->
        <!--        <div class="images_main">-->
        <!--            <div class="row">-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div class="images"><img src="<?= ASSETSURL?>images/img-1.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Mobiles</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div class="images"><img src="<?= ASSETSURL?>images/img-2.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Cyicals</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div class="images"><img src="<?= ASSETSURL?>images/img-3.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Cars</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div class="images"><img src="<?= ASSETSURL?>images/img-4.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Laptops</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="images_main">-->
        <!--            <div class="row">-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div><img src="<?= ASSETSURL?>images/img-1.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Mobiles</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div><img src="<?= ASSETSURL?>images/img-2.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Cyicals</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div><img src="<?= ASSETSURL?>images/img-3.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Cars</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--                <div class="col-sm-6 col-md-6 col-lg-3">-->
        <!--                    <div><img src="<?= ASSETSURL?>images/img-4.png" alt="website template image" style="width:100%;"></div>-->
        <!--                    <button class="promoted_bt">PROMOTED</button>-->
        <!--                    <div class="eye-icon"><img src="<?= ASSETSURL?>images/eye-icon.png" alt="website template image"><span class="like-icon"><img src="<?= ASSETSURL?>images/like-icon.png" alt="website template image"></span></div>-->
        <!--                    <div class="numbar_text">30<span class="like-icon">01</span></div>-->
        <!--                    <button class="mobile_bt">-->
        <!--                    <a href="https://www.free-css.com/free-css-templates">Laptops</a>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="layout_padding popular_section">-->
        <!--    <div class="container">-->
        <!--        <h1 class="popular_taital">POPULAR <span style="border-bottom:5px solid #4bc714;">STORES</span></h1>-->
        <!--        <div id="main_slider" class="carousel slide" data-ride="carousel">-->
        <!--            <div class="carousel-inner">-->
        <!--                <div class="carousel-item active">-->
        <!--                    <div class="popular_section_2">-->
        <!--                        <div class="slider_img"><img src="<?= ASSETSURL?>images/img-5.png" alt="website template image" style="max-width:100%;"></div>-->
        <!--                        <h2 class="electronic_text">Electronic shop</h2>-->
        <!--                        <p class="contrary_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from</p>-->
        <!--                        <button class="view_bt">-->
        <!--                        <a href="https://www.free-css.com/free-css-templates">VIEW ADS</a>-->
        <!--                        </button>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="carousel-item">-->
        <!--                    <div class="popular_section_2">-->
        <!--                        <div class="slider_img"><img src="<?= ASSETSURL?>images/img-5.png" alt="website template image" style="max-width:100%;"></div>-->
        <!--                        <h2 class="electronic_text">Electronic shop</h2>-->
        <!--                        <p class="contrary_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from</p>-->
        <!--                        <button class="view_bt">-->
        <!--                        <a href="https://www.free-css.com/free-css-templates">VIEW ADS</a>-->
        <!--                        </button>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="carousel-item">-->
        <!--                    <div class="popular_section_2">-->
        <!--                        <div class="slider_img"><img src="<?= ASSETSURL?>images/img-5.png" alt="website template image" style="max-width:100%;"></div>-->
        <!--                        <h2 class="electronic_text">Electronic shop</h2>-->
        <!--                        <p class="contrary_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from</p>-->
        <!--                        <button class="view_bt">-->
        <!--                        <a href="https://www.free-css.com/free-css-templates">VIEW ADS</a>-->
        <!--                        </button>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="carousel-control-next" href="#main_slider" role="button" data-slide="prev"><i class="fa fa-angle-right"></i></a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="layout_padding about_section">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-sm-12">-->
        <!--                <h1 class="about_taital">About Our Classified ads</h1>-->
        <!--                <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at it's layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        <div class="layout_padding clients_section">
            <div class="container">
                <div id="client_slide" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#client_slide" data-slide-to="0" class="active"></li>
                        <li data-target="#client_slide" data-slide-to="1"></li>
                        <li data-target="#client_slide" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="promoted_text">CLIENTS <span style="border-bottom:5px solid #4bc714;">REVIEW</span></h1>
                                    <div class="client_img"><img src="<?= ASSETSURL?>images/client-img.png" alt="website template image"></div>
                                    <h1 class="client_text">JHON DUE</h1>
                                    <p class="adiser_text">(adiser)</p>
                                    <p class="long_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at it's layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="promoted_text">CLIENTS <span style="border-bottom:5px solid #4bc714;">REVIEW</span></h1>
                                    <div class="client_img"><img src="<?= ASSETSURL?>images/client-img.png" alt="website template image"></div>
                                    <h1 class="client_text">JHON DUE</h1>
                                    <p class="adiser_text">(adiser)</p>
                                    <p class="long_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at it's layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="promoted_text">CLIENTS <span style="border-bottom:5px solid #4bc714;">REVIEW</span></h1>
                                    <div class="client_img"><img src="<?= ASSETSURL?>images/client-img.png" alt="website template image"></div>
                                    <h1 class="client_text">JHON DUE</h1>
                                    <p class="adiser_text">(adiser)</p>
                                    <p class="long_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at it's layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact_section layout_padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input_main">
                            <div class="container">
                                <form action="<?= base_url();?>Customercomment" method="post">
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Your Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Phone" name="mobile_number">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="massage-bt" placeholder="Massage" rows="3" id="comment" name="desc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="submit_text">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="map-responsive">
                            <!--<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="450" frameborder="0" style="border:0;width:100%;" allowfullscreen></iframe>-->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d201705.19633985736!2d145.016798!3d-37.821814!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8f2c10c1546cc221!2sMelbourne%20Museum!5e0!3m2!1sen!2sin!4v1638424413877!5m2!1sen!2sin"width="600" height="450" frameborder="0" style="border:0;width:100%;" allowfullscreen loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
 var url="<?= base_url();?>";
   function fillCity(id) {
     var x = document.getElementById("city");
     x.style.display = "block";
     xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         document.getElementById("city").innerHTML = this.responseText;
       }
     };
     xhttp.open("GET", url+"Getcity?q=" + id, true);
     xhttp.send();
   }

   function fillstate(id) {
     var x = document.getElementById("state");
     x.style.display = "block";
     var x = document.getElementById("city");
     x.style.innerHTML = "";
     xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         document.getElementById("state").innerHTML = this.responseText;
       }
     };
     xhttp.open("GET",  url+"Getstate?q=" + id, true);
     xhttp.send();
   }

   function GetCategory() {
    xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         document.getElementById("category").innerHTML = this.responseText;
       }
     };
     xhttp.open("GET",  url+"Getcategory", true);
     xhttp.send();
     
   }
   window.onload = GetCategory;
 </script>
 