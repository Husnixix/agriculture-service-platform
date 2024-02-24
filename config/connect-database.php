<?php
    
    // Establish Connection
    $databaseHost = "localhost";
    $databaseUsername = "root";
    $databasePassword = "";
    $databaseName = "ecofarm_management";

    // Connect Database
    $connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    // Validate 
    if(!$connection){
        die("Connection failed: " . mysqli_connect_error($connection));
    }

?>