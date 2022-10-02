<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$filmsDao = new FilmsDAO();             // On instancie FilmsDAO

if (isset($_POST['search'])) {         // On execute l'affichage seulement si le bouton suivant est cliqué
    $allfilms = $filmsDao->getAll(($_POST['search']));
    // print_r($allfilms);
} else {
    // print_r($affiches);
    $allfilms = $filmsDao->getAll("");
}
echo $twig->render('films.html.twig', ['allfilms' => $allfilms]);
