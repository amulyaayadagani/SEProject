<<<<<<< HEAD

<h3>Notifications</h3>
=======
    <div id="success_msg" class="alert alert-success alert-dismissible" style="visibility: hidden" >
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Success!</strong> Messages selected successfully.
	</div>
	<div class="container">
	  <form id="message-form" action="" method="post">
	  <input type="hidden" id="msg_del" name="msg_del" >
	  <button type="submit" id="del_btn" class="btn btn-primary text-white font-weight-bold" style="display: none">Delete</button>
	  <table class="table table-bordered">
	    <thead>
	      <tr class="row100 head">
	        <th class="cell100 column1"></th>
	        <th class="cell100 column2">Subject</th>
	        <th class="cell100 column3">Date received</th>
	        <th class="cell100 column4">Message</th>
	      </tr>
	    </thead>
	    <tbody>	   
		<?php
			//print_r($_SESSION);
			//print_r($_GET);
			//print_r($_POST);
			$u_id = $_SESSION["user_id"];
			//$message_to_del = $_POST["msg_del"];
			$conn = mysqli_connect("localhost", "root", "", "CRMDB_SE");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			if(!is_null($u_id)){
				$sql = "SELECT c_id,message_id,subject,date_received,message from notification where c_id =" . $u_id;
				$result = $conn->query($sql);
				$i=0;
				if ($result->num_rows > 0) {
					$i=1;
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$id = $row["message_id"];
						echo "<tr class='row100 body'><td>" . $i. "</td><td>" . $row["subject"] . "</td><td>" . $row["date_received"] ."</td><td>". $row["message"]. "</td><td style='display: none'>". "<a id='delete_msg' href='#' >Delete</a>" . "</td><td style='display: none'>" . $row["message_id"] . "</td></tr>";
						$i++;
					}
					echo "</tbody></table></form></div>";
					//echo "<a href='UserReport_Export.php'> Export To Excel </a>";
				} else { echo "0 results"; }
			}
			//echo $message_to_del;
			if(isset($_POST["msg_del"])){
				$del_sql = "delete from notification where message_id =" . $_POST["msg_del"] ;
				echo $del_sql;
				if($conn->query($del_sql))
				{
				   echo "<script> alert('Message deleted successfully')</script>";
				}
				else{
				   echo "Error deleting message: " . $conn->error;
				}
		  	}
		  	$conn->close();
		?>
	    <script language="javascript">
	    	$('#del_btn').click(function() {    
	        var msg_id = $('.selected').find("td:eq(5)").text();
	        //alert(msg_id);
	        $confirm_var = confirm("Are you sure you want to delete the selected message?");

	        if($confirm_var){
	            $("#msg_del").val(msg_id);
	        }else{
	            $("#msg_del").val(NULL);
	        }
	      });
	      $('tr').click(function() {
	         $('.selected').removeClass('selected');
	          $(this).addClass('selected');
	          $("#del_btn").attr("style","");
	      });
	      
	    </script>

>>>>>>> ritub3
