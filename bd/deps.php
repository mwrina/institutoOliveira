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

function buscarDepPorId($conn, $id) {
    $depoimento = [];

    $sql = "SELECT * FROM depoimentos WHERE id_dep = $id";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $depoimento = $row;
        }
    } else {
        echo "Erro ao buscar seções.";
    }

    return $depoimento;
}

function buscarDepsExibidos($conn) {
    $depoimentos = [];

    $sql = "SELECT * FROM depoimentos WHERE mostrarIndex = 1";
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

function contarDepsExibidos($conn) {
    $sql = "SELECT COUNT(id_dep) as qtd_deps FROM depoimentos WHERE mostrarIndex = 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return (int)$row['qtd_deps'];
    } else {
        http_response_code(500);
        echo "Erro ao contar depoimentos exibidos: " . mysqli_error($conn);
        return 0;
    }
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
   
function atualizarExibicao($conn, $idDepoimento, $mostrarIndex) {
    if ($mostrarIndex == 1) {
        $qtd_deps = contarDepsExibidos($conn);
        
        if ($qtd_deps >= 2) { 
            http_response_code(400);
            echo "Você só pode ter 2 depoimentos exibidos na página inicial.";
            exit;
        }
    }

    $sql = "UPDATE depoimentos SET mostrarIndex = ? WHERE id_dep = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $mostrarIndex, $idDepoimento);

    if (mysqli_stmt_execute($stmt)) {
        http_response_code(200);
        echo "Estado de exibição atualizado com sucesso.";
    } else {
        http_response_code(500);
        echo "Erro ao atualizar estado de exibição do depoimento: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

function deletarDepoimento($conn, $id) {
    $sql_img = "SELECT img FROM depoimentos WHERE id_dep = ?";
    $stmt = mysqli_prepare($conn, $sql_img );
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $img);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($img && file_exists('../'.$img)) {
        unlink('../'.$img);
    }

    $sql = "DELETE FROM depoimentos WHERE id_dep = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../admDep.php");
        exit();
    } else {
        echo "Erro ao deletar o registro: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);

}

function editarDepoimento($conn) {

    error_log("Função editarDepoimento() chamada.");

    if (empty($_POST["id"])) {
        header("Location: ../editarSecao.php?alert=1");
        exit();
    }

    $id = intval($_POST['id']);
    error_log("ID do depoimento a ser editado: " . $id);
    
    if(!empty($_POST['nome']) && !empty($_POST['ocupacao'])) {
        $nome = $_POST['nome'];
        $ocupacao = $_POST['ocupacao'];
        $depoimento = nl2br(htmlspecialchars($_POST['depoimento']));

        //buscar caminho da img antiga
        $sql = "SELECT img FROM depoimentos WHERE id_dep = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $img_antiga);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Padrão é manter a imagem antiga
        $folder = $img_antiga;

        if (!empty($_FILES['img']['name'])) {
            $file_name = basename($_FILES['img']['name']);
            $tempname = $_FILES['img']['tmp_name'];
            $folder = 'imgs/depoimentos/' . $file_name;

            $allowed_types = ['image/jpeg', 'image/png'];
            $file_type = mime_content_type($tempname);
            
            if (!in_array($file_type, $allowed_types)) {
                header("Location: ../editarDep.php?alert=2");
                exit();
            }

            // Deletar a imagem antiga
            if (file_exists('../'.$img_antiga)) {
                unlink('../'.$img_antiga);
            }

            // Mover o novo arquivo
            if (!move_uploaded_file($tempname, '../'.$folder)) {
                header("Location: ../editarDep.php?alert=3");
                exit();
            }
        }

        $sql = "UPDATE depoimentos SET nome = ?, ocupacao = ?, depoimento = ?, img = ? WHERE id_dep = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $nome, $ocupacao, $depoimento, $folder, $id);

        if(mysqli_stmt_execute($stmt)){
            header("Location: ../admDep.php");
                exit();
        } else {
            header("Location: ../editarDep.php?alert=4");
            exit();
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarDep'])) {
        criarDepoimento($conn);
    } elseif (isset($_POST['editarDep'])) {
        editarDepoimento($conn);
    } elseif (isset($_POST['deleteIdDep'])) {
        deletarDepoimento($conn, $_POST['deleteIdDep']);
    } elseif (isset($_POST['idDep']) && isset($_POST['mostrarIndex'])) {
        $idDepoimento = $_POST['idDep'];
        $mostrarIndex = $_POST['mostrarIndex'];

        error_log("idDepoimento: " . $idDepoimento);
        error_log("mostrarIndex: " . $mostrarIndex);

        // Certifique-se de que a conexão com o banco de dados está funcionando
        if (!$conn) {
            http_response_code(500);
            echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
            exit;
        }

        atualizarExibicao($conn, $idDepoimento, $mostrarIndex);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}