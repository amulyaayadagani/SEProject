<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="bootstrap-auto-dismiss-alert.js"></script>

<section class="section testimonial-section" >
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reservations </h3>
<div class=container >
<form method="post" action="./views/modifyReserveCtrl.php"> 
  <input type="hidden" id="reserve_id" name="reserve_id">
  <table class="table table-bordered" id="drop-table">
    <thead>
      <tr  id="rowid" name="rowid" class="row100 head">
        <th class="cell100 column1">Reserve_Id</th>
        <th class="cell100 column2">Checkin_Date</th>
        <th class="cell100 column3">Checkout_Date</th>
        <th class="cell100 column3">Rooom_Id</th>
        <th class="cell100 column4">RoomType</th>
        <th class="cell100 column4">Status</th>
      </tr>
    </thead>
    
   <tbody>
    
    <?php
    //print_r($_POST);
      $error = false;
      $success = false;
      $conn = mysqli_connect("localhost", "root", "", "crmdb_se");
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      if($_SESSION["user_type"]=== "Admin"){
      $sql = "Select reservation.Reserve_Id, reservation.Checkin_Date, reservation.Checkout_Date,reservation.Room_Id,room_details.RoomType,reservation.Reservation_Date,reservation.status from reservation join room_details on reservation.Room_Id=room_details.Room_Id order by reservation.Reservation_Date desc ";
    }else{
      $sql = "Select reservation.Reserve_Id, reservation.Checkin_Date, reservation.Checkout_Date,reservation.Room_Id,room_details.RoomType,reservation.Reservation_Date,reservation.status  from reservation join room_details on reservation.Room_Id=room_details.Room_Id where C_ID = " . $_SESSION["user_id"] ." order by reservation.Reservation_Date desc ";
    }
      $result = $conn->query($sql);
     if($result->  num_rows > 0){
         while($row = $result-> fetch_assoc()) {
           echo "<tr>
           <td>". $row["Reserve_Id"]."</td>
           <td>". $row["Checkin_Date"]."</td>
           <td>". $row["Checkout_Date"]."</td>
           <td>". $row["Room_Id"]."</td>
           <td>". $row["RoomType"]."</td>
           <td>". $row["status"]."</td>
         </tr>";
       }
       echo "</table>";
      }
      else {
        echo "0 result";
      }   
      $conn-> close();
    ?>
    <div id="modify1_btn" name="modify1_btn" class="col-md-6 form-group" style="display: none"><br>
        <input type="submit" name="modify1" id="modify1" value="Modify Reservation" class="btn btn-primary text-white font-weight-bold">
    </div>   
  </form>
</div>
</section>
<script language="javascript">
  $('tr').click(function() {
     $('.selected').removeClass('selected');
      $(this).addClass('selected');
      $('#modify1_btn').show();
//set values in the div
       
  });
  $('#modify1').click(function() {    
        var res_id = $('.selected').find("td:eq(0)").text();
       $("#reserve_id").val(res_id);
       //alert(res_id);      
  });
  
  $('#modify').click(function() {    
        $confirm_var = confirm("Are you sure you want to modify reservation?");

        if($confirm_var){
            //$("#reserve_id").val(res_id);
        }else{
          //$("#reserve_id").val(NULL);
        }
  });
</script>
