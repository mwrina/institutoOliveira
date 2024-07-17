
<?php
    include("bd/connect.php");
    include("bd/blog.php");

    $blogs = buscarBlogs($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admGeral.css">
    <link rel="stylesheet" href="style/containerAdm.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

        <div class="container">
            <h1 id="containerTit">Lista de Projetos Cadastrados</h1>

            <div class="containerLista">

                <?php
                    if(!empty($blogs)) {
                        foreach ($blogs as $blog):
                ?>

                <div class="listaLinha">
                        <p id="titulo">Título: <?= $blog['titulo']; ?></p>

                        <p id="dataCriacao">Data de Criação: <?= $blog['dataCriacao']; ?></p>
                        
                        <div class="crudBtns">
                            <button onclick="editarProjeto(<?= $blog['id']; ?>)" class="crudBtn" id="editar">Editar Projeto</button>
                            
                            <button onclick="confirmaExclusao(<?= $blog['id']; ?>)" class="crudBtn" id="apagar">Apagar Projeto</button>
                        </div>
                </div>

                <?php 
                        endforeach;
                    } else {
                        echo('<p id="arrayVazio">Não há postagens cadastradas.</p>');
                    }
                ?>
            </div>
        </div>

    </main>

    <script>

        function editarProjeto(id) {

            if (confirm("Tem certeza de que deseja editar este projeto?")) {
                window.location.href = "editarBlog.php?editIdBlog=" + id;
            }

        }

        function confirmaExclusao(id) {
                    
            if(confirm("Tem certeza de que deseja apagar este projeto?")) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            console.log("Projeto excluído com sucesso.");
                            location.reload();
                        } else {
                            console.error('Ocorreu um erro na solicitação.');
                        }
                    }
                };
                xhr.open('POST', 'bd/blog.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('deleteIdBlog=' + id);
            }
        }

    </script>

</body>
