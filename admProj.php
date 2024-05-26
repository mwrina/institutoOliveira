
<?php
    include("bd/connect.php");
    include("bd/proj.php");

    $projetos = buscarProjetos($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admProj.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
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
                    if(!empty($projetos)) {
                        foreach ($projetos as $projeto):
                ?>

                <div class="listaLinha">
                        <p id="nome">Nome do Projeto: <?= $projeto['nomeProj']; ?></p>

                        <p id="dataCriacao">Data de Criação: <?= $projeto['dataCriacao']; ?></p>
                        
                        <div class="crudBtns">
                            <button class="crudBtn" id="editar">Editar Projeto</button>
                            
                            <button class="crudBtn" id="apagar">Apagar Projeto</button>
                        </div>
                </div>

                <?php 
                        endforeach;
                    } else {
                        echo('<p id="arrayVazio">Não há projetos cadastrados.</p>');
                    }
                ?>
            </div>
        </div>

    </main>

    <script>

        function editarUsuario(id) {

            if (confirm("Tem certeza de que deseja editar este projeto?")) {
                window.location.href = "editarProj.php?editIdProj=" + id;
            }

        }

    </script>

</body>
