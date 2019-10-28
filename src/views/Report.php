<div class="container" >
    <div class="container">
        <h3>Reports</h3>
        <div class="row">
          <div class="col-md-7" >                         
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                   <label for="report_type" class="font-weight-bold text-black">Report Type</label>
                   <div class="field-icon-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select required name="report_type" id="report_type" class="form-control">
                         <option value="1">Customer Details</option>
                         <option value="2">Employee Details</option>
                         <option value="3">Reservation Deatils</option>
                         <option value="4">Notifications</option>
                      </select>
                   </div> 
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                     <label for="from_date" class="font-weight-bold text-black">From Date</label>
                     <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" required type="text" name="checkin_date" id="checkin_date" class="form-control">
                       
                     </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                     <label for="to_date" class="font-weight-bold text-black">To Date</label>
                     <div class="field-icon-wrap">
                        <div class="icon"><span class="icon-calendar"></span></div>
                        <input autocomplete="off" required type="text" name="checkout_date" id="checkout_date" class="form-control">
                       
                     </div>
                </div>             
              </div><a href="./views/report_export.php"> Export To Excel </a>
            </form>
          </div>
        </div>
    </div>    
</div>
