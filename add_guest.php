<?php
include 'db/config.php';
session_start();

if(isset($_POST['save'])){

    // Escape user inputs for security
	$guest= mysqli_real_escape_string($conn, $_REQUEST['guest']);
	$email= mysqli_real_escape_string($conn, $_REQUEST['email']);
	$address= mysqli_real_escape_string($conn, $_REQUEST['address']);
	$phone= mysqli_real_escape_string($conn, $_REQUEST['phone']);
	$total_guest= mysqli_real_escape_string($conn, $_REQUEST['total_guest']);
	$total_apart= mysqli_real_escape_string($conn, $_REQUEST['total_apart']);
	$companion= mysqli_real_escape_string($conn, $_REQUEST['companion']);
  $charges= mysqli_real_escape_string($conn, $_REQUEST['charges']);
	$checkin_date= mysqli_real_escape_string($conn, $_REQUEST['checkin_date']);
	$checkin_time= mysqli_real_escape_string($conn, $_REQUEST['checkin_time']);
	$checkout_date= mysqli_real_escape_string($conn, $_REQUEST['checkout_date']);
	$payment_mode= mysqli_real_escape_string($conn, $_REQUEST['payment_mode']);
	//$guest_type= mysqli_real_escape_string($conn, $_REQUEST['guest_type']);
	//$stay_type= mysqli_real_escape_string($conn, $_REQUEST['stay_type']);
	$booking_source= mysqli_real_escape_string($conn, $_REQUEST['booking_source']);
	$room_no= mysqli_real_escape_string($conn, $_REQUEST['room_no']);
	
	$room_type= mysqli_real_escape_string($conn, $_REQUEST['room_type']);
	//$tid= mysqli_real_escape_string($conn, $_REQUEST['tid']);
	//$guest_id= mysqli_real_escape_string($conn, $_REQUEST['guest_id']);
	$totalamount= mysqli_real_escape_string($conn, $_REQUEST['totalamount']);
	$paidamount= mysqli_real_escape_string($conn, $_REQUEST['paidamount']);
	$remainamount= mysqli_real_escape_string($conn, $_REQUEST['remainamount']);
	$roomnumber= mysqli_real_escape_string($conn, $_REQUEST['room_no']);
	$roomtype= mysqli_real_escape_string($conn, $_REQUEST['room_type']);
	$charges= mysqli_real_escape_string($conn, $_REQUEST['charges']);
	$days= mysqli_real_escape_string($conn, $_REQUEST['days']);
	$cgst= mysqli_real_escape_string($conn, $_REQUEST['cgst']);
	$sgst= mysqli_real_escape_string($conn, $_REQUEST['sgst']);
	$gtotal= mysqli_real_escape_string($conn, $_REQUEST['gtotal']);

	$guest_id= substr('guest', 0, 3).'-'.rand(7,50).'-'.date('MY');
	
	$card = $_FILES['card']['name'];
		// image file directory
  	$target = "upload/".basename($card);
   
   
    $sql = "INSERT INTO reserve_rooms (guest,guest_id,email,address,phone,booking_source,total_guest,total_apart,companion,charges,checkin_date,checkin_time,checkout_date,payment_mode,room_no,room_type,card,status,totalamount,paidamount,remainamount,days,cgst,sgst,gtotal) VALUES ('$guest','$guest_id','$email','$address','$phone','$booking_source','$total_guest',
										'$total_apart','$companion','$charges','$checkin_date','$checkin_time','$checkout_date','$payment_mode','$room_no','$room_type','$card','1','$totalamount','$paidamount','$remainamount','$days','$cgst','$sgst','$gtotal')";

	echo $sql;
	

	$sql1="INSERT INTO `transaction`(`bookingtid`, `totalamount`, `paidamount`, `remainammount`, `roomnumber`, `roomtype`, `charges`) VALUES ('$guest_id','$totalamount','$paidamount','$remainamount','$room_no','$room_type','$charges')";
	$result = mysqli_query($conn, $sql1);
	echo $sql1;
	

	$room = "UPDATE add_rooms SET status='0' WHERE room_no='" . $room_no . "'";
										
	$conn->query($room);
   // echo $sql;
    //die;



    if (move_uploaded_file($_FILES['card']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  
	
	if(mysqli_query($conn, $sql)){
                    session_start();
            $_SESSION['success_message'] = "Guest Information has been added successfully";
             header('location: guest_list.php'); 
        
       
        
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
 
// Close connection

?>

<?php
require_once 'includes/head_form.php';
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>


      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Guest Reservation Form</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
		  <div class="row">
            <div class="col-md-11 mx-auto">
              <div class="card">
                <form class="form-horizontal" action="add_guest.php" id="form" method="POST"  enctype="multipart/form-data">
                  <div class="card-body">
					
                

                  
                    
                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="name" >Guest name</div>
                           
                                <input class="input--style-6" type="text" name="guest" style="margin-bottom: 9px;">
								           
							</div>
							<div class="col-md-6">
							<div class="name">Email</div>
								<div class="input-group">
                                    <input class="input--style-6" type="email" name="email" style="margin-bottom: 9px;" placeholder="example@email.com">
                                </div>
                            </div>
						</div>
						
                        <!--div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" style="margin-bottom: 9px;" placeholder="example@email.com">
                                </div>
                            </div>
                        </div-->
                        <div class="form-row">
                            <div class="name">Address</div>
                            
                                <div class="input-group">
                                    <textarea class="textarea--style-6 " name="address" style="margin-bottom: 9px;" placeholder="Enter Address"></textarea>
                                </div>
                            
                        </div>
						
						
					
					
					
						<div class="form-row">
                          <div class="col-md-6">
                            <div class="name">Phone Number</div>
								
									<input class="input--style-6" type="text" name="phone" style="margin-bottom: 9px;">
						</div>
							<div class="col-md-6">
								<div class="name">Source of Booking  </div>
								
									<select name="booking_source"
										class="select2 form-select shadow-none"
										style="width: 100%; height: 36px; margin-bottom: 10px">
										<option value="">Select</option>
										<?php 
										$source = $conn->query("SELECT * FROM add_sources order by name asc ");
										while($row= $source->fetch_assoc()) {
										$source_name[$row['id']] = $row['name'];
										?>
										<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
										<?php
										}
										?>
									</select>
							</div>
						</div>
						
						
						
						
						
						<!--div class="form-row">
                            <div class="name">Phone Number</div>
								<div class="value">
									<input class="input--style-6" type="text" name="phone" style="margin-bottom: 9px;">
								</div>
						</div>
						
						<div class="form-row">
						 <div class="name">Source of Booking</div>
                            <div class="value">
                                <select name="booking_source"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px">
									<option value="">Select</option>
									<!?php 
									$source = $conn->query("SELECT * FROM add_sources order by name asc ");
									while($row= $source->fetch_assoc()) {
									$source_name[$row['id']] = $row['name'];
									?>
									<option value="<!?php echo $row['id'] ?>"><!?php echo $row['name'] ?></option>
									<!?php
									}
									?>
									
								</select>
                            </div>
                        </div-->
						
					  
								
								
						<div class="form-row">
                          <div class="col-md-6">
                            <div class="name">Total Guests</div>
                           
                                <select name="total_guest"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px">
									<option value="">Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
						</div>
							<div class="col-md-6">
								<div class="name">Total Apartments</div>
                            
                                <select name="total_apart"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px">
									<option value="">Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
							</div>
						</div>
						
						<div class="form-row">
                          <div class="col-md-6">
                            <div class="name">Companion Guest</div>
                            
								<input class="input--style-6" type="text" name="companion" style="margin-bottom: 9px;">
                              <div class="label--desc">Please add names of all guests other than the guest whos name is written above.</div>
                          
						</div>
						<div class="col-md-2"></div>
							<div class="col-md-4">
								<div class="name">Guest Identification Card </div>
                           
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="card" id="file" style="margin-bottom: 9px;">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Any Union Government Identification Card</div>

							
							</div>
						</div>
						
						
						
						<div class="form-row">
								<div class="col-md-6">
									<div class="name">Check-in date</div>
									
									<input type="date" id="aa" onchange="dateDiff();" name="checkin_date" class="form-control"  style="margin-bottom: 9px;" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
								</div>
							
							<div class="col-md-6">
								<div class="name">Check-in Time </div>
									<input name="checkin_time" class="input--style-6" type="time" style="margin-bottom: 9px;">
							</div>
						</div>
						
						
						
						
					
						<div class="form-row">
							<div class="col-md-6">
									<div class="name">Check-out date</div>
								
									<input type="date"id="bb" onchange="dateDiff();" name="checkout_date" style="margin-bottom: 9px;" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"/>
							</div>		
							<div class="col-md-6">
								<div class="name">Booking Type</div>
								<!--div class="name">Mode Of Payment</div-->
                                <select name="payment_mode"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px">
									<option value="">Select</option>
									<?php 
									$source = $conn->query("SELECT * FROM booking_types order by name asc ");
									while($row= $source->fetch_assoc()) {
									$source_name[$row['id']] = $row['name'];
									?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
									<?php
									}
									?>
									
								</select>
							</div>
						</div>
						
						
					
						
						
						
						<div class="form-row">
							<div class="col-md-6">
								<div class="name">Room Type</div>
									
                                <select name="room_type"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px" >
									<option value="">Select</option>
									<?php 
									$source = $conn->query("SELECT * FROM room_types order by name asc ");
									while($row= $source->fetch_assoc()) {
									$source_name[$row['id']] = $row['name'];
									?>
									<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
									<?php
									}
									?>
									
								</select>
							</div>
							
							<div class="col-md-6">
								 <div class="name">Room Number1</div>
                           
                                <select name="room_no"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px"  for="inputSuccess1" onchange="getCatAcorddingProduct(this.value);">
									<option value="">Select</option>
									<?php 
									$source = $conn->query("SELECT * FROM add_rooms where status = '1'  order by room_no asc ");
									while($row= $source->fetch_assoc()) {
									$source_name[$row['id']] = $row['id'];
									?>
									<option value="<?php echo $row['room_no'] ?>"><?php echo $row['room_no'] ?></option>
									<?php
									}
									?>
									
								</select>		
							</div>
						</div>
						
						
						  <div class="form-row">
							<div class="col-md-6">
								<div class="name">Mode Of Payment</div>
                           
								<select name="modeofpayment"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px">
									<option value="">Select</option>
									<option value="1">Cash</option>
									<option value="2">Card</option>
									<option value="3">UPI</option>
									
								</select>
							</div>
							
							<div class="col-md-6">
								 <div class="name">Days</div>
								 <input class="input--style-6" id="days" type="text" name="days" style="margin-bottom: 9px;" value="" onblur="reSum1();"readonly>
								
                               	</div>
						</div>

						  <div class="form-row">
							<div class="col-md-6">
								<div class="name"  >Charges</div>
								<select  class="select2 form-select shadow-none input--style-6" style="width: 100%; height: 36px; margin-bottom: 10px" id="charges" name="charges" value="" onblur="reSum1();">	
								<input  >	<!--p><!?php echo $row["charges"]; ?> INR</p-->
							</div>
							
							<div class="col-md-6">
								 <div class="name"  id="txt3">Total Amount</div>
								 <input class="input--style-6" type="text" name="totalamount" style="margin-bottom: 9px;"  id="totalamount"  value="" onchange="reSum(); "readonly>
                               	</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="name">Paid Amount</div>
                           
								<input class="input--style-6" type="text" name="paidamount" style="margin-bottom: 9px;" id="paidamount" value="" onchange="reSum(); ">
							</div>
							
							<div class="col-md-6">
								 <div class="name">Remain Amount</div>
								 <input class="input--style-6" type="text" name="remainamount" style="margin-bottom: 9px;" id="Sum" value="" readonly>
                               	</div>
						</div>
					
						<input class="input--style-6" type="hidden" name="cgst" style="margin-bottom: 9px;"  id="cgst"  value="" onchange="reSum2(); "readonly>
                               
						
						<input class="input--style-6" type="hidden" name="sgst" style="margin-bottom: 9px;"  id="sgst"  value="" onchange="reSum2(); "readonly>
                        
						<input class="input--style-6" type="hidden" name="gtotal" style="margin-bottom: 9px;" id="gtotal" value="" >
							                	                
						
						
<!--button onclick="dateDiff()">here</button-->
						

						
	            <!--div class="name">DECLARATION</div>
                <div class="value">
                   <input type="checkbox" name="term" class="form-check-input" style="margin-left: 360px"  id="customControlAutosizing1"/>
                  <label class="form-check-label mb-0" for="customControlAutosizing1" style="margin-left: 8px">I 
                  have fuly read and accepted this in all my senses.</label>
                  <div class="label--desc" style="margin-left: 8px">I have read, understood and accepted all house rules of Emerald Vista Luxury Suites. I hereby declare that the details furnished above along with the id card are true and correct to the best of my knowledge and belief and I undertake inform you any changes therein, immediately. Incase any of the above information or documents is found to false or untrue or misleading or  misrepresenting, I am aware that I may be held liable for it. I will follow all rules and regulations during my stay. The management will not be responsible for any kind of theft or damage to the personal belongings of guest. Incase of any damage to any property inside or outside my apartment, I will be held fully liable to pay the damage charges for it.</div>
                </div>
              </div-->
                
	
	
	            <div class="border-top">
                  <div class="card-body">
                    <button type="submit" name="save" class="btn btn-success text-white"><i class="fas fa-save"></i>
                      Save
                    </button>
                    <button type="reset" class="btn btn-primary"><i class="fas fa-sync-alt "></i>
					          Reset</button>
					          <a type="button" class="btn btn-danger" href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="fas fa-reply"></i>
					          Back</a>
                  </div>
               
                </div>
        </form>
        </div>
				</div>
				</div>
				</div>
				</div>
              
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
		
	
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->

   <style>
  label.error {
	/* font */
	font-family: Helvetica;
	font-size: 13px;
	font-weight: bold;
	color: #da542e;
	background-color: #fce4e4;
	border: 1px solid #fcc2c3;
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	/* positioning */
	float: left;
	position: relative;
	padding: 7px 11px 4px;
	margin-left: 2px;
 }
</style>

<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        guest: {
          required: true
        },
		email: {
          required: true
        },
		address: {
          required: true
        },
		phone: {
          required: true
        },
		total_guest: {
          required: true
        },
		total_apart: {
          required: true
        },
		checkin_date: {
          required: true
        },
		checkin_time: {
          required: true
        },
		checkout_date: {
          required: true
        },
		payment_mode: {
          required: true
        },
		term: {
          required: true
        },
		booking_source: {
          required: true
        },
		
		
       
       
      },
      messages: {
        guest: 'Guest name is required!',
		email: 'Email is required!',
		address: 'Please enter your address!',
		phone: 'Phone number is required!',
		total_guest: 'Please select number of guest!',
		total_apart: 'Please select number of apartments!',
		checkin_date: 'Please select Check-In date!',
		checkin_time: 'Please select Check-In !',
		checkout_date: 'Please select Check-Out date!',
		payment_mode: 'Please select mode of payment!',
		booking_source: 'Please select booking source!',
        term: 'Please accept this!',
		
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
<script>

function reSum1()
{
	var num1 = parseInt(document.getElementById("charges").value);
	var num2 = parseInt(document.getElementById("days").value);
	document.getElementById("totalamount").value = num1 * num2;

}



        function reSum()
        {
            var num1 = parseInt(document.getElementById("totalamount").value);
            var num2 = parseInt(document.getElementById("paidamount").value);
            document.getElementById("Sum").value = num1 - num2;
			document.getElementById("cgst").value = 0.06 * num1;
			document.getElementById("sgst").value = 0.06 * num1;
			var num3 = parseInt(document.getElementById("cgst").value);
			var num4 = parseInt(document.getElementById("sgst").value);
			document.getElementById("gtotal").value = num1 + num3 + num4;

        }

    </script>

	<script>
		function reSum2()
{
	var num1 = parseInt(document.getElementById("totalamount").value);
	var num2 = parseInt(document.getElementById("cgst").value);
	document.getElementById("gtotal").value = num1 + num2;

}
		</script>
	


<script>
	function dateDiff() {
  var d2 = document.getElementById("aa").value;
  var d1 = document.getElementById("bb").value;

  var t2 = new Date(d2);
  var t1 = new Date(d1);
 var t3= (t1 - t2) / (24 * 3600 * 1000);
 if (t3==0)
 {
	t3=1;
 }
  document.getElementById("days").value =t3;

 // alert((t1 - t2) / (24 * 3600 * 1000));
}
	</script>
<script>
  function getCatAcorddingProduct(id) {
	  
	 
		 if(id){
			 $.ajax({
				 type:'GET',
				 url:'pur-getproductSerial.php',
				 data:'q='+id,
				 success:function(html){
					   $('#charges').html(html);
					// $('#city').html('<option value="">Select state first</option>'); 
				 }
			 }); 
		 }else{
			 $('#state').html('<option value="">Select serial number  first</option>');
			 //$('#city').html('<option value="">Select state first</option>'); 
		 } 
  }</script>
	
  </body>
</html>
