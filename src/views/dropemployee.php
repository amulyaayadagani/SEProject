<h4>Employees</h4>
  <table class="table table-bordered">
    <thead>
      <tr class="row100 head">
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
      $conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT E_FName,E_MName,E_LName,E_Id,Dept_Name,DOB,E_Id,Contact,E_Start_Date from employee where emp_status = 'Active'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr class='row100 body'><td>" . $row["E_FName"]. "</td><td>" . $row["E_Id"] . "</td><td>" . $row["DOB"] ."</td><td>". $row["E_Start_Date"]. "</td><td>". $row["Dept_Name"] . "</td><td>". $row["Contact"] . "</td></tr>";
        }
        echo "</tbody></table>";
        //echo "<a href='UserReport_Export.php'> Export To Excel </a>";
        } else { echo "0 results"; }
      $conn->close();
      ?>
      <button id="drop" class="btn btn-primary text-white font-weight-bold">Drop Employee</button>   
