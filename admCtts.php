
<?php
    include("bd/connect.php");
    include("bd/contatos.php");

    $enderecos = buscarEnd($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admCtts.css">
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
                    if(!empty($enderecos)) {
                        foreach ($enderecos as $endereco):
                ?>

                <div class="listaLinha">
                        <p id="endereco"><b id="nomeCampo">Endereço</b>: <?= $endereco['endereco']; ?> - <?= $endereco['cidade']; ?> - <?= $endereco['estado']; ?> - CEP <?= $endereco['cep']; ?></p>

                        <div class="crudBtns">
                            <button onclick="editarEndereco(<?= $endereco['id']; ?>)" class="crudBtn" id="editar">Editar Projeto</button>                            
                        </div>
                </div>

                <?php 
                        endforeach;
                    } else {
                        echo('<p id="arrayVazio">Não há endereços cadastrados.</p>');
                    }
                ?>

                

            </div>
        </div>

    </main>

    <script>

        function editarProjeto(id) {

            if (confirm("Tem certeza de que deseja editar este projeto?")) {
                window.location.href = "editarProj.php?editIdProj=" + id;
            }

        }

        function confirmaExclusao(idProj) {
                    
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
                xhr.open('POST', 'bd/proj.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('deleteIdProj=' + idProj);
            }
        }

    </script>

</body>
