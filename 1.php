<?php
include 'db/config.php';
error_reporting(0);
$id= $_POST["id"];
//$room_no= $_POST["room_no"];

if (isset($_POST['save'])) {
  $room_no= $_POST["room_no"];
    
    $ckeckoutamt= $_POST["ckeckoutamt"];
				

error_reporting(0);
    $sql =  "UPDATE  reserve_rooms SET ckeckoutamt ='$ckeckoutamt',status ='0' WHERE id='$id'";
    echo $sql;

    $room = "UPDATE add_rooms SET status='1' WHERE room_no='$room_no'";
    $result = mysqli_query($conn, $room);
    echo $room;
    
  
    

    if(mysqli_query($conn, $sql)){
                    session_start();
            $_SESSION['success_message'] = "Source has been updated successfully!";
             header('location: booking_history.php'); 
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

$result = mysqli_query($conn,"SELECT * FROM reserve_rooms WHERE id='" . $_GET['id'] . "'");
$rowSingleData= mysqli_fetch_array($result);

?>

<?php
require_once 'includes/head_form.php';

require_once 'includes/header.php';

require_once 'includes/sidebar.php';

?>

 <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Checkout Room Form</h4>
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
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
		  <div class="row">
        <div class="col-md-12">
          <div class="card">
          <form class="form-horizontal" action="1.php" id="form" method="POST">

				  <!--input type="text" name="id" class="txtField" value="<!?php echo $row['id']; ?>" >
          <input type="text" name="id" class="txtField" value="<!?php echo $row['apart_id']; ?>" >
          <input type="text" name="id" class="txtField" value="<!?php echo $row['room_type_id']; ?>" >
          <input type="text" name="id" class="txtField" value="<!?php echo $row['room_no']; ?>" >
          <input type="text" name="id" class="txtField" value="<!?php echo $row['description']; ?>" >
          <input type="text" name="id" class="txtField" value="<!?php echo $row['charges']; ?>" >
          <input type="text" name="id" class="txtField" value="<!?php echo $row['status']; ?>"-->
          
          <div class="col-md-12">
              <div class="card card-body printableArea"  >
                
                <input class="input--style-6" type="hidden" name="id" style="margin-bottom: 9px;" id="id" value=" <?php echo   $rowSingleData['id']; ?>  " >
							                    
                <h3><b>Guest ID:</b> <span class="pull-right"> "<?php echo $rowSingleData['guest_id']; ?></span></h3>
                
               
                <div class="row">
                  <div class="col-md-12">
                    <div class="pull-left">
                      <address>
                        <h3> 
                        &nbsp;&nbsp;&nbsp; Name:&nbsp;&nbsp;&nbsp;<b class="text-danger"><?php echo $rowSingleData['guest']; ?></b>
                        </h3>
                       
                        <div class="col-md-12">
                          <div class="table-responsive mt-5" style="clear: both">
                            <table class="table table-hover">
                              <tr>
						                    <div class="form-group">
							                    <td><b>Phone</b></td>
							                    <td><p> <?php echo $rowSingleData['phone']; ?></p><td>
						                    </div>
							                  <div class="form-group">
							                    <td><b>Email</b></td>
							                    <td><p><?php echo $rowSingleData['email']; ?></p><td>
						                    </div>
						
                              </tr>
						
						                  <tr>
                                <div class="form-group">
                                  <td><b>Address</b></td>
                                  <td><p><?php echo $rowSingleData['address']; ?></p><td>
                                </div>	
                                <div class="form-group"><td><p></p><td>
                                </div>
				                      </tr>
						
						                  <tr>
						                    <div class="form-group">
							                    <td><b>Check-in Date</b></td>
                                  <td><p><?php echo $rowSingleData['checkin_date']; ?></p><td>
                                </div>
                                <div class="form-group">
                                  <td><b>Check-in Time</b></td>
                                  <td><p><?php echo $rowSingleData['checkin_time']; ?></p><td>
                                </div>
                                
                                <div class="form-group">
                                  <td><b>Check-Out Date</b></td>
                                  <td><p><?php echo $rowSingleData['checkout_date']; ?></p><td>
                                </div>
                              </tr>
						
						                  <tr>
						                    <div class="form-group">
							                    <td><b>Room Type</b></td>
							                    <td><p><?php echo $rowSingleData['room_type']; ?>
                                  </p><td>
						                    </div>
						                    <div class="form-group">
							                    <td><b>Room Number</b></td>
                                  <input class="input--style-6" type="hidden" name="room_no" style="margin-bottom: 9px;" id="room_no" value=" <?php echo   $rowSingleData['room_no']; ?>  " >
							                    <td><p> <?php echo $rowSingleData['room_no']; ?>
                                  </p><td>
						                    </div>
						                    <div class="form-group">
							                    <td><b>Charges</b></td>
							                    <td><p> <?php echo $rowSingleData['charges']; ?>
                                  </p><td>
						                    </div>
						
                              </tr>
                              <tr>
                                    <div class="form-group">
                                      <td><b>Total Guest</b></td>
                                      <td><p> <?php echo $rowSingleData['total_guest']; ?></p><td>
                                    </div>
                                    <div class="form-group">
                                      <td><b>Total Apartment</b></td>
                                      <td><p><?php echo $rowSingleData['total_apart']; ?></p><td>
                                    </div>
                                    
                                    <div class="form-group">
                                      <td><b>Companion Guest</b></td>
                                      <td><p> <?php echo $rowSingleData['companion']; ?></p><td>
                                    </div>
                                    
                              </tr>
                              <tr>
                             
                                    <div class="form-group">
                                      <td><b>Total Amount</b></td>
                                      <td><p> <?php echo $rowSingleData['totalamount']; ?></p><td>
                                    </div>
                                    <div class="form-group">
                                      <td><b>Advance</b></td>
                                      <td><p><?php echo $rowSingleData['paidamount']; ?></p><td>
                                    </div>
                                    
                                    <div class="form-group">
                                      <td><b>Remaining</b></td>
                                      <td><p> <?php echo $rowSingleData['remainamount']; ?></p><td>
                                    </div>
                                    <!--div class="form-group">
                                      <td><b>pay</b></td>
                                      <td><p>    
								                        <input class="input--style-6" type="text" name="ckeckoutamt" style="margin-bottom: 9px;" id="ckeckoutamt" value=" <?php echo   $rowSingleData['remainamount']; ?>  "  >
							                      </p><td>
                                    </div-->
                                    
                                    
                              </tr>
                              <tr>
                              <div class="form-group">
                                      <td><b></b></td>
                                      <td><p> </p><td>
                                    </div>
                                    <div class="form-group">
                                      <td></td>
                                      <td><p></p><td>
                                    </div>
                                    
                                    <div class="form-group">
                                      <td><b>pay</b></td>
                                      <td><p>    
								                        <input class="input--style-6" type="text" name="ckeckoutamt" style="margin-bottom: 9px;" id="ckeckoutamt" value=" <?php echo   $rowSingleData['remainamount']; ?>  "  >
							                      </p><td>
                                    </div>
                                   
                                <tr>
						
						<!--tr>
						<div class="form-group">
							<td><b>Payment Mode</b></td>
							<td><p><!?php if($row1["payment_mode"]==1){ echo "Cash ";} elseif($row1["payment_mode"]==2)
							{ echo "UPI";}  elseif($row1["payment_mode"]==3)
							{ echo "Paid by Online Travel Agency (Air BNB/MMT/GO IBIBO)";}  elseif($row1["payment_mode"]==4)
							{ echo "Bill to Collaborated Company(Lupin/Calsoft/TATA etc.)";}  
							?></p><td>
							
							</div>
						
    </tr-->
						
						
                          
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-12">
                    
                    <div class="clearfix"></div>
                   
                    <div class="text-end">
                    <button type="submit" name="save" class="btn btn-success text-white"><i class="fas fa-save"></i> Save </button>
					          <a type="button" class="btn btn-danger text-white" href="<?php echo $_SERVER['HTTP_REFERER'] ?> ">Back</a>
                        
                      
                    </div>
                  </div>
                </div>
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
    <!-- ============================================================== -->
 
   
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
        name: {
          required: true
        },
		status: {
          required: true
        },
       
       
      },
      messages: {
        name: 'Source name is required!',
		status: 'Please select status!',
       
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>

	
  </body>
</html>
<!--div class="row">
            <div class="col-md-11 mx-auto">
              <div class="card">
                <form class="form-horizontal" action="add_source.php" id="form" method="POST">
                <div class="card-body">
					        <div class="form-row">
						        <div class="name">Select Floor</div>
                    <div class="value">
                      <select class="select form-select shadow-none"  name="apart_id" style="width: 100%; height: 36px; margin-bottom: 10px">
                        <option value="<!?php echo $row['apart_id'];?>" hidden><!?php echo $row['apart_id'];?></option>

									      <option>Select</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-row">
						        <div class="name">Select Room Type</div>
                    <div class="value">
                      <select name="room_type_id" class="select2 form-select shadow-none" style="width: 100%; height: 36px; margin-bottom: 10px">
                        <option value="<!?php echo $row['room_type_id'];?>" hidden><1?php echo $row['room_type_id'];?></option>
                        <option value="">Select</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <div class="form-row">
						        <div class="name">Enter Room No</div>
							      <div class="value">
								      <input class="input--style-6" type="text" name="room_no" value="<!?php echo $row['room_no']; ?>"  style="margin-bottom: 9px;">
                    </div>
                  </div>
                </div>
                
                <div class="card-body">
                  <div class="form-row">
                    <div class="name">Description</div>
                    <div class="value">
                      <div class="input-group">
                        <textarea name = "description" class="textarea--style-6"  style="margin-bottom: 9px;"  ><!?php echo $row['description']; ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-row">
						        <div class="name">Charges</div>
							      <div class="value">
								      <input class="input--style-6" type="text" name="charges" style="margin-bottom: 9px;" value="<!?php echo $row['charges']; ?>">
							      </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-row">
						        <div class="name">Status</div>
                    <div class="value">
                      <select name="status"
									      class="select2 form-select shadow-none"
									      style="width: 100%; height: 36px; margin-bottom: 10px">
									      <option value="">Select</option>
									      <option value="1"<!?php if($row['status'] == '1') { ?> selected="selected"<!?php } ?>>Active</option>
									      <option value="0"<!?php if($row['status'] == '0') { ?> selected="selected"<!?php } ?>>In-Active</option>
							        </select>
                    </div>
                  </div>
                </div-->

