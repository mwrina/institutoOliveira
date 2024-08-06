<?php

include("connect.php");

// RELATORIOS MENSAIS

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

// AGRADECIMENTOS

function getAgrads($conn) {
    $agradecimentos = [];
    $sql = "SELECT * FROM agradecimentos";
    $result = mysqli_query($conn, $sql);

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $agradecimentos[] = $row;
        }
    } else {
        echo("Erro ao buscar editais." . mysqli_error($conn));
    }

    return $agradecimentos;
}

function criarAgrad($conn) {
    if (!empty($_POST['agradecimento']) && !empty($_FILES['img']['name'])) {
        $agradecimento = $_POST['agradecimento'];

        $file_name = basename($_FILES['img']['name']);
        $tempname = $_FILES['img']['tmp_name'];
        $folder = 'imgs/transparencia/' . $file_name;
        
        $allowed_types = ['image/jpeg', 'image/png'];
        $file_type = mime_content_type($tempname);

        if (!in_array($file_type, $allowed_types)) {
            header("Location: criarAgrad.php?alert=2");
            return;
        }

        $sql = "INSERT INTO agradecimentos (agradecimento, img) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $agradecimento, $folder);

        if (mysqli_stmt_execute($stmt)) {
            if (move_uploaded_file($tempname, '../'.$folder)) {
                header("Location: ../admTransp.php");
            } else {
                header("Location: criarAgrad.php?alert=3");
            }
        } else {
            header("Location: criarAgrad.php?alert=4");
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: criarAgrad.php?alert=1");
    }
}
 
function deletarAgrad($conn, $id) {
    $sql = "SELECT img FROM agradecimentos WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $img);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($img) {
        if (file_exists('../' . $img)) {
            if (!unlink('../' . $img)) {
                header("Location: admTransp.php?alert=5");
                return;
            }
        } else {
            header("Location: admTransp.php?alert=6");
        }
    } else {
        header("Location: admTransp.php?alert=7");
    }

    $sql = "DELETE FROM agradecimentos WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
    } else {
        http_response_code(500);
        echo "Erro ao deletar o registro: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

function editarAgrad($conn, $id){
    if (!empty($_POST['agradecimento'])){
        $agradecimento = $_POST['agradecimento'];

        // Buscar o caminhos da imagem antiga
        $sql = "SELECT img FROM agradecimentos WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $img_antiga);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        //o padrão é manter a imagem antiga
        $folder = $img_antiga;

        if (!empty($_FILES['img']['name'])) {
            $file_name = basename($_FILES['img']['name']);
            $tempname = $_FILES['img']['tmp_name'];
            $folder = 'imgs/transparencia/' . $file_name;

            $allowed_types = ['image/jpeg', 'image/png'];
            $file_type = mime_content_type($tempname);
    
            if (!in_array($file_type, $allowed_types)) {
                header("Location: editarAgrad.php?alert=2");
                return;
            }

            if (file_exists('../'.$img_antiga)) {
                unlink('../'.$img_antiga);
            } else {
                header("Location: editarAgrad.php?alert=3");
                return;
            }

            move_uploaded_file($tempname, '../'.$folder);
        }

        $sql = "UPDATE agradecimentos SET agradecimento = ?, img = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $agradecimento, $folder, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../admTransp.php");
        } else {
            header("Location: editarAgrad.php?alert=4");
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: criarBlog.php?alert=1");
    }
}

// CHAMADAS DE FUNÇÕES

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarRelatorio'])) {
        criarRelatorio($conn);
     } elseif (isset($_POST['deleteIdRelatorio'])) {
        $id = $_POST['deleteIdRelatorio'];
        deletarRelatorio($conn, $id);
    } elseif (isset($_POST['criarAgrad'])) {
        criarAgrad($conn);
    } elseif(isset($_POST['deleteIdAgrad'])) {
        $id = $_POST['editIdAgrad'];
        deletarAgrad($conn, $id);
    } elseif(isset($_POST['editarAgrad'])) {
        $id = $_POST['id'];
        editarAgrad($conn, $id);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}