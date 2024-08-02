<header class="navbar">
        <button id="btnLogoNavbar" onclick="redirectIndex()">
            <img id="logoNavbar" src="imgs/icons/logoCompleta.png">
        </button>
        <div class = "nav">
            <a class="navBarItems" href="index.php">Menu</a>
            <a class="navBarItems" href="sobreOInstituto.php">Sobre o instituto</a>
            <a class="navBarItems" href="projetos.php">Projetos</a>
            <a class="navBarItems" href="blog.php">Blog</a>
            <a class="navBarItems" href="editais.php">Editais</a>
            <a class="navBarItems" href="transparencia.php">Transparência</a>
            <button id="queroAjudar" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
        </div>
</header>

<script>
    function redirectWhatsapp() {
        window.location.href = "https://api.whatsapp.com/send?1=pt_BR&phone=554799605023";
    }

    function redirectIndex() {
        window.location.href = "index.php";
    }
</script>
