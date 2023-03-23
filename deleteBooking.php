
<?php
   include 'db/config.php';
    $sql = "DELETE FROM booking_types WHERE id='" . $_GET['id'] . "'";
    $conn->query($sql);

    session_start();
    $_SESSION['danger_message'] = "Booking Type Has been Deleted";
    header("Location: booking_list.php");
?>
