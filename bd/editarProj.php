<?php
    include("bd/connect.php");

    if(isset($_GET['editIdProj'])) {
        $idProj = $_GET['editIdProj'];

        $sql = "SELECT nomeProj, breveDescProj, maisInfoProj, imgProj FROM projetos WHERE idProj = $idProj";

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
        <div class="containerPaginaAdm">

            <h1 id="containerTit">Cadastro de Projetos</h1>

            <form class="form" method="post" action="bd/proj.php" enctype="multipart/form-data">

                <div class="formInputs">

                    <div class="formCols">

                        <div class="formCol">
                            <input type="hidden" name="editIdProj" value="<?= $idProj ?>">
                            <div class="linNome">
                                <label for="nomeProj">Nome do projeto: </label> <br>

                                <input type="text" name="nomeProj" id="nomeProj" value="<?= $projeto['nomeProj'] ?>">
                            </div>

                            <div class="linBDesc">
                                <label for="descBProj">Descrição breve do projeto:</label> <br>

                                <textarea name="descBreve" id="descBProj"><?=
                                    isset($projeto['breveDescProj']) ? str_replace('<br>', "\n", $projeto['breveDescProj']) : ''
                                ?></textarea>
                            </div>
                        </div>

                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem:</label>
                            <p id="obs">Obs: é necessário escolher novamente a imagem do seu projeto, ainda que não deseje alterá-la</p>

                            <input type="file" name="imgProj" id="inserirImg">
                            <button type="button" id="btnImg">
                                <img src="imgs/icons/imgIcon.png" id="imgBtn">
                            </button>
                        </div>

                    </div>  

                    <div class="lin">
                        <label for="descCProj">Mais informações do projeto (texto a ser exibido na página de "Saiba mais"):</label> <br>

                        <textarea name="maisInfo" id="descCProj"><?=
                            isset($projeto['maisInfoProj']) ? str_replace('<br>', "\n", $projeto['maisInfoProj']) : ''
                        ?></textarea>
                    </div>

                    <div class="btn">
                        <input type="submit" id="submitBtn" name="alterarProjeto" value="Alterar projeto">
                    </div>
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
</html>