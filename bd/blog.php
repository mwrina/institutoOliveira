<?php

include('connect.php');

function buscarBlogs($conn) {
    $blogs = [];
    $sql = "SELECT * FROM blogs ORDER BY dataCriacao DESC";
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

function buscar4Blogs($conn) {
    $blogs = [];
    $sql = "SELECT * FROM blogs ORDER BY dataCriacao DESC LIMIT 4";
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

function buscarBlogPorId($conn, $id) {
    $sql = "SELECT * FROM blogs WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $blog = mysqli_fetch_assoc($result);

    return $blog;
}

function criarBlog($conn) {
    if (!empty($_POST['titulo']) && !empty($_POST['breveDesc']) && !empty($_POST['texto']) && !empty($_FILES['img']['name'])) {
        $titulo = $_POST['titulo'];
        $breveDesc = $_POST['breveDesc'];
        $texto = $_POST['texto'];

        $file_name = basename($_FILES['img']['name']);
        $tempname = $_FILES['img']['tmp_name'];
        $folder = 'imgs/blogs/' . $file_name;
        
        $allowed_types = ['image/jpeg', 'image/png'];
        $file_type = mime_content_type($tempname);

        if (!in_array($file_type, $allowed_types)) {
            header("Location: criarBlog.php?alert=3");
            return;
        }

        $breveDescConv = nl2br(htmlspecialchars($breveDesc, ENT_QUOTES, 'UTF-8'));
        $textoConv = nl2br(htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'));

        $sql = "INSERT INTO blogs (dataCriacao, titulo, breveDesc, texto, img) VALUES (CURRENT_TIMESTAMP(), ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $titulo, $breveDescConv, $textoConv, $folder);

        if (mysqli_stmt_execute($stmt)) {
            if (move_uploaded_file($tempname, '../'.$folder)) {
                header("Location: ../admBlog.php");
            } else {
                header("Location: criarBlog.php?alert=4");
            }
        } else {
            header("Location: criarBlog.php?alert=5");
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: criarBlog.php?alert=1");
    }
}

function editarBlog($conn) {
    if (isset($_POST['editIdBlog'])) {
        $id = $_POST['editIdBlog'];

        if (!empty($_POST['titulo']) && !empty($_POST['breveDesc']) && !empty($_POST['texto'])) {
            $titulo = $_POST['titulo'];
            $breveDesc = $_POST['breveDesc'];
            $texto = $_POST['texto'];

            $breveDescConv = nl2br(htmlspecialchars($breveDesc, ENT_QUOTES, 'UTF-8'));
            $textoConv = nl2br(htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'));

            // Buscar os caminhos das imagens antigas
            $sql = "SELECT img FROM blogs WHERE id = ?";
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
                $folder = 'imgs/blogs/' . $file_name;

                $allowed_types = ['image/jpeg', 'image/png'];
                $file_type = mime_content_type($tempname);
        
                if (!in_array($file_type, $allowed_types)) {
                    header("Location: criarBlog.php?alert=3");
                    return;
                }

                // Deletar a imagem antiga
                if (file_exists('../'.$img_antiga)) {
                    unlink('../'.$img_antiga);
                }

                move_uploaded_file($tempname, '../'.$folder);
            }

            // Atualiza o projeto no banco de dados
            $sql = "UPDATE blogs SET titulo = ?, breveDesc = ?, texto = ?, img = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssi", $titulo, $breveDescConv, $textoConv, $folder, $id);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admBlog.php");
            } else {
                header("Location: criarBlog.php?alert=4");
            }

            mysqli_stmt_close($stmt);
        } else {
            header("Location: criarBlog.php?alert=2");
        }
    } else {
        header("Location: criarBlog.php?alert=1");
    }
}

function deletarBlog($conn, $id) {
    $sql = "SELECT img FROM blogs WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $img);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($img) {
        if (file_exists($img)) {
            if (!unlink($img)) {
                echo "Erro ao deletar a imagem: $img";
                return;
            }
        } else {
            echo "A imagem não existe: $img";
        }
    } else {
        echo "Imagem não encontrada para o ID fornecido.";
    }

    $sql = "DELETE FROM blogs WHERE id = ?";
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['criarBlog'])) {
        criarBlog($conn);
    } elseif (isset($_POST['editarBlog'])) {
        editarBlog($conn);
    } elseif (isset($_POST['deleteIdBlog'])) {
        deletarBlog($conn, $_POST['deleteIdBlog']);
    } else {
        echo "Nenhum parâmetro válido enviado.";
    }
}