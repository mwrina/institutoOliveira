<?php
    include("bd/connect.php");
    include ("bd/deps.php");

    $depoimentos = buscarDepoimentos($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admDep.css">
    <link rel="stylesheet" href="style/containerAdm.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php 
        include("sidebar.php")
    ?>
        
    <main>

    <div class="container">
            <h1 id="containerTit">Lista de Depoimentos Cadastrados</h1>

            <div class="containerLista">
                
                <?php
                    if(!empty($depoimentos)):
                        foreach ($depoimentos as $depoimento): 
                ?>

                <div class="listaLinha">
                    <span class="col1">
                        <div class="infos">
                            <p id="id">ID: <?= $depoimento['id_dep']; ?></p>

                            <p id="nome">Nome: <?= $depoimento['nome']; ?></p>

                            <p id="dataCricao">Data de crição: <?= $depoimento['dataCriacao']; ?></p>
                        </div>
                        
                        <div class="crudBtns">
                            <button onclick="editarDepoimento(<?= $depoimento['id_dep']; ?>)" class="crudBtn" id="editar">Editar Depoimento</button>
                            
                            <button onclick="confirmaExclusao(<?= $depoimento['id_dep']; ?>)" class="crudBtn" id="apagar">Apagar Depoimento</button>
                        </div>

                    </span>
                    <span class="col2">
                        <p id="exibirTxt">Exibir?</p>
                        <input 
                            type="checkbox" 
                            name="exibir" 
                            class="chkExibir"
                            id="chkExibir<?= $depoimento['id_dep']; ?>" 
                            onchange="alterarExibicao(<?= $depoimento['id_dep']; ?>, this.checked)"
                            <?= $depoimento['mostrarIndex'] == 1 ? 'checked' : '' ?>
                        ></input>
                    </span>
                </div>

                <?php 
                        endforeach;
                    else:
                ?>

                    <p>Não há depoimentos cadastrados ainda.</p>

                <?php endif; ?>

            </div>
        </div>

    </main>
    
    <script>

        function editarDepoimento(id) {
            if (confirm("Tem certeza de que deseja editar este depoimento?")) {
                window.location.href = "editarDep.php?editIdDep=" + id;
            }
        }

        function confirmaExclusao(id) {
            if (confirm("Tem certeza de que deseja apagar este depoimento?")) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            console.log("depoimento excluído com sucesso.");
                            location.reload();
                        } else {
                            console.error('Ocorreu um erro na solicitação.');
                        }
                    }
                };
                xhr.open('POST', 'bd/deps.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('deleteIdDep=' + id);
            }
        }

        function alterarExibicao(id, isChecked) {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    console.log('xhr.status:', xhr.status);
                    if (xhr.status == 200) {
                        console.log("Estado de exibição atualizado com sucesso.");
                        var checkbox = document.getElementById('chkExibir' + id);
                        checkbox.checked = isChecked;
                    } else {
                        console.error('Ocorreu um erro na solicitação: ' + xhr.responseText);
                        alert('Erro ao atualizar o estado de exibição: ' + xhr.responseText);
                        location.reload();
                    }
                }
            };

            xhr.open('POST', 'bd/deps.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('idDep=' + id + '&mostrarIndex=' + (isChecked ? '1' : '0'));
        }

        document.addEventListener('DOMContentLoaded', (event) => {
        const params = new URLSearchParams(window.location.search);
        if (params.has('alert')) {
            const alertValue = params.get('alert');
            switch (alertValue) {
                case '1':
                    alert("Você só pode ter 2 depoimentos exibidos na página inicial.");
                    break;
            }
            window.history.replaceState(null, null, window.location.pathname);
        }
    });

        
    </script>

</body>
</html>