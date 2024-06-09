<?php
include('connect.php');

function buscarBlogs($conn) {
    $blogs = [];
    $sql = "SELECT * FROM blogs";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $blogs[] = $row;
        }
    } else {
        echo "Erro ao buscar os blogs: " . mysqli_error($conn);
    }

    return $blogs;
}

function criarBlog($conn) {
    if (!empty($_POST['titulo']) && !empty($_POST['breveDesc']) && !empty($_POST['texto']) && !empty($_FILES['img']['name'])) {
        $titulo = $_POST['titulo'];
        $breveDesc = $_POST['breveDesc'];
        $texto = $_POST['texto'];

        $file_name = basename($_FILES['img']['name']);
        $tempname = $_FILES['img']['tmp_name'];
        $folder = 'imgs/' . $file_name;

        $breveDescConv = nl2br(htmlspecialchars($breveDesc, ENT_QUOTES, 'UTF-8'));
        $textoConv = nl2br(htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'));

        $sql = "INSERT INTO blogs (dataCriacao, titulo, breveDesc, texto, img) VALUES (CURRENT_TIMESTAMP(), ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $titulo, $breveDescConv, $textoConv, $folder);

        if (mysqli_stmt_execute($stmt)) {
            if (move_uploaded_file($tempname, $folder)) {
                header("Location: ../admBlog.php");
            } else {
                echo "Erro ao mover o arquivo para a pasta de destino.";
            }
        } else {
            echo "Erro ao inserir no banco de dados: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

if (isset($_POST['criarBlog'])) {
    criarBlog($conn);
}
