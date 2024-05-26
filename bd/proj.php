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
    
        $sql = "INSERT INTO projetos (nomeProj, breveDescProj, maisInfoProj, imgProj, dataCriacao) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $nomeProj, $descBreve, $maisInfo, $file_name);
    
        if (mysqli_stmt_execute($stmt)) {
            move_uploaded_file($tempname, $folder);
            header("Location: ../admProj.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_stmt_close($stmt);
    }

    function buscarProjetos($conn) {

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

    if (isset($_POST['criarProjeto'])) {
        criarProjeto($conn);
    }