<?php
    include("bd/connect.php");

    if (isset($_GET['editIdRede'])) {
        $id = $_GET['editIdRede'];
    
        $sql = "SELECT icon, nome, link FROM redessociais WHERE id = ?";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("i", $id);
        $stmt -> execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
            $rede = $result->fetch_assoc();
        } else {
            header("Location: admCtts.php");
            exit();
        }
    } else {
        header("Location: admCtts.php");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarRede.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

        <div class="containerPaginaAdm">

            <h1 id="containerTit">Alteração de Rede Social</h1>

            <form class="form" method="post" action="bd/contatos.php" enctype="multipart/form-data">
                <input type="hidden" name="editIdRede" value="<?= $id ?>">

                <div class="formInputs">

                    <div class="col">
                        <div class="lin">
                            <label for="nome">Nome da Rede: </label> <br>

                            <input type="text" name="nome" id="nome" class="inputs" value="<?= $rede['nome'] ?>" required>
                        </div>

                        <div class="lin">
                            <label for="breveDesc">Link:</label> <br>

                            <input type="text" name="link" id="link" class="inputs" value="<?= $rede['link'] ?>" required>
                        </div>

                    </div>
                   
                    <div class="col">
                        <div class="linImg">
                            <label for="inserirImg">Escolha uma imagem:</label> <br>

                            <input type="file" name="img" id="inserirImg" required>
                            <button type="button" id="btnImg">
                            <img src="<?= !empty($rede['img']) ? $rede['img'] : "imgs/icons/imgIcon.png" ?>" id="imgBtn">
                            </button>
                        </div>
                    </div>
                    
                    
                </div>  

                <div class="btn">
                    <input type="submit" id="submitBtn" name="editarRede" value="Editar rede">
                </div>
                    
            </form>

        </div>
    
    </main>

    <script>
        document.getElementById('btnImg').addEventListener('click', function() {
            document.getElementById('inserirImg').click();
        });
    </script>

</body>
