 <style>
  .alert{
    position: absolute;
    bottom: 500px;
    left: 100px;
  }
 </style>
 <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <input hidden type="number" id="C_ID" name="C_ID" class="form-control" placeholder="C_ID">
              <div class="row">
                <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold" for="customerfname">First Name</label>
                  <input type="text" id="C_FName" name="C_FName" class="form-control" placeholder="First Name" required>
                </div>
         <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold" for="customermname">Middle Name</label>
                  <input type="text" id="C_MName" name="C_MName" class="form-control" placeholder="Middle Name">
                </div>
        <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold" for="customerlname">Last Name</label>
                  <input type="text" id="C_LName" name="C_LName" class="form-control" placeholder="Last Name" >
                </div>
              </div>
             
            
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="customerdob">DOB</label>
                  <input type="date" id="C_DOB" name="C_DOB" class="form-control" placeholder="Date of Birth" required>
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="Contact">Contact</label>
                  <input type="text" id="C_Contact" name="C_Contact"class="form-control" required>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="address">Address</label>
                  <textarea name="C_Address" id="C_Address" class="form-control " cols="30" rows="5"></textarea>
                </div>
              </div>
              
            

              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email" id="C_Email" name="C_Email"class="form-control" required>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="customertype">Customer Type</label>
                  <!-- <input type="text" id="C_Type" name="C_Type" class="form-control" placeholder="Customer Type"> -->
                  <select id="C_Type" name="C_Type" class="form-control" placeholder="Customer Type">
                  <option value="">Select Customer Type</option>
                  <option value="GUEST">Guest</option>
                  <option value="MEMBER">Member</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="customerprooftype">Identification Id Type </label>
                  <!-- <input type="text" id="C_Id_Proof_Type" name="C_Id_Proof_Type" class="form-control" placeholder="Identification Id Type" > -->
                  
                  <select id="C_Id_Proof_Type" name="C_Id_Proof_Type" class="form-control" required placeholder="Identification Id Type" >
                  <option value="">Select Identification Id Type</option>
                  <option value="PASSPORT">Passport</option>
                  <option value="DRIVINGLICENCE">Driving Licence</option>
                  </select>
                </div>
              </div>

             

              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="customeridnumber">Identification Id Number </label>
                  <input type="text" id="C_Id_Number" name="C_Id_Number" class="form-control" required placeholder="Identification Id Number" >
                </div>
              </div>

              
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for=userpassword>User Password </label>
                  <input type="password" id="C_Password" name="C_Password" class="form-control" placeholder="User Password" >
                </div>
              </div>

              
              
             
              <div class="row">
                <div class="col-md-6 form-group">
                  <!-- <input type="submit" value="Register" class="btn btn-primary text-white py-3 px-5 font-weight-bold"> -->
                  <button type="submit" value="Register" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                  <!--<a href="index.php?page=search" class="text-white "> Register</a>-->Register
                  </button>
                </div>
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
  <?php

        $host       = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname     = "CRMDB_SE";
  $_SESSION["message"] = "";
  
  $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
    if(isset($_POST["C_FName"]) && isset($_POST["C_DOB"]) && isset($_POST["C_Contact"]) && isset($_POST["C_Email"]) && isset($_POST["C_Id_Proof_Type"]))
    {
      
    
  
  // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }  
  $cpoints = 1000;
    $sql =  "INSERT INTO Customer (C_FName, C_MName, C_LName, C_Password, DOB, Address, Contact, Email, C_Type, C_Id_Proof_Type, C_Id_Number, C_Points) VALUES ('" . $_POST['C_FName'] . "','" . $_POST["C_MName"] . "',   '" . $_POST["C_LName"] ."', '" . $_POST["C_Password"] . "',' ".$_POST["C_DOB"] ."',  '" . $_POST["C_Address"] . "',  ".$_POST["C_Contact"] .", '" . $_POST["C_Email"] . "',   '" . $_POST["C_Type"] . "', '" . $_POST["C_Id_Proof_Type"] . "', ".$_POST["C_Id_Number"] .",". $cpoints .")";
    
    
      if(mysqli_query($conn, $sql))
      {
    $last_id = mysqli_insert_id($conn);
    $registered_date=date("Y-m-d");
    
      $sql2 = "INSERT INTO notification (C_ID, Message, date_received, subject) VALUES ($last_id, 'Hello " . $_POST['C_FName'] . " , Thank you for registering with us. Your customer ID is $last_id and the registered date is $registered_date Have a nice day. ','$registered_date','Customer Registration')";
    
          if(mysqli_query($conn, $sql2)){
         echo '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Thank You for registering with us! </strong> Your UserID is ' . $last_id
        . '</div>';
        //echo "<script> alert('Thank You for registering with us! Your UserID is'+ $last_id )</script>";
        //echo '<meta http-equiv="refresh" content="1; URL=index.php?page=login" />';

        }
else{
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo '<div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error! </strong> Error has occurred while registering ."' . $conn->error .'"' .
          '.Try  after some time.</div>'; 
}
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo '<div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error! </strong> Error has occurred while registering ."' . $conn->error .'"' .
          '.Try  after some time.</div>'; 
    }
      }
      $conn->close();
    
  ?>