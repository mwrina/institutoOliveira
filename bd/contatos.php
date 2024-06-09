<?php
include("connect.php");

function buscarEnd($conn) {
    $enderecos = [];
    $sql = "SELECT * FROM endereco";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $enderecos[] = $row;
        }
        if (!empty($enderecos)) {
            $_SESSION['endereco'] = $enderecos[0]['endereco'];
            $_SESSION['cidade'] = $enderecos[0]['cidade'];
            $_SESSION['estado'] = $enderecos[0]['estado'];
            $_SESSION['cep'] = $enderecos[0]['cep'];
        }
    } else {
        echo "Erro ao buscar o endereco: " . mysqli_error($conn);
    }

    return $enderecos;
}

function editarEndereco($conn) {
    if (!empty($_POST['endereco']) && !empty($_POST['cep']) && !empty($_POST['cidade']) && !empty($_POST['estado'])){
        $id = $_POST['id'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        $sql = "UPDATE endereco SET endereco = ?, cidade = ?, estado = ?, cep = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            die("Erro na preparação da consulta: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssssi", $endereco, $cidade, $estado, $cep, $id);
        
        $executed = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($executed) {
            header("Location: ../admCtts.php?alert=1");
            exit();
        } else {
            echo "Erro ao atualizar o endereço: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

function buscarRedes($conn) {
    $redessociais = [];
    $sql = "SELECT * FROM redessociais";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $redessociais[] = $row;
        }
    } else {
        echo "Erro ao buscar as redes: " . mysqli_error($conn);
    }

    $_SESSION['redessociais'] = $redessociais;
    return $redessociais;
}

function criarRede($conn) {
    if (!empty($_POST['nome']) && !empty($_POST['link']) && !empty($_FILES['img']['name'])) {
        if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $nome = $_POST['nome'];
            $link = $_POST['link'];

            $file_name = $_FILES['img']['name'];
            $tempname = $_FILES['img']['tmp_name'];
            $folder = 'imgs/icons/' . $file_name;

            $sql = "INSERT INTO redessociais (icon, nome, link) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $folder, $nome, $link);

            if (mysqli_stmt_execute($stmt)) {
                move_uploaded_file($tempname, $folder);
                header("Location: ../admCtts.php");
            } else {
                echo "Erro ao inserir no banco de dados: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

function editarRede($conn) {
    if (isset($_POST['editIdRede'])) {
        $id = $_POST['editIdRede'];

        if (!empty($_POST['nome']) && !empty($_POST['link']) && !empty($_FILES['img']['name'])){
            $nome = $_POST['nome'];
            $link = $_POST['link'];

            $file_name = $_FILES['img']['name'];
            $tempname = $_FILES['img']['tmp_name'];
            $folder = 'imgs/icons/' . $file_name;

            $sql = "UPDATE redessociais SET icon = ?, nome = ?, link = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssi", $folder, $nome, $link, $id);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admCtts.php");
            } else {
                echo "Erro ao atualizar a rede social: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Por favor, preencha todos os campos obrigatórios.";
        }
    } else {
        echo "ID da rede social não especificado.";
    }
}

function deletarRede($conn, $id) {
    $sql = "DELETE FROM redessociais WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
    } else {
        http_response_code(500);
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deleteIdRede'])) {
        deletarRede($conn, $_POST['deleteIdRede']);
    } elseif (isset($_POST['editIdRede'])) {
        editarRede($conn);
    } elseif (isset($_POST['criarRede'])) {
        criarRede($conn);
    } elseif (isset($_POST['editarEndereco'])) {
        editarEndereco($conn);
    }
}
