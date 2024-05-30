<?php

include("connect.php");

function buscarEnd($conn) {

    $endereco = [];
    $sql = "SELECT * FROM endereco";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $endereco[] = $row;
        }
    } else {
        echo "Erro ao buscar o endereco: " . mysqli_error($conn);
    }

    return $endereco;
}