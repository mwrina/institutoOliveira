<?php

include("connect.php");

function buscarSecoes($conn){
    $secoes = [];
    $sql = "SELECT s.id, s.ordem, s.titulo01, s.texto01, s.titulo02, s.texto02, s.img, t.id AS idTipo, t.tipoSecao FROM sobreoinstituto s INNER JOIN tipossecao t ON s.tiposecao = t.id ORDER BY s.ordem";
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

function buscarIndex($conn){
    $secoes = [];
    $sql = "SELECT * FROM sobreoinstituto WHERE tiposecao = 5";
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

function buscarSecaoPorId($conn, $id){
    $sql = "SELECT s.id, s.ordem, s.titulo01, s.texto01, s.titulo02, s.texto02, s.img, t.id AS idTipo, t.tipoSecao FROM sobreoinstituto s INNER JOIN tipossecao t ON s.tiposecao = t.id WHERE s.id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $secao = mysqli_fetch_assoc($result);

    return $secao;
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
                $sql_ordem_original = "SELECT ordem FROM sobreoinstituto WHERE id = ?";
                $stmt_ordem_original = mysqli_prepare($conn, $sql_ordem_original);
                mysqli_stmt_bind_param($stmt_ordem_original, "i", mysqli_insert_id($conn));
                mysqli_stmt_execute($stmt_ordem_original);
                mysqli_stmt_bind_result($stmt_ordem_original, $ordem_original);
                mysqli_stmt_fetch($stmt_ordem_original);
                mysqli_stmt_close($stmt_ordem_original);

                reposicionarSecoes($conn, $ordem, mysqli_insert_id($conn), $ordem_original);

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
                    $sql_ordem_original = "SELECT ordem FROM sobreoinstituto WHERE id = ?";
                    $stmt_ordem_original = mysqli_prepare($conn, $sql_ordem_original);
                    mysqli_stmt_bind_param($stmt_ordem_original, "i", mysqli_insert_id($conn));
                    mysqli_stmt_execute($stmt_ordem_original);
                    mysqli_stmt_bind_result($stmt_ordem_original, $ordem_original);
                    mysqli_stmt_fetch($stmt_ordem_original);
                    mysqli_stmt_close($stmt_ordem_original);

                    reposicionarSecoes($conn, $ordem, mysqli_insert_id($conn), $ordem_original);
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

function editarSecao($conn) {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: ../editarSecao.php?alert=0");
        exit();
    }

    if (!isset($_POST["tipo"]) || $_POST["tipo"] == 0 || !is_numeric($_POST["tipo"])) {
        header("Location: ../editarSecao.php?alert=1");
        exit();
    }

    if (!isset($_POST["ordem"]) || $_POST["ordem"] == 0 || !is_numeric($_POST["ordem"])) {
        header("Location: ../editarSecao.php?alert=2");
        exit();
    }

    if (empty($_POST["id"]) || !is_numeric($_POST["id"])) {
        header("Location: ../editarSecao.php?alert=7");
        exit();
    }
    
    $tipo = intval($_POST["tipo"]);
    $ordem = intval($_POST["ordem"]);
    $id = intval($_POST['id']);

    if ($tipo == 3 || $tipo == 4) {
        if (!empty($_POST['titulo01']) && !empty($_POST['texto01'])) {
            $titulo01 = $_POST['titulo01'];
            $texto01Conv = nl2br(htmlspecialchars($_POST['texto01'], ENT_QUOTES, 'UTF-8'));

            $sql = "UPDATE sobreoinstituto SET tiposecao = ?, ordem = ?, titulo01 = ?, texto01 = ?, titulo02 = NULL, texto02 = NULL, img = NULL WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "iissi", $tipo, $ordem, $titulo01, $texto01Conv, $id);

            if (mysqli_stmt_execute($stmt)) {
                // Buscar a ordem original da seção atualizada
                $sql_ordem_original = "SELECT ordem FROM sobreoinstituto WHERE id = ?";
                $stmt_ordem_original = mysqli_prepare($conn, $sql_ordem_original);
                mysqli_stmt_bind_param($stmt_ordem_original, "i", $id);
                mysqli_stmt_execute($stmt_ordem_original);
                mysqli_stmt_bind_result($stmt_ordem_original, $ordem_original);
                mysqli_stmt_fetch($stmt_ordem_original);
                mysqli_stmt_close($stmt_ordem_original);

                // Chamar a função reposicionarSecoes passando a ordem original
                reposicionarSecoes($conn, $ordem, $id, $ordem_original);
                header("Location: ../admSobre.php");
                exit();
            } else {
                header("Location: ../editarSecao.php?alert=5");
                exit();
            }
        } else {
            header("Location: ../editarSecao.php?alert=4");
            exit();
        }
    } else {
        if (!empty($_POST['titulo01']) && !empty($_POST['texto01'])) {
            $titulo01 = $_POST['titulo01'];
            $titulo02 = isset($_POST['titulo02']) ? $_POST['titulo02'] : '';
            $texto02 = isset($_POST['texto02']) ? $_POST['texto02'] : '';

            $texto01Conv = nl2br(htmlspecialchars($_POST['texto01'], ENT_QUOTES, 'UTF-8'));
            $texto02Conv = !empty($texto02) ? nl2br(htmlspecialchars($texto02, ENT_QUOTES, 'UTF-8')) : null;

            // Buscar o caminho da imagem antiga
            $sql = "SELECT img FROM sobreoinstituto WHERE id = ?";
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
                $folder = 'imgs/sobreoinstituto/' . $file_name;

                $allowed_types = ['image/jpeg', 'image/png'];
                $file_type = mime_content_type($tempname);
                
                if (!in_array($file_type, $allowed_types)) {
                    header("Location: ../editarSecao.php?alert=6");
                    exit();
                }

                // Deletar a imagem antiga
                if (file_exists('../'.$img_antiga)) {
                    unlink('../'.$img_antiga);
                }

                // Mover o novo arquivo
                if (!move_uploaded_file($tempname, '../'.$folder)) {
                    header("Location: ../editarSecao.php?alert=6");
                    exit();
                }
            }

            $sql = "UPDATE sobreoinstituto SET tiposecao = ?, ordem = ?, titulo01 = ?, texto01 = ?, titulo02 = ?, texto02 = ?, img = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "iisssssi", $tipo, $ordem, $titulo01, $texto01Conv, $titulo02, $texto02Conv, $folder, $id);

            if (mysqli_stmt_execute($stmt)) {
                // Buscar a ordem original da seção atualizada
                $sql_ordem_original = "SELECT ordem FROM sobreoinstituto WHERE id = ?";
                $stmt_ordem_original = mysqli_prepare($conn, $sql_ordem_original);
                mysqli_stmt_bind_param($stmt_ordem_original, "i", $id);
                mysqli_stmt_execute($stmt_ordem_original);
                mysqli_stmt_bind_result($stmt_ordem_original, $ordem_original);
                mysqli_stmt_fetch($stmt_ordem_original);
                mysqli_stmt_close($stmt_ordem_original);

                // Chamar a função reposicionarSecoes passando a ordem original
                reposicionarSecoes($conn, $ordem, $id, $ordem_original);
                header("Location: ../admSobre.php");
                exit();
            } else {
                header("Location: ../editarSecao.php?alert=5");
                exit();
            }
        } else {
            header("Location: ../editarSecao.php?alert=4");
            exit();
        }
    }
}


function reposicionarSecoes($conn, $ordemNovaSecao, $idNovaSecao, $ordemOriginal) {
    // Buscar todas as seções ordenadas pela ordem atual
    $sql = "SELECT id, ordem FROM sobreoinstituto ORDER BY ordem";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $secoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // Encontrar a posição da nova seção
        $posicaoNovaSecao = count(array_filter($secoes, function ($secao) use ($ordemNovaSecao) {
            return $secao['ordem'] < $ordemNovaSecao;
        })) + 1;

        // Atualizar a ordem das seções após a nova seção, excluindo a própria nova seção
        foreach ($secoes as $secao) {
            if ($secao['ordem'] >= $posicaoNovaSecao && $secao['id'] != $idNovaSecao) {
                $novaOrdem = $secao['ordem'] + 1;

                $sql_update = "UPDATE sobreoinstituto SET ordem = ? WHERE id = ?";
                $stmt_update = mysqli_prepare($conn, $sql_update);
                mysqli_stmt_bind_param($stmt_update, "ii", $novaOrdem, $secao['id']);
                mysqli_stmt_execute($stmt_update);
            }
        }

        // Restaurar a ordem original da nova seção
        $sql_restore = "UPDATE sobreoinstituto SET ordem = ? WHERE id = ?";
        $stmt_restore = mysqli_prepare($conn, $sql_restore);
        mysqli_stmt_bind_param($stmt_restore, "ii", $ordemOriginal, $idNovaSecao);
        mysqli_stmt_execute($stmt_restore);

    } else {
        // Tratamento de erro caso a consulta SQL falhe
        echo "Erro ao buscar seções: " . mysqli_error($conn);
    }
}

function deletarSecao($conn, $id) {
    //deletar imagem
    $sql = "SELECT img FROM sobreoinstituto WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $img);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($img && file_exists('../'.$img)) {
        unlink('../'.$img);
    }

    // Deletar projeto
    $sql = "DELETE FROM sobreoinstituto WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../admSobre.php");
        exit();
    } else {
        echo "Erro ao deletar o registro: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarSecao'])) {
        criarSecao($conn);
    } elseif (isset($_POST['editarSecao'])) {
        editarSecao($conn);
    } elseif (isset($_GET['deleteIdSecao'])) {
        deletarSecao($conn, $_GET['deleteIdSecao']);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}