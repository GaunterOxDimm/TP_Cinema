<?php

$filmsDao = new FilmsDAO();

$allfilms = $filmsDao->getAll((""));

echo $twig->render('mediatheque.html.twig', ['allfilms' => $allfilms]);
