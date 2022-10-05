<?php
echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
echo $twig->render('settings.html.twig');
