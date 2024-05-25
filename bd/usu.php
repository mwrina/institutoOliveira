<?php
    include("connect.php");

    function criarUsuario($conn){

        $nome = '';
        $email = '';
        $senha = '';
        $confirmSenha = '';
        $tipoUsu = '';

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

        if (!empty($_POST['tipoUsu'])) {
            $tipoUsu = $_POST['tipoUsu'];
        }

        $ultimoAcesso = "Nunca acessado";
        
        if ($senha == $confirmSenha) {
            // Usando prepared statement para evitar injeção de SQL
            $sql = "INSERT INTO usuarios (nome, email, senha, tipoUsu, ultimoAcesso) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $senha, $tipoUsu, $ultimoAcesso);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admUsu.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            
            mysqli_stmt_close($stmt);
        } else {
            echo "As senhas não coincidem. Tente novamente.";
        }
    }

    function editarUsuario ($conn) {
        $nome = '';
        $email = '';
        $senha = '';
        $confirmSenha = '';
        $tipoUsu = '';

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

        if (!empty($_POST['tipoUsu'])) {
            $tipoUsu = $_POST['tipoUsu'];
        }
        
        if ($senha == $confirmSenha) {
            $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, tipoUsu = ?) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $nome, $email, $senha, $tipoUsu);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admUsu.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            
            mysqli_stmt_close($stmt);
        } else {
            echo "As senhas não coincidem. Tente novamente.";
        }
    }

    if (isset($_POST['criarUsuario'])) {
        criarUsuario($conn);
    }