<?php
    include("bd/connect.php");
    include("bd/contatos.php");

    $enderecos = buscarEnd($conn);
    $redessociais = buscarRedes($conn);
    $creditos = buscarCreditos($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admInfos.css">
    <link rel="stylesheet" href="style/containerAdm.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->
    <?php include("sidebar.php"); ?>
        
    <main>
        <div class="container">
            <h1 id="containerTit">Informações de Contato e Semelhantes</h1>
            <div class="containerLista">

                <div class="nomeSecao-container">
                    <h3 id="nomeSecao">Endereço:</h3>
                </div>

                <?php if (!empty($enderecos)) {
                    foreach ($enderecos as $endereco): ?>
                    <form class="formEndereco" action="bd/contatos.php" method="post">
                        <input type="hidden" name="id" value="<?= $endereco['id'] ?>">
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
                                <label for="estado" id="formEndLabel">Estado: </label>
                                <input type="text" id="formEndInput" name="estado" value="<?= $endereco['estado']; ?>">
                            </div>
                        </div>
                        <div class="btn-container">
                            <input type="submit" name="editarEndereco" class="editarBtn" id="editarEnd" value="Salvar">
                        </div>
                    </form>
                <?php endforeach; } else {
                    echo('<p id="arrayVazio">Não há endereços cadastrados.</p>');
                } ?>

                <div class="nomeSecao-container">
                    <h3 id="nomeSecao">Redes sociais:</h3>
                    <button class="add" id="addRede">+</button>
                </div>
                
                <?php if (!empty($redessociais)) {
                    foreach ($redessociais as $redesocial): ?>
                        <div class="listaLinha">
                            <div class="campos-container">
                                <p id="campo"><b id="nomeCampo">Rede social:</b> <?= $redesocial['nome'] ?></p>
                                <p id="campo"><b id="nomeCampo">Link:</b> <?= $redesocial['link'] ?></p>
                            </div>
                            <div class="crudBtns">
                                <button type="button" onclick="editarRede(<?= $redesocial['id']; ?>)" class="editarBtn" id="editarRede">Editar Rede</button>
                                <button type="button" onclick="deletarRede(<?= $redesocial['id']; ?>)" class="apagarBtn" id="apagarRede">Apagar Rede</button>
                            </div>
                        </div>
                <?php endforeach; } else {
                    echo('<p id="arrayVazio">Não há redes sociais cadastradas</p>');
                } ?>

                <div class="nomeSecao-container">
                    <h3 id="nomeSecao">Créditos:</h3>
                    <button class="add" id="addCred">+</button>
                </div>

                <?php if (!empty($creditos)) {
                    foreach ($creditos as $creditos): ?>
                        <div class="listaLinhaCred">
                            <div class="campos-container-creditos">
                                <p id="campo"><b id="nomeCampo">Nome:</b> <?= $creditos['nome'] ?></p>
                                <p id="campo"><b id="nomeCampo">Github:</b> <?= $creditos['github'] ?></p>
                                <p id="campo"><b id="nomeCampo">LinkedIn:</b> <?= $creditos['linkedin'] ?>
                            </div>
                            <div class="crudBtns">
                                <button type="button" onclick="editarCreditos(<?= $creditos['id']; ?>)" class="editarBtn" id="editarCreditos">Editar Crédito</button>
                                <button type="button" onclick="deletarCreditos(<?= $creditos['id']; ?>)" class="apagarBtn" id="apagarCreditos">Apagar Crédito</button>
                            </div>
                        </div>
                <?php endforeach; } else {
                    echo('<p id="arrayVazio">Não há créditos registrados</p>');
                } ?>
            </div>
        </div>
    </main>

</body>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        if (window.location.search.includes('alert=1')) {
            alert("Endereço atualizado com sucesso.");
            window.history.replaceState(null, null, window.location.pathname);
        }
    });

    document.querySelector("#addRede").addEventListener('click', function(){
        window.location.href = "criarRede.php";
    });

    function editarRede(id) {
        if (confirm("Tem certeza de que deseja editar esta rede social?")) {
            window.location.href = "editarRede.php?editIdRede=" + id;
        }
    }

    function deletarRede(id) {
        if (confirm("Tem certeza de que deseja apagar esta rede social?")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        console.log("Rede social excluída com sucesso.");
                        location.reload();
                    } else {
                        console.error('Ocorreu um erro na solicitação.');
                    }
                }
            };
            xhr.open('POST', 'bd/contatos.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('deleteIdRede=' + id);
        }
    }

    document.querySelector("#addCred").addEventListener('click', function(){
        window.location.href = "criarCreditos.php";
    });

    function editarCreditos(id) {
        if (confirm("Tem certeza de que deseja editar este registro?")) {
            window.location.href = "editarCreditos.php?editIdCred=" + id;
        }
    }

    function deletarCreditos(id) {
        if (confirm("Tem certeza de que deseja apagar este registro?")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        console.log("Crédito excluído com sucesso.");
                        location.reload();
                    } else {
                        console.error('Ocorreu um erro na solicitação.');
                    }
                }
            };
            xhr.open('POST', 'bd/contatos.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('deleteIdCredito=' + id);
        }
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const params = new URLSearchParams(window.location.search);
            if (params.has('alert')) {
                const alertValue = params.get('alert');
                switch (alertValue) {
                    case '2':
                        alert("Não foi possível encontrar o registro que deseja editar no banco de dados"); 
                        break;
                    case '3':
                        alert("Erro ao deletar registro");
                        break;
                }
                window.history.replaceState(null, null, window.location.pathname); // Limpa a query string da URL
            }
        });
</script>
</html>
