document.addEventListener("DOMContentLoaded", function() {
    var menu = document.querySelector("#menuIcon");
    var sidebar = document.querySelector(".mobileSidebar");

    
    if (menu && sidebar && isMobileLayout()) {
        menu.addEventListener('click', function() {
            sidebar.style.width = "fit-content";
            document.querySelector(".col-links").style.display = "none";
        });
    } else {
        console.error("O elemento 'menuIcon' ou 'mobileSidebar' não foi encontrado ou o layout não é mobile.");
    }
});

function isMobileLayout() {
    var element = document.querySelector('#menuIcon');
    return window.getComputedStyle(element).getPropertyValue('font-size') === '40px';
}