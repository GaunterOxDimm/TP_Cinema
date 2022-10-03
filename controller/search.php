<?php

if (isset($_POST['search'])) {
    echo $twig->render('search.html.twig');
    echo $twig->render('films.html.twig');
} else {

    echo $twig->render('search.html.twig');
}
