<?php
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
                    $Price            = $row["Price"];
                }
                $_SESSION["Room_Id"] = $Room_Id;
                $_SESSION["RoomType"] = $RoomType;
                $_SESSION["Room_Description"] = $Room_Description;
                $_SESSION["Price"] = $Price;
                $_SESSION["checkin_date"] = $checkin_date;
                $_SESSION["checkout_date"] = $checkout_date;
                $_SESSION["reservation_date"] = date("Y-m-d");
                $_SESSION["Room_Num"] = 0;
            } else {
                echo "0 results";
            }
            
            $result = $conn->query($sql);
            
            
            if (!$result) {
                trigger_error('Invalid query: ' . $conn->error);
                //echo "not result";
            }
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $availableCount = $row["COUNT(*)"];
                    
                }

                $roomNumSql    = "SELECT *FROM RoomAvailability where Room_Id = $room_type and status = 'Available' order by Room_Num LIMIT 1";
                $roomNumResult = $conn->query($roomNumSql);
                if (!$roomNumResult) {
                    trigger_error('Invalid query: ' . $conn->error);
                }
                
                if ($roomNumResult->num_rows > 0) {
                    // output data of each row
                    while ($row = $roomNumResult->fetch_assoc()) {
                        $Room_Id          = $row["Room_Id"];
                        $Room_Num         = $row["Room_Num"];
                    }

                    $_SESSION["Room_Num"] = $Room_Num;

                } else {
                    echo "0 results";
                }


            } else {
                $availableCount = 0;
            }
            $_SESSION["available_count"] = $availableCount;
            $conn->close();
        }
    }
}
?>