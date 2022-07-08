<?php
    require("connection.php");

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) or empty($password)) {
            header("Location: index.php?msg=None of the fields must be empty!");
            exit;
        }

        $pwd = sha1($password);

        $sql = "SELECT username FROM profile WHERE username='$username'";
        $query = mysqli_query($connection, $sql);

        if(mysqli_num_rows($query) > 0) {
            header("Location: index.php?msg=This username already exist!");
            exit;
        }

        $sql = "INSERT INTO profile SET username='$username', password='$pwd'";
        mysqli_query($connection, $sql);
        header("Location: index.php?msg=Registration Successful");
    }

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pwd = sha1($password);

        $sql = "SELECT * FROM profile WHERE username='$username' AND password='$pwd'";
        $query = mysqli_query($connection, $sql);

        if(mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_array($query);
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            
            header("Location: dashboard.php?msg=Logged in successfully!");
            exit;
        } else {
            header("Location: index.php?msg=User not found!");
            exit;
        }
    }

    if(isset($_POST['create'])) {
        $animal = $_POST['animal'];
        $type = $_POST['type'];
        $food = $_POST['food'];
        $habitat = $_POST['habitat'];

        $sql = "INSERT INTO animal SET name='$animal', type='$type', habitat='$habitat', food='$food'";
        $query = mysqli_query($connection, $sql);

        header("Location: dashboard.php?msg=Created successfully!");
        exit;
    }

    if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $animal = $_POST['animal'];
        $type = $_POST['type'];
        $food = $_POST['food'];
        $habitat = $_POST['habitat'];

        $sql = "UPDATE animal SET name='$animal', type='$type', food='$food', habitat='$habitat' WHERE id = '$id'";
        mysqli_query($connection, $sql);

        header("Location: dashboard.php?msg=Updated successfully!");
        exit;
    }