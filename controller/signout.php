<?php
unset($_SESSION['login']);
echo $twig->render('signout.html.twig');
