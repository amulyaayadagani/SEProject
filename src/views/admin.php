
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!--Ritu: Tab Style -->


<!--<div class="alert alert-success alert-dismissible fade in" id="success-alert" data-auto-dismiss="200">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Success! </strong> Product have added to your wishlist.
</div>-->
<style>
.my-custom-scrollbar {
position: relative;
height: 250px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>

<section class="section testimonial-section" >
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#user_profile">Profile</a></li>
    <?php 
      if($_SESSION["user_type"]=="Admin"){
    ?>
    <li class="dropdown">
      <a  data-toggle="dropdown" href="#">Employees <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a data-toggle="tab" href="#add_emp">Add Employee</a></li>
        <li><a data-toggle="tab" href="#drop_emp">Drop Employee</a></li>                     
      </ul>
    </li>
    <li><a data-toggle="tab" href="#reports">Reports</a></li>
    <?php
      }
    ?>
    <?php 
      if($_SESSION["user_type"]!="Admin"){
    ?>
    <li><a data-toggle="tab" href="#notifications">Notifications</a></li>
    <?php 
      }
    ?>
  </ul>
  <?php
  list($fname,$mname,$lname,$id,$dob,$gender,$contact,$address,$email,$pass) = fetchData();
  function fetchData(){
    $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "Admin"){
      $sql = "SELECT E_FName,E_MName,E_LName,Dept_Name,DOB,E_Id,Contact,E_Start_Date,Address,Email,gender,E_Password from employee where E_Id = " . $_SESSION["user_id"];
    }else{
      $sql = "SELECT C_FName,C_MName,C_LName,DOB,C_Id,Contact,Address,Email,C_Type,C_Points,gender,C_Password from customer where C_Id = " . $_SESSION["user_id"];
    } 
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
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
          //echo $pass;
          //$city   = $row["City"];
          //$state  = $row["State"];
        }      
      } else { 
        echo "No profile record found";
        $fname = "";
        $mname = "";
        $lname = "";
        $id    = "";
        $dob   = "";
        $contact= "";
        $address= "";
        $email  = ""; 
        $pass   = "";
        //$city   = "";
        //$state  = "";
      }
      return array($fname,$mname,$lname,$id,$dob,$gender,$contact,$address,$email,$pass);
      $conn->close();
    }
    
  ?>
  <div class="container">
    <div class="tab-content">
        <div id="user_profile" name="user_profile" class="tab-pane fade in active">                
          <?php include 'userprofile.php';?>
        </div>
        <div id="drop_emp" name="drop_emp" class="tab-pane fade"  >
          <?php include 'dropemployee.php';?>
        </div>
        <div id="add_emp" name="add_emp" class="tab-pane fade">
          <?php include 'addemployee.php';?>
        </div>
        <div id="reports" name="reports" class="tab-pane fade" >
          <?php include 'Report.php';?>
        </div>
        <div id="notifications" name="notifications" class="tab-pane fade">
          <?php include 'notifications.php';?>
        </div>
    </div>
  </div>
</section> 
<script language="javascript">
  var tid = "";
  $('tr').click(function() {
     $('.selected').removeClass('selected');
      $(this).addClass('selected');
      //tid=$(this).attr('id');
  });
  
  $(document).ready(function(){
      var tab = "<?php echo $_SESSION["default_tab"]; ?>";
      ActivTab(tab);
      
   });
  function ActivTab(id){
    $('.nav-tabs a[href="#' + id + '"]').tab('show');
       //$('.nav-tabs a[href="#' + id + '"]').trigger('click');
  }; 


  $('#drop').click(function() {    
      /*$('.selected').children().each(function() {
          alert($(this).html());
      });*/
      var name = $('.selected').find("td:eq(0)").text();
        var empId = $('.selected').find("td:eq(1)").text();
        //alert(tid);

        $confirm_var = confirm("Are you sure you want to delete employee '" + name + "' employee Id - '" + empId + "'?");

        if($confirm_var){
            $("#emp_id").val(empId);
        }else{
          $("#emp_id").val(NULL);
        }
        //$("#" + tid).remove();
  });
  
  
</script>
