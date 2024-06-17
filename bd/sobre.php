<?php

include("connect.php");

function buscarSecoes($conn){
    
    $secoes = [];
    $sql = "SELECT * FROM sobreoinstituto";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $secoes[] = $row;
        }
    } else {
        echo "Erro ao buscar seções.";
    }

    return $secoes;

}

