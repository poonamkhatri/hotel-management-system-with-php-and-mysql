<?php
include 'db/config.php';
if (isset($_POST['save'])) {
  $id = $_POST['id'];
    $apart_id = $_POST['apart_id'];
    $room_type_id = $_POST['room_type_id'];
    $room_no = $_POST['room_no'];
    $description = $_POST['description'];
    $charges = $_POST['charges'];
    $status = $_POST['status'];

   //$sql =  "UPDATE add_sources SET name='$name',status='$status' WHERE id=$id";
   $sql =  "UPDATE  add_rooms SET apart_id='$apart_id',room_type_id ='$room_type_id',room_no ='$room_no',description ='$description',charges ='$charges',status ='$status' WHERE id='$id'";
    
    
    if(mysqli_query($conn, $sql)){
                    session_start();
            $_SESSION['success_message'] = "Source has been updated successfully!";
             header('location:  room_list.php'); 
        
       
        
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

$result = mysqli_query($conn,"SELECT * FROM add_sources WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
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
              <h4 class="page-title">Add Source Form</h4>
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






		  <!--div class="row">
        <div class="col-md-12">
          <div class="card">
            <form class="form-horizontal" action="editSource.php" id="form" method="POST">
		            <input type="hidden" name="id" class="txtField" value="<!?php echo $row['id']; ?>" >
                <div class="card-body">
					        <div class="form-row">
						        <div class="name">Source Name</div>
							        <div class="value">
								        <input class="input--style-6" type="text" name="name" value="<!?php echo $row['name']; ?>" style="margin-bottom: 9px;">
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
									<option>Select</option>
									<option value="1"!?php if($row['status'] == '1') { ?> selected="selected"<!?php } ?>>Active</option>
									<option value="0"<!?php if($row['status'] == '0') { ?> selected="selected"<!?php } ?>>In-Active</option>
									
								</select>
                            </div>
                        </div>
				   </div-->





           <div class="row">
            <div class="col-md-11 mx-auto">
              <div class="card">
                <form class="form-horizontal" action="add_source.php" id="form" method="POST">
                <div class="card-body">
					        <div class="form-row">
						        <div class="name">Select Floor</div>
                    <div class="value">
                      <select class="select form-select shadow-none"  name="apart_id" style="width: 100%; height: 36px; margin-bottom: 10px">
                        <option value="<!?php echo $row['apart_id'];?>" hidden><?php echo $row['apart_id'];?></option>
                        <?php $apart = $conn->query("SELECT * FROM apartments order by name asc ");
                        while($row= $apart->fetch_assoc()) {
									        $apart_name[$row['id']] = $row['name'];
									        ?>
									        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
									        <?php
									      }
									      ?>
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
                        <option value="<!?php echo $row['room_type_id'];?>" hidden><?php echo $row['room_type_id'];?></option>
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
                </div>


                <div class="card-body">
                  <div class="form-row">
						        <div class="name">Enter Room No</div>
							      <div class="value">
								      <input class="input--style-6" type="text" name="room_no" value="<?php echo $row['room_no']; ?>"  style="margin-bottom: 9px;">
                    </div>
                  </div>
                </div>
                
                <div class="card-body">
                  <div class="form-row">
                    <div class="name">Description</div>
                    <div class="value">
                      <div class="input-group">
                        <textarea name = "description" class="textarea--style-6"  style="margin-bottom: 9px;"  ><?php echo $row['description']; ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-row">
						        <div class="name">Charges</div>
							      <div class="value">
								      <input class="input--style-6" type="text" name="charges" style="margin-bottom: 9px;" value="<?php echo $row['charges']; ?>">
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
									      <option value="1"<?php if($row['status'] == '1') { ?> selected="selected"<?php } ?>>Active</option>
									      <option value="0"<?php if($row['status'] == '0') { ?> selected="selected"<?php } ?>>In-Active</option>
							        </select>
                    </div>
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
