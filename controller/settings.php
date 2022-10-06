<?php
if (isset($_SESSION['login'])) {
    echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
    echo $twig->render('settings.html.twig');
} else {
    $erreur = "Veuillez vous connecter pour avoir accès à cette fonctionnalité";
    echo $twig->render('navbar.html.twig');
    echo $twig->render('erreur.html.twig', ['erreur' => $erreur]);
    echo $twig->render('users.html.twig');
}
