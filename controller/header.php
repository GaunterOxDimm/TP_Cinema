<?php
//On affiche le template Twig correspondant

if (empty($_SESSION['login'])) {
    echo $twig->render('header.html.twig');
} else {
    echo $twig->render('header.html.twig', ['login' => $_SESSION['login']]);
}
