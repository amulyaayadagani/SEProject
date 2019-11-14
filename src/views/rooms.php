<section class="section bg-light">
   <div class="container">
      <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
         <a href="#" class="image d-block bg-image-2" style="background-image: url('../images/img_1.jpg');"></a>
         <div class="text">
            <span class="d-block mb-4"><span class="display-4 text-primary"><?php echo $Price .'$'; ?></span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4"><?php echo $RoomType . '   Room'; ?></h2>
            <p><?php echo $Room_Description; ?></p>
            <p>Rooms include hot breakfast buffet, free high speed Internet and free shuttle within a 5 mile radius of hotel.</p>
            <p>Availability of Rooms - <?php echo $availableCount . '/' . $Num_of_Rooms;?></p>
            <?php if(isset($_SESSION['user_id'])) : ?>
            <p><a href="index.php?page=reserve" class="btn btn-primary text-white"><?php if($availableCount == 0) { echo 'Waitlist'; } else { echo 'Book Now'; }?></a></p>
             <p class=" btn-primary text-white"><?php if($availableCount==0){echo 'Predective Analysis: 10%';}?></p>
             <?php endif; ?>
          <?php if(!(isset($_SESSION['user_id']))) : ?>
            <p><a href="index.php?page=login" class="btn btn-primary text-white">Please Login before Booking</a></p>
             <?php endif; ?>
           
         </div>
      </div>
   </div>
</section>
