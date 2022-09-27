<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//On appelle la fonction getAll()
$usersDao = new UsersDAO();
/* @var $allusers type */
$allusers = $usersDao->getAll();
//On affiche le template Twig correspondant
echo $twig->render('users.html.twig', ['allusers' => $allusers]);
