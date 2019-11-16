<div class="container" >
    <div class="container">
        <h3>Reports</h3>
        <div class="row">
          <div class="col-md-7" >                         
            <form action="./views/report_export.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                   <label for="report_type" class="font-weight-bold text-black">Report Type</label>
                   <div class="field-icon-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select required name="report_type" id="report_type" class="form-control">   
                        <?php  if($_SESSION['user_type']=="Admin"){   
                        ?>                 
                         <option value="1">Customer Details</option>
                         <option value="2">Employee Details</option>
                         <?php } ?>
                         <option value="3">Reservation Details</option>
                         <!--<option value="4">Revenue Generation</option> -->
                      </select>
                   </div> 
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                     <label for="from_date" class="font-weight-bold text-black">From Date</label>
                     <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" type="text" name="start_date" id="start_date" class="form-control">
                       
                     </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                     <label for="to_date" class="font-weight-bold text-black">To Date</label>
                     <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" type="text" name="end_date" id="end_date" class="form-control">
                       
                     </div>
                </div>             
              </div><br>
              <input type="submit" name="export" id="export" value="Export to Excel" class="btn btn-primary text-white font-weight-bold">
            </form>
          </div>
        </div>
    </div>    
</div>

<script>
  $( document ).ready(function() {
   $('#start_date').datepicker({
     autoclose: true,
     format: 'yyyy-mm-dd'
    });

   $('#end_date').datepicker({
     autoclose: true,
     format: 'yyyy-mm-dd'
    });
  });
</script>
