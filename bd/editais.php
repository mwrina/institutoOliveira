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
     } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}