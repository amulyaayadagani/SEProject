<section class="section bg-light">
<div class="container">
       <div class="row justify-content-center text-center mb-5">
         <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Confirm booking</h2>
            <h2 class="heading" data-aos="fade"><?php echo $room_type; ?></h2>
            </div>
         <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
            <p><?php echo $Room_Description; ?></p>
            <p>redeempoints : <?php echo $c_points?></p>
            <p>price with redeem : <?php echo $room_price - $c_points* .01 ?>  </p>
            <p>price without redeem: <?php echo $room_price ?></p>
            <p><a href="index.php" class="btn btn-primary text-white">Book</a></p>
         </div>
</section>