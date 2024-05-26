<?php
    include("connect.php");

    function criarUsuario($conn){

        $nome = '';
        $email = '';
        $senha = '';
        $confirmSenha = '';
        $tipoUsu = '';

        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        }

        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        }

        if (!empty($_POST['senha'])) {
            $senha = $_POST['senha'];
        }

        if (!empty($_POST['confirmaSenha'])) {
            $confirmSenha = $_POST['confirmaSenha'];
        }

        if (!empty($_POST['tipoUsu'])) {
            $tipoUsu = $_POST['tipoUsu'];
        }

        $ultimoAcesso = "Nunca acessado";
        
        if ($senha == $confirmSenha) {
            // Usando prepared statement para evitar injeção de SQL
            $sql = "INSERT INTO usuarios (nome, email, senha, tipoUsu, ultimoAcesso) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $senha, $tipoUsu, $ultimoAcesso);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../admUsu.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            
            mysqli_stmt_close($stmt);
        } else {
            echo "As senhas não coincidem. Tente novamente.";
        }
    }

    function editarUsuario($conn) {
        // Verifica se os dados foram enviados via método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos necessários foram preenchidos
            if (!empty($_POST['idUsu']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['confirmSenha']) && !empty($_POST['tipoUsu'])) {
                // Obtém os dados do formulário
                $idUsu = $_POST['idUsu'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $confirmSenha = $_POST['confirmSenha'];
                $tipoUsu = $_POST['tipoUsu'];
    
                // Verifica se as senhas coincidem
                if ($senha === $confirmSenha) {
                    // Atualiza os dados do usuário no banco de dados
                    $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, tipoUsu = ? WHERE idUsu = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "ssssi", $nome, $email, $senha, $tipoUsu, $idUsu);
    
                    if (mysqli_stmt_execute($stmt)) {
                        // Se a atualização for bem-sucedida, redireciona de volta para a página de administração
                        header("Location: ../admUsu.php");
                        exit();
                    } else {
                        // Se ocorrer um erro na atualização, exibe uma mensagem de erro
                        echo "Erro ao atualizar o usuário: " . mysqli_error($conn);
                    }
    
                    mysqli_stmt_close($stmt);
                } else {
                    // Se as senhas não coincidirem, exibe uma mensagem de erro
                    echo "As senhas não coincidem. Tente novamente.";
                }
            } else {
                // Se algum campo estiver vazio, exibe uma mensagem de erro
                echo "Todos os campos são obrigatórios.";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['deleteIdUsu'])) {
            // Se o parâmetro deleteIdUsu estiver presente, chama a função para deletar o usuário
            deletarUsuario($conn, $_POST['deleteIdUsu']);
        } elseif (isset($_POST['idUsu'])) {
            // Se o parâmetro idUsu estiver presente, chama a função para editar o usuário
            editarUsuario($conn, $_POST['editIdUsu']);
        } else {
            echo "Nenhum parâmetro válido enviado.";
        }
    }
    
    function deletarUsuario($conn, $idUsu) {
        $sql = "DELETE FROM usuarios WHERE idUsu = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $idUsu);
                        
        if (mysqli_stmt_execute($stmt)) {
            // Se a exclusão for bem-sucedida, retorne um status 200 (OK)
            http_response_code(200);
        } else {
            // Se ocorrer um erro na exclusão, retorne um status 500 (Erro interno do servidor)
            http_response_code(500);
            echo "Error: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    }

    if (isset($_POST['criarUsuario'])) {
        criarUsuario($conn);
    }