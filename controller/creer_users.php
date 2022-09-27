<?php

if (isset($_POST['email']) && isset($_POST['password'])) {

    $usersDao = new usersDAO();
    $creerU = new users(null, $_POST['email'], $_POST['password']);

    $status = $usersDao->add($creerU);

    if ($status) {
        echo $twig->render('creer_users.html.twig', ['status' => "Votre compte est bien créé", 'creerU' => $creerU]);
    } else {
        echo $twig->render('creer_users.html.twig', ['status' => "Erreur !!"]);
    }
} else {
    echo $twig->render('creer_users.html.twig');
}
