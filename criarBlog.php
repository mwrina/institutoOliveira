<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarBlog.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->
    <?php include("sidebar.php"); ?>
        
    <main>
        <div class="containerPaginaAdm">
            <h1 id="containerTit">Criar nova postagem:</h1>
            <form class="form" method="post" action="bd/blog.php" enctype="multipart/form-data">
                <div class="formInputs">
                    <div class="formCols">
                        <div class="formCol">
                            <div class="linTitulo">
                                <label for="titulo">Título do post:</label><br>
                                <input type="text" name="titulo" id="titulo" required>
                            </div>
                            <div class="linBDesc">
                                <label for="breveDesc">Descrição breve do post:</label><br>
                                <textarea name="breveDesc" id="breveDesc" placeholder="Digite aqui um resumo breve do conteúdo no post" required></textarea>
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
                        <label for="texto">Conteúdo do post:</label><br>
                        <textarea name="texto" id="texto" placeholder="Digite aqui todo o conteúdo do seu post para o blog Oliveira" required></textarea>
                    </div>
                    <div class="btn">
                        <input type="submit" id="submitBtn" name="criarBlog" value="Criar post">
                    </div>
                </div>  
            </form>
        </div>
    </main>

    <script>
        document.getElementById('btnImg').addEventListener('click', function() {
            document.getElementById('inserirImg').click();
        });

    document.addEventListener('DOMContentLoaded', (event) => {
    const params = new URLSearchParams(window.location.search);
        if (params.has('alert')) {
            const alertValue = params.get('alert');
            switch (alertValue) {
                case '1':
                    alert("ID do blog não especificado.");
                    break;
                case '2':
                    alert("Por favor, preencha todos os campos obrigatórios.");
                    break;
                case '3':
                    alert("Tipo de arquivo não permitido. Apenas JPEG e PNG são permitidos.");
                    break;
                case '4':
                    alert("Erro ao adicionar imagem.");
                    break;
                case '5':
                alert("Erro ao adicionar novo blog.");
                break;
            }
            window.history.replaceState(null, null, window.location.pathname); // Limpa a query string da URL
        }
    });
    </script>
</body>
</html>
