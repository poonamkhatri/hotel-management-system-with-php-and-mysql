<?php 



include 'db/config.php';
session_start();

$cat_id= $_GET['q'];
 //$Username=$_SESSION['login_user'];

    // Fetch city data based on the specific state 
 //  $projecthead_siteid=$_SESSION['username'];
   // $projecthead_siteid;
  $query="SELECT * FROM `add_rooms` where room_no='$cat_id'";

 
  
$record=mysqli_query($conn,$query);
    // Generate HTML of city options list 
    //if($record->num_rows > 0){ 
       
	   
       while ($row=mysqli_fetch_array($record))
	
 {  
           $cat_id=$row['charges']; 
            echo '<option value="'.$row['charges'].'">'.$row['charges'].'</option>'; 
            
        } 
   // }else{ 
   //     echo '<option value="">City not available</option>'; 
   // } 
