<?php
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];
    $filename   = "";
    $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //set header for the file
    print_r("@Copyright PARRK Hotels \n");
    if($_POST['report_type']== 1){
        print_r("Customer Details Report \n");
        print_r("Report Publish Date" . "\t" . date("Y-m-d") . "\n \n");
        $sql = "SELECT C_FName,C_MName,C_LName,C_Id,DOB,Contact,C_Type,Email, Address from customer";
        $columnHeader = '';  
        $columnHeader = "Customer First Name" . "\t" . "Customer Middle Name" . "\t" . "Customer Last Name" . "\t" . "Customer ID" . "\t" . "Date Of Birth" . "\t" ."Contact Number" . "\t" . "Customer Type" . "\t" . "Email" . "\t" . "Address" . "\t"; 
        $filename = "Customer_Details Report";
    }else if($_POST['report_type']== 2){
        print_r("Employee Details Report \n");
        print_r("Report Publish Date" . "\t" . date("Y-m-d") . "\n \n");
        $sql = "SELECT E_FName,E_MName,E_LName,E_Id,DOB,Contact,Address,Email from employee";
        $columnHeader = '';  
        $columnHeader = "Employee First Name" . "\t" . "Employee Middle Name" . "\t" . "Employee Last Name" . "\t" . "Employee ID" . "\t" . "Date Of Birth" . "\t" . "Contact" . "\t" . "Address" . "\t" . "Email" . "\t";
        $filename = "Employee Details Report";
    }else if($_POST['report_type']== 3){
        print_r("Reservation Details Report \n");
        print_r("Report Publish Date" . "\t" . date("Y-m-d") . "\n \n");
        if($start_date != "" && $end_date != ""){
            $sql = "SELECT Reserve_Id,C_Id,Reservation_Date, Checkin_Date,Checkout_Date,Room_Id,Comments FROM Reservation where Checkin_Date >='" . $start_date ."' and Checkin_Date <= '" . $end_date . "'";
            //echo '1' . $sql;
        }else if($start_date != "" && $end_date == ""){
            $sql = "SELECT Reserve_Id,C_Id,Reservation_Date, Checkin_Date,Checkout_Date,Room_Id,Comments FROM Reservation where Checkin_Date >='" . $start_date ."' or Checkout_Date >= '" . $start_date . "'";
            //echo '2' .$sql;
        }else if($start_date == "" && $end_date != ""){
            $sql = "SELECT Reserve_Id,C_Id,Reservation_Date, Checkin_Date,Checkout_Date,Room_Id,Comments FROM Reservation where Checkin_Date <='" . $end_date . "' or Checkout_Date <='" . $end_date . "'";
            //echo '3' . $sql;
        }
        else{
            $sql = "SELECT Reserve_Id,C_Id,Reservation_Date, Checkin_Date,Checkout_Date,Room_Id,Comments FROM Reservation";
            //echo '4' . $sql;
        }
        $columnHeader = '';  
        $columnHeader = "Reservation ID" . "\t" . "Customer ID" . "\t" . "Reservation Date" . "\t" . "Checkin Date" . "\t" . "Checkout Date" . "\t" . "Room ID" . "\t" . "Comments" . "\t";
        $filename = "Reservation Details Report";
    }else if($_POST['report_type']== 4){

    }
    $result = $conn->query($sql); 
      
    $setData = '';  

    if ($result->num_rows > 0) {
    // output data of each row
      while($rec = $result->fetch_assoc()) {
        $rowData = '';  
        foreach ($rec as $value) {  
            $value = '"' . $value . '"' . "\t";  
            $rowData .= $value;  
        }  
        $setData .= trim($rowData) . "\n"; 
      }
      
    } else { echo "0 results"; }
    
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=" . $filename . ".xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
    $conn->close();
?>
          