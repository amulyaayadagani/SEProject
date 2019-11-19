<link rel="stylesheet" href="../dist/css/bootstrap-datepicker.css">
<script src="../dist/js/bootstrap-datepicker.js"></script> 
<!--<section class="section " id="usr_next">-->

  <div class="container">
    <h3>User Profile</h3>
    <div class="row">
      <div class="col-md-7" >                         
        <form id="profile-form" action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
          <div class="row">
            <div class="col-md-4 form-group">
              <label for="usr_fname">First Name</label>
              <input type="text" id="usr_fname" name="usr_fname" value = "<?php echo $fname;?>" class="form-control" required>
            </div>
            <div class="col-md-4 form-group">
              <label for="usr_mname">Middle Name</label>
              <input type="text" id="usr_mname" name="usr_mname" value = "<?php echo $mname;?>" class="form-control ">
            </div>
            <div class="col-md-4 form-group">
              <label for="usr_lname">Last Name</label>
              <input type="text" id="usr_lname" name="usr_lname" value = "<?php echo $lname;?>" class="form-control " required>
            </div>                  
          </div>
          <div class="row">
            <div class="col-md-4 form-radio">
              <label for="usr_gender" class="radio-label">Gender </label>
              <div class="form-radio-item">
                  <input type="radio" name="usr_gender" id="usr_male" value="Male" >
                  <label for="usr_male">Male</label>
                  <span class="check"></span>
              </div>
              <div class="form-radio-item">
                  <input type="radio" name="usr_gender" id="usr_female" value="Female">
                  <label for="usr_female">Female</label>
                  <span class="check"></span>
              </div>
            </div> 
            <div class="col-md-4 form-group">
                <label for="usr_birth_date">Date of Birth</label>
                <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" required type="text" name="usr_birth_date" id="usr_birth_date" class="form-control" value = "<?php echo $dob;?>">
                       
                </div>
                
            </div>
            <div class="col-md-4 form-group">
                <label for="u_password">User Password </label>
                <input type="password" name="u_password" id="u_password" class="form-control" value= "<?php echo $pass; ?>" >
            </div>                    
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="usr_phone">Phone</label>
              <input type="text" id="usr_phone" name="usr_phone" value = "<?php echo $contact;?>" class="form-control " required>
            </div> 
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="usr_email">Email</label>
              <input type="email" id="usr_email" name="usr_email" value = "<?php echo $email;?>" class="form-control " required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="usr_address">Address </label>
              <input type="text" name="usr_address" id="usr_address" value = "<?php echo $address;?>" class="form-control" />
          </div>
        </div>
        
           <div class="row">
            <div class="col-md-6 form-group"><br>
              <input type="submit" name="updateProfile" name="updateProfile" value="Update Profile" class="btn btn-primary text-white font-weight-bold">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<!--</section> -->
<script>
  $( document ).ready(function() {
   $('#usr_birth_date').datepicker({
     autoclose: true,
     format: 'yyyy-mm-dd'
    });
   var gender = '<?php echo $gender; ?>';
    if(gender == 'Male'){
      jQuery('#usr_male').attr('checked', true);
    }else{
      jQuery('#usr_female').attr('checked', true);
    }
  });

</script>

<?php
//print_r($_POST);

if(array_key_exists('updateProfile', $_POST)) { 
    list($fname,$mname,$lname,$id,$dob,$gender,$contact,$address,$email,$pass) = updateProfile($_SESSION["user_id"],$_POST["usr_fname"],$_POST["usr_mname"],$_POST["usr_lname"],$_POST["usr_gender"],$_POST["usr_birth_date"],$_POST["usr_phone"],$_POST["usr_address"],$_POST["usr_email"],$_POST["u_password"]); 
    //$current_url = 'index.php?page=admin';
    //header("Location: $current_url");
    //echo $contact;
} 
function updateProfile($usrId, $fname, $mname, $lname,$gender, $dob,$contact,$address, $email,$password){
    $usr_type = $_SESSION["user_type"];
    $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if($usr_type == "Admin"){
      $sql = "Update Employee set E_FName = '" . $fname . "',E_MName ='" . $mname . "',E_LName='" . $lname . "',DOB='" . $dob . "',Contact=" . $contact . ",Address='" . $address . "',email='" . $email . "',gender='" . $gender . "',E_Password = '". $password ."' where E_Id=" . $usrId;
    }else{
      $sql = "Update Customer set C_FName = '" . $fname . "',C_MName ='" . $mname . "',C_LName='" . $lname . "',DOB='" . $dob . "',Contact=" . $contact . ",Address='" . $address . "',email='" . $email . "',gender='" . $gender . "',C_Password = '". $password . "' where C_Id=" . $usrId;
    }
    //echo $sql;
    if ($conn->query($sql)) {
      if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "Admin"){
        $sql1 = "SELECT E_FName,E_MName,E_LName,Dept_Name,DOB,E_Id,Contact,E_Start_Date,Address,Email,gender,E_Password from employee where E_Id = " . $_SESSION["user_id"];
      }else{
        $sql1 = "SELECT C_FName,C_MName,C_LName,DOB,C_Id,Contact,Address,Email,C_Type,C_Points,gender,C_Password from customer where C_Id = " . $_SESSION["user_id"];
      } 
      $result1 = $conn->query($sql1);
      
      if ($result1->num_rows > 0) {
      // output data of each row
        //echo "I am here";
          while($row = $result1->fetch_assoc()) {
              //echo $row["E_FName"];
            $fname = $_SESSION["user_type"] == "Admin"?$row["E_FName"]:$row["C_FName"];
            $mname = $_SESSION["user_type"] == "Admin"?$row["E_MName"]:$row["C_MName"];
            $lname = $_SESSION["user_type"] == "Admin"?$row["E_LName"]:$row["C_LName"];
            $id    = $_SESSION["user_type"] == "Admin"?$row["E_Id"]:$row["C_Id"];
            $dob   = $row["DOB"];
            $gender= $row["gender"];
            $contact= $row["Contact"];
            $address= $row["Address"];
            $email  = $row["Email"];
            $pass   = $_SESSION["user_type"] == "Admin"?$row["E_Password"]:$row["C_Password"];
            //$city   = $row["City"];
            //$state  = $row["State"];
          }      
        } 
      echo "<script> alert('Success! User profile updated successfully.')</script>";
      echo '<div class="alert alert-success alert-dismissible fade in" id="success-alert" data-auto-dismiss="200">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong> User profile updated successfully.
        </div>';
        echo '<meta http-equiv="refresh" content="1; URL=index.php?page=admin" />';
        $_SESSION["default_tab"] = "user_profile";
      //echo "Record updated successfully!";
      //echo "<a href='UserReport_Export.php'> Export To Excel </a>";
      } else { 
        //echo "Error updating record: " . $conn->error;
        echo '<div class="alert alert-danger alert-dismissible fade in" id="error-alert" data-auto-dismiss="200">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Error! </strong> Error updating user profile."' . $conn->error .'"' .
          '.Try updating again after some time.</div>';
          $_SESSION["default_tab"] = "user_profile";
        
      }
    $conn->close();
    return array($fname,$mname,$lname,$id,$dob,$gender,$contact,$address,$email,$pass);
  }
  
?>