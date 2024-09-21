<?php
require_once('connect.php');
include('token.php');
session_start();

function fazerLogin ($conn) {

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

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

                $token = criarToken($conn, $id);

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
}

fazerLogin($conn);

