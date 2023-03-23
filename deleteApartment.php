
<?php
   include 'db/config.php';
    $sql = "DELETE FROM apartments WHERE id='" . $_GET['id'] . "'";
    $conn->query($sql);

    session_start();
    $_SESSION['danger_message'] = "Apartment Has been Deleted";
    header("Location: apartment_list.php");
?>
