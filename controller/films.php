<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$filmsDao = new FilmsDAO();             // On instancie FilmsDAO
$error = "";


if (isset($_POST['search'])) {      // On execute l'affichage seulement si le bouton suivant est cliqué

    $allfilms = $filmsDao->getAll($_POST['search']);
    // var_dump($allfilms);
    if ($allfilms == NULL) {
        $error = "Aucun résultat";
        echo $twig->render('films.html.twig', ['error' => $error]);
    } else {
        echo $twig->render('films.html.twig', ['allfilms' => $allfilms]);
    }
} else {
    $allfilms = $filmsDao->getAll("");
    echo $twig->render('films.html.twig', ['allfilms' => $allfilms]);
}
