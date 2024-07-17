<?php

    $server = "localhost:3306";
    $user = "root";
    $password = "";
    $db = "institutooliveira";

    $conn = new mysqli($server, $user, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

    $conn->set_charset("utf8mb4");
    