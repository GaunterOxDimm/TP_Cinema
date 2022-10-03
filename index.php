<?php


// Initialisation de l'environnement
include './config/config.init.php';



include _CTRL_ . 'header.php';


// Gestion de Routing
if (isset($_GET['action']) && file_exists(_CTRL_ . $_GET['action'] . '.php')) {
    include _CTRL_ . $_GET['action'] . '.php';
} elseif (isset($_GET['action']) && !file_exists(_CTRL_ . ['action'] . '.php')) {
    include _CTRL_ . 'erreur.php';
} else {
    // include _CTRL_ . 'creer_film.php';
    // include _CTRL_ . 'creer_compte.php';
    var_dump($_SESSION);
    if (!empty($_SESSION)) {

        include _CTRL_ . 'search.php';
    } else {

        include _CTRL_ . 'users.php';
    }
}

include _CTRL_ . 'footer.php';
