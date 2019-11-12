<!-- Ritu: Add Employees-->
<!--<section class="section bg-image overlay" style="background-image: url('../images/hero_4.jpg');">-->
  <div class="container" >
    <!--<section class="section contact-section" id="next"> -->
      <h3> Add Employee</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">  
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-4 form-group">
                  <label for="emp_fname">First Name</label>
                  <input type="text" id="emp_fname" name="emp_fname" class="form-control " required>
                </div>
                <div class="col-md-4 form-group">
                  <label for="emp_mname">Middle Name</label>
                  <input type="text" id="emp_mname" name="emp_mname" class="form-control ">
                </div>
                <div class="col-md-4 form-group">
                  <label for="emp_lname">Last Name</label>
                  <input type="text" id="emp_lname" name="emp_lname" class="form-control " required>
                </div>                  
              </div>
              <div class="row" diabled=true>
                <div class="col-md-4 form-radio">
                  <label for="gender" class="radio-label">Gender :</label>
                  <div class="form-radio-item">
                      <input type="radio" name="gender" id="male" value="Male" checked>
                      <label for="male">Male</label>
                      <span class="check"></span>
                  </div>
                  <div class="form-radio-item">
                      <input type="radio" name="gender" id="female" value="Female">
                      <label for="female">Female</label>
                      <span class="check"></span>
                  </div>
                </div> 
                <div class="form-group">
                    <label for="birth_date">DOB :</label>
                    <input type="text" name="birth_date" id="birth_date" required>
                </div>                    
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" name="phone" class="form-control ">
                </div> 
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="address">Address :</label>
                  <input type="text" name="address" id="address" class="form-control" />
              </div>
            </div>
            <div class="row" style="display: none">
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
                <input type="submit" name="add_emp_btn" id="add_emp_btn" value="Add Employee" class="btn btn-primary text-white font-weight-bold">
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    <!--</section> -->
  </div>
   <!-- </section> -->
  <?php
   //print_r($_POST);
      if(isset($_POST["emp_fname"]) && isset($_POST["emp_mname"]) && isset($_POST["emp_lname"]) && isset($_POST["birth_date"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"])) 
    {
      //echo "inside";
      $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
      
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "Insert into employee(E_FName,E_LName,E_MName,address,Contact,email,DOB,gender) values('" . $_POST["emp_fname"] . "','" . $_POST["emp_lname"] . "','" . $_POST["emp_mname"]  . "','" . $_POST["address"] . "'," . $_POST["phone"] . ",'" . $_POST["email"] . "','" . $_POST["birth_date"] . "','" . $_POST["gender"] . "')";
      //echo $sql;
      if($conn->query($sql) == true)
      {
        //$_SESSION["message"] = "";
        echo "Record inserted successfully";
        
      }
      else{
        echo "Error inserting record: " . $conn->error;
      }
      $conn->close();
    }
   ?>