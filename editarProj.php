<?php
    include("bd/connect.php");

    if (isset($_GET['editIdProj'])) {
        $id = $_GET['editIdProj'];
    
        $sql = "SELECT nome, breveDesc, secao01, secao02 FROM projetos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
            $projeto = $result->fetch_assoc();
        } else {
            header("Location: admProj.php");
            exit();
        }
    } else {
        header("Location: admProj.php");
        exit();
    }
    
?>
    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/editarProj.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php 
        include("sidebar.php")
    ?>
        
    <main>

        <div class="containerPaginaAdm">

            <h1 id="containerTit">Edição de Projetos</h1>

            <form class="form" method="post" action="bd/proj.php" enctype="multipart/form-data">

                <input type="hidden" name="editIdProj" value="<?= htmlspecialchars($id) ?>">

                <div class="formInputs">

                    <div class="formCols">

                        <div class="formCol">
                            <div class="linNome">
                                <label for="nome">Nome do projeto: </label> <br>

                                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($projeto['nome']); ?>">
                            </div>

                            <div class="linBDesc">
                                <label for="breveDesc">Descrição breve do projeto:</label> <br>

                                <textarea name="breveDesc" id="breveDesc"><?= htmlspecialchars(str_replace('<br>', "\n", $projeto['breveDesc'])); ?></textarea>
                            </div>
                        </div>

                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem:</label>

                            <input type="file" name="img01" id="inserirImg01">
                            <button type="button" id="btnImg01">
                                <img src="<?= !empty($projeto['img01']) ? $projeto['img01'] : "imgs/icons/imgIcon.png" ?>" id="imgBtn">
                            </button>
                        </div>

                    </div>  

                    <div class="lin">
                        <label for="secao">Texto para a primeira seção do projeto:</label> <br>

                        <textarea name="secao01" id="secao01" placeholder="Digite aqui a descrição do projeto"><?= htmlspecialchars(str_replace('<br>', "\n", $projeto['secao01'])); ?></textarea>
                    </div>

                    <div class="formCols2">
                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem (opcional):</label>

                            <input type="file" name="img02" id="inserirImg02">
                            <button type="button" id="btnImg02">
                            <img src="<?= !empty($projeto['img02']) ? $projeto['img02'] : "imgs/icons/imgIcon.png" ?>" id="imgBtn">
                            </button>
                        </div>

                        <div class="formCol">
                            <label for="secao02">Texto para a segunda seção do projeto (opcional):</label> <br>

                            <textarea name="secao02" id="secao02"><?= htmlspecialchars(str_replace('<br>', "\n", $projeto['secao02'])); ?></textarea>
                        </div>
                    </div>

                    <div class="btn">
                        <input type="submit" id="submitBtn" name="editarProjeto" value="Editar projeto">
                    </div>
                </div>  
            </form>

        </div>

    </main>

    <script>
        document.getElementById('btnImg01').addEventListener('click', function() {
            document.getElementById('inserirImg01').click();
        });
        
        document.getElementById('btnImg02').addEventListener('click', function() {
            document.getElementById('inserirImg02').click();
        });
    </script>

</body>
</html>