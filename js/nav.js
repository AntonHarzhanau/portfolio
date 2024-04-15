const nav = document.querySelector(".nav");

var currentUrl = window.location.href;

currentUrl = "." + currentUrl.substring(currentUrl.lastIndexOf("/"));


// Obtenir tous les liens dans la barre de navigation
var navLinks = document.querySelectorAll(".nav-list__link");

// vérifier si le href du lien correspond à l'URL actuelle
navLinks.forEach(function(link) {
    var currhref = link.getAttribute("href");
    currhref = "." + currhref.substring(currhref.lastIndexOf("/"));
    if(currhref === currentUrl) {
        link.classList.add("nav-list__link--active");
    }
});