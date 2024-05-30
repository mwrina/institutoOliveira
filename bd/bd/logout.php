<?php

    session_start();

    //limpar variáveis da sessão
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['nome']);
    unset($_SESSION['conectado']);

    //destruir sessão
    session_destroy();

    exit();