<?php
    include("bd/transp.php");

    $relatorios = getTransp($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admTransp.css">
    <link rel="stylesheet" href="style/containerAdm.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->
    <?php include("sidebar.php"); ?>
        
    <main>
        <div class="container">
            <h1 id="containerTit">Lista de Relatórios Mensais Cadastrados</h1>
            <div class="containerLista">

                <div class="nomeSecao-container">
                    <h3 id="nomeSecao">Relatórios Mensais/Anuais:</h3>
                </div>

                <?php 
                    if(!empty($relatorios)) {
                        foreach($relatorios as $relatorio): ?>

                <div class="listaLinha">
                    <p id="nome">Nome do Arquivo: <?= $relatorio['relatorio'] ?></p>
                    
                    <div class="crudBtns">
                        <button onclick="deletarRelatorio(<?= $relatorio['id']; ?>)" class="crudBtn" id="apagarRelatorio">Apagar Relatório</button>
                    </div>
                </div>

                <?php   endforeach;
                    } else {
                        echo ("<p>Nada aqui ainda!</p>");
                    }
                ?>

                <div class="nomeSecao-container">
                    <h3 id="nomeSecao">Agradecimentos</h3>
                </div>

                <div class="listaLinha">
                    <p id="nome">Prévia do texto: </p>
                    
                    <div class="crudBtns">
                        <button onclick="editarProjeto(<?= $projeto['id']; ?>)" class="crudBtn" id="editar">Editar Agradecimento</button>
                        
                        <button onclick="confirmaExclusao(<?= $projeto['id']; ?>)" class="crudBtn" id="apagar">Apagar Agradecimento</button>
                    </div>
                </div>

                
            </div>
        </div>
    </main>

</body>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    const params = new URLSearchParams(window.location.search);
        if (params.has('alert')) {
            const alertValue = params.get('alert');
            switch (alertValue) {
                case '1':
                    alert("Erro ao deletar a arquivo");
                    break;
                case '2':
                    alert("O arquivo não existe.");
                    break;
                case '3':
                    alert("Arquivo não encontrado para o ID fornecido.");
                    break;
                case '4':
                    alert("Erro ao deletar o registro do banco de dados");
                    break;
            }
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

    function deletarRelatorio(id) {
        if (confirm("Tem certeza de que deseja apagar este relatório?")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        console.log("Relatório excluído com sucesso.");
                        location.reload();
                    } else {
                        console.error('Ocorreu um erro na solicitação.');
                    }
                }
            };
            xhr.open('POST', 'bd/transp.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('deleteIdRelatorio=' + id);
        }
    }
</script>
</html>
