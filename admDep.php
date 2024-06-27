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
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
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
                            <button onclick="editarDepoimento(<?= $depoimento['id_dep']; ?>)" class="crudBtn" id="editar">Editar Usuário</button>
                            
                            <button onclick="confirmaExclusao(<?= $depoimento['id_dep']; ?>)" class="crudBtn" id="apagar">Apagar Usuário</button>
                        </div>

                    </span>
                    <span class="col2">
                        <p id="exibirTxt">Exibir?</p>
                        <input type="checkbox" name="exibir" id="chkExibir<?= $depoimento['id']; ?>" onchange="alterarExibicao(<?= $depoimento['id_dep']; ?>, this.checked)"></input>
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
            if (confirm("Tem certeza de que deseja editar este usuário?")) {
                window.location.href = "editarDep.php?editIdUsu=" + id;
            }
        }

        function confirmaExclusao(id) {
            if (confirm("Tem certeza de que deseja apagar este usuário?")) {

                if(<?php echo $qtdUsu; ?> > 1) {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            if (xhr.status == 200) {
                                console.log("Usuário excluído com sucesso.");
                                location.reload();
                            } else {
                                console.error('Ocorreu um erro na solicitação.');
                            }
                        }
                    };
                    xhr.open('POST', 'bd/usu.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send('deleteIdUsu=' + id);
                } else {
                    // Mostra um alerta específico se houver apenas um usuário cadastrado
                    alert("Impossível realizar exclusão. Só há um usuário cadastrado, se ele for eliminado não será possível fazer login no sistema posteriormente.");
                }
            }
        }

        function alterarExibicao(id, isChecked) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        console.log("Estado de exibição atualizado com sucesso.");
                    } else {
                        console.error('Ocorreu um erro na solicitação.');
                    }
                }
            };

            xhr.open('POST', 'bd/deps.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('idDep=' + id + '&mostrarIndex=' + (isChecked ? 's' : 'n'));
        }

        
    </script>

</body>
