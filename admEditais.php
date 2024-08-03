
<?php

    include("bd/editais.php");
    $editais = getEditais($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admEditais.css">
    <link rel="stylesheet" href="style/containerAdm.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

    <div class="container">
            <h1 id="containerTit">Lista de Editais Cadastrados</h1>

            <div class="containerLista">

                <?php
                    if(!empty($editais)) {
                        foreach($editais as $edital):
                ?>

                <div class="listaLinha">

                    <div class="infos">
                        <p id="id">ID: <?= $edital['id'] ?></p>
                        <p id="nome">Nome: <?= $edital['edital'] ?> </p>
                    </div>
                        
                    <div class="crudBtns">                        
                        <button onclick="confirmaExclusao(<?= $edital['id'] ?>)" class="crudBtn" id="apagar">Apagar Seção</button>
                    </div>
                </div>

                <?php endforeach; ?>
                <?php
                    } else {
                        echo("<p>Você ainda não cadastrou editais.</p>");
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
            }
            window.history.replaceState(null, null, window.location.pathname);
        }
    });

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
            xhr.open('POST', 'bd/editais.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('deleteIdEdital=' + id);
        }
    }
</script>
</html>
