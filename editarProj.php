<?php
    include("bd/connect.php");

    if(isset($_GET['editIdProj'])) {
        $idProj = $_GET['editIdProj'];

        $sql = "SELECT nomeProj, descProj, imgProj, FROM projetos WHERE idProj = $idProj";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            if(mysqli_num_rows($result) > 0) {
                $projeto = mysqli_fetch_assoc($result);
            } else {
                header("Location: admProj.php");
                exit();
            }
        } else {
            echo "Erro ao buscar o usuário: " . mysqli_error($conn);
        }
    } else {
        header("Location: admProj.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/editarProj.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php 
        include("sidebar.php")
    ?>
        
    <main>
        <div class="container">
            <h1 id="containerTit">Editar Usuário</h1>
            
            <form class="form" method="post" action="bd/proj.php" enctype="multipart/form-data">

                <div class="formInputs">

                    <div class="formCol">
                        <div class="linNome">
                            <label for="nomeProj">Nome do Projeto: </label> <br>

                            <input type="text" name="nomeProj" id="nomeProj">
                        </div>

                        <div class="linDesc">
                            <label for="descProj">Descrição do Projeto:</label> <br>

                            <textarea name="descProj" id="descProj" contenteditable="true" placeholder="Digite aqui a descrição do projeto"></textarea>
                        </div>
                    </div>

                    <div class="formCol">
                        <label for="inserirImg">Escolha uma imagem:</label>

                        <input type="file" name="imgProj" id="inserirImg">
                        <button type="button" id="btnImg">
                            <img src="imgs/icons/imgIcon.png" id="imgBtn">
                        </button>
                    </div>

                </div>  
                
            </form>
        </div>
    </main>

</body>
</html>