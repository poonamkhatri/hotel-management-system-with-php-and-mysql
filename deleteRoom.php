
<?php
   include 'db/config.php';
    $sql = "DELETE FROM add_rooms WHERE id='" . $_GET['id'] . "'";
    $conn->query($sql);

    session_start();
    $_SESSION['danger_message'] = "Room  Has been Deleted!";
    header("Location: room_list.php");
?>
