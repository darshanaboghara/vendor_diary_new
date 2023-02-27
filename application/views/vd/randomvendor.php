<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <ul class="cards">
             <?php
                if ($vendorrandom == null) {
                    echo "No data found";
                } else {
                    //die( base_url());
                    $i=1;
                    foreach ($vendorrandom as $data) {
                        $this->OH->addvendorview($data->id,"Recommendation",null)
                        ?>
                        <li class="card card-<?=$i?>">
                            <!--<img src="http://lorempixel.com/400/250/city"/>-->
                            <?php $r=rand(1,40);?>
                            <a id="img<?php echo $data->id ?>"  href="<?php echo base_url() . 'Vendor_details/'; if($data->planner_name){ echo $data->planner_name;}else
                                    { echo $data->business_name;
                                    }?>" target="_blank">
                             <img loading="lazy" src='<?php echo (file_exists(IMAGELINK . $data->image))? base_url() . IMAGELINK . $data->image : base_url()."assets/images/wedding-planner/$r.jpeg";  ?>'  alt="Vendor Image Not Found" class="img-fluid" height=20px ></a>
                    <div class="content">
                      <h2><?=$data->planner_name?></h2>
                      <!--<p>Card description</p>-->
                    </div>
                  </li>
                        <?
                        $i++;
                    }
                ?>
                  <!--<li class="card card-1"><img src="http://lorempixel.com/400/250/city"/>-->
                  <!--  <div class="content">-->
                  <!--    <h1>Card 1 Title</h1>-->
                  <!--    <p>Card description</p>-->
                  <!--  </div>-->
                  <!--</li>-->
                  <!--<li class="card card-2"><img src="http://lorempixel.com/400/250/city"/>-->
                  <!--  <div class="content">-->
                  <!--    <h1>Card 1 Title</h1>-->
                  <!--    <p>Card description</p>-->
                  <!--  </div>-->
                  <!--</li>-->
                  <!--<li class="card card-3"><img src="http://lorempixel.com/400/250/city"/>-->
                  <!--  <div class="content">-->
                  <!--    <h1>Card 1 Title</h1>-->
                  <!--    <p>Card description</p>-->
                  <!--  </div>-->
                  <!--</li>-->
                  <!--<li class="card card-4"><img src="http://lorempixel.com/400/250/city"/>-->
                  <!--  <div class="content">-->
                  <!--    <h1>Card 1 Title</h1>-->
                  <!--    <p>Card description</p>-->
                  <!--  </div>-->
                  <!--</li>-->
                  <!--<li class="card card-5"><img src="http://lorempixel.com/400/250/city"/>-->
                  <!--  <div class="content">-->
                  <!--    <h1>Card 1 Title</h1>-->
                  <!--    <p>Card description</p>-->
                  <!--  </div>-->
                  <!--</li>-->
   
                <!--<?php } ?>-->
    </ul>
    </body>
</html>

<style>
    body {
  font-size: 14px;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
  margin: 20px;
  /*background: -webkit-linear-gradient(right bottom, #F5A1D5 0%, #CDD3E9 100%);*/
  /*background: linear-gradient(to left top, #F5A1D5 0%, #CDD3E9 100%);*/
}

ul.cards {
  /*width: 660px;*/
  margin: 0 auto 20px;
  /*height: 300px;*/
  list-style-type: none;
  position: relative;
  padding: 20px 0;
  cursor: pointer;
}
ul.cards li.title {
  margin: 0 0 20px;
}
ul.cards li.title h2 {
  font-weight: 700;
}
ul.cards li.card {
  background: #FFF;
  overflow: hidden;
  height: 250px;
  width: 200px;
  border-radius: 10px;
  position: absolute;
  left: 0px;
  box-shadow: 1px 2px 2px 0 #aaa;
  -webkit-transition: all 0.4s cubic-bezier(0.63, 0.15, 0.03, 1.12);
  transition: all 0.4s cubic-bezier(0.63, 0.15, 0.03, 1.12);
}
ul.cards li.card img {
  width: 100%;
  height: 50%;
}
ul.cards li.card div.content {
  padding: 5px 10px;
}
ul.cards li.card.card-1 {
  z-index: 10;
  -webkit-transform: rotateZ(-2deg);
          transform: rotateZ(-2deg);
}
ul.cards li.card.card-2 {
  z-index: 9;
  -webkit-transform: rotateZ(-7deg);
          transform: rotateZ(-7deg);
  -webkit-transition-delay: 0.05s;
          transition-delay: 0.05s;
}
ul.cards li.card.card-3 {
  z-index: 8;
  -webkit-transform: rotateZ(5deg);
          transform: rotateZ(5deg);
  -webkit-transition-delay: 0.1s;
          transition-delay: 0.1s;
}
ul.cards.transition li.card {
  -webkit-transform: rotateZ(0deg);
          transform: rotateZ(0deg);
}
ul.cards.transition li.card.card-1 {
  left: 440px;
}
ul.cards.transition li.card.card-2 {
  left: 220px;
}
</style>
<script>
jQuery(document).ready(function($){
  $('ul.cards').on('click', function(){
    $(this).toggleClass('transition');
  });
  
  $('ul.card-stacks').on('click', function(){
    $(this).toggleClass('transition');
  });
  
  $('ul.cards-split').on('click', function(){
    $(this).toggleClass('transition');
  });
  
  $('ul.cards-split-delay').on('click', function(){
    $(this).toggleClass('transition');
  });
});
</script>