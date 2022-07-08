<?php
require("connection.php");

$_SESSION['username'] = "";
$_SESSION['id'] = "";

session_destroy();

header("Location: index.php?msg=Logged out successfully!");
exit;