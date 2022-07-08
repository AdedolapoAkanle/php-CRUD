<?php require("connection.php"); ?>
<?php
    if(!isset($_SESSION['id'])) {
        header("Location: index.php?msg=Malicious activities");
        exit;
    }

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
    <title>Dashboard</title>
</head>
<body>
    <h1><?php echo $_SESSION['username']; ?></h1>
    <span><a href="logout.php">Logout</a></span>
    <br>
    <?php echo $msg; ?>
    <form method="POST" action="backend.php">
        <input type="text" placeholder="Animal Name" name="animal">
        <input type="text" placeholder="Category" name="type">
        <input type="text" name="habitat" placeholder="Habitat">
        <input type="text" name="food" placeholder="Food">
        <input type="submit" name="create" value="Post">
    </form>
    <h2>Animals</h2>
    <?php
        $sql = "SELECT * FROM animal";
        $query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            echo "<a href='animal.php?id=$id'>{$row['name']}</a> <a href='delete.php?id=$id'>Delete</a><br>";
        }
    ?>
    <h2>Other users </h2>
    <?php
        $sql = "SELECT * FROM profile WHERE username != '{$_SESSION['username']}'";
        $query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_array($query)) {
            echo "<h3>{$row['username']}</h3>";
        }
    ?>
</body>
</html>