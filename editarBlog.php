<?php
    include("bd/blog.php");

    if (isset($_GET['editIdBlog'])) {
        $id = $_GET['editIdBlog'];
    } else {
        header("Location: admBlog.php");
        exit;
    }

    $blog = buscarBlogPorId($conn, $id);
    
?>
    
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

    <?php 
        include("sidebar.php")
    ?>
        
    <main>

    <div class="containerPaginaAdm">
            <h1 id="containerTit">Editar postagem:</h1>
            <form class="form" method="post" action="bd/blog.php" enctype="multipart/form-data">
                <input type="hidden" name="editIdBlog" value="<?= $id ?>">
                <div class="formInputs">
                    <div class="formCols">
                        <div class="formCol">
                            <div class="linTitulo">
                                <label for="titulo">Título do post:</label><br>
                                <input type="text" name="titulo" id="titulo" value="<?= $blog['titulo'] ?>" required>
                            </div>
                            <div class="linBDesc">
                                <label for="breveDesc">Descrição breve do post:</label><br>
                                <textarea name="breveDesc" id="breveDesc" required><?= str_replace('<br />', "\n", htmlspecialchars_decode($blog['breveDesc'], ENT_QUOTES)); ?></textarea>
                            </div>
                        </div>
                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem:</label>
                            <input type="file" name="img" id="inserirImg">
                            <button type="button" id="btnImg">
                                <img src="<?= !empty($blog['img']) ? $blog['img'] : "imgs/icons/imgIcon.png" ?>" id="imgBtn">
                            </button>
                        </div>
                    </div>  
                    <div class="lin">
                        <label for="texto">Conteúdo do post:</label><br>
                        <textarea name="texto" id="texto" required><?=
                            str_replace('<br />', "\n", htmlspecialchars_decode($blog['texto'], ENT_QUOTES))
                        ?></textarea>
                    </div>
                    <div class="btn">
                        <input type="submit" id="submitBtn" name="editarBlog" value="Editar post">
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