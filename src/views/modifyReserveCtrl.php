 <?php 
print_r($_POST);
  if(array_key_exists('modify1', $_POST)) { 
    if($_POST["reserve_id"]!=NULL){
      echo "inside if";
      $reserveid    = "";
            $checkindate  = "";
            $checkoutdate = "";
            $roomtype     = "";   
      $dataArray = loadReservation($_POST["reserve_id"]); 
      print_r($dataArray);
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
            echo $row["Reserve_Id"];
            echo $row["Checkin_Date"];
            $reserveid    = $row["Reserve_Id"];
            $checkindate  = $row["Checkin_Date"];
            $checkoutdate = $row["Checkout_Date"];
            $roomid       = $row["Room_Id"];
            echo $reserveid;
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
      return compact("reserveid","checkindate","checkoutdate","roomid");
}

?>
<form method="post" action="">
<div id="divid" >
      <div>

        <div style="width: 400px;">
        </div>
        <div align="center" style="padding-bottom: 18px;font-size : 24px;">Modify Reservation</div>

        <div align="center" style="padding-bottom: 18px;">Reserve_Id<span style="color: red;"> *</span><br/>
        <input type="text"  name="t1" id="mobile" value="<?php echo $dataArray['reserveid']; ?>">
        </div>


         <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
           <div class="field-icon-wrap">
              <div class="icon"><span class="icon-calendar"></span></div>
              <input autocomplete="off" required type="text" name="t2" id="checkin_date" value="<?php echo $dataArray['checkindate']; ?>" class="form-control">
             
           </div>
           <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
             <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input autocomplete="off" required type="text" name="t3" id="checkout_date" value="<?php echo $dataArray['checkoutdate']; ?>" lass="form-control">
               
             </div>
         
        <div align="center" style="padding-bottom: 18px;">
         Room Type:
         
           <select name="example" id="example" value="<?php echo $dataArray['roomid']; ?>">
               <option  value="1">Single</option>
               <option value="2">Double</option>
               <option value="3">King</option>
              <option value="4">Queen</option>
              <option value="5">Suite</option>
           </select>
         </div>
         
        <div align="center" style="padding-bottom: 18px;"><input name="delete" id="delete" value="delete" type="submit"/></div>
        <div align="center" style="padding-bottom: 18px;"><input name="modify" id="modify" value="modify" type="submit"/></div>

        </div>

     </div>
   </form>
 <script>
  var valu = <?php echo $dataArray['roomid']; ?>;
  $("#example").val(valu);
  
 </script>


