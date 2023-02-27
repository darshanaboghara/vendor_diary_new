<html>
   <head>
      <meta name="robots" content="index, follow">
      <link rel="icon" href="<?php echo base_url()."/assets/images/top10.png";?>">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <title>Top 10 News in the world, top News</title>
      <meta property="og:title" content="Top 10 richest people in the world, top Billionaires">
      <meta property="og:url" content="<?php echo base_url()."/demo";?>">
      <meta property="og:description" content="Top 10 richest people in the world, top Billionaires ,  <?php foreach($response->articles as $data) { echo $data->title; echo ","; } ?> ">
      <meta property="og:image" content="<?php echo  base_url(); ?>assets/images/qlukYVNE.png?>">
      <meta name="description" content="Top 10 richest people in the world, top Billionaires ,  <?php foreach($response->articles as $data) { echo $data->title; echo ","; } ?> "/>
      <link rel="canonical" href="<?php echo base_url()."/demo";?>" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   </head>
   <body>
      <h1>Top 10 News, top News</h1>
      <div class="card mb-3" style="">
          <div class="row g-0">
               <?php foreach($response3->articles as $data) { ?> 
            <div class="col-md-2 border rounde">
              <img src="<?php echo @$data->urlToImage; ?>" class="img-fluid rounded-start" alt="<?php echo @$data->title; ?>">
            </div>
           
            <div class="col-md-4 border rounde">
              <div class="card-body">
                <h5 class="card-title"><?php echo @$data->title; ?></h5>
                <p class="card-text"><?php echo @$data->description; ?></p>
                <p class="card-text"><small class="text-muted"><?php echo @$data->publishedAt; ?></small></p>
              </div>
            </div>
           <?php }?> 
          </div>
          
        </div>
      
      
      
      <h1>Top 20 News, top News</h1>
      
      <div class="card-group">
          <div class="row g-0">
          <?php $c=0; foreach($response2->articles as $data) { ?> 
          <div class="col-md-4 ">
        <div class="card">
        <img src="<?php echo @$data->urlToImage; ?>" class="card-img-top" alt="<?php echo @$data->title; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo @$data->title; ?></h5>
          <p class="card-text"><?php echo @$data->description; ?></p>
          <p class="card-text"><small class="text-muted"><?php echo @$data->publishedAt; ?></small></p>
        </div>
      </div>
      </div>
      <?php }?>
      </div>
</div>
      
      <table class="table table-striped table-bordered">
         <thead class="thead-dark">
            <tr>
               <th scope="col"></th>
               <th scope="col">News</th>
            </tr>
         </thead>
         <tbody>
            <?php $c=0; foreach($response2->articles as $data) { ?> 
            <tr>
               <th scope="row">
                  <img 
                    src="<?php echo @$data->urlToImage; ?>" 
                    class="rounded float-left" 
                    alt="<?php echo @$data->title; ?>" 
                    width="100px" height="100px" 
                    /> <!--<img--> <!--    src="<?php echo @$data->person->squareImage; ?>?background=000000&amp;cropX1=524&amp;cropX2=1824&amp;cropY1=185&amp;cropY2=1486"--> <!--    src="<?php echo @$data->person->squareImage; ?>?background=000000&amp;cropX1=524&amp;cropX2=1824&amp;cropY1=185&amp;cropY2=1486"--> <!--    class="rounded float-left"--> <!--    alt="profile"--> <!--    width="100"--> <!--    height="100"--> <!--/>--> 
               </th>
               <td style="text-align: justify;"> <a href="<?php echo @$data->url; ?>" target="_blank"> <b><?php echo @$data->title; ?></b><br> <?php echo @$data->description; ?> </a>
               
                    <span><?php echo @$data->source->name; ?></span>
                </td>
            </tr>
            <?php }?> 
         </tbody>
      </table>
      <h1>Top India News, top News</h1>
      <table class="table table-striped table-bordered">
         <thead class="thead-dark">
            <tr>
               <th scope="col"></th>
               <th scope="col">News</th>
            </tr>
         </thead>
         <tbody>
            <?php $c=0; foreach($response->articles as $data) { ?> 
            <tr>
               <th scope="row">
                  <img 
                    src="<?php echo @$data->urlToImage; ?>" 
                    class="rounded float-left" 
                    alt="<?php echo @$data->title; ?>" 
                    width="100px" height="100px" 
                    /> <!--<img--> <!--    src="<?php echo @$data->person->squareImage; ?>?background=000000&amp;cropX1=524&amp;cropX2=1824&amp;cropY1=185&amp;cropY2=1486"--> <!--    src="<?php echo @$data->person->squareImage; ?>?background=000000&amp;cropX1=524&amp;cropX2=1824&amp;cropY1=185&amp;cropY2=1486"--> <!--    class="rounded float-left"--> <!--    alt="profile"--> <!--    width="100"--> <!--    height="100"--> <!--/>--> 
               </th>
               <td style="text-align: justify;"> <a href="<?php echo @$data->url; ?>" target="_blank"> <b><?php echo @$data->title; ?><?php echo @$data->publishedAt; ?></b><br> <?php echo @$data->description; ?> </a>
               
                    <span><?php echo @$data->source->name; ?></span>
                </td>
            </tr>
            <?php }?> 
         </tbody>
      </table>
      
   </body>
</html>
<style>
    body {
    background-color: #f7f9f9;
}
a{
    color:black;
}
a:hover
{
    color:#007bff;
    text-decoration:none;
}
.navbar-brand {
    font-size: 30px;
}
.shift {
    margin-left: 7px;
}
.shadow {
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.border-bottom {
    border: 1px solid #000;
}
.bold {
    font-weight: 700;
}
.show-loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid #273746;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    margin-top: 6%;
    margin-left: 42vw;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}
@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(1turn);
        transform: rotate(1turn);
    }
}
@keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(1turn);
        transform: rotate(1turn);
    }
}

</style>