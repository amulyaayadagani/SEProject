<!--<section class="section " id="usr_next">-->

  <div class="container">
    <h3>User Profile</h3>
    <div class="row">
      <div class="col-md-7" >                         
        <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
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
                <label for="password">User Password </label>
                <input type="password" name="u_password" id="u_password" class="form-control " values="<?php echo $pass; ?>" >
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
              <input type="submit" name="updateProfile" value="Update Profile" class="btn btn-primary text-white font-weight-bold">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<!--</section> -->
<script type="text/javascript">
    jQuery(document).ready(function() {
      var gender = '<?php echo $gender; ?>';
      if(gender == 'Male'){
        jQuery('#usr_male').attr('checked', true);
      }else{
        jQuery('#usr_female').attr('checked', true);
      }

      $('#usr_birth_date').datepicker({
        startDate: new Date(),
        autoclose: true,
      });
    });
</script>
<?php
//print_r($_POST);
$message = "";
if(array_key_exists('updateProfile', $_POST)) { 
    $message = updateProfile($_SESSION["user_id"],$_POST["usr_fname"],$_POST["usr_mname"],$_POST["usr_lname"],$_POST["usr_gender"],$_POST["usr_birth_date"],$_POST["usr_phone"],$_POST["usr_address"],$_POST["usr_email"]); 
} 
function updateProfile($usrId, $fname, $mname, $lname,$gender, $dob,$contact,$address, $email){
    $usr_type = $_SESSION["user_type"];
    $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if($usr_type == "Admin"){
      $sql = "Update Employee set E_FName = '" . $fname . "',E_MName ='" . $mname . "',E_LName='" . $lname . "',DOB='" . $dob . "',Contact=" . $contact . ",Address='" . $address . "',email='" . $email . "',gender='" . $gender . "' where E_Id=" . $usrId;
    }else{
      $sql = "Update Customer set C_FName = '" . $fname . "',C_MName ='" . $mname . "',C_LName='" . $lname . "',DOB='" . $dob . "',Contact=" . $contact . ",Address='" . $address . "',email='" . $email . "',gender='" . $gender . "' where C_Id=" . $usrId;
    }
    //echo $sql;
    if ($conn->query($sql)) {
      
      echo '<div class="alert alert-success alert-dismissible fade in" id="success-alert" data-auto-dismiss="200">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong> User profile is updated successfully.
        </div>';
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
  }
  
?>