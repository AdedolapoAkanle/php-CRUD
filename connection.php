<?php
    session_start();

    $connection = mysqli_connect("localhost", "root", "", "wild");

    if(!$connection) {
        die("Database connection failed" . mysqli_error());
    }