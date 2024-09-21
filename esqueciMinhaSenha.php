<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/esqueciMinhaSenha.css">
        <link rel="stylesheet" href="style/headerFooter.css">
        <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
        <title>Instituto Oliveira</title>
    </head>
    <body>
        
        <!-- PADRÃO HEADER -->
        <?php
            include("navbar.php");
        ?>

        <main>
            <div class="esqueciContainer">

                <form class="form" method="post" action="bd/recuperarSenha.php">
                    <h1 id="tit">Esqueci minha senha</h1>

                    <div class="lin">
                        <label for="email" id="nomeCampo">E-mail</label>
                        <input type="email" class="campo" id="email" name="email" required>
                    </div>

                    <div class="btn">
                        <input type="submit" id="loginBtn" value="ENVIAR">
                    </div>
                </form>
            </div>
        </main>
        
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
            const params = new URLSearchParams(window.location.search);
            if (params.has('alert')) {
                const alertValue = params.get('alert');
                switch (alertValue) {
                    case '1':
                        alert("Endereço de e-mail não cadastrado.");
                        break;
                    case '2':
                        alert("E-mail de recuperação enviado com sucesso.");
                        break;
                    case '3':
                        alert("Erro ao enviar o e-mail de recuperação.");
                        break;
                }
                window.history.replaceState(null, null, window.location.pathname); // Limpa a query string da URL
            }
        });
        </script>

    </body>
    
</html>