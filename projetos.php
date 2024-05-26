<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/projetos.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Projetos - Instituto Oliveira</title>
</head>

<body>

    <!-- PADRÃO HEADER -->

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

        <div class="topCentro">
            <img id="topLogoBranca" src="imgs/icons/logoBranca.png">
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

<!--=================================================================================================================================-->


    <!-- PÁGINA -->
    <div class="projetosDivTxtImg">

        <!-- VOLUNTÁRIOS -->
        <div class="voluntariosDivTxtImg">

            <img src="imgs/projetoVoluntarios.png" id="imgVoluntarios">
            
            <div class="txt">

                <div class="tit">
                    <h1 id="voluntariosTit">Voluntários</h1>
                </div>

                <p id="txt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. 
                    Quisque nulla tortor, consectetur a urna a, congue cursus enim.
                </p>
                
                <div class="saibaMais">
                    <button id="saibaMaisBtn" onclick="redirectSaibaVoluntarios()">Saiba Mais <img src="imgs/icons/iconShare.png"></button>
                </div>

            </div>
        </div>
        
        <!-- EVENTOS -->
        <div class="eventosDivTxtImg">

            <img src="imgs/projetoEventos.png" id="imgEventos">
            
            <div class="txt">

                <div class="tit">
                    <h1 id="voluntariosTit">Eventos</h1>
                </div>

                <p id="txt"> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. 
                    Quisque nulla tortor, consectetur a urna a, congue cursus enim.
                </p>
                
                <div class="saibaMais">
                    <button id="saibaMaisBtn" onclick="redirectSaibaEventos()">Saiba Mais <img src="imgs/icons/iconShare.png"></button>
                </div>

            </div>
        </div>

        <!-- ATENDIMENTO MÉDICO -->
        <div class="atendimentoMedicoDivTxtImg">

            <img src="imgs/projetoAtendimentoMedico.png" id="imgAtendimentoMedico">

            <div class="txt">

                    <div class="tit">
                        <h1 id="voluntariosTit">Atendimento Médico</h1>
                    </div>

                    <p id="txt"> 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. 
                        Quisque nulla tortor, consectetur a urna a, congue cursus enim.
                    </p>
                    
                    <div class="saibaMais">
                        <button id="saibaMaisBtn" onclick="redirectSaibaAtendimentoMedico()">Saiba Mais <img src="imgs/icons/iconShare.png"></button>
                    </div>

            </div>
        </div>

        <!-- BRECHÓ OLIVEIRA -->
        <div class="BrechoDivTxtImg">

            <img src="imgs/projetoBrechoOliveira.png" id="imgBrechoOliveira">

            <div class="txt">

                <div class="tit">
                    <h1 id="voluntariosTit">Brechó Oliveira</h1>
                </div>

                <p id="txt"> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. 
                    Quisque nulla tortor, consectetur a urna a, congue cursus enim.
                </p>
                
                <div class="saibaMais">
                    <button id="saibaMaisBtn" onclick="redirectSaibaBrechoOliveira()">Saiba Mais <img src="imgs/icons/iconShare.png"></button>

            </div>
            
        </div>
    </div>

    <?php
        include("footer.php");
    ?>

</body>
