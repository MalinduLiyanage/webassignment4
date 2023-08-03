<?php

session_start();

if (isset($_SESSION['username'])) {
  $shopping_text = "MY ACCOUNT";
}else{
  $shopping_text = "SHOPPING";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Johnson Tailors</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="assets/basic_styles.css">
<link rel="stylesheet" href="assets/dynamic_cards.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body onload="typeWriter()">

<div class="w3-top">
  <div class="w3-bar w3-black w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide unclickable" style="font-family: Arial, sans-serif;">JOHNSON TAILORS</a>

    <div class="w3-right w3-hide-small">
      <a href="#home" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">HOME</a>
      <a href="#quality" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">QUALITY</a>
      <a href="#bestsellers" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">BESTSELLERS</a>
      <a href="#work" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">GALLERY</a>
      <a href="#contact" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">CONTACT</a>
      <a onclick="window.location.href = 'login.php';" class="w3-bar-item w3-button" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)" style="background-color: grey; ">
        <?php echo $shopping_text; ?></a>
    </div>

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<nav class="w3-sidebar w3-bar-block w3-hide-medium w3-hide-large" style="display:none;background-color: black;right: 0;" id="mySidebar">

  <a onclick="window.location.href = 'login.php';" class="w3-bar-item w3-button" style="text-align: center;color: white; background-color: grey;"><?php echo $shopping_text; ?></a></a>
  <a href="#home" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">HOME</a>
  <a href="#quality" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">QUALITY</a>
  <a href="#bestsellers" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">BESTSELLERS</a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">GALLERY</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">CONTACT</a>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16" style="text-align: center;color: white;">CLOSE SIDEBAR</a>
</nav>

<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:30px">
    <h1 class="w3-jumbo w3-hide-small" style="margin-right: 45%;">"Elevate Your Style with Exquisite Tailoring."</h1>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">"Elevate Your Style with Exquisite Tailoring."</span>
    <p class="w3-hide-small" id="desc_text" style="text-align: justify;margin-right: 45%;"></p>
    <p><a href="#quality" class="w3-button w3-white w3-padding-large w3-large w3-margin-top  w3-hover-opacity-on" id="explore_btn" style="border-radius: 20px;"onmouseover="addTransition(this)" onmouseout="removeTransition(this)">Explore More</a></p>
  </div> 
</header>

<div class="w3-container w3-padding-64 w3-center" id="quality">
<h2>QUALITY AT JOHNSON's</h2>
<p>This is why People trust us...</p>

<div class="w3-row"><br>
<div class="w3-quarter">
  <img src="assets/quality/1.jpg" alt="quality_1" style="width:45%" class="w3-circle w3-hover-opacity" onclick="showCard_2(this)" onmouseover="showBigger(this)" onmouseout="showOriginalSize(this)">
  <h3>Precision and <br>Attention to Detail</h3>
  <p>We pay meticulous attention to detail, ensuring precise measurements and precise stitching. </p>
</div>

<div class="w3-quarter">
  <img src="assets/quality/2.jpg" alt="quality_2" style="width:45%" class="w3-circle w3-hover-opacity" onclick="showCard_2(this)" onmouseover="showBigger(this)" onmouseout="showOriginalSize(this)">
  <h3>Fit and <br>Proportion</h3>
  <p>We understand how it is important when consider the proper fit and proportion.</p>
</div>

<div class="w3-quarter">
  <img src="assets/quality/3.webp" alt="quality_3" style="width:45%" class="w3-circle w3-hover-opacity" onclick="showCard_2(this)" onmouseover="showBigger(this)" onmouseout="showOriginalSize(this)">
  <h3>Professionalism<br>at always</h3>
  <p>We, at JOHNSON's, complete the work within a reasonable timeframe <br>without compromising quality.</p>
</div>

<div class="w3-quarter">
  <img src="assets/quality/4.jpg" alt="quality_4" style="width:45%" class="w3-circle w3-hover-opacity" onclick="showCard_2(this)" onmouseover="showBigger(this)" onmouseout="showOriginalSize(this)">
  <h3>Customer <br>Satisfaction</h3>
  <p>We always value customer satisfaction and strive to exceed expectations.</p>
</div>
<div id="overlay_2" class="overlay" onclick="hideCard_2()"></div>
  <div id="card_2" class="card">
    <img id="card-image_2" src="" alt="Card Image">
    <h3>Need this quality in your garments?</h3>
    <p>Hurry up! Order your suit now and get it ready in few days!!</p>
  </div>
</div>
</div>
</div>

<div class="w3-container" style="padding:64px 16px" id="bestsellers">
  <h2 class="w3-center">BESTSELLERS</h2>
  <p class="w3-center w3-large">Take a look at our best selling suits...</p>
  <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="assets/bestsellers/1.jpg" alt="best_seller_1" style="width:100%">
        <div class="w3-container">
          <h3>Tuxedo</h3>
          <h5>Rs: 12,000.00 /=</h5>
          <div class="star-rating">
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="star">&#9733;</span>
        </div>
          <p><button class="w3-button w3-light-silver w3-block" onclick="toggleCollapse('desc_1')" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"><i class="fa fa-info"></i> | See Why it's a Bestseller</button></p>
          <p id="desc_1" style="display: none">This suit is a bestseller for a reason - its timeless design and impeccable craftsmanship exude a level of sophistication that stands the test of time. From its tailored fit to the finest quality materials, it effortlessly combines elegance and comfort, making it the go-to choice for those seeking a suit that makes a lasting impression.</p>
          <p><button class="w3-button w3-light-grey w3-block" onclick="location.href='assets/sql/functions.php?addCart=Tuxedo&priceTag=12000';" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"><i class="fa fa-shopping-cart"></i> | ADD TO CART</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="assets/bestsellers/2.jpg" alt="best_seller_2" style="width:100%">
        <div class="w3-container">
          <h3>Cutaway</h3>
          <h5>Rs: 11,000.00 /=</h5>
          <div class="star-rating">
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
        </div>
          <p><button class="w3-button w3-light-silver w3-block" onclick="toggleCollapse('desc_2')" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"><i class="fa fa-info"></i> | See Why it's a Bestseller</button></p>
          <p id="desc_2" style="display: none">This suit is a bestseller for a reason - its timeless design and impeccable craftsmanship exude a level of sophistication that stands the test of time. From its tailored fit to the finest quality materials, it effortlessly combines elegance and comfort, making it the go-to choice for those seeking a suit that makes a lasting impression.</p>
          <p><button class="w3-button w3-light-grey w3-block" onclick="location.href='assets/sql/functions.php?addCart=Cutaway&priceTag=11000';" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"><i class="fa fa-shopping-cart"></i> | ADD TO CART</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="assets/bestsellers/3.jpg" alt="best_seller_3" style="width:100%">
        <div class="w3-container">
          <h3>Lounge Suits</h3>
          <h5>Rs: 17,500.00 /=</h5>
          <div class="star-rating">
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="star">&#9733;</span>
          </div>
          <p><button class="w3-button w3-light-silver w3-block" onclick="toggleCollapse('desc_3')" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"><i class="fa fa-info"></i> | See Why it's a Bestseller</button></p>
          <p id="desc_3" style="display: none">This suit is a bestseller for a reason - its timeless design and impeccable craftsmanship exude a level of sophistication that stands the test of time. From its tailored fit to the finest quality materials, it effortlessly combines elegance and comfort, making it the go-to choice for those seeking a suit that makes a lasting impression.</p>
          <p><button class="w3-button w3-light-grey w3-block" onclick="location.href='assets/sql/functions.php?addCart=LoungeSuit&priceTag=17500';"><i class="fa fa-shopping-cart" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"></i> | ADD TO CART</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="assets/bestsellers/4.jpg" alt="best_seller_4" style="width:100%">
        <div class="w3-container">
          <h3>Johnson's Party Suit</h3>
          <h5>Rs: 15,000.00 /=</h5>
          <div class="star-rating">
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
            <span class="colored-star">&#9733;</span>
        </div>
          <p><button class="w3-button w3-light-silver w3-block" onclick="toggleCollapse('desc_4')" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"><i class="fa fa-info"></i> | See Why it's a Bestseller</button></p>
          <p id="desc_4" style="display: none">This suit is a bestseller for a reason - its timeless design and impeccable craftsmanship exude a level of sophistication that stands the test of time. From its tailored fit to the finest quality materials, it effortlessly combines elegance and comfort, making it the go-to choice for those seeking a suit that makes a lasting impression.</p>
          <p><button class="w3-button w3-light-grey w3-block" onclick="location.href='assets/sql/functions.php?addCart=Party_Suit&priceTag=15000';" onmouseover="addTransition(this)" onmouseout="removeTransition(this)"><i class="fa fa-shopping-cart"></i> | ADD TO CART</button></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w3-container" style="padding:64px 16px" id="work">
  <h2 class="w3-center">GALLERY</h2>
  <p class="w3-center w3-large">Some of our bespoke suits...</p>

  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
      <img src="assets/gallery/1.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_1" id="gal_1">
    </div>
    <div class="w3-col l3 m6">
      <img src="assets/gallery/2.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_2" id="gal_2">
    </div>
    <div class="w3-col l3 m6">
      <img src="assets/gallery/3.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_3" id="gal_3">
    </div>
    <div class="w3-col l3 m6">
      <img src="assets/gallery/4.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_4" id="gal_4">
    </div>
  </div>
  <div class="w3-row-padding w3-section">
    <div class="w3-col l3 m6" onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)">
      <img src="assets/gallery/5.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_5" id="gal_5">
    </div>
    <div class="w3-col l3 m6">
      <img src="assets/gallery/6.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_6" id="gal_6">
    </div>
    <div class="w3-col l3 m6">
      <img src="assets/gallery/7.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_7" id="gal_7">
    </div>
    <div class="w3-col l3 m6">
      <img src="assets/gallery/8.jpg" style="width:100%" onclick="showCard(this)" class="w3-hover-opacity" alt="happy_customer_8" id="gal_8">
    </div>
  </div>

<div id="overlay" class="overlay" onclick="hideCard()"></div>
  <div id="card" class="card">
    <img id="card-image" src="" alt="Card Image">
    <h3>Happy Customer...</h3>
    <p>The attention to detail and level of craftsmanship at Johnson's is truly outstanding. Their master tailors possess an unmatched skill in creating custom garments that fit like a dream. They took the time to understand my preferences and lifestyle, ensuring that every aspect of the design reflected my personal style..</p>
  </div>
</div>

<footer class="w3-container w3-padding-64 w3-light-grey w3-center  w3-xlarge" style="margin-top:128px;" id="contact">
  <h2>CONTACT</h2>
  <p class="w3-medium">Connect with us:</p>
  <p class="w3-medium"><i class="fa fa-facebook-official w3-hover-opacity"></i> | facebook.com/johnsontailors</p>
  <p class="w3-medium"> <i class="fa fa-twitter w3-hover-opacity"></i> | twitter.com/johnsontailors</p>

  <div class="w3-row-padding" style="margin-top:64px;">
    <div class="w3-col m6">
      <p style="font-size: 12px">* - You can delete or edit those messages once you are created an account at Johnson's with this Phone Number.</p>
      <form method="POST" action="assets/sql/contact_operation.php">
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px;">
          <div class="w3-half">
            <input class="w3-input w3-border w3-medium" type="text" placeholder="Name" 
            id="name_input" name="namecontact">
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border w3-medium" type="text" placeholder="Phone" id="phone_input" name="phonecontact">
          </div>
        </div>
        <input class="w3-input w3-border w3-medium" type="text" placeholder="Message" id="msg_input" name="messagecontact">
          <button class="w3-button w3-medium w3-black w3-section w3-left" type="submit" onclick="validate()" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">SEND</button>
      </form>
    </div>
    <div class="w3-col m6">
      <div class="w3-padding-16">
        <span class="w3-xlarge w3-padding-16">Contact Info</span>
        <p class="w3-large">Email: sales@johnsontailors.com</p>
        <p class="w3-large">Phone: +94 11 2 41 41 41</p>
        <p class="w3-large">Address: No. 122, Main Street, Colombo, Sri Lanka</p>
      </div>
    </div>
    <button id="backHome" class="w3-button w3-black w3-section w3-center" onclick="navigateToHome()" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">BACK TO HOME SECTION</button>
  </div>
</footer>
<p class="w3-large" style="text-align: center;">ICT1920067 / Index : 5005 / Assignment 04</p>
 
<script type="text/javascript" src="assets/js/navigations.js"></script>
<script type="text/javascript" src="assets/js/dynamic_cards.js"></script>
<script type="text/javascript" src="assets/js/bg_images.js"></script>
<script type="text/javascript" src="assets/js/smooth_scroll.js"></script>
<script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="assets/js/sweetAlert.js"></script>
<script type="text/javascript" src="assets/js/form_controls.js"></script>
<script type="text/javascript" src="assets/js/typewriter_effect.js"></script>
<script type="text/javascript" src="assets/js/star_rating.js"></script>
<script type="text/javascript" src="assets/js/big_quality.js"></script>
<script type="text/javascript" src="assets/js/toggle_desc.js"></script>
<script type="text/javascript" src="assets/js/particles.js"></script>
<script type="text/javascript" src="assets/js/btn_hover.js"></script>
<script type="text/javascript" src="assets/js/tooltip_src_1.js"></script>
<script type="text/javascript" src="assets/js/tooltip_src_2.js"></script>
<script type="text/javascript" src="assets/js/tooltips.js"></script>

</body>
</html>
