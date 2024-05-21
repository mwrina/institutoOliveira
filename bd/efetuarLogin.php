L<?php

    require_once('connect.php');
    session_start();

    $email = '';
    $senha = '';
    $id = '';
    $entrar = '';
    $confirmEmail = '';
    $confirmSenha = '';

    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }

    if(!empty($_POST['senha'])){
        $senha = $_POST['senha'];
    }

    if(!empty($_POST['entrar'])){
        $entrar = $_POST['entrar'];
    }

    if(!empty($email) && !empty($senha)){
        $sql = "SELECT idUsu, email, senha FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $confirmEmail = $row['email'];
            $confirmSenha = $row['senha'];
            $id = $row['idUsu'];

            if($senha == $confirmSenha){
                // Atualizar o último acesso
                $sql_update = "UPDATE usuarios SET ultimoAcesso = CURRENT_TIMESTAMP() WHERE idUsu = ?";
                $stmt_update = mysqli_prepare($conn, $sql_update);
                mysqli_stmt_bind_param($stmt_update, "i", $id);
                mysqli_stmt_execute($stmt_update);

                $_SESSION['id'] = $id;
                $_SESSION['email'] = $confirmEmail;
                $_SESSION['conectado'] = true;
                
                header("Location: \institutooliveira-main\adm.php");
                exit(); // Termina o script após redirecionamento
            } else {
                $_SESSION['conectado'] = false;
                header("Location: \institutooliveira-main\login.php");
                exit();
            }
        } else {
            $_SESSION['conectado'] = false;
            header("Location: \institutooliveira-main\login.php");
            exit();
        }
}