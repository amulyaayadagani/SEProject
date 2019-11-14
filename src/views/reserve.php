<style>
  .confirm-text{
    font-size: 1.8em;
    font-weight: 700;
    font-family: "Playfair Display", times, serif;      
        }

    .value-text{
    font-size: 1.4em;
    font-weight: 700;
    font-family: "Playfair Display", times, serif;      
    }

    #background{
      padding: 5% 0px;
    }
</style>
<?php

$conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $Price = $_SESSION["Price"];

    if(isset($_SESSION['user_id'])){
      $sql = "SELECT C_Points FROM Customer WHERE C_id ='" . $_SESSION["user_id"] . "'";
    } 

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          $points = $row["C_Points"];
          $oldpoints = $row["C_Points"];
        }  

      } else { 
        $points = "";
      }
?>

<section class="section bg-light">
<div class="container">
  <div class="site-block bg-white" id="background" data-aos="fade" data-aos-delay="100">

       <div class="row justify-content-center text-center mb-5">
         <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Booking Details</h2>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-md-12">
              <span class="confirm-text">Room Type :</span>&nbsp;&nbsp;<span class="value-text"><?php if(!empty($_SESSION["RoomType"])) { echo $_SESSION["RoomType"]; } ?></span>
            </div>
          </div>
           <div class="row justify-content-center text-center">
            <div class="col-md-12">
             <span class="confirm-text">Checkin Date : </span>&nbsp;&nbsp;<span class="value-text"> <?php if(!empty($_SESSION["checkin_date"])) { echo $_SESSION["checkin_date"]; } ?></span>
            </div>
          </div>
           <div class="row justify-content-center text-center">
            <div class="col-md-12">
              <span class="confirm-text">Checkout Date :</span>&nbsp;&nbsp;<span class="value-text"> <?php if(!empty($_SESSION["checkout_date"])) { echo $_SESSION["checkout_date"]; } ?></span>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-md-12">
              <span class="confirm-text">Reservation Date : </span>&nbsp;&nbsp;<span class="value-text"><?php if(!empty($_SESSION["reservation_date"])) { echo $_SESSION["reservation_date"]; } ?></span>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-md-12">
              <span class="confirm-text">Room Price :</span>&nbsp;&nbsp;<span class="value-text"> <?php if(!empty($Price)) { echo $Price . '$'; }?></span>
            </div>
          </div>
          <?php if($points > 0) : ?>
           <div class="row justify-content-center text-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
              <div class="pull-right">
              <span class="confirm-text">Accumulated points :</span>&nbsp;&nbsp;<span class="value-text"> <?php echo $points; ?></span> 
            </div>
            </div>
            <div class="col-md-3">
               <div class="checkbox" style="margin-top:5%">
                <label><input type="checkbox" id="redeemCheckbox" value="false" name="redeemCheckbox"> Redeem Points</label>
              </div>
            </div>
            <div class="col-md-1">
            </div>
          </div>
          <?php endif; ?>
           <div id="pricewredeem" class="row justify-content-center text-center">
            <div class="col-md-12">
              <span class="confirm-text">Price with redeem: </span>&nbsp;&nbsp;<span class="value-text"><?php  echo $Price - ($points * 0.02) . '$'; ?></span>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-md-12">
          <p style="margin:20px"><a id="confirmLink" href="index.php?page=reserve&confirm=true" class="btn btn-primary text-white">Confirm</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$('#pricewredeem').hide();
  function countChecked(){
    if($( "input[type=checkbox]#redeemCheckbox" ).is(':checked')){
      $('#confirmLink').attr("href", "index.php?page=reserve&checkbox=true&confirm=true");
      $('#pricewredeem').show();
    } else {
      $('#confirmLink').attr("href", "index.php?page=reserve&confirm=true");
      $('#pricewredeem').hide();
    }
  }

  $( "input[type=checkbox]#redeemCheckbox" ).on( "click", countChecked );

</script>

<?php 

if(isset($_SESSION['user_id']) && isset($_GET['checkbox'])){
    $Price = $Price - ($points * 0.02);
    $points = $points - ($points * 0.02);
  } else {
    $Price = $_SESSION["Price"];
    $points = $oldpoints;
  }

if(isset($_GET['confirm'])){

        $cid = $_SESSION["user_id"];
        $reservation_date = $_SESSION["reservation_date"];
        $checkin_date = $_SESSION["checkin_date"];
        $checkout_date = $_SESSION["checkout_date"];
        
        $Room_Id = $_SESSION["Room_Id"];
        $Room_Num = $_SESSION["Room_Num"];
        $available_count = $_SESSION["available_count"];

        if(empty($Price)){
          $Price = $_SESSION["Price"];
        }

        if($_SESSION["available_count"] > 0){

          $sqlCustomer = "UPDATE Customer SET C_Points= $points WHERE C_ID = $cid";

          if ($conn->query($sqlCustomer) === TRUE) {

              $sqlReservation = "INSERT INTO Reservation (C_ID, Reservation_Date, Checkin_Date, Checkout_Date, Room_Id, Comments, status, Price)
                VALUES ($cid, '$reservation_date' , '$checkin_date', '$checkout_date', $Room_Id, '', 'Confirmed', $Price)";

                if ($conn->query($sqlReservation) === TRUE) {
                    $booking_id = $conn->insert_id;

                     $sqlRoomAvailability = "UPDATE RoomAvailability SET STATUS = 'Booked', Reserve_Id = $booking_id WHERE Room_Id= $Room_Id and Room_Num = $Room_Num";

                     if ($conn->query($sqlRoomAvailability) === TRUE) {

                          $sqlNotification = "INSERT INTO notification VALUES ($cid,'Hello, Thank You for booking at our Hotel. Your Reservation Details - /n Booking Id = $booking_id /n Room Number = $Room_Num /n Checkin Date = $checkin_date /n Checkout Date = $checkout_date /n Reservation Date = $reservation_date /n Price = $Price','$reservation_date','Booking Confirmation',null)";

                            if ($conn->query($sqlNotification) === TRUE) {
                            echo '<meta http-equiv="refresh" content="1; URL=index.php?page=ModifyReservation" />';
                            } else {
                                echo "Error: " . $sqlNotification . "<br>" . $conn->error;
                            }

                      } else {
                          echo "Error: " . $sqlRoomAvailability . "<br>" . $conn->error;
                      }

                } else {
                    echo "Error: " . $sqlReservation . "<br>" . $conn->error;
                }


          } else {
              echo "Error: " . $sqlCustomer . "<br>" . $conn->error;
          }

        } else {

          $sqlCustomer = "UPDATE Customer SET C_Points= $points WHERE C_ID = $cid";

          if ($conn->query($sqlCustomer) === TRUE) {

              $sqlReservation = "INSERT INTO Reservation (C_ID, Reservation_Date, Checkin_Date, Checkout_Date, Room_Id, Comments, status, Price)
                    VALUES ($cid, '$reservation_date' , '$checkin_date' , '$checkout_date' , $Room_Id, '', 'Waitlisted', $Price)";

              if ($conn->query($sqlReservation) === TRUE) {
                 
                  $sqlNotification = "INSERT INTO notification VALUES ($cid,'Hello, Thank You for booking at our Hotel. Your booking is currently waitlisted. Booking details Checkin Date = $checkin_date /n Checkout Date = $checkout_date /n Reservation Date = $reservation_date /n Price = $Price','$reservation_date','Booking Waitlisted',null)";

                    if ($conn->query($sqlNotification) === TRUE) {
                      echo '<meta http-equiv="refresh" content="1; URL=index.php?page=ModifyReservation" />';
                    } else {
                        echo "Error: " . $sqlNotification . "<br>" . $conn->error;
                    }
              } else {
                  echo "Error: " . $sqlReservation . "<br>" . $conn->error;
              }

        } else {
              echo "Error: " . $sqlCustomer . "<br>" . $conn->error;
          }
      }

    }

?>
