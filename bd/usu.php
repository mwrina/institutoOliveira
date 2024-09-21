<?php
include("connect.php");

function buscarUsuarios($conn) {
    $sql = "SELECT * FROM usuarios";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
    } else {
        echo "Erro ao buscar os usuários: " . mysqli_error($conn);
    }

    return $usuarios;
}

function contUsuarios($conn) {
    $sql = "SELECT COUNT(id) AS total FROM usuarios";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

function criarUsuario($conn) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmSenha = $_POST['confirmaSenha'] ?? '';
    $tipoUsuario = $_POST['tipoUsuario'] ?? '';
    $ultimoAcesso = "Nunca acessado";

    if ($senha === $confirmSenha) {
        $senhaHashada = password_hash($senha, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nome, email, senha, tipoUsuario, ultimoAcesso) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $senhaHashada, $tipoUsuario, $ultimoAcesso);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../admUsu.php");
        } else {
            echo "Erro ao criar usuário: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "As senhas não coincidem. Tente novamente.";
    }
}

function editarUsuario($conn) {
    $id = $_POST['editIdUsu'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmSenha = $_POST['confirmSenha'] ?? '';
    $tipoUsuario = $_POST['tipoUsu'] ?? '';

    if ($senha === $confirmSenha) {
        $senhaHashada = password_hash($senha, PASSWORD_BCRYPT);

        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, tipoUsuario = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $nome, $email, $senhaHashada, $tipoUsuario, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../admUsu.php");
            exit();
        } else {
            echo "Erro ao atualizar o usuário: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "As senhas não coincidem. Tente novamente.";
    }
}

function deletarUsuario($conn, $id) {

    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
    } else {
        http_response_code(500);
        echo "Erro ao deletar usuário: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deleteIdUsu'])) {
        deletarUsuario($conn, $_POST['deleteIdUsu']);
    } elseif (isset($_POST['editIdUsu'])) {
        editarUsuario($conn);
    } elseif (isset($_POST['criarUsuario'])) {
        criarUsuario($conn);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}
