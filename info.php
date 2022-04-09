<?php
    $servername = "localhost";
    $database = "voting system"; 
    $username = "root";
    $password = "root";
    $sql = "mysql:host=$servername;dbname=$database;";
    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
?>