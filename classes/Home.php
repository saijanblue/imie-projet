<?php

include "Vue.php";

/*
Cette classe est un exemple de control pour la partie front.
Elle gére la vue "HOME". Pour l'heure elle n'affiche que le header, footer et une div <p>indiquant le nom de la page (à compléter par les front).
A terme le controleur pourra gérer les diffèrentes vues associées à cette page (pagination, vue diffèrente selon rôles (menu ect..), requête Ajax, Formulaire..)
*/

class Home{
    function __construct(){
        Vue::AfficherVue("Header");
        Vue::AfficherVue("HeaderNav");
        Vue::AfficherVue("Home");
        Vue::AfficherVue("Footer");
    }
}

?>