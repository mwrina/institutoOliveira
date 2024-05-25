
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarProjetos.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

        <div class="containerPaginaAdm">

            <h1 id="containerTit">Cadastro de Projetos</h1>

            <form class="form" method="post" action="bd/criarProj.php">

                <div class="formInputs">

                    <div class="formCol">
                        <div class="linNome">
                            <label for="nomeProj">Nome do Projeto: </label> <br>

                            <input type="text" name="nomeProj" id="nomeProj">
                        </div>

                        <div class="linDesc">
                            <label for="descProj">Descrição do Projeto:</label>

                            <textarea name="descProj" id="descProj">Digite a descrição do projeto aqui</textarea>
                        </div>
                    </div>

                    <div class="formCol">
                        <label for="inserirImg">Escolha uma imagem:</label>

                        <input type="file" id="inserirImg">
                        <button onclick="document.getElementById('inserirImg').click();" id="btnImg">
                            <img src="imgs/icons/imgIcon.png" id="imgBtn">
                        </button>
                    </div>

                </div>             

                <input type="submit" id="submitBtn" value="Criar projeto">

            </form>

        </div>
    
    </main>

    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript" src="js/nicedit.js"></script>

</body>
