<?php
    include("bd/transp.php");

    $relatorios = getTransp($conn);
    $agradecimentos = getAgrads($conn);
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

                <?php
                    if(!empty($agradecimentos)) {
                        foreach($agradecimentos as $agradecimento):
                ?>

                <div class="listaLinha">
                    <p id="nome"><b>Agradecimento:</b> <?= $agradecimento['agradecimento'] ?></p>
                    
                    <div class="crudBtns">
                        <button onclick="editarAgrad(<?= $agradecimento['id']; ?>)" class="crudBtn" id="editar">Editar Agradecimento</button>
                        
                        <button onclick="deletarAgrad(<?= $agradecimento['id']; ?>)" class="crudBtn" id="apagar">Apagar Agradecimento</button>
                    </div>
                </div>

                <?php
                        endforeach;
                    } else {
                        echo ("<p>Nada aqui ainda!</p>");
                    }
                ?>

                
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
                case '5':
                    alert("Erro ao deletar imagem.");
                    break;
                case '6':
                    alert("A imagem não existe nos arquivos do sistema.");
                    break;
                case '7':
                    alert("Imagem não encontrada para o ID fornecido.");
                    break;
                case '8':
                    alert("Registro não encontrado no banco de dados.");
                    break;
                case '9':
                    alert("Não foi possível pegar o ID do registro.");
                    break;
            }
            window.history.replaceState(null, null, window.location.pathname);
        }
    });

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

    function editarAgrad(id) {
        if (confirm("Tem certeza de que deseja editar este agradecimento?")) {
                window.location.href = "editarAgrad.php?editIdAgrad=" + id;
            }
    }

    function deletarAgrad(id) {
        if (confirm("Tem certeza de que deseja apagar este agradecimento?")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        console.log("Agradecimento excluído com sucesso.");
                        location.reload();
                    } else {
                        console.error('Ocorreu um erro na solicitação.');
                    }
                }
            };
            xhr.open('POST', 'bd/transp.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('deleteIdAgrad=' + id);
        }
    }
</script>
</html>
