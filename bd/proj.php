<?php

include("connect.php");

function criarProjeto($conn) {
    if (!empty($_POST["nome"]) && !empty($_POST["breveDesc"]) && !empty($_POST["secao01"]) && !empty($_FILES["img01"]["name"])) {
        $nome = $_POST['nome'];
        $breveDesc = $_POST['breveDesc'];
        $secao01 = $_POST['secao01'];
        $secao02 = !empty($_POST['secao02']) ? $_POST['secao02'] : '';

        $file_name01 = basename($_FILES['img01']['name']);
        $tempname01 = $_FILES['img01']['tmp_name'];
        $folder01 = 'imgs/projetos/' . $file_name01; 

        $allowed_types = ['image/jpeg', 'image/png'];
        $file_type01 = mime_content_type($tempname01);

        if (!in_array($file_type01, $allowed_types)) {
            echo "Tipo de arquivo não permitido para a imagem 01. Apenas JPEG e PNG são permitidos.";
            return;
        }

        $folder02 = '';
        if (!empty($_FILES['img02']['name'])) {
            $file_name02 = basename($_FILES['img02']['name']);
            $tempname02 = $_FILES['img02']['tmp_name'];
            $folder02 = 'imgs/projetos/' . $file_name02;

            $file_type02 = mime_content_type($tempname02);

            if (!in_array($file_type02, $allowed_types)) {
                echo "Tipo de arquivo não permitido para a imagem 02. Apenas JPEG e PNG são permitidos.";
                return;
            }
        }

        $breveDescConv = str_replace(array("\r\n", "\r", "\n"), "<br>", $breveDesc);
        $secao01Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao01);
        $secao02Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao02);

        $sql = "INSERT INTO projetos (nome, breveDesc, secao01, secao02, img01, img02, dataCriacao) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $nome, $breveDescConv, $secao01Conv, $secao02Conv, $folder01, $folder02);

        if (mysqli_stmt_execute($stmt)) {
            move_uploaded_file($tempname01, '../'.$folder01);
            if (!empty($folder02)) {
                move_uploaded_file($tempname02, '../'.$folder02);
            }
            header("Location: ../admProj.php");
        } else {
            echo "Erro: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Nem todos os campos necessários foram preenchidos.";
    }
}

function editarProjeto($conn) {
    if (isset($_POST['editIdProj'])) {
        $id = $_POST['editIdProj'];

        if (!empty($_POST['nome']) && !empty($_POST['breveDesc']) && !empty($_POST['secao01'])) {
            $nome = $_POST['nome'];
            $breveDesc = $_POST['breveDesc'];
            $secao01 = $_POST['secao01'];
            $secao02 = !empty($_POST['secao02']) ? $_POST['secao02'] : '';

            $breveDescConv = str_replace(array("\r\n", "\r", "\n"), "<br>", $breveDesc);
            $secao01Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao01);
            $secao02Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao02);

            // Buscar os caminhos das imagens antigas
            $sql = "SELECT img01, img02 FROM projetos WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $img01_antiga, $img02_antiga);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            $folder01 = $img01_antiga;
            $folder02 = $img02_antiga;

            if (!empty($_FILES['img01']['name'])) {
                $file_name01 = basename($_FILES['img01']['name']);
                $tempname01 = $_FILES['img01']['tmp_name'];
                $folder01 = 'imgs/' . $file_name01;

                $allowed_types = ['image/jpeg', 'image/png'];
                $file_type01 = mime_content_type($tempname01);

                if (!in_array($file_type01, $allowed_types)) {
                    echo "Tipo de arquivo não permitido para a imagem 01. Apenas JPEG e PNG são permitidos.";
                    return;
                }

                // Deletar a imagem antiga
                if (file_exists('../'.$img01_antiga)) {
                    unlink('../'.$img01_antiga);
                }
                
                move_uploaded_file($tempname01, '../'.$folder01);
            }

            if (!empty($_FILES['img02']['name'])) {
                $file_name02 = basename($_FILES['img02']['name']);
                $tempname02 = $_FILES['img02']['tmp_name'];
                $folder02 = 'imgs/' . $file_name02;

                $file_type02 = mime_content_type($tempname02);

                if (!in_array($file_type02, $allowed_types)) {
                    echo "Tipo de arquivo não permitido para a imagem 02. Apenas JPEG e PNG são permitidos.";
                    return;
                }

                // Deletar a imagem antiga
                if (file_exists('../'.$img02_antiga)) {
                    unlink('../'.$img02_antiga);
                }

                move_uploaded_file($tempname02, '../'.$folder02);
            }

            // Atualiza o projeto no banco de dados
            $sql = "UPDATE projetos SET nome = ?, breveDesc = ?, secao01 = ?, secao02 = ?, img01 = ?, img02 = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $breveDescConv, $secao01Conv, $secao02Conv, $folder01, $folder02, $id);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admProj.php");
            } else {
                echo "Erro ao atualizar o projeto: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Por favor, preencha todos os campos obrigatórios.";
        }
    } else {
        echo "ID do projeto não especificado.";
    }
}

function deletarProjeto($conn, $id) {
    // Deletar imagens
    $sql = "SELECT img01, img02 FROM projetos WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $img01, $img02);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($img01 && file_exists('../'.$img01)) {
        unlink('../'.$img01);
    }

    if ($img02 && file_exists('../'.$img02)) {
        unlink('../'.$img02);
    }

    // Deletar projeto
    $sql = "DELETE FROM projetos WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../admProj.php");
    } else {
        echo "Erro ao deletar o registro: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

function buscarProjetos($conn) {
    $projetos = [];
    $sql = "SELECT * FROM projetos ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $projetos[] = $row;
        }
    } else {
        echo "Erro ao buscar os projetos: " . mysqli_error($conn);
    }

    return $projetos;
}

function buscar4Projetos($conn) {
    $projetos = [];
    $sql = "SELECT * FROM projetos ORDER BY id DESC LIMIT 4";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $projetos[] = $row;
        }
    } else {
        echo "Erro ao buscar os projetos: " . mysqli_error($conn);
    }

    return $projetos;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarProjeto'])) {
        criarProjeto($conn);
    } elseif (isset($_POST['editIdProj'])) {
        editarProjeto($conn);
    } elseif (isset($_POST['deleteIdProj'])) {
        deletarProjeto($conn, $_POST['deleteIdProj']);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}
