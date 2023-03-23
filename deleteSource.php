
<?php
   include 'db/config.php';
    $sql = "DELETE FROM add_sources WHERE id='" . $_GET['id'] . "'";
    $conn->query($sql);

    session_start();
    $_SESSION['danger_message'] = "Source Has been Deleted";
    header("Location: source_list.php");
?>
