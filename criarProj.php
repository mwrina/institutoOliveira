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

            <form class="form" method="post" action="bd/proj.php" enctype="multipart/form-data">

                <div class="formInputs">

                    <div class="formCols">

                        <div class="formCol">
                            <div class="linNome">
                                <label for="nomeProj">Nome do projeto: </label> <br>

                                <input type="text" name="nomeProj" id="nomeProj">
                            </div>

                            <div class="linBDesc">
                                <label for="descBProj">Descrição breve do projeto:</label> <br>

                                <textarea name="descBreve" id="descBProj" placeholder="Digite aqui a descrição do projeto"></textarea>
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

                    <div class="lin">
                        <label for="descCProj">Mais informações do projeto (texto a ser exibido na página de "Saiba mais"):</label> <br>

                        <textarea name="maisInfo" id="descCProj" placeholder="Digite aqui a descrição do projeto"></textarea>
                    </div>

                    <div class="btn">
                        <input type="submit" id="submitBtn" name="criarProjeto" value="Criar projeto">
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
