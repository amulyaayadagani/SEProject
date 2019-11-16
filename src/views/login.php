
    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="username">User ID</label>
                  <input type="text" id="username" name="username" placeholder="Enter User ID " class="form-control" required>
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="password">Password</label>
                  <input type="password" id="userpassword" name="userpassword" placeholder="Enter Password" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <!-- <input type="submit" value="Login" class="btn btn-primary text-white py-3 px-5 font-weight-bold"> -->
               
                  <button type="submit" value="Register" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                  <a class="text-white " id="loginButton">Login</a>
                  </button>
                </div>
              </div>

              <div class="row">
                <?php if(isset($loginError) && strlen($loginError) > 0) : ?>
                    <?php echo '<div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      ' . $loginError .
                   '</div>' ?>
                   <?php endif; ?>
              </div>
            </form>

          </div>
          <!-- <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span class="text-black"> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
                <p><span class="d-block">Phone:</span> <span class="text-black"> (+1) 435 3533</span></p>
                <p><span class="d-block">Email:</span> <span class="text-black"> info@yourdomain.com</span></p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>