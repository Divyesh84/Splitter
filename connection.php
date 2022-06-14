<?php

    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $db="splitter";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>