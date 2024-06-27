<?php
    session_start();
    require_once('connect.php');

    if (isset($_SESSION['token'])) {
        $token = $_SESSION['token'];
        $sql = "DELETE FROM user_tokens WHERE token = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $token);
        mysqli_stmt_execute($stmt);
    }

    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit();