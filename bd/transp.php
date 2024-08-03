<?php

include("connect.php");

function criarRelatorio($conn){
    if(!empty($_FILES['transp']['name'])){

    $file_name = basename($_FILES['transp']['name']);
    $tempname = $_FILES['transp']['tmp_name'];
    $folder = 'arquivos/relatoriosMensais/' . $file_name;

    $allowed_types = ['application/pdf'];
    $file_type = mime_content_type($tempname);

    if (!in_array($file_type, $allowed_types)) {
        header("Location: ../criarTransp.php?alert=2");
        return;
    }

    if(move_uploaded_file($tempname, '../'.$folder)){
        $sql = "INSERT INTO relatorios (relatorio, caminho) VALUES (?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $file_name, $folder);

        if(mysqli_stmt_execute($stmt)) {
            header("Location: ../admTransp.php");
        } else {
            header("Location: criarTransp.php?alert=4");
        }
    } else {
        header("Location: criarTransp.php?alert=3");
    }

    } else {
        header("Location: ../criarTransp.php?alert=1");
    }
}

function deletarRelatorio($conn, $id) {
    //DELETAR PDF DOS ARQUIVOS
    $sql = "SELECT caminho FROM relatorios WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $file);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if($file) {
        if (file_exists('../' . $file)) {
            if (!unlink('../' . $file)) {
                header("Location: ../admTransp.php?alert=1");
                return;
            }
        } else {
            header("Location: ../admTransp.php?alert=2");
            return;
        }
    } else {
        header("Location: ../admTransp.php?alert=3");
        return;
    }

    //DELETAR DO BD
    $sql = "DELETE FROM relatorios WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
    } else {
        http_response_code(500);
        header("Location: ../admTransp.php?alert=4");
    }

    mysqli_stmt_close($stmt);
}


function getTransp($conn){
    $relatorios = [];
    $sql = "SELECT * FROM relatorios ORDER BY relatorio";
    $result = mysqli_query($conn, $sql);

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $relatorios[] = $row;
        }
    } else {
        echo("Erro ao buscar editais." . mysqli_error($conn));
    }

    return $relatorios;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarRelatorio'])) {
        criarRelatorio($conn);
     } elseif (isset($_POST['deleteIdRelatorio'])) {
        $id = $_POST['deleteIdRelatorio'];
        deletarRelatorio($conn, $id);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}