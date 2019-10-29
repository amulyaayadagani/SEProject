<header class="site-header js-site-header">
   <div class="container-fluid">
   <div class="row align-items-center">
      <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.php?page=search">PARRK Hotel</a></div>
      <div class="col-6 col-lg-8">
         <!-- <div class="site-login-toggle js-site-login-toggle" data-aos="fade">
            <i class="fas fa-user"></i>
            </div> -->
         <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
            <span></span>
            <span></span>
            <span></span>
         </div>
         <!-- END menu-toggle -->
         <div class="site-navbar js-site-navbar">
            <nav role="navigation">
               <div class="container">
                  <div class="row full-height align-items-center">
                     <div class="col-md-6 mx-auto">
                        <ul class="list-unstyled menu" id="header-menu">
                           <li class="active"><a href="index.php?page=search">Home</a></li>
                           <li ><a href="index.php?page=login">Login</a></li>
                           <li ><a href="index.php?page=registration">Registration</a></li>
                           <li><a href="reservation.html">Lookup Reservation</a></li>
                           <li><a href="index.php?page=admin">Admin</a></li>
                           <li><a href="index.php?page=about">About</a></li>
                        </ul>
                        </div>
                     </div>
                  </div>
            </nav>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- END head -->
<section class="site-hero overlay" style="background-image: url(../images/homeImage.jpg)" data-stellar-background-ratio="0.5">
   <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
         <div class="col-md-10 text-center" data-aos="fade-up">
            <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To 5 <span class="fa fa-star text-primary"></span>   Hotel</span>         
            <?php 
               $page = ( isset($_GET['page']) ) ? $_GET['page'] : 'search';
               $pageContent = array("search"=>"Best Place to stay", "rooms"=>"Room Details", "reservation"=>"Reservation", "about" => "About","registration"=>"Registration","admin"=>"Administration","login"=>"Login");               
               echo "<h1 class='heading'>". $pageContent[$page] ."</h1>";
               ?>
         </div>
      </div>
   </div>
</section>