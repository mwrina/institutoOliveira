function logout() {
    // Envia uma requisição GET para bd/logout.php
    fetch('bd/logout.php')
        .then(response => {
            // Se a requisição for bem-sucedida, redireciona para a página inicial ou outra página desejada
            window.location.href = 'index.php'; // Altere 'index.php' para a página desejada
        })
        .catch(error => console.error('Erro ao fazer logout:', error));
}