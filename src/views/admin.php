
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!--Ritu: Tab Style -->
<section class="section testimonial-section" >
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#user_profile">Profile</a></li>
    <li class="dropdown">
      <a  data-toggle="dropdown" href="#">Employees <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a data-toggle="tab" href="#add_emp">Add Employee</a></li>
        <li><a data-toggle="tab" href="#drop_emp">Drop Employee</a></li>                     
      </ul>
    </li>
    <li><a data-toggle="tab" href="#reports">Reports</a></li>
    <li><a data-toggle="tab" href="#notifications">Notifications</a></li>
  </ul>
  <?php
    $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT E_FName,E_MName,E_LName,E_Id,Dept_Name,DOB,E_Id,Contact,E_Start_Date,Address,Email from employee where E_Id = 99887";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
          //echo $row["E_FName"];
        $fname = $row["E_FName"];
        $mname = $row["E_MName"];
        $lname = $row["E_LName"];
        $id    = $row["E_Id"];
        $dob   = $row["DOB"];
        $contact= $row["Contact"];
        $address= $row["Address"];
        $email  = $row["Email"];
      }
      
      } else { echo "0 results"; }
    //$conn->close();
  ?>
  <div class="container">
    <div class="tab-content">
        <div id="user_profile" class="tab-pane fade in active">                
          <?php include 'userprofile.php';?>
        </div>
        <div id="drop_emp" class="tab-pane fade">
          <?php include 'dropemployee.php';?>
        </div>
        <div id="add_emp" class="tab-pane fade">
          <?php include 'addemployee.php';?>
        </div>
        <div id="reports" class="tab-pane fade">
          <?php include 'Report.php';?>
        </div>
        <div id="notifications" class="tab-pane fade">
          <?php include 'notifications.php';?>
        </div>
    </div>
  </div>
</section> 
<script language="javascript">
  $('tr').click(function() {
     $('.selected').removeClass('selected');
      $(this).addClass('selected');
  });

  $('#drop').click(function() {    
      $('.selected').children().each(function() {
          alert($(this).html());
      });
  });
</script>