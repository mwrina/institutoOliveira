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

            <h1 id="containerTit">Cadastro de Rede Social</h1>

            <form class="form" method="post" action="bd/contatos.php" enctype="multipart/form-data">

                <div class="formInputs">

                    <div class="col">
                        <div class="lin">
                            <label for="nome">Nome da Rede: </label> <br>

                            <input type="text" name="nome" id="nome" class="inputs" placeholder="Digite aqui o nome da rede social" required>
                        </div>

                        <div class="lin">
                            <label for="breveDesc">Link:</label> <br>

                            <input type="text" name="link" id="link" class="inputs" placeholder="Digite aqui o link para a rede social" required>
                        </div>

                    </div>
                   
                    <div class="col">
                        <div class="linImg">
                            <label for="inserirImg">Escolha uma imagem:</label> <br>

                            <input type="file" name="img" id="inserirImg" required>
                            <button type="button" id="btnImg">
                                <img src="imgs/icons/imgIcon.png" id="imgBtn">
                            </button>
                        </div>
                    </div>
                    
                    
                </div>  

                <div class="btn">
                    <input type="submit" id="submitBtn" name="criarRede" value="Criar rede">
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
