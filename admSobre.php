<?php
    include("bd/connect.php");
    include("bd/sobre.php");

    $secoes = buscarSecoes($conn);

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
            <h1 id="containerTit">Lista de Seções - Sobre o Instituto</h1>

            <div class="containerLista">

                <?php
                    if(!empty($secoes)) {
                        foreach ($secoes as $secao):
                ?>

                <div class="listaLinha">

                    <div class="infos">
                        <p id="id">ID: <?= $secao['id'] ?> </p>

                        <p id="posicao">Posição: <?= $secao['ordem'] ?></p>

                        <p id="titulo">Título: <?= $secao['titulo01']; ?></p>
                    </div>
                        
                    <div class="crudBtns">
                        <button onclick="editarSecao(<?= $secao['id']; ?>)" class="crudBtn" id="editar">Editar Seção</button>
                        
                        <button onclick="confirmaExclusao(<?= $secao['id']; ?>)" class="crudBtn" id="apagar">Apagar Seção</button>
                    </div>
                </div>

                <?php 
                        endforeach;
                    } else {
                        echo('<p id="arrayVazio">Não há nada aqui ainda.</p>');
                    }
                ?>
            </div>
        </div>

    </main>

    <script>

        function editarSecao(id) {

            if (confirm("Tem certeza de que deseja editar esta seção?")) {
                window.location.href = "editarSecao.php?editIdSecao=" + id;
            }

        }

        function confirmaExclusao(id) {
            if(confirm("Tem certeza de que deseja apagar esta seção?")) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            console.log("Seção excluída com sucesso.");
                            location.reload();
                        } else {
                            console.error('Ocorreu um erro na solicitação.');
                        }
                    }
                };
                xhr.open('POST', 'bd/sobre.php?deleteIdSecao=' + id, true); // Envia como GET
                xhr.send();
            }
        }

    </script>

</body>
