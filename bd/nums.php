<?php

    include("bd/connect.php");

    function getAtendimentos($conn) {
        // Preparar a consulta SQL
        $sql_select = 'SELECT atendimentos FROM numeros WHERE id = 1';
        $stmt_select = mysqli_prepare($conn, $sql_select);
    
        // Vincular resultado da consulta
        mysqli_stmt_bind_result($stmt_select, $atendimentosAtual);
    
        // Buscar resultados
        if(mysqli_stmt_fetch($stmt_select)){
            $_SESSION['atendimentosAtual'] = $atendimentosAtual;
        } else {
            echo "Nenhum resultado encontrado.";
        }
    
        // Fechar o cursor
        mysqli_stmt_close($stmt_select);
    }

    function updateAtendimentos($conn) {

    }

    function getDoadores($conn) {
        // Preparar a consulta SQL
        $sql_select = 'SELECT doadores FROM numeros WHERE id = 1';
        $stmt_select = mysqli_prepare($conn, $sql_select);
        
        // Vincular resultado da consulta
        mysqli_stmt_bind_result($stmt_select, $doadoresAtual);
        
        // Buscar resultados
        if(mysqli_stmt_fetch($stmt_select)){
            $_SESSION['doadoresAtual'] = $doadoresAtual;
        } else {
            echo "Nenhum resultado encontrado.";
        }
        
        // Fechar o cursor
        mysqli_stmt_close($stmt_select);
    }

    function updateDoadores($conn) {

    }

    function getFamilias($conn) {
        // Preparar a consulta SQL
        $sql_select = 'SELECT familias FROM numeros WHERE id = 1';
        $stmt_select = mysqli_prepare($conn, $sql_select);
        
        // Vincular resultado da consulta
        mysqli_stmt_bind_result($stmt_select, $familiasAtual);
        
        // Buscar resultados
        if(mysqli_stmt_fetch($stmt_select)){
            $_SESSION['familiasAtual'] = $familiasAtual;
        } else {
            echo "Nenhum resultado encontrado.";
        }
        
        // Fechar o cursor
        mysqli_stmt_close($stmt_select);
    }
    