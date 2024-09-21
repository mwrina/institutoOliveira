<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <header class="navbar">
            <button id="btnLogoNavbar" onclick="redirectIndex()">
                <img id="logoDesktop" src="imgs/icons/logoCompleta.png">
                <img id="logoMobile" src="imgs/icons/logo.png">
            </button>
            <div class = "nav">
                <button id="abrirNav"><span class="material-symbols-outlined">menu</span></button>
                
                <div class="navBarItems">
                    <a class="navBarItem" href="index.php">Menu</a>
                    <a class="navBarItem" href="sobreOInstituto.php">Sobre o instituto</a>
                    <a class="navBarItem" href="projetos.php">Projetos</a>
                    <a class="navBarItem" href="blog.php">Blog</a>
                    <a class="navBarItem" href="editais.php">Editais</a>
                    <a class="navBarItem" href="transparencia.php">Transparência</a>
                    <button id="queroAjudar" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
                </div>
                
            </div>
    </header>
</body>
</html>

<script src="js/navbar.js"></script>
<script>

    function redirectWhatsapp() {
        window.location.href = "https://api.whatsapp.com/send?1=pt_BR&phone=554799605023";
    }

    function redirectIndex() {
        window.location.href = "index.php";
    }
</script>