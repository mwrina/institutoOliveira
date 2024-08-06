<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarRelatorio.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->
    <?php include("sidebar.php"); ?>
        
    <main>
        <div class="containerPaginaAdm">
            <h1 id="containerTit">Criar novo relatório:</h1>
            <form class="form" method="post" action="bd/transp.php" enctype="multipart/form-data">
                <div class="formInputs">
                    <input type="file" name="transp" id="addTransp">
                    <div class="btnAddTranspContainer">
                        <label for="botaoAddTransp" id="label">Adicionar arquivo:</label>
                        <p id="sugestao">(Padrão p/ nomenclatura recomendado: AAAA-MM ou 2024-01)</p>
                        <button type="button" id="btnAddTransp">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#FFFFFF" id="fileIcon"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640H447l-80-80H160v480l96-320h684L837-217q-8 26-29.5 41.5T760-160H160Zm84-80h516l72-240H316l-72 240Zm0 0 72-240-72 240Zm-84-400v-80 80Z"/></svg>
                            <p id="txtBtnAddTransp">PDF</p>
                        </button>
                    </div>
                </div>  
                <div class="btn">
                    <input type="submit" id="submitBtn" name="criarRelatorio" value="Criar Relatório">
                </div>
            </form>
        </div>
    </main>

    <script>
        document.querySelector('#btnAddTransp').addEventListener('click', () => {
            document.getElementById('addTransp').click();
        })

        document.addEventListener('DOMContentLoaded', (event) => {
        const params = new URLSearchParams(window.location.search);
            if (params.has('alert')) {
                const alertValue = params.get('alert');
                switch (alertValue) {
                    case '1':
                        alert("Você não anexou nenhum arquivo. Tente novamente.");
                        break;
                    case '2':
                        alert("O tipo de arquivo que você selecionou não é suportado. Por favor, selecione um do tipo PDF.");
                        break;
                    case '3':
                        alert("Não foi possível adicionar o arquivo ao sistema.");
                        break;
                    case '4':
                        alert("Algo deu errado ao adicionar o arquivo no banco de dados.");
                }
                window.history.replaceState(null, null, window.location.pathname); // Limpa a query string da URL
            }
        });
    </script>
</body>
</html>
