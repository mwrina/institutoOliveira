<?php
require_once('connect.php');
session_start();

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

function deleteExpiredTokens($conn) {
    $sql = "DELETE FROM user_tokens WHERE expires_at < NOW()";
    mysqli_query($conn, $sql);
}

if (!empty($email) && !empty($senha)) {

    deleteExpiredTokens($conn);

    $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $confirmSenha = $row['senha'];
        $id = $row['id'];
        $nome = $row['nome'];
        $tipoUsuario = $row['tipoUsuario'];

        if (password_verify($senha, $confirmSenha)) {
            $sql_update = "UPDATE usuarios SET ultimoAcesso = CURRENT_TIMESTAMP() WHERE id = ?";
            $stmt_update = mysqli_prepare($conn, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "i", $id);
            mysqli_stmt_execute($stmt_update);

            // Gerar token
            $token = bin2hex(random_bytes(32));
            $expires_at = date('Y-m-d H:i:s', strtotime('+1 hours')); // Expira em 2 horas

            // Inserir token na tabela de tokens
            $sql_token = "INSERT INTO user_tokens (user_id, token, expires_at) VALUES (?, ?, ?)";
            $stmt_token = mysqli_prepare($conn, $sql_token);
            mysqli_stmt_bind_param($stmt_token, "iss", $id, $token, $expires_at);
            mysqli_stmt_execute($stmt_token);

            // Armazenar token na sessão
            $_SESSION['token'] = $token;
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $nome;
            $_SESSION['tipoUsuario'] = $tipoUsuario;
            $_SESSION['conectado'] = true;

            header("Location: ../adm.php");
            exit();
        } else {
            $_SESSION['conectado'] = false;
            $_SESSION['error'] = "Senha incorreta.";
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['conectado'] = false;
        $_SESSION['error'] = "Usuário não encontrado.";
        header("Location: ../login.php");
        exit();
    }
} else {
    $_SESSION['conectado'] = false;
    $_SESSION['error'] = "Preencha todos os campos.";
    header("Location: ../login.php");
    exit();
}
