<?php
if (isset($_SESSION['login'])) {
    if (isset($_POST['search'])) {
        echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
        echo $twig->render('search.html.twig');
        echo $twig->render('films.html.twig');
    } else {
        echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
        echo $twig->render('search.html.twig');
    }
} else {
    $erreur = "Veuillez vous connecter pour consulter les films";
    echo $twig->render('navbar.html.twig');
    echo $twig->render('erreur.html.twig', ['erreur' => $erreur]);
    echo $twig->render('users.html.twig');
}
