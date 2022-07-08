<?php
require("connection.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: dashboard.php");
    exit;
}

$sql = "DELETE FROM animal WHERE id='$id'";
mysqli_query($connection, $sql);

header("Location: dashboard.php?msg=Deleted successfully!");
exit;