<?php
if (isset($_POST['username']) && isset($_POST['userpassword'])) {
    $host       = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname     = "CRMDB_SE";
    $conn       = new mysqli($host, $dbusername, $dbpassword, $dbname);
    $username   = $_POST['username'];
    $password   = $_POST['userpassword'];

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $loginError = "";
        if (strlen($username) <= 4) {
            
            $sql = "SELECT COUNT(*) FROM Customer where C_Id = $username";
            
            $checkUsernameResult = $conn->query($sql);
            
            if (!$checkUsernameResult) {
                trigger_error('Invalid query: ' . $conn->error);
            }
            
            if ($checkUsernameResult->num_rows > 0) {
                while ($row = $checkUsernameResult->fetch_assoc()) {
                    $count = $row["COUNT(*)"];
                }
                
                if ($count == 0) {
                    $loginError = "<strong>Error! </strong> User ID not found. Please Register";
                } else {
                    $loginError = "";
                    $loginSql = "SELECT C_Id, C_FName FROM Customer where C_Id = $username AND C_Password = '$password'";
                    
                    $loginDetailsResult = $conn->query($loginSql);
                    
                    if (!$loginDetailsResult) {
                        trigger_error('Invalid query: ' . $conn->error);
                    }
                    
                    if ($loginDetailsResult->num_rows > 0) {
                        while ($row = $loginDetailsResult->fetch_assoc()) {
                            $_SESSION["user_id"]    = $row["C_Id"];
                            $_SESSION["First_Name"] = $row["C_FName"];
                            $_SESSION["user_type"]  = "Customer";
                            $_SESSION["default_tab"] = "user_profile";
                        }
                        header("Location: index.php?page=search");
                        exit;
                    } else {
                       $loginError = "<strong>Error! </strong> Invalid Credentials";
                    }
                    
                }
                
            } else {
                $loginError = "<strong>Error! </strong> User ID not found. Please Register";
            }
            
        } else if (strlen($username) >= 5) {
            $loginError = "";
            $sql = "SELECT COUNT(*) FROM employee where E_Id = $username";
            
            $checkUsernameResult = $conn->query($sql);
            
            if (!$checkUsernameResult) {
                trigger_error('Invalid query: ' . $conn->error);
            }
            
            if ($checkUsernameResult->num_rows > 0) {
                while ($row = $checkUsernameResult->fetch_assoc()) {
                    $count = $row["COUNT(*)"];
                }
                
                if ($count == 0) {
                    $loginError = "<strong>Error! </strong> User ID not found. Please Register";
                } else {
                    
                    $loginSql = "SELECT E_Id, E_FName, E_Type FROM employee where E_Id = $username AND E_Password = '$password'";
                    
                    $loginDetailsResult = $conn->query($loginSql);
                    
                    if (!$loginDetailsResult) {
                        trigger_error('Invalid query: ' . $conn->error);
                    }
                    
                    if ($loginDetailsResult->num_rows > 0) {
                        while ($row = $loginDetailsResult->fetch_assoc()) {
                            $_SESSION["user_id"] = $row["E_Id"];
                            $_SESSION["First_Name"] = $row["E_FName"];
                            $_SESSION["user_type"] = $row["E_Type"];
                            $_SESSION["default_tab"] = "user_profile";
                        }
                        header("Location: index.php?page=search");
                        exit;
                    } else {
                        $loginError = "<strong>Error! </strong> Invalid Credentials";
                    }
                    
                }
            } else {
                 $loginError = "<strong>Error! </strong> Invalid Credentials";
            }
            
        } else {
             $loginError = "<strong>Error! </strong> Invalid User ID";
        }
    }
}

?>