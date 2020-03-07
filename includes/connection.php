<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "aau_library";
    $port       = 3307;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database, $port);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
