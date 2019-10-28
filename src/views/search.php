<section class="section bg-light pb-0"  >
   <div class="container">
      <div class="row check-availabilty" id="next">
         <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
            <form id="search-form" method="post" action="./index.php?page=rooms" >
               <div class="row">
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                     <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                     <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" required type="text" name="checkin_date" id="checkin_date" class="form-control">
                       
                     </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                     <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                     <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" required type="text" name="checkout_date" id="checkout_date" class="form-control">
                       
                     </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                     <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                           <label for="adults" class="font-weight-bold text-black">Room Type</label>
                           <div class="field-icon-wrap">
                              <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                              <select required name="room_type" id="adults" class="form-control">
                                 <option value="1">Single</option>
                                 <option value="2">Double</option>
                                 <option value="3">King</option>
                                 <option value="4">Queen</option>
                                 <option value="5">Suite</option>
                              </select>
                           </div>
                          
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                           <label for="children" class="font-weight-bold text-black">Guests</label>
                           <div class="field-icon-wrap">
                              <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                              <select required name="guests" id="guests" class="form-control">
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4+</option>
                              </select>
                           </div>
                          
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3 align-self-end">
                     <button type="submit" name="Submit" class="btn btn-primary btn-block text-white">Check Availabilty</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<section class="py-5 bg-light">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <figure class="img-absolute">
               <img src="../images/food-1.jpg" alt="Image" class="img-fluid">          
            </figure>
            <img src="../images/img_1.jpg" alt="Image" class="img-fluid rounded">
         </div>
         <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading">Welcome!</h2>
            <p class="mb-4">Beautiful location, Stunning sunsets, Live music, a fitness room and an activity center give you plenty of options for fun.</p>
            <p><a href="index.php?page=about" class="btn btn-primary text-white py-2 mr-3">Learn More</a></p>
         </div>
      </div>
   </div>
</section>
<!-- END section -->
<!--  <section class="section testimonial-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">People Says</h2>
          </div>
        </div>
        <div class="row">
          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            
            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>


            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

          </div>
      END slider 
        </div>

      </div>
    </section> -->

<script>
   (function($) {
   
   var checkin_date = $('#checkin_date').datepicker({
      startDate: new Date(),
      autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#checkout_date').datepicker('setStartDate', minDate);
    });
   
   $('#checkout_date').datepicker({
   autoclose: true,
    });
   
   
   $('#search-form').on('submit', function(e){
    if ($('#checkin_date').val()==''){
      e.preventDefault();
      $('#checkin_date .error').css("display","block");
        console.log(e);
    } 
   
      if($('#checkout_date').val()==''){
      e.preventDefault();
      $('#checkout_date .error').css("display","block");
        console.log(e);
     } 
   
      if($('#room_type').val()==''){
      e.preventDefault();
      $('#room_type .error').css("display","block");
        console.log(e);
     } 
   
      if($('#guests').val()==''){
        
        e.preventDefault();
         $('#guests .error').css("display","block");
        console.log(e);
        // alert('Fill in both fields');
        // You can use an alert or a dialog, but I'd go for a message on the page
        //$('#errormsg').text('Fill in both fields').show();
    }
   
    else{
        // do nothing and let the form post
    }
  
   });

  //  var major2Carousel = $('.js-carousel-2');
  // major2Carousel.owlCarousel({
  //   loop:true,
  //   autoplay: true,
  //   stagePadding: 7,
  //   margin: 20,
  //   // animateOut: 'fadeOut',
  //   // animateIn: 'fadeIn',
  //   nav: true,
  //   autoplayHoverPause: true,
  //   autoHeight: true,
  //   items: 3,
  //   navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
  //   responsive:{
  //     0:{
  //       items:1,
  //       nav:false
  //     },
  //     600:{
  //       items:2,
  //       nav:false
  //     },
  //     1000:{
  //       items:3,
  //       dots: true,
  //       nav:true,
  //       loop:false
  //     }
  //   }
  // });
   
   })(jQuery);
</script>