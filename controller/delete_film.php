<?php

$filmsDao = new filmsDAO();

if (isset($_POST['idFilm']) ) {
    
   $filmsDao->delete($_POST['idFilm']);

        echo $twig->render('delete_film.html.twig', ['status' => "film bien supprimé"]);
    } else {
        echo $twig->render('delete_film.html.twig', ['status' => "Erreur suppression !"]);
    }

//cette cle status son contenue sera visible dans delete_film.html.twig ,dès que je note {{status}} elle affichera soit film bien supp ou erreur supp 


?>