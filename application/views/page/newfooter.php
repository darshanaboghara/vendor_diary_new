        <div class="layout_padding footer_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div><img src="<?=base_url(); ?>assets/images/<?= $site->upload_logo;?>" alt="website template image"></div>
                        <p class="dolor_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et sdolor sit amet,</p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <h1 class="quick_text">Quick links</h1>
                        <div class="chevron_arrow"><img src="<?= ASSETSURL?>images/chevron-arrow.png" alt="website template image"><span class="padding-left">Join Us</span></div>
                        <div class="chevron_arrow"><img src="<?= ASSETSURL?>images/chevron-arrow.png" alt="website template image"><span class="padding-left">Maintenance</span></div>
                        <div class="chevron_arrow"><img src="<?= ASSETSURL?>images/chevron-arrow.png" alt="website template image"><span class="padding-left">Language Packs</span></div>
                        <div class="chevron_arrow"><img src="<?= ASSETSURL?>images/chevron-arrow.png" alt="website template image"><span class="padding-left">LearnPress</span></div>
                        <div class="chevron_arrow"><img src="<?= ASSETSURL?>images/chevron-arrow.png" alt="website template image"><span class="padding-left">Release Status</span></div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <h1 class="subscribe_text">Subcribe email</h1>
                        <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                        <input type="text" class="email_text" placeholder="Your Email" name="Name">
                        <button class="submit_text">Submit</button>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <h1 class="quick_text">Contact Us</h1>
                        <div class="map_flag"><img src="<?= ASSETSURL?>images/map-flag.png" alt="website template image"><span class="padding-left"><?=  @$site->full_address?></span></div>
                        <div class="dolor_text"><img src="<?= ASSETSURL?>images/email-icon.png" alt="website template image"><span class="padding-left"><?=@$site->contact_email ?></span></div>
                        <div class="dolor_text"><img src="<?= ASSETSURL?>images/phone-icon.png" alt="website template image"><span class="padding-left"<?=  @$site->contact_no;?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p class="copyright_text"><?=  $site->footer_text?></p>
        </div>
        <!--<script src="<?= ASSETSURL?>js/js-jquery.min.js"></script>-->
        <script src="<?= ASSETSURL?>js/js-popper.min.js"></script>
        <script src="<?= ASSETSURL?>js/js-bootstrap.bundle.min.js"></script>
        <script src="<?= ASSETSURL?>js/js-jquery-3.0.0.min.js"></script>
        <script src="<?= ASSETSURL?>js/js-plugin.js"></script>
        <script src="<?= ASSETSURL?>js/js-jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= ASSETSURL?>js/js-custom.js"></script>
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
                 location.reload();
            });
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo base_url()?>Customerdashboard/logout');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send();
          }
        </script>
        <!--Select2 js-->
        <script>
             $(document).ready(function() {
                $('.wide').select2();
            });
            
            $('img').bind('contextmenu', function(e) {
    return false;
}); 
        </script>
        
    </body>
   
</html>
