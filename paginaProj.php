<?php
    include("bd/connect.php");
    include("bd/proj.php");

    // Inicia o buffer de saída
    ob_start();

    if (isset($_GET['projetoId'])) {
        $idProj = intval($_GET['projetoId']);


        $sql = "SELECT nome, breveDesc, secao01, secao02, img01, img02 FROM projetos WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            echo "Erro ao preparar a consulta: " . mysqli_error($conn) . "<br>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $idProj);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $projeto = mysqli_fetch_assoc($result);
            } else {
                ob_end_flush();
                header("Location: projetos.php");
                exit();
            }
        } else {
            echo "Erro ao buscar o projeto: " . mysqli_error($conn) . "<br>";
        }

        mysqli_stmt_close($stmt);
    } else {
        ob_end_flush();
        header("Location: projetos.php");
        exit();
    }

    // Envia os dados do buffer de saída
    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/paginaProj.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Projetos - Instituto Oliveira</title>
</head>

<body>

    <?php
        include("navbar.php");
    ?>

    <!-- PADRÃO TOPO DA PÁGINA -->

    <div class="top">
        
        <div class="topEsq">
            <h1 id="topTit">Projetos</h1>
            <h1 id="topTitDestacado">Oliveira</h1>
            <p id="topSlogan">Seja um azeite. Faça sua doação.</p>

            <button id="qroAjudarBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
        </div>

        <div class="topDir">
            <img id="topQuadradosDir" src="imgs/quadradosDir.png">
        </div>

    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="imgs/icons/logo.png">
        <p>O <b>Instituto Oliveira</b> é um empreendimento social sem fins lucrativos, que <br>
        <b>apoia famílias</b> com histórico de <b>câncer infantojuvenil</b></p>
    </div>

<!-- Página -->

    <main>

        <div class="titContainer">
            <div class="tit">
                <h1 id="projTit"><?= $projeto['nome'] ?></h1>
                <h5 id="descProj"><?= $projeto['breveDesc'] ?></h5>
            </div>
        </div>

        <div class="imgTxt">

            <div class="imgProj">
                <img id="imgProj" src="<?= $projeto['img01'] ?>">
            </div>

            <div class="txt">
                <p id="txt"><?= $projeto['secao01'] ?></p>
            </div>

        </div>

        <?php if (!empty($projeto['secao02']) || !empty($projeto['img02'])): ?>
            <div class="imgTxt">
                <?php if (!empty($projeto['secao02'])): ?>
                    <div class="txt">
                        <p id="txt"><?= $projeto['secao02'] ?></p>
                    </div>
                <?php endif; ?>
                <?php if (!empty($projeto['img02'])): ?>
                    <div class="imgProj">
                        <img id="imgProj" src="<?= htmlspecialchars($projeto['img02']) ?>">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </main>

    <?php
        include('footer.php');
    ?>
