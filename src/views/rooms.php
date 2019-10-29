<section class="section bg-light">
   <div class="container">
      <!-- <div class="row justify-content-center text-center mb-5">
         <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Great Offers</h2>
            <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
         </div>
      </div> -->
      <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
         <a href="#" class="image d-block bg-image-2" style="background-image: url('../images/img_1.jpg');"></a>
         <div class="text">
            <span class="d-block mb-4"><span class="display-4 text-primary"><?php echo $Price; ?></span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4"><?php echo $RoomType . '   Room'; ?></h2>
            <p><?php echo $Room_Description; ?></p>
            <p>Rooms include hot breakfast buffet, free high speed Internet and free shuttle within a 5 mile radius of hotel.</p>
            <p>Availability of Rooms - <?php echo $availableCount . '/' . $Num_of_Rooms;?></p>
            <p><a href="index.php?page=reserve" class="btn btn-primary text-white">Book Now 1</a></p>
         </div>
      </div>
   </div>
</section>