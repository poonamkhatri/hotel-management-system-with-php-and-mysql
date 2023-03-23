<?php 

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    include 'db/config.php';;
    
    // Prepare a select statement
    $sql = "SELECT * FROM reserve_rooms WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
				 $guest= $row["id"];
				 $phone= $row["phone"];
				 $email= $row["email"];
				 $addess= $row["address"];
				 $checkin_date= $row["checkin_date"];
				 $checkin_time= $row["checkin_time"];
				 $checkout_date= $row["checkout_date"];
				 $guest_type= $row["guest_type"];
				 $stay_type= $row["stay_type"];
				 $booking_source= $row["booking_source"];
				 $total_guest= $row["total_guest"];
				 $total_apart= $row["total_apart"];
				 $companion= $row["companion"];
				 $payment_mode= $row["payment_mode"];
				 
               
                
            } 
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
?>
if($id > 0){
	$room = $conn->query("SELECT * FROM add_rooms where id =".$id['room_type'])->fetch_array();
<style>
	.container-fluid p{
		margin: unset
	}
	#uni_modal .modal-footer{
		display: none;
	}
</style>
<div class="container-fluid">
	<p><b>Room : </b><?php echo isset($room['charges']) ? $room['charges'] : 'NA' ?></p>
	
	
		<div class="row">
			
				<div class="col-md-3">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
		
		</div>
</div>

</script>