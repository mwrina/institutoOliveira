<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarProjetos.css">
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
            <h1 id="containerTit">Cadastro de Projetos</h1>
            <form class="form" method="post" action="bd/proj.php" enctype="multipart/form-data">
                <div class="formInputs">
                    <div class="formCols">
                        <div class="formCol">
                            <div class="linNome">
                                <label for="nome">Nome do projeto: </label> <br>
                                <input type="text" name="nome" id="nome" required>
                            </div>
                            <div class="linBDesc">
                                <label for="breveDesc">Descrição breve do projeto:</label> <br>
                                <textarea name="breveDesc" id="breveDesc" placeholder="Digite aqui a descrição do projeto" required></textarea>
                            </div>
                        </div>
                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem:</label>
                            <input type="file" name="img01" id="inserirImg01" required>
                            <button type="button" id="btnImg01">
                                <img src="imgs/icons/imgIcon.png" id="imgBtn">
                            </button>
                        </div>
                    </div>  
                    <div class="lin">
                        <label for="secao">Texto para a primeira seção do projeto:</label> <br>
                        <textarea name="secao01" id="secao01" placeholder="Digite aqui a descrição do projeto" required></textarea>
                    </div>
                    <div class="formCols2">
                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem (opcional):</label>
                            <input type="file" name="img02" id="inserirImg02">
                            <button type="button" id="btnImg02">
                                <img src="imgs/icons/imgIcon.png" id="imgBtn">
                            </button>
                        </div>
                        <div class="formCol">
                            <label for="descCProj">Texto para a segunda seção do projeto (opcional):</label> <br>
                            <textarea name="secao02" id="secao02" placeholder="Digite aqui a descrição do projeto"></textarea>
                        </div>
                    </div>
                    <div class="btn">
                        <input type="submit" id="submitBtn" name="criarProjeto" value="Criar projeto">
                    </div>
                </div>  
            </form>
        </div>
    </main>

    <script>
        document.getElementById('btnImg01').addEventListener('click', function() {
            document.getElementById('inserirImg01').click();
        });
        document.getElementById('btnImg02').addEventListener('click', function() {
            document.getElementById('inserirImg02').click();
        });
    </script>

</body>
</html>