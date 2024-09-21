if (window.innerWidth <= 800) { // Verifica se a largura da tela é menor ou igual a 600px
    let aberto = false; // Começa como fechado
    
    function openNav() {
        document.querySelector(".nav").style.width = "25%";
        document.querySelector(".navBarItems").style.display = "flex";
        document.querySelector(".nav").style.height = "100%";
        aberto = true;
    }

    function closeNav() {
        document.querySelector(".nav").style.width = "25px";
        document.querySelector(".navBarItems").style.display = "none";
        document.querySelector(".nav").style.height = "fit-content";
        aberto = false;
    }

    closeNav();

    document.querySelector('#abrirNav').addEventListener('click', () => {
        if (aberto) {
            closeNav();
        } else {
            openNav();
        }
    });
}
