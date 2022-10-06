<?php
if (!isset($_SESSION['login'])) {
    echo $twig->render('navbar.html.twig');
    echo $twig->render('users.html.twig');
} else {
    echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
    echo $twig->render('settings.html.twig');
}
