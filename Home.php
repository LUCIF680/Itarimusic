<?php session_start();?>
<!DOCTYPE html>

<head>
<meta charset="ISO-8859-1">
<title>Itari-Music:The Home of Random Songs</title>
<meta name="Description" content="Itari-Music is house of viewers who are interested in watching music videos randomly. We provide songs which you really want to hear. Rather than providing trending song, we simply go for songs which didn't get the spotlight, songs which really are of fine quality. Here you will find songs which you probably never heard of. ">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="CSS/bootstrap.css">
<link rel="stylesheet" href="CSS/linericon/style.css">
<link rel="stylesheet" href="CSS/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="CSS/animate.css">
<link rel="stylesheet" href="CSS/owl.carousel.min.css">
<link rel="stylesheet" href="CSS/owl.theme.default.min.css">
<link rel="stylesheet" href="CSS/magnific-popup.css">
<link rel="stylesheet" href="CSS/aos.css">
<link rel="stylesheet" href="CSS/ionicons.min.css">
<link rel="stylesheet" href="CSS/bootstrap-datepicker.css">
<link rel="stylesheet" href="CSS/jquery.timepicker.css">
<link rel="stylesheet" href="CSS/flaticon.css">
<link rel="stylesheet" href="CSS/icomoon.css">
<link rel="stylesheet" href="CSS/style(2).css">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3CSS/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/CSS/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<link rel="stylesheet" href="CSS/Home_page_Style.css">

<script src="JS/Same Code for every page.js"></script>
<script src="JS/SignIn.js"></script>
<script src="JS/AllBackGroundTaskHomePage_ver=2.js"></script>
<script src="JS/UpdateExploredSongs.js"></script>


</head>
<body onload="allBackGroundTask()">



<?php require 'Header.php'?>
<!-- SAME UPTO HERE FOR EVERY PAGE -->
<div align="center">
<a href="ExploredSongs.php"><button class="explored_btn_span"><span>EXPLORED SONGS</span></button></a>
<a href="Songs.php"><button class="listen_btn_span"><span>LISTEN SONGS</span></button></a>
<img class="slider"  style="max-height:100%;max-width:120%"height="80%" width="100%" alt="Random Music,font-Monotype Corsiva"/>
</div>
</div>

<section class="welcome_area p_120" id="about">
  <div class="container">
    <div class="row welcome_inner">
      <div class="col-lg-6">
        <div class="welcome_text">
          <h4>About</h4>
          <p>Itari-Music is house of viewers who are interested in watching music videos randomly. We provide songs which you really want to hear. Rather than providing trending song, we simply go for songs which didn't get the spotlight, songs which really are of fine quality. Here you will find songs which you probably never heard of.</p>
          <div class="row">
            <div class="col-md-4">
              <div class="wel_item">
                <i class="lnr lnr-database"></i>
                <h4>10+</h4>
                <p>Total Subscriber</p>
              </div>
            </div>
          <div class="col-md-4">
              <div class="wel_item">
                <i class="lnr lnr-book"></i>
                <h4>100+</h4>
                <p>Available Songs</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w3-col m5" style="margin-top:15%">
        <p class="w3-wide"><i class="fa fa-user-plus w3-margin-right"></i>Total Subscriber</p>
        <div class="w3-grey">
          <div class="w3-container w3-dark-grey w3-center" style="width:5%">10+</div>
        </div><br>
        <p class="w3-wide"><i class="fa fa-dollar w3-margin-right"></i>Monthly Donation</p>
        <div class="w3-grey">
          <div class="w3-container w3-dark-grey w3-center" style="width:5%">$10+</div>
        </div>
</div>
</div>
</div>
</section>

<section class="ftco-section-parallax ftco-degree-bg">
  <div class="parallax-img d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-center heading-section heading-section-white ftco-animate">
          <h2 class="h1 font-weight-bold">Itari-Music is created so that viewer can experience new songs, which are worth watching</h2>
          <p><a href="Songs.php" class="btn btn-primary btn-outline-white mt-3 py-3 px-4">Watch Now</a></p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Our Services</span>
          <h2>Itari provides a fully featured song platform</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon color-1 d-flex justify-content-center mb-3"><span class="align-self-center icon-live_help"></span></div></div>
            <div class="media-body p-2">
              <h3 class="heading">Your Support</h3>
              <p>Your support is essential to keeping Itari-Music running.Donate to stay ad-free and faster access.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon color-2 d-flex justify-content-center mb-3"><span class="align-self-center icon-microphone"></span></div></div>
            <div class="media-body p-2">
              <h3 class="heading">Singers</h3>
              <p>Give it a shot to the truley destined singers, who deserve your time.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon color-3 d-flex justify-content-center mb-3"><span class="align-self-center icon-queue_music"></span></div></div>
            <div class="media-body p-2">
              <h3 class="heading">Random</h3>
              <p>Why waste time choosing a song, leave that to us. Enjoy songs like never before with our Random songs.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon color-4 d-flex justify-content-center mb-3"><span class="align-self-center icon-explore"></span></div></div>
            <div class="media-body p-2">
              <h3 class="heading">Explore</h3>
              <p>Experience songs like never before, save all songs in one place. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="ftco-section ftco-counter ftco-degree-bg" id="section-counter">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2>Why Donate?</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 text-center">
            <div class="text">
              <strong class="number">More Songs</strong>
              <span>Get more singers and songs in near future</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 text-center">
            <div class="text">
              <strong class="number">Big</strong>
              <span>The next big thing is coming.</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 text-center">
            <div class="text">
              <strong class="number">No Ads</strong>
              <span>We don’t follow you around with ads.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<br><br><br><br><br><br><br><br>

<!--Pricing section-->

    <div align="center" >
      <div style="width:50%">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Donation</li>
        <li class="w3-padding-16"><b style="color:black">Get a chance to win big in upcoming feature</b></li>
        <li class="w3-padding-16"><b style="color:black">Help us run this service</b></li>
        <li class="w3-padding-16"><b style="color:black">More Singers and Songs</b></li>
        <li class="w3-padding-16"><b style="color:black">Itari-Music stays Ad-Free</b></li>
        <li class="w3-padding-16">
          <h2 class="w3-wide"> </h2>
          <span class="w3-opacity"><br>  <br><br></span>
        </li>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="G5524P2DQPX5E">
          <li class="w3-light-grey w3-padding-24">
          <button onchange="submit()" class="w3-button w3-black w3-padding-large">Donate</button>
          </li>
          </form>
      </ul>
    </div>
  </div>
<br>
<br>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="JS/jquery.min.js"></script>
<script src="JS/jquery-migrate-3.0.1.min.js"></script>
<script src="JS/popper.min.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/jquery.easing.1.3.js"></script>
<script src="JS/jquery.waypoints.min.js"></script>
<script src="JS/jquery.stellar.min.js"></script>
<script src="JS/owl.carousel.min.js"></script>
<script src="JS/jquery.magnific-popup.min.js"></script>
<script src="JS/aos.js"></script>
<script src="JS/jquery.animateNumber.min.js"></script>
<script src="JS/bootstrap-datepicker.js"></script>
<script src="JS/jquery.timepicker.min.js"></script>
<script src="JS/main.js"></script>

</body>
</html>
