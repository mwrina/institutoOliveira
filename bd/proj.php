<?php

    include("connect.php");

    function criarProjeto($conn) {
        
        if(!empty($_POST["nome"]) && !empty($_POST["breveDesc"]) && !empty($_POST["secao01"]) && !empty($_POST["secao02"]) && !empty($_FILE["img01"]["name"]) && !empty($_FILE["img01"]["name"])) {

            $nome = $_POST['nome'];
            $breveDesc = $_POST['breveDesc'];
            $secao01 = $_POST['secao01'];
            $secao02 = $_POST['secao02'];

            $file_name01 = $_FILES['img01']['name'];
            $tempname01 = $_FILES['img01']['tmp_name'];
            $folder01 = 'imgs/' . $file_name01;

            $file_name02 = $_FILES['img02']['name'];
            $tempname02 = $_FILES['img02']['tmp_name'];
            $folder02 = 'imgs/' . $file_name02;

            $breveDescConv = str_replace(array("\r\n", "\r", "\n"), "<br>", $breveDesc);
            $secao01Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao01);
            $secao02Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao02);
        
            $sql = "INSERT INTO projetos (nome, breveDesc, secao01, secao02, img01, img02, dataCriacao) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP())";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssss", $nome, $breveDescConv, $secao01Conv, $secao02Conv, $folder01, $folder02);
        
            if (mysqli_stmt_execute($stmt)) {
                move_uploaded_file($tempname01, $folder01);
                move_uploaded_file($tempname02, $folder02);
                header("Location: ../admProj.php");
            } else {
                echo "Erro: " . mysqli_error($conn);
            }
        
            mysqli_stmt_close($stmt);
        } else {
            echo "Nem todos os campos necessários foram preenchidos.";
        }
    }

    function editarProjeto($conn) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['editIdProj'])) {
                $id = $_POST['editIdProj'];
    
                if (!empty($_POST['nome']) && !empty($_POST['breveDesc']) && !empty($_POST['secao01'])) {
                    $nome = '';
                    $breveDesc = '';
                    $secao01 = '';
                    $secao02 = '';
                
                    $file_name01 = $_FILES['img01']['name'];
                    $tempname01 = $_FILES['img01']['tmp_name'];
                    $folder01 = 'imgs/' . $file_name01;

                    $file_name02 = $_FILES['img02']['name'];
                    $tempname02 = $_FILES['img02']['tmp_name'];
                    $folder02 = 'imgs/' . $file_name02;
                
                    if (!empty($_POST['nome'])) {
                        $nome = $_POST['nome'];
                    }
                
                    if (!empty($_POST['breveDesc'])) {
                        $breveDesc = $_POST['breveDesc'];
                    }
                    
                    if (!empty($_POST['secao01'])) {
                        $secao01 = $_POST['secao01'];
                    }

                    if (!empty($_POST['secao02'])) {
                        $secao02 = $_POST['secao02'];
                    }
    
                    $breveDescConv = str_replace(array("\r\n", "\r", "\n"), "<br>", $breveDesc);
                    $secao01Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao01);
                    $secao02Conv = str_replace(array("\r\n", "\r", "\n"), "<br>", $secao02);
    
                    // Atualiza o projeto no banco de dados
                    $sql = "UPDATE projetos SET nome = ?, breveDesc = ?, secao01 = ?, secao02 = ?, img01 = ?, img02 = ? WHERE id = $id";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "ssssss", $nome, $breveDescConv, $secao01Conv, $secao02Conv, $folder01, $folder02);
                
                    if (mysqli_stmt_execute($stmt)) {
                        move_uploaded_file($tempname01, $folder01);
                        move_uploaded_file($tempname02, $folder02);
                        header("Location: ../admProj.php");
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

    function deletarProjeto($conn, $id) {
        $sql = "DELETE FROM projetos WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
                        
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