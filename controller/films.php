<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//On appelle la fonction getAll()
$filmsDao = new FilmsDAO();
/* @var $allfilms type */
$allfilms = $filmsDao->getAll();
//On affiche le template Twig correspondant
echo $twig->render('films.html.twig', ['allfilms' => $allfilms]);
