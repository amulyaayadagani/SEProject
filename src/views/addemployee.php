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
                  <label for="emp_fname">First Name *</label>
                  <input type="text" id="emp_fname" name="emp_fname" class="form-control " required>
                </div>
                <div class="col-md-4 form-group">
                  <label for="emp_mname">Middle Name</label>
                  <input type="text" id="emp_mname" name="emp_mname" class="form-control ">
                </div>
                <div class="col-md-4 form-group">
                  <label for="emp_lname">Last Name *</label>
                  <input type="text" id="emp_lname" name="emp_lname" class="form-control " required>
                </div>                  
              </div>
              <div class="row" diabled=true>
                <div class="col-md-4 form-radio">
                  <label for="gender" class="radio-label">Gender *</label>
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
                <div class="col-md-4 form-group">
                    <label for="birth_date">DOB *</label>
                    <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" required type="text" name="birth_date" id="birth_date" class="form-control">
                     </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="password">User Password *</label>
                    <input type="password" name="password" id="password" class="form-control "required>
                </div>                    
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                <label for="dept" >Department</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="dept" id="dept" class="form-control">
                    <option value="Housekeeping">Housekeeping</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Front Office">Front Office</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Human Resource">Human Resource</option>
                    <option value="Security">Security</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                <label for="e_type" >Employee Type </label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="e_type" id="e_type" class="form-control">
                    <option value="Employee">Employee</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
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
                  <label for="email">Email *</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="address">Address </label>
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
              <div class="col-md-6 form-group"><br>
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
   <script>
  $( document ).ready(function() {
   $('#birth_date').datepicker({
     autoclose: true,
     format: 'yyyy-mm-dd'
    });
  });
</script>

  <?php
   //print_r($_POST);
      if(isset($_POST["emp_fname"]) && isset($_POST["emp_mname"]) && isset($_POST["emp_lname"]) && isset($_POST["birth_date"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["password"]) && isset($_POST["e_type"])) 
    {
      //echo "inside";
      $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "Insert into employee(E_FName,E_LName,E_MName,address,Contact,email,DOB,gender,emp_status,dept_name,E_Password,E_type) values('" . $_POST["emp_fname"] . "','" . $_POST["emp_lname"] . "','" . $_POST["emp_mname"]  . "','" . $_POST["address"] . "'," . $_POST["phone"] . ",'" . $_POST["email"] . "','" . $_POST["birth_date"] . "','" . $_POST["gender"] . "','Active'" . ",'" . $_POST["dept"] . "','" . $_POST["password"] . "','" . $_POST["e_type"] . "')";
      //echo $sql;
      if($conn->query($sql) == true)
      {
        //$_SESSION["message"] = "";
        
        echo "<script> alert('Success! Employee record inserted successfully.')</script>";
        echo '<meta http-equiv="refresh" content="1; URL=index.php?page=admin" />';
        echo '<div class="alert alert-success alert-dismissible fade in" id="success-alert" data-auto-dismiss="200">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong> Employee record inserted successfully.
        </div>';
        $_SESSION["default_tab"] = "add_emp";
        
      }
      else{
        //echo "Error inserting record: " . $conn->error;
        echo '<div class="alert alert-danger alert-dismissible fade in" id="error-alert" data-auto-dismiss="200">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Error! </strong> Error inserting employee record."' . $conn->error .'"' .
          '.Try adding again after some time.</div>';
          $_SESSION["default_tab"] = "add_emp";
      }
      $conn->close();     
    }
    
   ?>