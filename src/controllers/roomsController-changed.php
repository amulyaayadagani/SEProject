<?php
if (isset($_POST['custID'])
$customerID    = $_POST['custID'];
if (isset($_POST['checkin_date']) && isset($_POST['checkout_date']) && isset($_POST['room_type']) && isset($_POST['guests'])) {
    $checkin_date  = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $room_type     = (int) $_POST['room_type'];
    $guests        = $_POST['guests'];
	
    if (!empty($checkin_date) && !empty($checkout_date) && !empty($room_type) && !empty($guests)) {
        $host       = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname     = "CRMDB_SE";
        // Create connection
        $conn       = new mysqli($host, $dbusername, $dbpassword, $dbname);
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
            $sql               = "SELECT COUNT(*) FROM RoomAvailability where Room_Id = $room_type AND STATUS = 'Available' GROUP BY Room_Id";
            $roomDetailsSql    = "SELECT *FROM Room_Details where Room_Id = $room_type";
			$redeem            = "SELECT C_Points from customer where C_ID = $customerID"
            $roomDetailsResult = $conn->query($roomDetailsSql);
            if (!$roomDetailsResult) {
                trigger_error('Invalid query: ' . $conn->error);
            }
            
            if ($roomDetailsResult->num_rows > 0) {
                // output data of each row
                while ($row = $roomDetailsResult->fetch_assoc()) {
                    $Room_Id          = $row["Room_Id"];
                    $RoomType         = $row["RoomType"];
                    $Room_Description = $row["Room_Description"];
                    $Num_of_Rooms     = $row["Num_of_Rooms"];
                    $Num_of_Beds      = $row["Num_of_Beds"];
                    $Price            = $row["Price"] . '$';
                }
            } else {
                echo "0 results";
            }
            
            $result = $conn->query($sql);
            
            
            if (!$result) {
                trigger_error('Invalid query: ' . $conn->error);
            }
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $availableCount = $row["COUNT(*)"];
                    
                }
            } else {
                echo "0 results";
            }
            
            $conn->close();
        }
    }
}
?>