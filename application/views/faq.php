 <style>
     .text-default
     {
         color:<?php echo $site->colour_name;?> !important; 
     }
 </style>
    <noscript>
        <div class="noscript colrw boxshadow">You have not enabled Javascript on your browser, please enable it to use the website</div>
    </noscript>
    <div class="page-header2">
        <div class="container">
            <div class="row">
                <!-- page caption -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="page-caption2">
                        <h1 class="page-title">Privacy Policy
                        </h1>
                    </div>
                </div>
                <!-- /.page caption -->
            </div>
        </div>
        <!-- page caption -->
    </div>
    <!-- /.page-header -->
    <!-- contact-form -->
    <div class="space-medium bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- contact-block -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"
                     crossorigin="anonymous"></script>
                 <!--Home page -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8898782763527089"
                     data-ad-slot="5983426633"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                   <h1>FAQ</h1>
        <!--<p>Last updated: June 22, 2021</p>-->
        <?php foreach($allfaq as $data)
        {?>
        
            <h3>
                <!--<i class="far fa-question-circle"></i>-->
            ⭐<b><?php echo $data->question;?></b></h3>
            <td>
                <!--<i class="fas fa-long-arrow-alt-right"></i>-->
            &nbsp ➡️<?php echo $data->answer;?></td>
        <?php }?>
        <h1>Contact Us</h1>
        <p>If you have any questions about this Privacy Policy, You can contact us:</p>
        <ul>
        <li>By email: info@vendordiary.com</li>
        </ul>
                   <!-- /.contact-block -->
                </div>
                
            </div>
        </div>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-76+cm+32-21+6c"
     data-ad-client="ca-pub-8898782763527089"
     data-ad-slot="3287615491"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
    <!-- /.contact-form -->
    <!-- contact-block-section -->
</html>
        
   