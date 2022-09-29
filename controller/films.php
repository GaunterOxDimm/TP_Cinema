<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//On appelle la fonction getAll()
$filmsDao = new FilmsDAO();

// $grabFilm = $filmsDao->getOne($_POST['search']);

/* @var $allfilms type */
$allfilms = $filmsDao->getAll();
$arr = (array) $allfilms;
// $imageFilm = $filmsDao->getImage($_POST['idFilm']);
// var_dump($imageFilm);
echo $twig->render('films.html.twig');
// if ($_POST['search']) {

//     echo $twig->render('films.html.twig', ['grabFilm' => $grabFilm]);
// } else {
//     echo $twig->render('films.html.twig');
// }



// if (isset($_POST['previous'])) {
// $query = $this->_bdd->prepare("SELECT * FROM role INNER JOIN films ON role.idFilm = films.idFilm INNER JOIN acteurs ON role.idActeur = acteurs.idActeur;");
// $query->execute();
// $films = array();
// while ($data = $query->fetch()) {
//     $films[] = new Films($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
// }
// return ($films);
// } else if (isset($_POST['nexter'])) {
//     $arr[$i--];
// }


//On affiche le template Twig correspondant
// echo $twig->render('films.html.twig', ['allfilms' => $imageFilm]);
