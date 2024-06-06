<?php

    include("connect.php"); 

    if (!function_exists('getAtendimentos')) {
        function getAtendimentos($conn) {
            $sql_select = 'SELECT atendimentos FROM numeros WHERE id = 1';
            $stmt_select = mysqli_prepare($conn, $sql_select);
    
            mysqli_stmt_execute($stmt_select);
    
            mysqli_stmt_bind_result($stmt_select, $atendimentosAtual);
    
            if(mysqli_stmt_fetch($stmt_select)){
                $_SESSION['atendimentosAtual'] = $atendimentosAtual;
            } else {
                echo "Nenhum resultado encontrado.";
            }
    
            mysqli_stmt_free_result($stmt_select);
    
            mysqli_stmt_close($stmt_select);
        }

    }

    if (!function_exists('getDoadores')) {
        function getDoadores($conn) {
            $sql_select = 'SELECT doadores FROM numeros WHERE id = 1';
            $stmt_select = mysqli_prepare($conn, $sql_select);
    
            mysqli_stmt_execute($stmt_select);
    
            mysqli_stmt_bind_result($stmt_select, $doadoresAtual);
    
            if(mysqli_stmt_fetch($stmt_select)){
                $_SESSION['doadoresAtual'] = $doadoresAtual;
            } else {
                echo "Nenhum resultado encontrado.";
            }
    
            mysqli_stmt_free_result($stmt_select);
    
            mysqli_stmt_close($stmt_select);
        }
    }

    if (!function_exists('getFamilias')) {
        function getFamilias($conn) {
            $sql_select = 'SELECT familias FROM numeros WHERE id = 1';
            $stmt_select = mysqli_prepare($conn, $sql_select);
    
            mysqli_stmt_execute($stmt_select);
    
            mysqli_stmt_bind_result($stmt_select, $familiasAtual);
    
            if(mysqli_stmt_fetch($stmt_select)){
                $_SESSION['familiasAtual'] = $familiasAtual;
            } else {
                echo "Nenhum resultado encontrado.";
            }
    
            mysqli_stmt_free_result($stmt_select);
    
            mysqli_stmt_close($stmt_select);
        }
    }

    if (!function_exists("updateAtendimentos")) {
        function updateAtendimentos($conn) {
            if (!empty($_POST['atendimentos'])) {
                $atendimentos = $_POST['atendimentos'];
                $sql_update = "UPDATE numeros SET atendimentos = ?";
                $stmt_update = mysqli_prepare($conn, $sql_update);
                mysqli_stmt_bind_param($stmt_update, "s", $atendimentos);
    
                if (mysqli_stmt_execute($stmt_update)) {
                    header("Location: ../alterarNums.php");
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "O campo de atendimentos está vazio.";
            }
        }
    }

    if (!function_exists("updateDoadores")) {
        function updateDoadores($conn) {
            $sql_update = "UPDATE numeros SET doadores = ?";
            $stmt_update = mysqli_prepare($conn, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "s", $doadores);

            if (mysqli_stmt_execute($stmt_update)) {
                header("Location: ../alterarNums.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            if (mysqli_stmt_execute($stmt_update)) {
                header("Location: ../alterarNums.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    if (isset($_POST['altAtendimentos'])) {
        updateAtendimentos($conn);
    }

    if (isset($_POST['altDoadores'])) {
        updateDoadores($conn);
    }
    