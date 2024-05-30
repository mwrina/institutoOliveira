<?php

    include("connect.php");

    function criarProjeto($conn) {
        
        $nomeProj = '';
        $descBreve = '';
        $maisInfo = '';
    
        $file_name = $_FILES['imgProj']['name'];
        $tempname = $_FILES['imgProj']['tmp_name'];
        $folder = 'imgs/' . $file_name;
    
        if (!empty($_POST['nomeProj'])) {
            $nomeProj = $_POST['nomeProj'];
        }
    
        if (!empty($_POST['descBreve'])) {
            $descBreve = $_POST['descBreve'];
        }
        
        if (!empty($_POST['maisInfo'])) {
            $maisInfo = $_POST['maisInfo'];
        }

        $descBreveConvertido = str_replace(array("\r\n", "\r", "\n"), "<br>", $descBreve);
        $maisInfoConvertido = str_replace(array("\r\n", "\r", "\n"), "<br>", $maisInfo);
    
        $sql = "INSERT INTO projetos (nomeProj, breveDescProj, maisInfoProj, imgProj, dataCriacao) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $nomeProj, $descBreveConvertido, $maisInfoConvertido, $folder);
    
        if (mysqli_stmt_execute($stmt)) {
            move_uploaded_file($tempname, $folder);
            header("Location: ../admProj.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_stmt_close($stmt);
    }

    function editarProjeto($conn) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o ID do projeto foi enviado através do formulário
            if (isset($_POST['editIdProj'])) {
                $idProj = $_POST['editIdProj'];
    
                // Verifica se os campos necessários foram preenchidos
                if (!empty($_POST['nomeProj']) && !empty($_POST['descBreve']) && !empty($_POST['maisInfo'])) {
                    $nomeProj = $_POST['nomeProj'];
                    $descBreve = $_POST['descBreve'];
                    $maisInfo = $_POST['maisInfo'];
    
                    // Converte as quebras de linha para <br>
                    $descBreveConvertido = str_replace(array("\r\n", "\r", "\n"), "<br>", $descBreve);
                    $maisInfoConvertido = str_replace(array("\r\n", "\r", "\n"), "<br>", $maisInfo);
    
                    // Verifica se a imagem foi carregada
                    if (!empty($_FILES['imgProj']['name'])) {
                        $file_name = $_FILES['imgProj']['name'];
                        $tempname = $_FILES['imgProj']['tmp_name'];
                        $folder = 'imgs/' . $file_name;
                    } else {
                        // Se a imagem não foi carregada, mantém a imagem existente
                        $folder = $_POST['imgProjAtual'];
                    }
    
                    // Atualiza o projeto no banco de dados
                    $sql = "UPDATE projetos SET nomeProj = ?, breveDescProj = ?, maisInfoProj = ?, imgProj = ? WHERE idProj = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "ssssi", $nomeProj, $descBreveConvertido, $maisInfoConvertido, $folder, $idProj);
    
                    if (mysqli_stmt_execute($stmt)) {
                        // Move a imagem para a pasta desejada
                        if (!empty($_FILES['imgProj']['name'])) {
                            move_uploaded_file($tempname, $folder);
                        }
                        // Redireciona de volta à página de administração
                        header("Location: ../admProj.php");
                        exit();
                    } else {
                        echo "Erro ao atualizar o projeto: " . mysqli_error($conn);
                    }
    
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Por favor, preencha todos os campos obrigatórios.";
                }
            } else {
                echo "ID do projeto não especificado.";
            }
        }
    }

    function deletarProjeto($conn, $idProj) {
        $sql = "DELETE FROM projetos WHERE idProj = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $idProj);
                        
        if (mysqli_stmt_execute($stmt)) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo "Error: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    }

    function buscarProjetos($conn) {
        $projetos = [];
        $sql = "SELECT * FROM projetos";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projetos[] = $row;
            }
        } else {
            echo "Erro ao buscar os projetos: " . mysqli_error($conn);
        }

        return $projetos;
    }

    function buscarProjetoPorId($conn, $id) {
        $sql = "SELECT * FROM projetos WHERE idProj = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $projeto = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $projeto;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['deleteIdProj'])) {
            deletarProjeto($conn, $_POST['deleteIdProj']);
        } elseif (isset($_POST['editIdProj'])) {
            editarProjeto($conn);
        } else {
            echo "Nenhum parâmetro válido enviado.";
        }
    }

    if (isset($_POST['criarProjeto'])) {
        criarProjeto($conn);
    }