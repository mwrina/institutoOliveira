<?php

include("connect.php");

function buscarSecoes($conn){
    $secoes = [];
    $sql = "SELECT * FROM sobreoinstituto ORDER BY ordem";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $secoes[] = $row;
        }
    } else {
        echo "Erro ao buscar seções.";
    }

    return $secoes;
}

function contarSecoes($conn) {
    $sql = "SELECT COUNT(id) AS total FROM sobreoinstituto";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        echo "Erro ao buscar seções: " . mysqli_error($conn);
        return 0; // Retorna 0 se houver erro
    }
}

function criarSecao($conn) {
    if (!isset($_POST["tipo"]) || $_POST["tipo"] == 0) {
        header("Location: ../criarSobre.php?alert=1");
        exit();
    }

    if (!isset($_POST["ordem"]) || $_POST["ordem"] == 0) {
        header("Location: ../criarSobre.php?alert=2");
        exit();
    }

    $tipo = $_POST["tipo"];
    $ordem = $_POST["ordem"];

    if ($tipo == 3 || $tipo == 4) {
        if (!empty($_POST['titulo01']) && !empty($_POST['texto01'])) {
            $titulo01 = $_POST['titulo01'];
            $texto01Conv = nl2br(htmlspecialchars($_POST['texto01'])); // Convertendo e escapando HTML

            $sql = "INSERT INTO sobreoinstituto (tiposecao, ordem, titulo01, texto01, titulo02, texto02, img) 
                    VALUES (?, ?, ?, ?, NULL, NULL, NULL)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "iiss", $tipo, $ordem, $titulo01, $texto01Conv);

            if (mysqli_stmt_execute($stmt)) {
                reposicionarSecoes($conn, $ordem, mysqli_insert_id($conn));
                header("Location: ../admSobre.php");
                exit();
            } else {
                header("Location: ../criarSobre.php?alert=5");
                exit();
            }
        } else {
            header("Location: ../criarSobre.php?alert=4");
            exit();
        }
    } else {
        if (!empty($_POST['titulo01']) && !empty($_POST['texto01']) && !empty($_FILES['img']['name'])) {
            $titulo01 = $_POST['titulo01'];
            $texto01 = $_POST['texto01'];
            $titulo02 = $_POST['titulo02'] ?? '';
            $texto02 = $_POST['texto02'] ?? '';

            $texto01Conv = nl2br(htmlspecialchars($_POST['texto01'])); // Convertendo e escapando HTML
            $texto02Conv = !empty($texto02) ? nl2br(htmlspecialchars($texto02)) : null;

            $file_name = basename($_FILES['img']['name']);
            $tempname = $_FILES['img']['tmp_name'];
            $folder = 'imgs/sobreOInstituto/' . $file_name;

            $allowed_types = ['image/jpeg', 'image/png'];
            $file_type = mime_content_type($tempname);

            if (!in_array($file_type, $allowed_types)) {
                header("Location: ../criarSobre.php?alert=6");
                exit();
            }

            $sql = "INSERT INTO sobreoinstituto (tiposecao, ordem, titulo01, texto01, titulo02, texto02, img) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "iisssss", $tipo, $ordem, $titulo01, $texto01Conv, $titulo02, $texto02Conv, $folder);

            if (mysqli_stmt_execute($stmt)) {
                if (move_uploaded_file($tempname, '../' . $folder)) {
                    reposicionarSecoes($conn, $ordem, mysqli_insert_id($conn));
                    header("Location: ../admSobre.php");
                    exit();
                } else {
                    header("Location: ../criarSobre.php?alert=6");
                    exit();
                }
            } else {
                header("Location: ../criarSobre.php?alert=5");
                exit();
            }
        } else {
            header("Location: ../criarSobre.php?alert=4");
            exit();
        }
    }
}

function reposicionarSecoes($conn, $ordemNovaSecao, $idNovaSecao) {
    $secoes = buscarSecoes($conn);

    // Encontra a posição da nova seção
    $posicaoNovaSecao = count(array_filter($secoes, function ($secao) use ($ordemNovaSecao) {
        return $secao['ordem'] < $ordemNovaSecao;
    })) + 1;

    // Atualiza a ordem das seções após a nova seção, excluindo a própria nova seção
    foreach ($secoes as $secao) {
        if ($secao['ordem'] >= $posicaoNovaSecao && $secao['id'] != $idNovaSecao) {
            $novaOrdem = $secao['ordem'] + 1;

            $sql_repos = "UPDATE sobreoinstituto SET ordem = ? WHERE id = ?";
            $stmt_repos = mysqli_prepare($conn, $sql_repos);
            mysqli_stmt_bind_param($stmt_repos, "ii", $novaOrdem, $secao['id']);
            mysqli_stmt_execute($stmt_repos);
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarSecao'])) {
        criarSecao($conn);
    } elseif (isset($_POST['editIdProj'])) {
        editarProjeto($conn);
    } elseif (isset($_POST['deleteIdProj'])) {
        deletarProjeto($conn, $_POST['deleteIdProj']);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}