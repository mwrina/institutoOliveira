<?php
include("bd/deps.php");

if (isset($_GET['editIdDep'])) {
    $id = intval($_GET['editIdDep']);

    $depoimento = buscarDepPorId($conn, $id);

    if (!$depoimento) {
        header("Location: admDep.php");
        exit();
    }
} else {
    header("Location: admDep.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarDep.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->
    <?php include("sidebar.php"); ?>
        
    <main>
        <div class="containerPaginaAdm">
            <h1 id="containerTit">Registrar novo depoimento:</h1>
            
            <form class="form" method="post" action="bd/deps.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $depoimento['id_dep'] ?>">
                <div class="formInputs">
                    
                    <div class="cols">
                        <div class="col1">
                            <div class="lin">
                                <label for="nome">Nome: </label>
                                <input type="text" name="nome" class="input" value="<?= $depoimento['nome'] ?>">
                            </div>
                            <div class="lin">
                                <label for="ocupacao">Ocupação: </label>
                                <input type="text" name="ocupacao" class="input" value="<?= $depoimento['ocupacao'] ?>">
                            </div>
                            <div class="linDep">
                                <label for="depoimento">Depoimento: </label>
                                <textarea name="depoimento" id="depoimento"><?= $depoimento['depoimento'] ?></textarea>
                            </div>
                        </div>

                        <div class="col2">
                            <label for="inserirImg">Escolha uma imagem:</label>
                            <input type="file" name="img" id="inserirImg">
                            <button type="button" id="btnImg">
                                <img src="<?= !empty($depoimento['img']) ? $depoimento['img'] : "imgs/icons/imgIcon.png" ?>" id="imgBtn">
                            </button>
                        </div>
                    </div>

                    <div class="btn">
                        <input type="submit" id="submitBtn" name="editarDep" value="Editar depoimento">
                    </div>

                </div>
            </form>
        </div>
    </main>
</body>

<script>
    document.getElementById('btnImg').addEventListener('click', function() {
        document.getElementById('inserirImg').click();
    });

    document.addEventListener('DOMContentLoaded', (event) => {
        const params = new URLSearchParams(window.location.search);
        if (params.has('alert')) {
            const alertValue = params.get('alert');
            switch (alertValue) {
                case '1':
                    alert("Erro ao buscar id do registro.");
                    break;
                case '2':
                    alert("Tipo de imagem adicionada não é suportada. Somente arquivos .png e .jpeg são aceitos.");
                    break;
                case '3':
                    alert("Erro ao adicionar nova imagem.");
                    break;
                case '4':
                    alert("Erro ao atualizar depoimento.")
            }
            window.history.replaceState(null, null, window.location.pathname);
        }
    });
</script>

</html>
