<?php
    include("bd/connect.php");

    if (isset($_GET['editIdAgrad'])) {
        $id = $_GET['editIdAgrad'];
    
        $sql = "SELECT * FROM agradecimentos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
            $agradecimento = $result->fetch_assoc();
        } else {
            header("Location: admAgrad.php?alert=8");
            exit();
        }
    } else {
        header("Location: admAgrad.php?alert=9");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarAgrad.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->
    <?php
        include("sidebar.php");
    ?>
        
    <main>
        <div class="containerPaginaAdm">
            <h1 id="containerTit">Edição de Agradecimento</h1>
            <form class="form" method="post" action="bd/transp.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $agradecimento['id'] ?>">
                <div class="formInputs">
                    <div class="formCols">
                        <div class="formCol">
                            <div class="linAgradecimento">
                                <label for="agradecimento">Agradecimento: </label> <br>
                                <input type="text" name="agradecimento" id="agradecimento" value="<?= $agradecimento['agradecimento'] ?>"required>
                            </div>
                        </div>
                        <div class="formCol">
                            <label for="inserirImg">Escolha uma imagem:</label>
                            <input type="file" name="img" id="inserirImg">
                            <button type="button" id="btnImg">
                                <img src="imgs/icons/imgIcon.png" id="imgBtn">
                            </button>
                        </div>
                    </div>  
                    
                    <div class="btn">
                        <input type="submit" id="submitBtn" name="editarAgrad" value="Editar Agradecimento">
                    </div>
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
                        alert("Você não preencheu todos os campos");
                        break;
                    case '2':
                        alert("Tipo de arquivo não permitido. Apenas JPEG e PNG são permitidos.");
                        break;
                    case '3':
                        alert("Erro ao adicionar imagem.");
                        break;
                    case '4':
                    alert("Erro ao editar agradecimento.");
                    break;
                }
                window.history.replaceState(null, null, window.location.pathname); // Limpa a query string da URL
            }
        });
    </script>

</body>
</html>