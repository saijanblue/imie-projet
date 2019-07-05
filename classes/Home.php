<?php

include "Vue.php";

class Home{
    function __construct(){
        Vue::AfficherVue("Header");
        Vue::AfficherVue("Home");
        Vue::AfficherVue("Footer");
    }
}

?>