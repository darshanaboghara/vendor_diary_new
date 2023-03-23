 <style>
     .text-default {
         color: <?php echo $site->colour_name; ?> !important;
     }
 </style>
 <noscript>
     <div class="noscript colrw boxshadow">You have not enabled Javascript on your browser, please enable it to use the website</div>
 </noscript>
 <div class="vd-main">
     <div class="page-header2 vd-breadcrumb">
         <div class="container">
             <div class="row">
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                     <div class="page-caption2">
                         <h1 class="page-title">FAQ</h1>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- /.page-header -->
     <!-- contact-form -->
     <div class="space-medium bg-white vd-faq-cms">
         <div class="container">
             <div class="row">
                 <div class="col">
                     <!-- contact-block -->
                     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089" crossorigin="anonymous"></script>
                     <!--Home page -->
                     <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8898782763527089" data-ad-slot="5983426633" data-ad-format="auto" data-full-width-responsive="true"></ins>
                     <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                     </script>
                     <div class="vd-faq">
                         <h1 class="vd-title">FAQ</h1>
                         <!--<p>Last updated: June 22, 2021</p>-->
                         <div class="vd-faq-wrap">
                             <?php foreach ($allfaq as $data) { ?>
                                 <div class="vd-single-faq">
                                     <div class="vd-que">
                                         <!--<i class="far fa-question-circle"></i>-->
                                         ⭐ <?php echo $data->question; ?>
                                     </div>
                                     <div class="vd-ans">
                                         <!--<i class="fas fa-long-arrow-alt-right"></i>-->
                                         ➡️ <?php echo $data->answer; ?>
                                     </div>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>
                     <div class="vd-contactus-block">
                         <h1 class="vd-title">Contact Us</h1>
                         <p class="vd-desc">If you have any questions about this Privacy Policy, You can contact us:</p>
                         <ul class="vd-info">
                             <li>By email: info@vendordiary.com</li>
                         </ul>
                     </div>
                     <!-- /.contact-block -->
                 </div>

             </div>
         </div>
         <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8898782763527089" crossorigin="anonymous"></script>
         <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-76+cm+32-21+6c" data-ad-client="ca-pub-8898782763527089" data-ad-slot="3287615491"></ins>
         <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
         </script>
     </div>
     <!-- /.contact-form -->
     <!-- contact-block-section -->
 </div>

 </html>