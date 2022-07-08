<?php require("connection.php"); ?>
<?php
    $msg = "";
    if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="backend.php">
        <?php echo $msg . '<br>'; ?>
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <input type="submit" name="register" value="Register">
    </form>

    <form method="POST" action="backend.php">
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>