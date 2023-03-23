
<?php
   include 'db/config.php';
    $sql = "DELETE FROM reserve_rooms WHERE id='" . $_GET['id'] . "'";
    $conn->query($sql);

    session_start();
    $_SESSION['danger_message'] = "Guest Information Has been Deleted";
    header("Location: guest_list.php");
?>
