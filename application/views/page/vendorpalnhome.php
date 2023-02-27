<section id="controller" class="container-fluid  logo-container">
  <h2>VENDOR PLANS</h2>
  <div class="row center">
      <ul>
    <li>
      <div class="logo-holder logo-1">
          <h3><img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/image-9.png' alt='Image' title='Image'/></h3>
          <p>FREE</p>
      </div>
    </li>
    <li>
      <div class="logo-holder logo-1">
          <h3><img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/basic-plan.png' alt='Image' title='Image'/></h3>
          <p>BASIC</p>
      </div>
    </li>
    <li>
      <div class="logo-holder logo-1">
          <h3><img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/image-11.png' alt='Image' title='Image'    /></h3>
          <p>PRIME</p>
      </div>
    </li>
    <li>
      <div class="logo-holder logo-1">
          <h3><img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/image-10.png' alt='Image' title='Image'    /></h3>
          <p>PREMIUM</p>
      </div>
    </li>
   
  </ul>
    <!--<div class="col-md-3"> <img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/image-9.png' alt='Image' title='Image'    /><h1>FREE</h1></div>
     <div class="col-md-3"> <img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/basic-plan.png' alt='Image' title='Image'    /><h1>BASIC</h1></div>
      <div class="col-md-3"> <img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/image-11.png' alt='Image' title='Image'    /><h1>PRIME</h1></div>
      <div class="col-md-3"> <img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/image-10.png' alt='Image' title='Image'    /><h1>PREMIUM</h1></div>-->
  </div>
  <div class="row">
      <div class="col">
          <a href="<?= base_url()?>Vendorplan" class="btn">Show More Plan Details</a>
      </div>
  </div>
</section>

<style>

#planlogo{
    width:130px;
}
    #trailer, #controller h2 {
  text-align: center;
}

#controller {
  padding-bottom: 50px;
  padding-top: 50px;
  background-color: white;
}

#controller h2 {
  padding-bottom: 10px;
}

.col-md-3{
    text-align:center;
}
#controller .col {
  margin: 5px;
  padding: 5px;
  text-align: center;
  font-weight: bold;
}

#controller .col:not(:empty) {
/*   background-color: gray; */
  border-radius: 50px;
  cursor: pointer;
  /* flex: 0 0 100px; */
}

#controller .col:not(:empty):hover {
  /*background-color: #ddd;*/
}

#cards {
  margin: 20px 10px;
}

#cards a {
/*  color: black;*/
  text-decoration: none;
}

#cards .card {
  cursor: pointer;
}

#cards .card:hover {
  border: 3px solid black;
}

</style>





<!--<div class="logo-container controller">
  <h1 class="Logos">Logo Design Pure HTML CSS</h1>
  <p class="para">MAHI WEB</p>
  <ul>
    <li>
      <div class="logo-holder logo-1">
        <a href="">
          <h3>Lorem Ipsum</h3>
          <p>dolor sit amet</p>
        </a>
      </div>
    </li>
    <li>
      <div class="logo-holder logo-2">
        <a href="">
          <h3><img id="planlogo" align='center' border='0' src='https://vendordiary.com/emailpics/image-9.png' alt='Image' title='Image'    /></h3>
          <p>ipsum dolor sit</p>
        </a>
      </div>
    </li>
    <li>
      <div class="logo-holder logo-3">
        <a href="">
          <h3>Lorem Ipsum</h3>
          <p>dolor sit amet</p>
        </a>
      </div>
    </li>
    <li>
      <div class="logo-holder logo-4">
        <a href="">
          <h3>Lorem</h3>
          <p>ipsum dolor sit</p>
        </a>
      </div>
    </li>
   
  </ul>
</div>-->
<style>
    @import url('https://fonts.googleapis.com/css?family=Bangers|Cinzel:400,700,900|Lato:100,300,400,700,900|Lobster|Lora:400,700|Mansalva|Muli:200,300,400,600,700,800,900|Open+Sans:300,400,600,700,800|Oswald:200,300,400,500,600,700|Roboto:100,300,400,500,700,900&display=swap');
/* Used Google Fonts */
font-family: 'Roboto', sans-serif;
font-family: 'Mansalva', cursive;
font-family: 'Lato', sans-serif;
font-family: 'Open Sans', sans-serif;
font-family: 'Oswald', sans-serif;
font-family: 'Lora', serif;
font-family: 'Muli', sans-serif;
font-family: 'Lobster', cursive;
font-family: 'Cinzel', serif;
font-family: 'Bangers', cursive;
/* Used Google Fonts */
body{
  font-size:17px;
  /*color:#424242;*/
  font-family: 'Open Sans', sans-serif;
  background-color: #ffffff;
  background-image: url("https://www.transparenttextures.com/patterns/clean-gray-paper.png");
}
h1, h2, h3, h4, h5, h6, p{
  margin:0px;
  padding:0px;
}
.logo-container ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    /*flex-direction: row-reverse;*/
    justify-content: center;
    width: 100%;
}
.logo-container ul li {
    width: 300px;
    height: 190px;
    background: #fff;
    border-radius: 10px;
    margin: 10px;
    float: left;
    padding:20px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);    
    display: flex;
    align-items: center;
    justify-content: center;
}
.logo-container ul li:hover {
    background: #e2ebff;
}
.logo-container ul li:hover h3 #planlogo{
    
    width:150px;
}
.logo-container ul li a{
  text-decoration:none !important;
  display: inline-block;
}
.logo-holder{
  text-align:center;
}
.logo-holder:hover h3 #planlogo {
  width:150px;
  transition: width 0.1s;
}
.logo-holder h3 #planlogo {
  width:130px;
  transition: width 0.2s;
}

/* Logo-1 */
.logo-1 h3 {
    color: #e74c3c;
    font-family: 'Oswald', sans-serif;
    font-weight: 300;
    font-size: 50px;
    line-height:1.3;
}
.logo-1 p {
    font-size: 14px;
    letter-spacing: 8px;
    text-transform: uppercase;
    padding-left: 10px;
    color: #34495e;
    font-weight: 600;
}
</style>