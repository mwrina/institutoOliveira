<?php

    include("connect.php"); 

    if (!function_exists('getNums')) {
        function getNums($conn) {
            $nums = [];
            $sql = 'SELECT * FROM numeros';
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nums[] = $row;
                }
            } else {
                echo "Nenhum resultado encontrado.";
            }
    
            return $nums;
        }
    }

    if (!function_exists("updateNums")) {
        function updateNums($conn) {
            $id = $_POST['id'];
            $campo = $_POST['campo'] ?? $campo = '';
            $valor = $_POST['valor'] ?? $valor = '';
            $sql = "UPDATE numeros SET campo = ?, valor = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sii", $campo, $valor, $id);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admNums.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        }
    }

    if(isset($_POST['altNum'])) {
        updateNums($conn);
    }
    