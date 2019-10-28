<!--<section class="section " id="usr_next">-->
  <div class="container">
    <h3>User Profile</h3>
    <div class="row">
      <div class="col-md-7" >                         
        <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
          <div class="row">
            <div class="col-md-4 form-group">
              <label for="usr_fname">First Name</label>
              <input type="text" id="usr_fname" value = "<?php echo $fname;?>" class="form-control" required>
            </div>
            <div class="col-md-4 form-group">
              <label for="usr_mname">Middle Name</label>
              <input type="text" id="usr_mname" value = "<?php echo $mname;?>" class="form-control ">
            </div>
            <div class="col-md-4 form-group">
              <label for="usr_lname">Last Name</label>
              <input type="text" id="usr_lname" value = "<?php echo $lname;?>" class="form-control " required>
            </div>                  
          </div>
          <div class="row">
            <div class="col-md-4 form-radio">
              <label for="usr_gender" class="radio-label">Gender :</label>
              <div class="form-radio-item">
                  <input type="radio" name="usr_gender" id="usr_male" checked>
                  <label for="usr_male">Male</label>
                  <span class="check"></span>
              </div>
              <div class="form-radio-item">
                  <input type="radio" name="usr_gender" id="usr_female">
                  <label for="usr_female">Female</label>
                  <span class="check"></span>
              </div>
            </div> 
            <div class="form-group">
                <label for="usr_birth_date">DOB :</label>
                <input type="text" name="usr_birth_date" value = "<?php echo $dob;?>" id="usr_birth_date" required>
            </div>                    
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="usr_phone">Phone</label>
              <input type="text" id="usr_phone" value = "<?php echo $contact;?>" class="form-control ">
            </div> 
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="usr_email">Email</label>
              <input type="email" id="usr_email" value = "<?php echo $email;?>" class="form-control ">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="usr_address">Address :</label>
              <input type="text" name="usr_address" id="usr_address" value = "<?php echo $address;?>" class="form-control" />
          </div>
        </div>
          <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
              <label for="city" >City</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="" id="city" class="form-control">
                  <option value="">Greensboro</option>
                <option value="">Charlotte</option>
                <option value="">Raleign</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-md-0">
              <label for="state" >State</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="" id="state" class="form-control">
                  <option value="">North Carolina</option>
                  <option value="">South Carolina</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="submit" value="Save" class="btn btn-primary text-white font-weight-bold">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<!--</section> -->