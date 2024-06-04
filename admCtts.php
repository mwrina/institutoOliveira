
<?php
    include("bd/connect.php");
    include("bd/contatos.php");

    $enderecos = buscarEnd($conn);
    $redessociais = buscarRedes($conn);

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

                <div class="nomeCriar-container">
                    <h3 id="nomeSecao">Endereço:</h3>
                </div>

                <?php
                    if(!empty($enderecos)) {
                        foreach ($enderecos as $endereco):
                ?>
                
                    <form class="formEndereco" action="bd/contatos.php" method="post">
                        <input type="hidden" value="<?= $endereco['id'] ?>">

                        <div class="formEndLin">

                            <div class="formEndCampo">
                                <label for="endereco" id="formEndLabel">Endereço: </label>
                                <input type="text" id="formEndInput" name="endereco" value="<?= $endereco['endereco']; ?>">
                            </div>
                            
                            <div class="formEndCampo">
                                <label for="cep" id="formEndLabel">CEP: </label>
                                <input type="text" id="formEndInput" name="cep" value="<?= $endereco['cep']; ?>">
                            </div>
                            
                        </div>
                        
                        <div class="formEndLin">

                            <div class="formEndCampo">
                                <label for="cidade" id="formEndLabel">Cidade: </label>
                                <input type="text" id="formEndInput" name="cidade" value="<?= $endereco['cidade']; ?>">
                            </div>

                            <div class="formEndCampo">
                                <label for="endereco" id="formEndLabel">Estado: </label>
                                <input type="text" id="formEndInput" name="endereco" value="<?= $endereco['estado']; ?>">
                            </div>

                        </div>
                        
                        <div class="btn-container">
                            <input type="submit" class="editarBtn" id="editarEnd">                            
                        </div>
                    </form>

                <?php 
                        endforeach;
                    } else {
                        echo('<p id="arrayVazio">Não há endereços cadastrados.</p>');
                    }
                ?>
                
                <div class="nomeCriar-container">
                    <h3 id="nomeSecao">Redes sociais:</h3>
                    <button class="add" id="addRede">+</button>
                </div>
                
                    <?php if(!empty($redessociais)) {
                        foreach ($redessociais as $redesocial):
                    ?>

                        <div class="listaLinha">
                            <div class="campos-container">
                                <p id="campo"><b id="nomeCampo">Rede social:</b> <?= $redesocial['nome'] ?></p>
                                <p id="campo"><b id="nomeCampo">Link:</b> <?= $redesocial['link'] ?></p>
                            </div>
                            <div class="crudBtns">
                                <button onclick="editarRede(<?= $redesocial['id']; ?>)" class="editarBtn" id="editarRede">Editar Rede</button>                            
                                <button onclick="DeletarRede(<?= $redesocial['id']; ?>" class="apagarBtn" id="apagarRede">Apagar Rede</button>
                            </div>
                        </div>

                    <?php
                            endforeach;
                        } else {
                            echo('<p id="arrayVazio">Não há redes sociais cadastradas</p>');
                        }
                    ?>


            </div>
        </div>

    </main>

    <script>

        function editarEndereco(id) {

            if (confirm("Tem certeza de que deseja editar seu endereço?")) {
                window.location.href = "editarEnd.php?editIdProj=" + id;
            }

        }

        document.querySelector("#addRede").addEventListener('click', function(){
            window.location.href = "criarRede.php";
        })

        function editarRede(id) {

            if (confirm("Tem certeza de que deseja editar esta rede social?")) {
                window.location.href = "editarEnd.php?editIdProj=" + id;
            }

        }

        function excluirRede(idProj) {
                    
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
