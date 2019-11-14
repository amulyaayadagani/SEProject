<?php 
  
  //Drop employee
print_r($_POST);
  if(array_key_exists('modify1', $_POST)) { 
    if($_POST["reserve_id"]!=NULL){
      echo "inside if";
      dropEmployee($conn,$_POST["reserve_id"]); 
    }
  }
function loadReservation($reserveId){
  $conn1 = mysqli_connect("localhost", "root", "", "crmdb_se");
  if($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
  }
  if (!is_null($reserveId))
  {
      if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
      }
      $sql1 = "select Reserve_Id,Checkin_Date,Checkout_Date,Room_Id from Reservation where Reserve_Id = " . $reserveId;
      echo $sql1;
      $result1 = $conn1->query($sql1);
    
      if ($result1->num_rows > 0) {
      // output data of each row
          while($row = $result1->fetch_assoc()) {
              //echo $row["E_FName"];
            $reserveid    = $row["Reserve_Id"];
            $checkindate  = $row["Checkin_Date"];
            $checkoutdate = $row["Checkout_Date"];
            $roomid       = $row["Room_Id"];
          }      
        } else { 
          echo "No profile record found";
            $reserveid    = "";
            $checkindate  = "";
            $checkoutdate = "";
            $roomtype     = "";        
        }
      }
      $conn1-> close();
}
include 'justmodify.php';
?>