<?php
include 'db/config.php';
session_start();
    

		
if(isset($_POST['save'])){

    // Escape user inputs for security
	$apart_id = mysqli_real_escape_string($conn, $_REQUEST['apart_id']);
	$room_no = mysqli_real_escape_string($conn, $_REQUEST['room_no']);
	$room_type_id = mysqli_real_escape_string($conn, $_REQUEST['room_type_id']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
	$charges = mysqli_real_escape_string($conn, $_REQUEST['charges']);
	$status= mysqli_real_escape_string($conn, $_REQUEST['status']);
	
   
   
    $sql = "INSERT INTO add_rooms (apart_id,room_no,room_type_id,description,charges,status) VALUES ('$apart_id','$room_no','$room_type_id','$description','$charges','$status')";
    echo $sql;
    if(mysqli_query($conn, $sql)){
                    session_start();
            $_SESSION['success_message'] = "Room has been added successfully!";
             header('location: room_list.php'); 
        
       
        
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

      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add Room Form</h4>
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
                <form class="form-horizontal" action="add_room.php" id="form" method="POST">
				
				 <div class="card-body">
					 <div class="form-row">
						 <div class="name">Select Floor</div>
                            <div class="value">
                                <select name="apart_id"
									class="select2 form-select shadow-none"
									style="width: 100%; height: 36px; margin-bottom: 10px">
									<option value="">Select</option>
									<?php 
									$apart = $conn->query("SELECT * FROM apartments order by name asc ");
									while($row= $apart->fetch_assoc()) {
									$apart_name[$row['id']] = $row['name'];
									?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
									<?php
									}
									?>
								</select>
                            </div>
                        </div>
				   </div>
           <div class="card-body">

           <div class="form-row">
						          <div class="name">Select Room Type</div>
                      <div class="value">
                          <select name="room_type_id" class="select2 form-select shadow-none" style="width: 100%; height: 36px; margin-bottom: 10px">
                            <option value="">Select</option>
                            <?php 
                            $apart = $conn->query("SELECT * FROM room_types order by name asc ");
                            while($row= $apart->fetch_assoc()) {
                            $apart_name[$row['id']] = $row['name'];
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                          </select>
                      </div>
                  </div>
                 <div class="form-row">
						<div class="name">Enter Room No</div>
							  <div class="value">
								    <input class="input--style-6" type="text" name="room_no" style="margin-bottom: 9px;">
							  </div>
            </div>
					</div>
          <div class="card-body">
					        
				          <div class="form-row">
                      <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="description" style="margin-bottom: 9px;" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                        </div>
						      </div>
					<div class="card-body">
					<div class="form-row">
						<div class="name">Charges</div>
							<div class="value">
								<input class="input--style-6" type="text" name="charges" style="margin-bottom: 9px;">
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
									<option value="1">Active</option>
									<option value="0">In-Active</option>
									
								</select>
                            </div>
                        </div>
				  
						
					
	
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
        apart_id: {
          required: true
        },
		 room_no: {
          required: true
        },
		 room_type_id: {
          required: true
        },
		 description: {
          required: true
        },
		 charges: {
          required: true
        },
		status: {
          required: true
        },
       
       
      },
      messages: {
        apart_id: 'Select Apartment!',
		room_no: 'Enter Room Number!',
		room_no: 'Select Apartment!',
		room_type_id: 'Please select room type!',
		description: 'Please Enter Description!',
		charges: 'Enter Charges!',
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
