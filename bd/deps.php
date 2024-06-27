<?php

include("connect.php");

function buscarDepoimentos($conn) {
    $depoimentos = [];

    $sql = "SELECT * FROM depoimentos";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $depoimentos[] = $row;
        }
    } else {
        echo "Erro ao buscar seções.";
    }

    return $depoimentos;
}

function atualizarExibicao($conn, $idDepoimento, $mostrarIndex) {
    $sql = "UPDATE depoimentos SET mostrarIndex = ? WHERE id_dep = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $mostrarIndex, $idDepoimento);

    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
    } else {
        http_response_code(500);
        echo "Erro ao atualizar estado de exibição do depoimento: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

function criarDepoimento($conn) {
    if(!empty($_POST['nome']) && !empty($_POST['ocupacao']) && !empty($_POST['depoimento']) && !empty($_FILES['img'])){
        $nome = $_POST['nome'];
        $ocupacao = $_POST['ocupacao'];
        $depoimento = nl2br(htmlspecialchars($_POST['depoimento']));

        $file_name = basename($_FILES['img']['name']);
        $tempname = $_FILES['img']['tmp_name'];
        $folder = 'imgs/depoimentos/' . $file_name;

        $allowed_types = ['image/jpeg', 'image/png'];
        $file_type = mime_content_type($tempname);

        if (!in_array($file_type, $allowed_types)) {
            header("Location: ../criarDep.php?alert=2");
            exit();
        }

        $sql = "INSERT INTO depoimentos (nome, ocupacao, depoimento, img) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $nome, $ocupacao, $depoimento,  $folder);

        if(mysqli_stmt_execute($stmt)){
            if(move_uploaded_file($tempname, '../' . $folder)) {
                header("Location: ../admDep.php");
                exit();
            }
        } else {
            header("Location: criarDep.php?alert=3");
        }
    } else {
        header("Location: criarDep.php?alert=1");
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarDep'])) {
        criarDepoimento($conn);
    } elseif (isset($_POST['editarSecao'])) {
        editarSecao($conn);
    } elseif (isset($_GET['deleteIdSecao'])) {
        deletarSecao($conn, $_GET['deleteIdSecao']);
    } elseif (isset($_POST['idDep']) && isset($_POST['mostrarIndex'])) {
        $idDepoimento = $_POST['idDep'];
        $mostrarIndex = $_POST['mostrarIndex'];
        atualizarExibicao($conn, $idDepoimento, $mostrarIndex);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}