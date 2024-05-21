<?php
    include("connect.php");

    $nome = '';
    $email = '';
    $senha = '';
    $confirmSenha = '';
    
    if (!empty($_POST['nome'])) {
        $nome = $_POST['nome'];
    }
    
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    }
    
    if (!empty($_POST['senha'])) {
        $senha = $_POST['senha'];
    }
    
    if (!empty($_POST['confirmaSenha'])) {
        $confirmSenha = $_POST['confirmaSenha'];
    }
    
    if ($senha == $confirmSenha) {
        // Usando prepared statement para evitar injeção de SQL
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../admUsu.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "As senhas não coincidem. Tente novamente.";
    }

    