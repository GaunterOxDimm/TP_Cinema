<?php
unset($_SESSION['login']);
echo $twig->render('navbar.html.twig');
echo $twig->render('users.html.twig');
