<?php
include("bd/contatos.php");

if (!isset($_SESSION['endereco'])) {
    buscarEnd($conn);
}

if(!isset($_SESSION['redessociais'])){
    buscarRedes($conn);
}


?>

<div class="preFooter">
    <img id="logoPreFooter" src="imgs/icons/logoCompletaBranca.png">
    <div class="VenhaFazerSuaParte">
        <h1 id="preFooterTxt">Venha </h1>
        <h1 id="preFooterTxtDestacado">participar</h1>
    </div>
    <p>Acreditamos na transformação e evolução das pessoas, porque as elas não são
        definidas pela enfermidade ou pelas dificuldades que estão enfrentando. O nosso olhar
        não é somente para o câncer, mas para a cura da família como um todo. Vemos valor e
        importância nas pessoas. Cremos que uma família “saudável e feliz” pode motivar e
        impulsionar outras famílias a serem saudáveis e felizes.            
        <br><br>
        Seja um azeite, faça uma doação ou se voluntarie conosco.
    </p>
</div>

<footer>

    <img id="footerLogo" src="imgs/icons/logoBranca.png">
    <br>
    <img id="footerLogoTxt" src="imgs/icons/logoTxtBranca.png">

    <div class="footerSecoes">

        <div class="footerDiv">

            <h1 id="footerTit">Redes sociais</h1>

            <?php
                foreach($_SESSION['redessociais'] as $redessocial): 
            ?>

            <div class="redesSociaisLin">
                <img id="redesSociaisIcon" src="<?= $redessocial['icon'] ?>">
                <a id="redesSociaisLink" href="<?= $redessocial['link'] ?>"><?= $redessocial['nome'] ?></a>
            </div>

            <?php
                endforeach;
            ?>
        
        </div>
        
        <div class="footerDiv">

            <h1 id="footerTit">Endereço</h1>

            <p id="endereco"><?php echo isset($_SESSION['endereco']) ? $_SESSION['endereco'] : ''; ?><br>
                <?php echo isset($_SESSION['cidade']) ? $_SESSION['cidade'] : ''; ?> - <?php echo isset($_SESSION['estado']) ? $_SESSION['estado'] : ''; ?> <br>
                CEP: <?php echo isset($_SESSION['cep']) ? $_SESSION['cep'] : ''; ?></p>

        </div>

        <div class="footerDivLinks">
            <a id="link" href="index.php">Menu</a> <br>
            <a id="link" href="sobreOInstituto.php">Sobre o instituto</a> <br>
            <a id="link" href="projetos.php">Projetos</a> <br>
            <a id="link" href="blog.php">Blog do instituto</a> <br>
            <a id="link" href="editais.php">Editais</a> <br>
            <a id="link" href="transparencia.php">Transparência</a> <br>
            <a id="link" href="login.php">Página do Administrador</a>
        </div>

        <div class="footerDiv">
            <h1 id="footerTit">Faça sua parte</h1>
            <a id="link" href="https://api.whatsapp.com/send?1=pt_BR&phone=554799605023">Quero ajudar</a> <br>
            <a id="link" href="https://api.whatsapp.com/send?1=pt_BR&phone=554799605023">Clique aqui e seja um voluntário</a>
        </div>

    </div>

    <div class="copyright">
        <p>2024 © Instituto Oliveira - Todos os direitos reservados</p>
        <p>Termos de uso</p>
        <p>Política de privacidade</p>
    </div>

</footer>