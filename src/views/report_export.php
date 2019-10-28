<?php
    $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT C_FName,C_MName,C_LName,C_Id,DOB,Contact,C_Type,Address,Email from customer";
    $result = $conn->query($sql);

    $columnHeader = '';  
    $columnHeader = "Sr NO" . "\t" . "User Name" . "\t" . "Password" . "\t";  
      
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
    header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
    $conn->close();
?>
          