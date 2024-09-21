<?php

include('connect.php');
include('usu.php');
include('token.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (!empty($email)) {
        getUserByEmail($conn, $email);
    } else {
        header("Location: ../esqueciMinhaSenha.php?alert=1");
    }
}

function getUserByEmail($conn, $email) {
    $usuarios = buscarUsuarios($conn);
    $userFound = false;

    foreach ($usuarios as $usuario) {
        if ($email === $usuario['email']) {
            $userId = $usuario['id'];
            $userFound = true;
            break;
        }
    }

    if ($userFound) {
        recuperarSenha($conn, $userId, $email);
    } else {
        header("Location: ../esqueciMinhaSenha.php?alert=1");
        exit;
    }
}

function enviarEmail($email, $token) {
    $assunto = "Recuperação de Senha";
    $mensagem = "Olá,\n\nRecebemos uma solicitação para redefinir a senha da sua conta.\n";
    $mensagem .= "Para redefinir sua senha, clique no link abaixo ou cole-o no navegador:\n";
    $mensagem .= "localhost/institutooliveira-main/redefinirSenha.php?token=$token\n\n";
    $mensagem .= "Este link é válido por 24 horas.\n\nSe você não solicitou a redefinição da senha, ignore este e-mail.\n\n";
    $headers = "From: marinaarosa27@gmail.com";

    // Enviar o e-mail
    if (mail(to: $email, subject: $assunto, message: $mensagem, additional_headers: $headers)) {
        return true; // E-mail enviado com sucesso
    } else {
        return false; // Erro ao enviar o e-mail
    }
}

function recuperarSenha($conn, $userId, $email) {
    // Criar o token
    $token = criarToken($conn, $userId);

    // Enviar e-mail com o token
    if (enviarEmail($email, $token)) {
        header("Location: ../esqueciMinhaSenha.php?alert=2"); // Redireciona com sucesso
    } else {
        header("Location: ../esqueciMinhaSenha.php?alert=3"); // Redireciona com erro ao enviar e-mail
    }
}