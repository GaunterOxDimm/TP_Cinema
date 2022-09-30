<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$filmsDao = new FilmsDAO();             // On instancie FilmsDAO
// echo $twig->render('films.html.twig');  // On affiche la page du carousel à la 1ère connection
// Tableau d'objet de toutes les infos de la bdd (jointure) - On appelle la fonction getAll()
// print_r($allfilms);

if (isset($_POST['search'])) {         // On execute l'affichage seulement si le bouton suivant est cliqué
    $allfilms = $filmsDao->getAll($_POST['search']);  // On affiche dans la page du carousel tous les éléments de la bdd
} else {
    // print_r($affiches);
    $allfilms = $filmsDao->getAll("");
}
echo $twig->render('films.html.twig', ['allfilms' => $allfilms]);
// $grabFilm = $filmsDao->getOne($_POST['search']);

/* @var $allfilms type */
// $allfilms = $filmsDao->getAll();
// print_r($allfilms[0]->get_affiche());
// print_r($allfilms);
// $affiche = $allfilms[0]->get_affiche();                          CE TEST MARCHE
// echo $twig->render('films.html.twig', ['affiche' => $affiche]);  CE TEST MARCHE
// $affiche = $allfilms[0]->get_affiche();
// while (isset($_POST['nexter'])) {
//     print_r($affiche);
//     echo $twig->render('films.html.twig', ['affiche' => $affiche]);
// } 

// if ($_POST['nexter']) {
//     for ($i = 0; $i < count($allfilms); $i++) {
//         $affiche = $allfilms[$i]->get_affiche();
//         echo $twig->render('films.html.twig', ['affiche' => $affiche]);
//     }
// }