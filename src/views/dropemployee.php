 <?php
    //print_r($_POST);
      $error = false;
      $success = false;
      $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT E_FName,E_MName,E_LName,E_Id,Dept_Name,DOB,E_Id,Contact,E_Start_Date from employee where emp_status = 'Active'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      } else { echo "0 results"; }

      //Drop employee
      //print_r($_POST);
      if(array_key_exists('drop', $_POST)) { 
        if($_POST["emp_id"]!=NULL){
          dropEmployee($conn,$_POST["emp_id"]); 
        }
      } 
      

      
         
      ?>
<div class="container">
<form method="post" action=""> 
  <input type="hidden" id="emp_id" name="emp_id">
  <table class="table table-bordered" id="drop-table">
    <thead>
      <tr  class="row100 head">
        <th class="cell100 column1">Employee Name</th>
        <th class="cell100 column2">Employee ID</th>
        <th class="cell100 column3">Date of Birth</th>
        <th class="cell100 column3">Start date</th>
        <th class="cell100 column4">Department</th>
        <th class="cell100 column5">Contact Number</th>
      </tr>
    </thead>
    <tbody>
    
    <?php 
      if ($result = $conn->query($sql)) {
          while ($row = $result->fetch_assoc()) {
              $field1name = $row["E_FName"];
              $field2name = $row["E_Id"];
              $field3name = $row["DOB"];
              $field4name = $row["E_Start_Date"];
              $field5name = $row["Dept_Name"]; 
              $field6name = $row["Contact"]; 
       
              echo '<tr> 
                        <td>'.$field1name.'</td> 
                        <td>'.$field2name.'</td> 
                        <td>'.$field3name.'</td> 
                        <td>'.$field4name.'</td> 
                        <td>'.$field5name.'</td> 
                        <td>'.$field6name.'</td> 
                    </tr>';

          }
          //echo "<a href='UserReport_Export.php'> Export To Excel </a>";

          $result->free();
      } 
      ?>

    </tbody>
  </table>


      <br>
      <button id="drop" name="drop" class="btn btn-primary text-white font-weight-bold">Drop Employee</button>   
      </form>
    </div>

      <?php
   function dropEmployee($conn1, $emp_to_del){
          if (!is_null($emp_to_del))
          {
            if ($conn1->connect_error) {
              die("Connection failed: " . $conn1->connect_error);
            }
            $sql1 = "Delete from employee where E_ID = " . $emp_to_del;
            //echo $sql1;
            if($conn1->query($sql1))
            {
              //echo "<script> alert('Selected Employee deleted successfully')</script>";
              echo '<div class="alert alert-success alert-dismissible fade in" id="success-alert" data-auto-dismiss="200">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Success! </strong> Employee deleted successfully.
                </div>';
                $_SESSION["default_tab"] = "drop_emp";
                $success = true;
            }
            else{
              //echo "Error updating record: " . $conn1->error;
              echo '<div class="alert alert-danger alert-dismissible fade in" id="error-alert" data-auto-dismiss="200">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Error! </strong> Error deleting employee."' . $conn->error .'"' .
                '.Try deleting again after some time. </div>';
                $_SESSION["default_tab"] = "drop_emp";
                $error = true;
            }            
          }
          //$_POST['ssn_i'] = "";
          //$conn1->close();
      } 
   ?>

