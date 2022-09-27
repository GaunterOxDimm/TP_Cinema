<?php

if (isset($_POST['titre']) && isset($_POST['realisateur'])) {

    $filmsDao = new FilmsDAO();
    $creerf = new Films(null, $_POST['titre'], $_POST['realisateur']);

    $status = $filmsDao->add($creerf);

    if ($status) {
        echo $twig->render('creer_film.html.twig', ['status' => "Ajout OK", 'creerf' => $creerf]);
    } else {
        echo $twig->render('creer_film.html.twig', ['status' => "Erreur Ajout"]);
    }
} else {
    echo $twig->render('creer_film.html.twig');
}
