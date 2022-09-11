<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pilatesstudio";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "<script>console.log('Connected successfully' );</script>";
    }
?>