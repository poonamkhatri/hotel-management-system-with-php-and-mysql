
<?php
   include 'db/config.php';
    $sql = "DELETE FROM room_types WHERE id='" . $_GET['id'] . "'";
    $conn->query($sql);

    session_start();
    $_SESSION['danger_message'] = "Room Type Has been Deleted";
    header("Location: roomtype_list.php");
?>
