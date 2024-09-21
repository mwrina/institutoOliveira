<?php
require_once('connect.php');
session_start();

function deleteExpiredTokens($conn) {
    $sql = "DELETE FROM user_tokens WHERE expires_at < NOW()";
    mysqli_query($conn, $sql);
}

function criarToken($conn, $id) {
    // Gerar token
    $token = bin2hex(random_bytes(32));
    $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour')); // Expira em 1 hora

    // Inserir token na tabela de tokens
    $sql_token = "INSERT INTO user_tokens (user_id, token, expires_at) VALUES (?, ?, ?)";
    $stmt_token = mysqli_prepare($conn, $sql_token);
    mysqli_stmt_bind_param($stmt_token, "iss", $id, $token, $expires_at);
    mysqli_stmt_execute($stmt_token);

    return $token;
}