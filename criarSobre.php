<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarSobre.css">
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
                            <div class="linTit01">
                                <label for="titulo">Título da primeira seção (obrigatório): </label> <br>
                                <input type="text" name="titulo" id="titulo" required>
                            </div>
                            <div class="linTxt01">
                                <label for="texto01">Texto da primeira seção (obrigatório):</label> <br>
                                <textarea name="texto01" id="texto01" placeholder="Digite aqui a descrição do projeto" required></textarea>
                            </div>
                        </div>
                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem:</label>
                            <input type="file" name="img" id="inserirImg" required>
                            <button type="button" id="btnImg">
                                <img src="imgs/icons/imgIcon.png" id="imgBtn">
                            </button>
                        </div>
                    </div>  

                    <div class="lin">
                        <label for="titulo">Título para a segunda seção (opcional):</label> <br>
                        <textarea name="titulo" id="titulo" placeholder="Digite aqui a descrição do projeto" required></textarea>
                    </div>
                    <div class="lin">
                        <label for="texto02">Texto para a segunda seção (opcional):</label> <br>
                        <textarea name="texto02" id="texto02" placeholder="Digite aqui a descrição do projeto"></textarea>
                    </div>

                </div> 

                <div class="btnContainer">
                    <input type="submit" name="criarSecao" value="Criar Seção">
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