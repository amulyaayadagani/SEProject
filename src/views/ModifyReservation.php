
 <form method="post" action="//submit.form" onSubmit="return validateForm();">
 <div style="width: 400px;">
 </div>
 <div align="center" style="padding-bottom: 18px;font-size : 24px;">Modify Reservation</div>
 <div align="center" style="padding-bottom: 18px;">Booking ID<span style="color: red;"> *</span><br/>
 <input type="text" id="data_5" name="data_5" style="width : 250px;" class="form-control"/>
 </div>
<div align="center" style="padding-bottom: 18px;">New Check-in date<span style="color: red;"> *</span><br/>
<input type="text" id="data_6" name="data_6" style="width : 250px;" class="form-control"/>
 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/pikaday.min.js" type="text/javascript"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/css/pikaday.min.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">new Pikaday({ field: document.getElementById('data_6') });</script>
 <div align="center" style="padding-bottom: 18px;">New Check-out date<span style="color: red;"> *</span><br/>
 <input type="text" id="data_7" name="data_7" style="width : 250px;" class="form-control"/>
 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/pikaday.min.js" type="text/javascript"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/css/pikaday.min.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">new Pikaday({ field: document.getElementById('data_7') })
</script>
 <div align="center" style="padding-bottom: 18px;">Number of people<span style="color: red;"> *</span><br/>
 <input type="number" id="data_8" name="data_8" style="width : 250px;" class="form-control"/>
 </div>
 <div align="center" style="padding-bottom: 18px;">
 Room Type:
 
 <select name="example" id="s">
 <option selected="selected" value="one">Single</option>
 <option value="two">Double</option>
 <option value="three">King</option>
<option value="four">Queen</option>
<option value="five">Suite</option>
 </select>
 </div>
 
 <div align="center" style="padding-bottom: 18px;"><input name="skip_Submit" value="Submit" type="submit"/></div>
 <div>
 
 </form>
 
 <script type="text/javascript">
 function validateForm() {
 if (isEmpty(document.getElementById('data_5').value.trim())) {
 alert('Booking ID is required!');
 return false;
 }
 
 
 if (isEmpty(document.getElementById('data_6').value.trim())) {
 alert('Change Arrival date is required!');
 return false;
 }
 if (isEmpty(document.getElementById('data_7').value.trim())) {
 alert('Change Departure date is required!');
 return false;
 }
 if (isEmpty(document.getElementById('data_8').value.trim())) {
 alert('Number of people is required!');
 return false;
 }
 return true;
 }
 function isEmpty(str) { return (str.length === 0 || !str.trim());
 }
 </script>