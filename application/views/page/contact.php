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
                                        <script src='https://www.google.com/recaptcha/api.js'></script>
                                       <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_KEY;?>"></div>
                                              <div id="g-recaptcha-error"></div>
                                         </div>
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