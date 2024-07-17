<?php
include("bd/sobre.php");

$qtdSecoes = contarSecoes($conn);

if (isset($_GET['editIdSecao'])) {
    $id = intval($_GET['editIdSecao']);

    $secao = buscarSecaoPorId($conn, $id);

    if (!$secao) {
        header("Location: admSobre.php");
        exit();
    }
} else {
    header("Location: admSobre.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarSobre.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>
    <?php include("sidebar.php"); ?>
    <main>
        <div class="containerPaginaAdm">
            <h1 id="containerTit">Cadastro de Seções</h1>
            <form class="form" method="post" action="bd/sobre.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $secao['id'] ?>">
                <div class="formInputs">
                    <div class="tipoOrdem">
                        <div class="colTipoOrdem">
                            <label for="tipo">Tipo de Seção *: </label>
                            <select name="tipo" id="select" required>
                                <option value="<?= $secao['idTipo'] ?>"><?= $secao['tipoSecao'] ?></option>
                                <option value="1">01. Texto à esquerda, imagem à direita. Até 2 partes.</option>
                                <option value="2">02. Texto à direita, imagem à esquerda. Até 2 partes.</option>
                                <option value="3">03. Sem imagem, pouca decoração. Somente uma parte.</option>
                                <option value="4">04. Sem imagem, texto relativamente decorado.</option>
                                <option value="5">05. Seção para a página inicial.</option>
                            </select>
                        </div>
                        <div class="colTipoOrdem">
                            <label for="ordem">Posição da Seção *:</label>
                            <select name="ordem" id="select" required>
                                <?php if ($qtdSecoes == 0): ?>
                                    <option value="<?= $secao['ordem'] ?>"><?= $secao['ordem'] ?></option>
                                    <option value="1">1</option>
                                <?php else: ?>
                                    <?php for ($i = 1; $i <= $qtdSecoes; $i++): ?>
                                        <option value="<?= $i ?>" <?= ($secao['ordem'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="txt01Img">
                        <div class="cols">
                            <div class="col">
                                <div class="linTit">
                                    <label for="titulo01">Titulo da primeira seção *: </label>
                                    <input type="text" id="titulo01" name="titulo01" value="<?= $secao['titulo01'] ?>" required>
                                </div>
                                <div class="linTxt">
                                    <label for="texto01">Texto da primeira seção *: </label>
                                    <textarea id="texto01" name="texto01" required><?= str_replace(["<br>", "<br/>", "<br />"], "\n", htmlspecialchars_decode($secao['texto01'])); ?></textarea>                                </div>
                            </div>
                            <div class="col">
                                <label for="inserirImg">Escolha uma imagem:</label>
                                <input type="file" name="img" id="inserirImg">
                                <button type="button" id="btnImg">
                                <img src="<?= !empty($secao['img']) ? $secao['img'] : "imgs/icons/imgIcon.png" ?>" id="imgBtn">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="lins">
                        <div class="linTit02">
                            <label for="titulo02">Titulo da segunda seção (opcional): </label>
                            <input type="text" id="titulo02" name="titulo02" value="<?= $secao['titulo02'] ?>">
                        </div>
                        <div class="linTxt02">
                            <label for="texto02">Texto da segunda seção (opcional): </label>
                            <textarea id="texto02" name="texto02"><?= str_replace(["<br>", "<br/>", "<br />"], "\n", htmlspecialchars_decode($secao['texto02'])); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="btnContainer">
                    <input type="submit" id="submitBtn" name="editarSecao" value="Editar Seção">
                </div>
            </form>
        </div>
    </main>
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
                        alert("Você não selecionou o tipo da seção.");
                        break;
                    case '2':
                        alert("Você não selecionou a posição da seção.");
                        break;
                    case '3':
                        alert("Já existe outra seção nesta posição. Por favor verifique qual é, ajuste-a e tente novamente. Outra opção é criar esta seção em outra posição e reordená-las depois.");
                        break;
                    case '4':
                        alert("Um ou mais dos campos obrigatórios está vazio.");
                        break;
                    case '5':
                        alert("Erro ao incluir registro no banco de dados");
                        break;
                    case '6':
                        alert("Falha ao fazer upload da imagem.");
                        break;
                    case '7':
                        alert("Falha ao obter o ID da seção.");
                        break;
                }
                window.history.replaceState(null, null, window.location.pathname); // Limpa a query string da URL
            }
        });
    </script>
</body>
</html>
