<?php

include("connect.php");

function criarEdital($conn){
    if(!empty($_FILES['edital']['name'])){

    $file_name = basename($_FILES['edital']['name']);
    $tempname = $_FILES['edital']['tmp_name'];
    $folder = 'arquivos/editais/' . $file_name;

    $allowed_types = ['application/pdf'];
    $file_type = mime_content_type($tempname);

    if (!in_array($file_type, $allowed_types)) {
        header("Location: ../criarEdital.php?alert=2");
        return;
    }

    if(move_uploaded_file($tempname, '../'.$folder)){
        $sql = "INSERT INTO editais (edital, caminho) VALUES (?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $file_name, $folder);

        if(mysqli_stmt_execute($stmt)) {
            header("Location: ../admEditais.php");
        } else {
            header("Location: criarEdital.php?alert=4");
        }
    } else {
        header("Location: criarEdital.php?alert=3");
    }

    } else {
        header("Location: ../criarEdital.php?alert=1");
    }
}

function deletarEdital($conn, $id) {
    //DELETAR PDF DOS ARQUIVOS
    $sql = "SELECT caminho FROM editais WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $file);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if($file) {
        if (file_exists('../' . $file)) {
            if (!unlink('../' . $file)) {
                header("Location: ../admEditais.php?alert=1");
                return;
            }
        } else {
            header("Location: ../admEditais.php?alert=2");
            return;
        }
    } else {
        header("Location: ../admEditais.php?alert=3");
        return;
    }

    //DELETAR DO BD
    $sql = "DELETE FROM editais WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
    } else {
        http_response_code(500);
        header("Location: ../admEditais.php?alert=4");
    }

    mysqli_stmt_close($stmt);
}


function getEditais($conn){
    $editais = [];
    $sql = "SELECT * FROM editais ORDER BY edital";
    $result = mysqli_query($conn, $sql);

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $editais[] = $row;
        }
    } else {
        echo("Erro ao buscar editais." . mysqli_error($conn));
    }

    return $editais;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarEdital'])) {
        criarEdital($conn);
     } elseif (isset($_POST['deleteIdEdital'])) {
        $id = $_POST['deleteIdEdital'];
        deletarEdital($conn, $id);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}