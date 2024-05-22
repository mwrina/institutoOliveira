<aside class="sidebar-container">

        <div class="sidebarLogo">
            <img src="imgs/icons/logo.png" id="logo">
            <img src="imgs/icons/logoTxtVerde.png" id="logoTxt">
        </div>
        
        <div class="sidebarContent">

            <button class="collapsible">
                Usuários cadastrados
            </button>
            <div class="content">
                <a href="admUsu.php">Usuários existentes</a> <br>
                <a href="criarUsu.php">Criar novo usuário</a>
            </div>

            <button class="collapsible">
                Alterar projetos
            </button>
            <div class="content">
                <a href="admProj.php">Projetos existentes</a> <br>
                <a href="criarProj.php">Criar projeto</a>
            </div>
            
            <button class="collapsible">
                Alterar contato
            </button>
            <div class="content">
                <a href="admContato.php">Contatos existentes</a> <br>
                <a href="criarContato.php">Criar novo contato</a>
            </div>
            
            <button class="collapsible">
                Blog
            </button>
            <div class="content">
                <a href="admBlog.html">Postagens existentes</a>
                <a href="criarBlog.html">Criar nova postagem</a>
            </div>
            <a href="alterarNums.php"><button class="collapsible">
                Alterar números do Instituto
            </button></a>
            <div class="content">
                <a href="admBlog.html">Postagens existentes</a>
                <a href="criarBlog.html">Criar nova postagem</a>
            </div>

        </div>

        <div class="logout-container">
            <button id="logout" onclick="logout()">Voltar ao site</button>
        </div>

        <div class="usuLogado">
            <img src="imgs/icons/usuLogadoIcon.png" id="usuLogadoIcon">
            <p id="usuLogadoTxt">Usuário logado:
            <?php 
                session_start();
                if(isset($_SESSION['nome'])) {
                    echo $_SESSION['nome'];
                } else {
                    echo "Usuário não logado, algo deu errado";
                }
            ?></p>
        </div>
    </aside>

?>

<html>
    <script src="js/sidebar.js"></script>
    <script src="js/logout.js"></script>
</html>
