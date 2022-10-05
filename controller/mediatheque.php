<?php
if (!empty($_SESSION)) {
    echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
    echo $twig->render('mediatheque.html.twig', ['login' => $_SESSION['login']]);
} else {
    echo $twig->render('navbar.html.twig');
    echo $twig->render('mediatheque.html.twig');
}
